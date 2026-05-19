<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    // ====================================================
    // 🔹 Tampilkan semua rule
    // ====================================================
    public function index()
    {
        $rules = Rule::all();
        return view('admin.rules.index', compact('rules'));
    }

    // ====================================================
    // 🔹 Form tambah rule baru
    // ====================================================
    public function create()
    {
        return view('admin.rules.create');
    }

    // ====================================================
    // 🔹 Simpan rule baru (G01–G07 + hasil)
    // ====================================================
    public function store(Request $request)
    {
        $request->validate([
            'G01'   => 'required|string',
            'G02'   => 'required|string',
            'G03'   => 'required|string',
            'G04'   => 'required|string',
            'G05'   => 'required|string',
            'G06'   => 'required|string',
            'G07'   => 'required|string',
            'hasil' => 'required|string|in:Normal,Ringan,Sedang,Berat',
        ]);

        Rule::create($request->only([
            'G01','G02','G03','G04','G05','G06','G07','hasil'
        ]));

        return redirect()->route('admin.rules.index')
                         ->with('success', 'Rule baru berhasil ditambahkan.');
    }

    // ====================================================
    // 🔹 Form edit rule
    // ====================================================
    public function edit(Rule $rule)
    {
        return view('admin.rules.edit', compact('rule'));
    }

    // ====================================================
    // 🔹 Update rule
    // ====================================================
    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'G01'   => 'required|string',
            'G02'   => 'required|string',
            'G03'   => 'required|string',
            'G04'   => 'required|string',
            'G05'   => 'required|string',
            'G06'   => 'required|string',
            'G07'   => 'required|string',
            'hasil' => 'required|string|in:Normal,Ringan,Sedang,Berat',
        ]);

        $rule->update($request->only([
            'G01','G02','G03','G04','G05','G06','G07','hasil'
        ]));

        return redirect()->route('admin.rules.index')
                         ->with('success', 'Rule berhasil diperbarui.');
    }

    // ====================================================
    // 🔹 Hapus satu rule
    // ====================================================
    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect()->route('admin.rules.index')
                         ->with('success', 'Rule berhasil dihapus.');
    }

    // ====================================================
    // 🔹 Import file CSV / Excel
    // Format kolom: G01,G02,G03,G04,G05,G06,G07,hasil
    // ====================================================
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlsx,xls'
        ]);

        $file = $request->file('file');
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));

        foreach ($data as $index => $row) {
            if ($index === 0) continue; // lewati header CSV

            if (count($row) >= 8) {
                Rule::create([
                    'G01' => trim($row[0]),
                    'G02' => trim($row[1]),
                    'G03' => trim($row[2]),
                    'G04' => trim($row[3]),
                    'G05' => trim($row[4]),
                    'G06' => trim($row[5]),
                    'G07' => trim($row[6]),
                    'hasil' => ucwords(strtolower(trim($row[7]))),
                ]);
            }
        }

        return redirect()->route('admin.rules.index')
                         ->with('success', 'Data rule berhasil diimpor dari file.');
    }

    // ====================================================
    // 🔹 Hapus banyak rule sekaligus
    // ====================================================
    public function destroyMultiple(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return redirect()->route('admin.rules.index')
                             ->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
        }

        Rule::whereIn('id', $ids)->delete();

        return redirect()->route('admin.rules.index')
                         ->with('success', 'Beberapa rule berhasil dihapus.');
    }
}
