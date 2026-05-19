<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class AISaranService
{
    /**
     * Generate saran psikologis otomatis hanya dari GPT
     * @param string $kategori - kategori hasil FuzzyTsukamoto ("Ringan", "Sedang", dll)
     * @return string
     */
    public static function generate($kategori)
    {
        // Validasi input
        $validKategori = ['Normal', 'Ringan', 'Sedang', 'Berat'];
        if (!in_array($kategori, $validKategori)) {
            Log::warning("AISaranService: kategori tidak valid: " . var_export($kategori, true));
            return "Data hasil tidak valid. Silakan periksa kembali input diagnosa.";
        }

        // Prompt untuk AI
        $prompt = "Buat saran singkat dan empatik dalam Bahasa Indonesia untuk seseorang dengan tingkat kecemasan: {$kategori}. " .
                  "Gunakan bahasa lembut, positif, dan berikan langkah sederhana yang bisa dilakukan untuk membantu menenangkan diri.";

        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah asisten psikologi yang empatik dan profesional.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => 200,
                'temperature' => 0.8,
            ]);

            $text = $response->choices[0]->message->content ?? null;

            if ($text && trim($text) !== '') {
                return trim($text);
            }

            Log::warning("AISaranService: respons AI kosong untuk kategori {$kategori}");
            return "Maaf, saran tidak dapat dihasilkan saat ini. Silakan coba lagi.";

        } catch (\Throwable $e) {
            Log::error("AISaranService error: " . $e->getMessage(), [
                'kategori' => $kategori,
                'exception' => $e,
            ]);

            return "Terjadi kesalahan dalam menghasilkan saran. Silakan coba beberapa saat lagi.";
        }
    }
}
