<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = Profil::firstOrCreate(['id' => 1]);
        return view('admin.profil.edit', ['profil' => $profil]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
    'nama' => 'required|string|max:50',
    'tentang' => 'required|string',
    'visi' => 'required|string',
    'misi' => 'required|string',
    'program' => 'required|string',
    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

        $profil = Profil::firstOrCreate(['id' => 1]);
        if ($request->hasFile('foto')) {
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            $path = $request->file('foto')->store('profil_images', 'public');

            $validatedData['foto'] = $path;
        }

        $profil->update($validatedData);

        return redirect()->route('admin.profil.edit')->with('success', 'Data profil berhasil diperbarui!');
    }
}