<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    // FUNCTION FOR ADMIN
    public function dataMhs()
    {
        return view('admin.masterMhs.dataMhs', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Aslab",
            'mhs' => Mahasiswa::all(),
            'user' => auth()->user(),
        ]);
    }

    public function editMhs($id)
    {
        $mhs = Mahasiswa::find($id);

        return view('admin.masterMhs.editMhs', [
            'title' => "Admin - Master Data",
            'titleheader' => "Master Data - Mahasiswa",
            'mhs' => $mhs,
            'user' => auth()->user(),
        ]);
    }

    public function updateMhs(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $newpass = $request->newpass;
        $confirmpass = $request->confirmpass;
        $nama = $request->nama;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $alamat = $request->alamat;
        $email = $request->email;

        if ($username != "") {
            if ($confirmpass == "" && $newpass == "") {
                $user_id = Mahasiswa::find($id);
                $user_id = $user_id->user_id;
                $user = User::find($user_id);
                $user->username = $username;
                $user->save();

                $mhs = Mahasiswa::find($id);
                $mhs->nama = $nama;
                $mhs->tempat_lahir = $tempat_lahir;
                $mhs->tanggal_lahir = $tanggal_lahir;
                $mhs->jenis_kelamin = $jenis_kelamin;
                $mhs->alamat = $alamat;
                $mhs->email = $email;
                $mhs->save();
                return back()->with('success', 'Yeay pinter deh..!');
            } else if ($confirmpass != "" && $newpass == "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else if ($confirmpass == "" && $newpass != "") {
                return back()->with('error', 'Ada yang masih kosong tuh..');
            } else {
                if ($newpass == $confirmpass) {
                    $user_id = Mahasiswa::find($id);
                    $user_id = $user_id->user_id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->password = bcrypt($confirmpass);
                    $user->save();

                    $mhs = Mahasiswa::find($id);
                    $mhs->nama = $nama;
                    $mhs->tempat_lahir = $tempat_lahir;
                    $mhs->tanggal_lahir = $tanggal_lahir;
                    $mhs->jenis_kelamin = $jenis_kelamin;
                    $mhs->alamat = $alamat;
                    $mhs->email = $email;
                    $mhs->save();
                    return back()->with('success', 'Yeay pinter deh..!');
                } else {
                    return back()->with('error', 'Passwordmu ngga sama yus!!!');
                }
            }
        } else {
            return back()->with('error', 'Username ngga boleh kosong yaa..');
        }
        return redirect('/admin/dataMhs')->with('success', 'Yeay berhasil!!');
    }

    public function hapusMhs($id)
    {
        $user_id = Mahasiswa::find($id);
        $user_id = $user_id->user_id;
        Mahasiswa::find($id)->delete();
        User::find($user_id)->delete();
        return redirect('/admin/dataMhs')->with('success', 'Yeay berhasil!!');
    }

    // FUNCTION FOR MHS
    public function index()
    {
        return view('mhs.dashboard', [
            'title' => "Mahasiswa - Dashboard",
            'titleheader' => "Dashboard",
            'user' => auth()->user(),
            'matkul' => Matkul::all()
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $mhs = Mahasiswa::all()->where('user_id', $user->id);
        foreach ($mhs as $mhs) {
            $id = $mhs->id;
            $nama = $mhs->nama;
            $tempat_lahir = $mhs->tempat_lahir;
            $tanggal_lahir = $mhs->tanggal_lahir;
            $jenis_kelamin = $mhs->jenis_kelamin;
            $email = $mhs->email;
            $alamat = $mhs->alamat;
        }

        return view('mhs.profile.profile', [
            'title' => "Mahasiswa - Profile",
            'titleheader' => "Profile",
            'user' => $user,
            'id' => $id,
            'nama' => $nama,
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
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'email' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);


        Mahasiswa::where('id', $validatedData['id'])->update($validatedData);
        return back()->with('success', 'Yeay berhasil!!');
    }

    public function ubahpw()
    {
        return view('mhs.profile.ubahpw', [
            'title' => "Mahasiswa - Profile",
            'titleheader' => "Ubah Password",
            'user' => auth()->user(),
            'user1' => User::all()
        ]);
    }

    public function updatePwMhs(Request $request)
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
