<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Aslab;
use App\Models\Laporan;
use App\Models\Matkul;
use App\Models\Materi;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function materi()
    {
        $user = auth()->user();
        $dosen = Dosen::all()->where('user_id', $user->id);
        foreach ($dosen as $dosen) {
            $dosen_id = $dosen['id'];
        }
        $materi = Materi::all()->where('dosen_id', $dosen_id);

        return view('dosen.materi.materi', [
            'title' => "Dosen - Materi Perkuliahan",
            'titleheader' => "Materi Perkuliahan",
            'materi' => $materi,
            'user' => $user,
        ]);
    }

    public function tambahMateri()
    {
        $user = auth()->user();
        $dosen = Dosen::all()->where('user_id', $user->id);
        foreach ($dosen as $dosen) {
            $dosen_id = $dosen->id;
            $matkul_id = $dosen->matkul_id;
        }

        $aslab = Aslab::all()->where('dosen_id', $dosen_id);
        foreach ($aslab as $aslab) {
            $aslab_id = $aslab->id;
        }
        return view('dosen.materi.tambahMateri', [
            'title' => "Dosen - Materi Perkuliahan",
            'titleheader' => "Input Materi Perkuliahan",
            'aslab_id' => $aslab_id,
            'dosen_id' => $dosen_id,
            'matkul_id' => $matkul_id,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'aslab_id' => 'required',
            'dosen_id' => 'required',
            'matkul_id' => 'required',
            'judul_materi' => 'required|max:255',
            'keterangan' => 'required|max:255',
            // 'materi' => 'required|file|max:5000',
            'tgl_deadline' => '',
            'tgl_upload' => 'required',
        ]);

        $materi = Materi::create($validatedData);

        if ($request->file('materi')) {
            $request->file('materi')->move('storage/files/', $request->file('materi')->getClientOriginalName());
            $materi->materi = $request->file('materi')->getClientOriginalName();
            $materi->save();
        }

        return redirect('/dosen/materi')->with('success', 'Yeay berhasil!!');
    }

    public function editMateri($id)
    {
        return view('dosen.materi.editMateri', [
            'title' => "Dosen - Materi Perkuliahan",
            'titleheader' => "Materi Perkuliahan",
            'materi' => Materi::find($id),
            'user' => auth()->user(),
        ]);
    }

    public function updateMateri(Request $request)
    {
        $materi = $request->materi;
        if ($materi == "") {
            $validatedData = $request->validate([
                'id' => 'required',
                'aslab_id' => 'required',
                'dosen_id' => 'required',
                'matkul_id' => 'required',
                'judul_materi' => 'required|max:255',
                'keterangan' => 'required|max:255',
                'tgl_deadline' => '',
                'tgl_upload' => 'required',
            ]);

            Materi::where('id', $validatedData['id'])->update($validatedData);
            return back()->with('success', 'Yeay berhasil!!');
        } else {
            $validatedData = $request->validate([
                'id' => 'required',
                'aslab_id' => 'required',
                'dosen_id' => 'required',
                'matkul_id' => 'required',
                'judul_materi' => 'required|max:255',
                'keterangan' => 'required|max:255',
                'tgl_deadline' => '',
                'tgl_upload' => 'required',
            ]);

            Materi::where('id', $validatedData['id'])->update($validatedData);

            if ($request->file('materi')) {
                $request->file('materi')->move('storage/files/', $request->file('materi')->getClientOriginalName());
                $file = $request->file('materi')->getClientOriginalName();

                $id = $validatedData['id'];
                $materi = Materi::find($id);
                $materi->materi = $file;
                $materi->save();
            }

            return back()->with('success', 'Yeay berhasil!!');
        }
    }

    public function hapusMateri($id)
    {
        Materi::destroy($id);
        return redirect('/dosen/materi')->with('success', 'Data Berhasil Dihapus');
    }

    // FUNCTION FOR ASLAB
    public function aslabMateri()
    {

        $user = auth()->user();
        $aslab = Aslab::all()->where('user_id', $user->id);
        foreach ($aslab as $aslab) {
            $dosen_id = $aslab['dosen_id'];
            $aslab_id = $aslab->id;
        }

        $dosen = Dosen::all()->where('id', $dosen_id);
        foreach ($dosen as $dosen) {
            $id = $dosen['matkul_id'];
        }

        $materi = Materi::all()->where('aslab_id', $aslab_id);
        $matkul = Matkul::find($id);

        return view('aslab.materi.materi', [
            'title' => "Mata Kuliah " . $matkul->matkul,
            'titleheader' => $matkul->matkul,
            'materi' => $materi,
            'user' => $user,
        ]);
    }

    public function aslabDetailMateri($id)
    {
        $materi = Materi::find($id);
        $user = auth()->user();

        return view('aslab.materi.detailMateri', [
            'title' => "Mata Kuliah Web Programming",
            'titleheader' => "Web Programming",
            'materi' => $materi,
            'user' => $user,
        ]);
    }


    // FUNCTION FOR MHS
    public function web()
    {
        $id = "1";
        $matkul = Matkul::find($id);
        $materi = Materi::all()->where('matkul_id', $id);

        return view('mhs.matkul.web', [
            'title' => "Mata Kuliah " . $matkul->matkul,
            'titleheader' => $matkul->matkul,
            'materi' => $materi,
            'user' => auth()->user(),
            'data' => null,
        ]);
    }

    public function detailWeb($id)
    {
        $matkul_id = "1";
        $matkul = Matkul::all()->where('id', $matkul_id);
        foreach ($matkul as $matkul) {
            $mk = $matkul->matkul;
        }
        $materi = Materi::find($id);
        $user = auth()->user();
        $mhs = Mahasiswa::all()->where('user_id', $user->id);
        foreach ($mhs as $mhs) {
            $mhs_id = $mhs->id;
        }

        $laporan = Laporan::all()->where('materi_id', $id)->where('mahasiswa_id', $mhs_id);
        $json = json_decode($laporan, TRUE);
        foreach ($laporan as $laporan) {
            $id = $laporan->id;
            $materi_id = $laporan->materi_id;
            $komentar = $laporan->komentar;
            $nilai = $laporan->nilai;
            $tgl_upload = $laporan->tgl_upload;
            $file = $laporan->laporan;
        }

        if ($json == null) {
            return view('mhs.matkul.detailweb', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "null"
            ]);
        } else {
            return view('mhs.matkul.detailweb', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'materi_id' => $materi_id,
                'id' => $id,
                'laporan' => $file,
                'komentar' => $komentar,
                'tgl_upload' => $tgl_upload,
                'nilai' => $nilai,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "ada"
            ]);
        }
    }

    public function si()
    {
        $id = "8";
        $matkul = Matkul::find($id);
        $materi = Materi::all()->where('matkul_id', $id);

        return view('mhs.matkul.si', [
            'title' => "Mata Kuliah " . $matkul->matkul,
            'titleheader' => $matkul->matkul,
            'materi' => $materi,
            'user' => auth()->user(),
            'data' => null,
        ]);
    }

    public function detailSi($id)
    {
        $matkul_id = "8";
        $matkul = Matkul::all()->where('id', $matkul_id);
        foreach ($matkul as $matkul) {
            $mk = $matkul->matkul;
        }
        $materi = Materi::find($id);
        $user = auth()->user();
        $mhs = Mahasiswa::all()->where('user_id', $user->id);
        foreach ($mhs as $mhs) {
            $mhs_id = $mhs->id;
        }

        $laporan = Laporan::all()->where('materi_id', $id);
        $json = json_decode($laporan, TRUE);
        foreach ($laporan as $laporan) {
            $id = $laporan->id;
            $materi_id = $laporan->materi_id;
            $komentar = $laporan->komentar;
            $nilai = $laporan->nilai;
            $tgl_upload = $laporan->tgl_upload;
            $file = $laporan->laporan;
        }

        if ($json == null) {
            return view('mhs.matkul.detailsi', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "null"
            ]);
        } else {
            return view('mhs.matkul.detailsi', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'materi_id' => $materi_id,
                'id' => $id,
                'laporan' => $file,
                'komentar' => $komentar,
                'tgl_upload' => $tgl_upload,
                'nilai' => $nilai,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "ada"
            ]);
        }
    }

    public function fr()
    {
        $id = "5";
        $matkul = Matkul::find($id);
        $materi = Materi::all()->where('matkul_id', $id);

        return view('mhs.matkul.fr', [
            'title' => "Mata Kuliah " . $matkul->matkul,
            'titleheader' => $matkul->matkul,
            'materi' => $materi,
            'user' => auth()->user(),
            'data' => null,
        ]);
    }

    public function detailFr($id)
    {
        $matkul_id = "5";
        $matkul = Matkul::all()->where('id', $matkul_id);
        foreach ($matkul as $matkul) {
            $mk = $matkul->matkul;
        }

        $materi = Materi::find($id);
        $user = auth()->user();
        $mhs = Mahasiswa::all()->where('user_id', $user->id);
        foreach ($mhs as $mhs) {
            $mhs_id = $mhs->id;
        }

        $laporan = Laporan::all()->where('materi_id', $id)->where('mahasiswa_id', $mhs_id);
        $json = json_decode($laporan, TRUE);
        foreach ($laporan as $laporan) {
            $id = $laporan->id;
            $materi_id = $laporan->materi_id;
            $komentar = $laporan->komentar;
            $nilai = $laporan->nilai;
            $tgl_upload = $laporan->tgl_upload;
            $file = $laporan->laporan;
        }

        if ($json == null) {
            return view('mhs.matkul.detailfr', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "null"
            ]);
        } else {
            return view('mhs.matkul.detailfr', [
                'title' => "Mata Kuliah " . $mk,
                'titleheader' => $mk,
                'materi' => $materi,
                'materi_id' => $materi_id,
                'id' => $id,
                'laporan' => $file,
                'komentar' => $komentar,
                'tgl_upload' => $tgl_upload,
                'nilai' => $nilai,
                'user' => $user,
                'mhs_id' => $mhs_id,
                'json' => "ada"
            ]);
        }
    }
}
