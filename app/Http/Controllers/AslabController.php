<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Aslab;
use App\Models\User;
use App\Models\Matkul;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AslabController extends Controller
{
    // FUNCTION FOR ADMIN
    public function dataAslab()
    {
        return view('admin.masterAslab.dataAslab', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Aslab",
            'aslab' => Aslab::all(),
            'dosen' => Dosen::all(),
            'user' => auth()->user(),
        ]);
    }

    public function editAslab($id)
    {
        $aslab = Aslab::find($id);

        return view('admin.masterAslab.editAslab', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Aslab",
            'aslab' => $aslab,
            'dosen' => Dosen::all(),
            'user' => auth()->user(),
        ]);
    }

    public function updateAslab(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;
        $nama_aslab = $request->nama_aslab;
        $dosen_id = $request->dosen_id;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $alamat = $request->alamat;
        $email = $request->email;

        if ($username != "") {
            if ($confirmpass == "" && $newpass == "") {
                $user_id = Aslab::find($id);
                $user_id = $user_id->user_id;
                $user = User::find($user_id);
                $user->username = $username;
                $user->save();

                $aslab = Aslab::find($id);
                $aslab->nama_aslab = $nama_aslab;
                $aslab->dosen_id = $dosen_id;
                $aslab->nama_aslab = $nama_aslab;
                $aslab->tempat_lahir = $tempat_lahir;
                $aslab->tanggal_lahir = $tanggal_lahir;
                $aslab->jenis_kelamin = $jenis_kelamin;
                $aslab->alamat = $alamat;
                $aslab->email = $email;
                $aslab->save();
                return back()->with('success', 'Yeay pinter deh..!');
            } else if ($confirmpass != "" && $newpass == "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else if ($confirmpass == "" && $newpass != "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else {
                if ($newpass == $confirmpass) {
                    $user_id = Aslab::find($id);
                    $user_id = $user_id->user_id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->password = bcrypt($confirmpass);
                    $user->save();

                    $aslab = Aslab::find($id);
                    $aslab->nama_aslab = $nama_aslab;
                    $aslab->dosen_id = $dosen_id;
                    $aslab->nama_aslab = $nama_aslab;
                    $aslab->tempat_lahir = $tempat_lahir;
                    $aslab->tanggal_lahir = $tanggal_lahir;
                    $aslab->jenis_kelamin = $jenis_kelamin;
                    $aslab->alamat = $alamat;
                    $aslab->email = $email;
                    $aslab->save();
                    return back()->with('success', 'Yeay pinter deh..!');
                } else {
                    return back()->with('error', 'Passwordmu ngga sama yus!!!');
                }
            }
        } else {
            return back()->with('error', 'Username ngga boleh kosong yaa..');
        }
        return redirect('/admin/dataAslab')->with('success', 'Yeay berhasil!!');
    }

    public function hapusAslab($id)
    {
        $user_id = Aslab::find($id);
        $user_id = $user_id->user_id;
        Aslab::find($id)->delete();
        User::find($user_id)->delete();
        return redirect('/admin/dataAslab')->with('success', 'Yeay berhasil!!');
    }

    // FUNCTION FOR ASLAB
    public function morris()
    {
        return view('aslab.morris');
    }

    public function index()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $aslab = Aslab::all()->where('user_id', $user_id);
        foreach ($aslab as $aslab) {
            $id = $aslab->dosen_id;
        }
        $dosen = Dosen::find($id);
        $matkul_id = $dosen->matkul_id;
        $belum = Laporan::all()->where('matkul_id', $matkul_id)->where('nilai', null)->count();
        $dinilai = Laporan::all()->where('matkul_id', $matkul_id)->where('nilai', '!=', null)->count();

        return view('aslab.dashboard', [
            'title' => "Asisten Praktikum - Dashboard",
            'titleheader' => "Dashboard",
            'user' => $user,
            'dinilai' => $dinilai,
            'belum' => $belum,
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $aslab = Aslab::all()->where('user_id', $user->id);
        foreach ($aslab as $aslab) {
            $id = $aslab->id;
            $dosen_id = $aslab->dosen_id;
            $nama_aslab = $aslab->nama_aslab;
            $tempat_lahir = $aslab->tempat_lahir;
            $tanggal_lahir = $aslab->tanggal_lahir;
            $jenis_kelamin = $aslab->jenis_kelamin;
            $email = $aslab->email;
            $alamat = $aslab->alamat;
        }

        $dosen = Dosen::all()->where('id', $dosen_id);
        foreach ($dosen as $dosen) {
            $matkul_id = $dosen->matkul_id;
            $nama_dosen = $dosen->nama_dosen;
        }

        $matkul = Matkul::all()->where('id', $matkul_id);
        foreach ($matkul as $matkul) {
            $id = $matkul->id;
            $matkul = $matkul->matkul;
        }

        return view('aslab.profile.profile', [
            'title' => "Asisten Praktikum - Profile",
            'titleheader' => "Profile",
            'user' => $user,
            'id' => $id,
            'nama_aslab' => $nama_aslab,
            'matkul' => $matkul,
            'nama_dosen' => $nama_dosen,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'alamat' => $alamat
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama_aslab' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'email' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);


        Aslab::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Data Berhasil Disimpan');
    }

    public function ubahpw()
    {
        return view('aslab.profile.ubahpw', [
            'title' => "Asisten Praktikum - Profile",
            'titleheader' => "Ubah Password",
            'user' => auth()->user(),
            'user1' => User::all()
        ]);
    }

    public function updatePwDosen(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;

        if (Auth::attempt($credentials)) {
            if ($newpass == $confirmpass) {
                // dd('Yuhuu');
                $password = bcrypt($confirmpass);
                User::where('id', auth()->user()->id)->update(['password' => $password]);
                return back()->with('success', 'Password Berhasil Diperbarui');
            } else {
                return back()->with('error', 'Password Tidak Sama');
            }
        } else {
            return back()->with('error', 'Password lama salah');
        }
    }
}
