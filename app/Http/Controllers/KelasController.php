<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelas.index',[
            'title' => 'Kelas',
            'kelass' => Kelas::sortable()->filter(request(['j','s']))->orderByDesc('id')->paginate(10)->onEachSide(1)->fragment('kelas')->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('dashboard.kelas.create',[
            'title' => 'Kelas',
            'jurusan' => Jurusan::all(),
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        
        $validatedData = $request->validate([
            'nm_kelas' => 'required',
            'jurusan' => 'required'
        ]);

        $validatedData['jurusan_id'] = $request->jurusan;
        unset($validatedData['jurusan']);

        Kelas::create($validatedData);

        return redirect('/dashboard/kelas')->with('success','Data <strong>kelas</strong> baru berhasil ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        $this->authorize('admin');
        
        return view('dashboard.kelas.edit', [
            'title' => 'Kelas',
            'kelas' => $kela,
            'jurusan' => Jurusan::all(),
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $this->authorize('admin');
        
        $rules = [
            'nm_kelas' => 'required',
            'jurusan' => 'required',
        ];

        $validatedData['jurusan_id'] = $request->jurusan;
        unset($validatedData['jurusan']);

        Kelas::where('id',$kela->id)->update($validatedData);

        return redirect('/dashboard/kelas')->with('success','Data <strong>kelas</strong> telah diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $this->authorize('admin');
        
        Kelas::destroy($kela->id);

        return redirect('/dashboard/kelas');
    }
}
