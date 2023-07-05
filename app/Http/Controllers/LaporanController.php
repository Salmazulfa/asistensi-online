<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Aslab;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Materi;
use App\Models\Matkul;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // FUNCTION FOR ADMIN
    public function index()
    {
        return view('admin.nilaiMhs.nilaiMhs', [
            'title' => "Admin - Nilai Mahasiswa",
            'titleheader' => "Nilai Mahasiswa",
            'laporan' => Laporan::all(),
            'materi' => Materi::all(),
            'user' => auth()->user()
        ]);
    }

    public function detail($id)
    {
        $laporan = Laporan::find($id);

        return view('admin.nilaiMhs.detailNilai', [
            'title' => "Admin - Nilai Mahasiswa",
            'titleheader' => "Nilai Mahasiswa",
            'laporan' => $laporan,
            'materi' => Materi::all(),
            'user' => auth()->user()
        ]);
    }

    // FUNCTION FOR DOSEN
    public function nilai()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $dosen = dosen::all()->where('user_id', $user_id);
        foreach ($dosen as $dosen) {
            $id = $dosen['id'];
        }
        $laporan = Laporan::all()->where('dosen_id', $id);

        return view('dosen.nilaiMhs.nilaiMhs', [
            'title' => "Dosen - Nilai Mahasiswa",
            'titleheader' => "Nilai Mahasiswa",
            'laporan' => $laporan,
            'user' => $user
        ]);
    }

    public function editNilai($id)
    {
        $laporan = Laporan::find($id);

        return view('dosen.nilaiMhs.editNilai', [
            'title' => "Dosen - Nilai Mahasiswa",
            'titleheader' => "Nilai Mahasiswa",
            'laporan' => $laporan,
            'user' => auth()->user()
        ]);
    }

    public function updateNilaiDosen(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nilai' => '',
            'komentar' => '',
        ]);


        Laporan::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function saveWeb(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'aslab_id' => 'required',
            'materi_id' => 'required',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::create($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function updateWeb(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'id' => 'required',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function saveFr(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'aslab_id' => 'required',
            'materi_id' => 'required|max:255',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::create($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function updateFr(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'id' => 'required',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function saveSi(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'aslab_id' => 'required',
            'materi_id' => 'required|max:255',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::create($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function updateSi(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'id' => 'required',
            'tgl_upload' => 'required',
            'laporan' => 'required|file|max:5000',
        ]);

        if ($request->file('laporan')) {
            $validatedData['laporan'] = $request->file('laporan')->store('files');
        }

        Laporan::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    // FUNCTION FOR MHS
    public function nilaiMhs()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $mhs = Mahasiswa::all()->where('user_id', $user_id);
        foreach ($mhs as $mhs) {
            $id = $mhs->id;
        }
        $nilai = Laporan::all()->where('mahasiswa_id', $id);
        $web = $nilai->where('matkul_id', '1');
        $fr = $nilai->where('matkul_id', '5');
        $si = $nilai->where('matkul_id', '8');
        $matkul = Matkul::all();

        return view('mhs.nilai', [
            'title' => "Mahasiswa - Nilai Praktikum",
            'titleheader' => "Nilai Praktikum",
            'user' => $user,
            'matkul' => $matkul,
            'mhs_id' => $id,
            'web' => $web,
            'fr' => $fr,
            'si' => $si,
        ]);
    }

    // FUNCTION FOR ASLAB
    public function aslabNilai()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $aslab = Aslab::all()->where('user_id', $user_id);
        foreach ($aslab as $aslab) {
            $id = $aslab->dosen_id;
            $aslab_id = $aslab->id;
        }
        $dosen = Dosen::find($id);
        $matkul_id = $dosen->matkul_id;
        $laporan = Laporan::all()->where('matkul_id', $matkul_id)->where('aslab_id', $aslab_id);

        return view('aslab.nilai.aslabNilai', [
            'title' => "Asisten Praktikum - Penilaian",
            'titleheader' => "Nilai Praktikum Mahasiswa",
            'user' => $user,
            'laporan' => $laporan,
        ]);
    }

    public function penilaian($id)
    {
        $user = auth()->user();
        $laporan = Laporan::find($id);

        return view('aslab.nilai.penilaian', [
            'title' => "Asisten Praktikum - Penilaian",
            'titleheader' => "Penilaian Laporan Praktikan",
            'user' => $user,
            'laporan' => $laporan,
        ]);
    }

    public function savePenilaian(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nilai' => '',
            'komentar' => '',
        ]);

        Laporan::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Penilaian berhasil!!');
    }
}
