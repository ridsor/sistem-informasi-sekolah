<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\NilaiMapel;
use App\Models\Jurusan;
use App\Models\Kelas;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporan.index',[
            'title' => 'Laporan',
            'nilais' => Nilai::sortable()->filter(request(['s','j','kls','smstr','tmpt_lhr','tngl_lhr','j_k','agm','thn_ajrn','nm_a','nm_i','nm_w','almt','np']))->select('id','siswa_id','kelas_id','tahun_ajaran','semester')->orderByDesc('id')->paginate(10)->onEachSide(2)->fragment('laporan')->withQueryString(),
            'jurusans' => Jurusan::select('id','nm_jurusan')
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
        return view('dashboard.laporan.create',[
            'title' => 'Laporan',
            'jurusan'=> Jurusan::select('id','nm_jurusan'),
            'semester' => ['Ganjil','Genap'],
            'kelas' => Kelas::select('id','nm_kelas'),
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
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        return redirect('dashboard/laporan')->with('success','Data <strong>laporan</strong> berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $laporan)
    {
        return view('dashboard.laporan.show',[
            'title' => 'Laporan',
            'nilai' => $laporan,
            'nilai_mapel' => NilaiMapel::where('nilai_id',$laporan->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        return view('dashboard.laporan.edit',[
            'title' => 'Laporan',
            'jurusan' => Jurusan::select('id','nm_jurusan'),
            'semester' => ['Ganjil','Genap'],
        ]);
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
        $this->authorize('admin');
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        
        Nilai::destroy($id);

        NilaiMapel::where('nilai_id',$id)->delete();

        return redirect('dashboard/laporan');
    }
}
