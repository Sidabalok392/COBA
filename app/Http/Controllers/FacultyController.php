<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;



class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///Mengambil data faculty dan mengurutkannya dari kecil ke besar berdasarkan id
        $faculties = Faculty::orderBy('id', 'ASC')->get();

        /// Mengirimkan variabel $faculties ke halaman views facultyCRUD/index.blade.php
        return view('facultyCRUD.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ///menampilkan halaman create
        return view('facultyCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///membuat validasi untuk nama_fakultas wajib diisi
        $request->validate([
            'nama_fakultas' => 'required',
        ]);

        ///insert setiap request dari form ke dalam database via model
        ///jika menggunakan motode ini, maka nama field dan nama form harus sama
        Faculty::create($request->all());

        ///redirect jika sukses menyimpan data
        return redirect()->route('faculties.index')->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ///cari berdasarkan id
        $faculties = Faculty::find($id);
        ///menampilkan view show dengan menyertakan data faculties
        return view('facultyCRUD.show',compact('faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ///cari berdasarkan id
        $faculties = Faculty::find($id);
        /// menampilkan view edit dengan menyertakan data faculties
        return view('facultyCRUD.edit',compact('faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /// membuat validasi untuk nama_fakultas wajib diisi
        $request->validate([
            'nama_fakultas' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        Faculty::find($id)->update($request->all());
        
        /// setelah berhasil mengubah data melempar ke faculties.index
        return redirect()->route('faculties.index')
                        ->with('sucess','Item update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::find($id)->delete();
        ///melakukan hapus data berdasarkan parameter yang dikirimkan
        /// $faculties->delete();

        return redirect()->route('faculties.index')
                        ->with('sucess','Item deleted successfully');
    }
}
