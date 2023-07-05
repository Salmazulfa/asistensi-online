<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function dataMatkul()
    {
        return view('admin.masterMatkul.dataMatkul', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Mata Kuliah",
            'matkul' => Matkul::all(),
            'user' => auth()->user(),
        ]);
    }

    public function saveMatkul(Request $request)
    {

        $validatedData = $request->validate([
            'matkul' => 'required',
        ]);

        $matkul = Matkul::create($validatedData);
        // dd($request->file('foto'));

        if ($request->file('foto')) {
            $request->file('foto')->move('storage/files/', $request->file('foto')->getClientOriginalName());
            $matkul->foto = $request->file('foto')->getClientOriginalName();
            $matkul->save();
        }

        return redirect('/admin/dataMatkul')->with('success', 'Yeay berhasil!!');
    }

    public function updateMatkul(Request $request)
    {
        $foto = $request->foto;
        if ($foto == "") {
            $validatedData = $request->validate([
                'id' => 'required',
                'matkul' => 'required',
            ]);

            Matkul::where('id', $validatedData['id'])->update($validatedData);
            return back()->with('success', 'Yeay berhasil!!');
        } else {
            $validatedData = $request->validate([
                'id' => 'required',
                'matkul' => 'required',
            ]);

            Matkul::where('id', $validatedData['id'])->update($validatedData);

            if ($request->file('foto')) {
                $request->file('foto')->move('storage/files/', $request->file('foto')->getClientOriginalName());
                $file = $request->file('foto')->getClientOriginalName();
                // dd($file);

                $id = $validatedData['id'];
                $matkul = Matkul::find($id);
                $matkul->foto = $file;
                $matkul->save();
            }
            
        }


        return redirect('/admin/dataMatkul')->with('success', 'Data Berhasil Diupdate');
    }

    public function hapusMatkul($id)
    {
        Matkul::find($id)->delete();
        return redirect('/admin/dataMatkul')->with('success', 'Data Berhasil Dihapus');
    }
}
