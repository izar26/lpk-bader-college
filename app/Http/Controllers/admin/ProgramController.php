<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * READ: Menampilkan halaman utama dengan daftar semua program.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', ['programs' => $programs]);
    }

    /**
     * CREATE (Step 1): Menampilkan form untuk membuat program baru.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * CREATE (Step 2): Menyimpan program baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi semua input dari form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'nullable|string',
            'requirements_general' => 'nullable|string',
            'requirements_admin' => 'nullable|string',
        ]);

        Program::create($validatedData);

        return redirect()->route('admin.programs.index')->with('success', 'Program baru berhasil ditambahkan!');
    }

    /**
     * UPDATE (Step 1): Menampilkan form edit yang sudah terisi data program.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', ['program' => $program]);
    }

    /**
     * UPDATE (Step 2): Memproses dan menyimpan perubahan ke database.
     */
    public function update(Request $request, Program $program)
    {
        // Validasi semua input dari form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'nullable|string',
            'requirements_general' => 'nullable|string',
            'requirements_admin' => 'nullable|string',
        ]);

        $program->update($validatedData);

        return redirect()->route('admin.programs.index')->with('success', 'Data program berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus program dari database.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus.');
    }
}
