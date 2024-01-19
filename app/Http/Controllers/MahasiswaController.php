<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::selectRaw("
                mahasiswas.*,
                users.name as created_by_name
            ")->join('users', 'users.id', 'mahasiswas.created_by')
            ->orderBy('created_at', 'DESC')
            ->get();
        
        return view('mahasiswas.index',compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'nim' => 'required|numeric',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ])->validate();

        Mahasiswa::create([
            'created_by' => auth()->id(),
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ]);
    
        return redirect()->route('mahasiswas')->with('success', 'Mahasiswa add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::selectRaw("
                mahasiswas.*,
                users.name as created_by_name
            ")->join('users', 'users.id', 'mahasiswas.created_by')
            ->orderBy('created_at', 'DESC')
            ->findOrFail($id);

        return view('mahasiswas.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa =  Mahasiswa::findOrFail($id);
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'nim' => 'required|numeric',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ])->validate();

        $mahasiswa = Mahasiswa::findOrFail($id);
        
        if($mahasiswa){
            $mahasiswa->update([
                'created_by' => auth()->id(),
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);
        }
        return redirect()->route('mahasiswas')->with('success', 'Mahasiswa updated susccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswas')->with('success', 'Mahasiswa deleted susccessfully');
    }
}
