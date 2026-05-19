<?php 

namespace App\Services;

use App\Models\Rule;

class FuzzyTsukamoto
{
    // -----------------------------
    // 1. Membership Functions (0–21)
    // -----------------------------
    public static function normal($x)
    {
    if ($x <= 0) return 1;
    elseif ($x > 0 && $x < 4) return (4 - $x) / 4;
    elseif ($x == 4) return 0.01;   // batas aman
    else return 0;
    }


    public static function ringan($x)
    {
    if ($x < 4) return 0;
    elseif ($x == 4) return 0.01;  // batas aman
    elseif ($x > 4 && $x <= 6.5) return ($x - 4) / (6.5 - 4);
    elseif ($x > 6.5 && $x < 9) return (9 - $x) / (9 - 6.5);
    elseif ($x == 9) return 0.01;
    else return 0;
    }

    public static function sedang($x)
    {
    if ($x < 9) return 0;
    elseif ($x == 9) return 0.01;   // batas aman
    elseif ($x > 9 && $x <= 11.5) return ($x - 9) / (11.5 - 9);
    elseif ($x > 11.5 && $x < 14) return (14 - $x) / (14 - 11.5);
    elseif ($x == 14) return 0.01;
    else return 0;
    }

    public static function berat($x)
    {
        if ($x < 14) return 0;
        elseif ($x == 14) return 0.01; // 💡 Perbaikan: nilai batas tetap punya derajat
        elseif ($x > 14 && $x < 21) return ($x - 14) / (21 - 14);
        else return 1; // x >= 21
    }

    // -----------------------------
    // 2. Hitung Fuzzy Tsukamoto (G01–G07)
    // -----------------------------
    public static function hitung($G01, $G02, $G03, $G04, $G05, $G06, $G07)
    {
        // Jumlahkan skor semua gejala
        $x = $G01 + $G02 + $G03 + $G04 + $G05 + $G06 + $G07;

        // Log input awal
        \Log::info('Input DASS-Anxiety:', [
            'G01' => $G01,
            'G02' => $G02,
            'G03' => $G03,
            'G04' => $G04,
            'G05' => $G05,
            'G06' => $G06,
            'G07' => $G07,
            'total_skor' => $x
        ]);

        // Fuzzyfikasi total skor
        $μ = [
            'Normal' => self::normal($x),
            'Ringan' => self::ringan($x),
            'Sedang' => self::sedang($x),
            'Berat' => self::berat($x),
        ];

        // Log derajat keanggotaan
        \Log::info('Derajat keanggotaan (μ):', $μ);

        // Range kategori output (z)
        $zRange = [
            'Normal' => [0, 4],
            'Ringan' => [5, 9],
            'Sedang' => [10, 14],
            'Berat' => [15, 21],
        ];

        $num = 0;
        $den = 0;

        // Ambil semua rule dari database
        $rules = Rule::all();

        foreach ($rules as $r) {
            $G01Key = ucwords(strtolower(trim($r->G01)));
            $G02Key = ucwords(strtolower(trim($r->G02)));
            $G03Key = ucwords(strtolower(trim($r->G03)));
            $G04Key = ucwords(strtolower(trim($r->G04)));
            $G05Key = ucwords(strtolower(trim($r->G05)));
            $G06Key = ucwords(strtolower(trim($r->G06)));
            $G07Key = ucwords(strtolower(trim($r->G07)));
            $hasilKey = ucwords(strtolower(trim($r->hasil)));

            // Derajat kebenaran α = min(μ(G01–G07))
            $α = min(
                $μ[$G01Key] ?? 0,
                $μ[$G02Key] ?? 0,
                $μ[$G03Key] ?? 0,
                $μ[$G04Key] ?? 0,
                $μ[$G05Key] ?? 0,
                $μ[$G06Key] ?? 0,
                $μ[$G07Key] ?? 0
            );

            if ($α > 0) {
                [$zMin, $zMax] = $zRange[$hasilKey] ?? [0, 0];
                $z = $zMin + $α * ($zMax - $zMin);

                $num += $α * $z;
                $den += $α;

                // Log rule aktif
                \Log::info('Rule aktif:', [
                    'rule_id' => $r->id,
                    'hasil' => $hasilKey,
                    'alpha (α)' => $α,
                    'z' => $z
                ]);
            }
        }

        $hasilCrisp = ($den > 0) ? $num / $den : 0;

        // Log defuzzifikasi
        \Log::info('Hasil defuzzifikasi:', [
            'pembilang' => $num,
            'penyebut' => $den,
            'nilai_crisp' => $hasilCrisp
        ]);

        // Tentukan kategori hasil
        if ($hasilCrisp < 5) $kategori = "Normal";
        elseif ($hasilCrisp < 10) $kategori = "Ringan";
        elseif ($hasilCrisp < 15) $kategori = "Sedang";
        else $kategori = "Berat";

        // Log hasil akhir
        \Log::info('Hasil akhir DASS-Anxiety:', [
            'total_input' => $x,
            'nilai_crisp' => $hasilCrisp,
            'kategori' => $kategori
        ]);

        return $kategori;
    }
}
