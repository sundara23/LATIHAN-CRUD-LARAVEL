<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('file.v_file', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.c_file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_files' => 'required',
            'link_files' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ]);


        // $dataImage = new File;
        // $dataImage->nama_files = $request->nama_files;
        // if ($request->hasFile('link_files')) {
        //     $file = $request->file('link_files');
        //     $filename = uniqid() . "_" . $file->getClientOriginalName();
        //     $file->move('file/', $filename);
        //     $dataImage->link_files = $filename;
        //     $dataImage->save();
        // }

        if ($request->hasFile('link_files')) {
            $file = $request->file('link_files');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            File::create([
                'nama_files' => $request->nama_files,
                'link_files' => $file->move('file', $filename)
            ]);
        }

        return redirect('/files')->with('status', 'Upload Files Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        // return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('file.u_file', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'nama_files' => 'required',
            'link_files' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ]);


        File::where('id', $file->id)
            ->update([
                'nama_files' => $request->nama_files,
                'link_files' => $request->file('link_files')->move('file', uniqid() . "_" . $request->file('link_files')->getClientOriginalName())
            ]);

        if ($file->id) {
            unlink($file->link_files);
        }

        return redirect('/files')->with('status', 'Files Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        if ($file->id) {
            unlink($file->link_files);
            File::destroy($file->id);
        }
        return redirect('/files')->with('status', 'Data Berhasil Dihapus !');
    }
}
