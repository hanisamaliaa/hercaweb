<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    //
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $users = User::latest()->paginate(5);
        // ->join('group_akses', 'users.idakses', '=', 'group_akses.idakses')
        // ->select('users.*','group_akses.nama_hakakses as nama_hakakses')
        // ->get();
        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        User::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('users.index')
            ->with('success', 'User Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user
        $user = User::find($id);
        return view('users.detail', compact('user'));
    }

    public function edit($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user untuk diedit
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        User::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('users.index')
            ->with('success', 'User Berhasil Diupdate');
    }

    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User Berhasil Dihapus');
    }

}
