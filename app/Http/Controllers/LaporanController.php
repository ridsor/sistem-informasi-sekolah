<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\NilaiMapel;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Rules\SiswaExist;
use App\Rules\KelasExist;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'nilais' => Nilai::sortable()->filter(request(['s','j','kls','smstr','tmpt_lhr','tngl_lhr','j_k','agm','thn_ajrn','nm_a','nm_i','nm_w','almt','np']))->orderByDesc('id')->paginate(10)->onEachSide(2)->fragment('laporan')->withQueryString(),
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
            'semester' => ['Ganjil','Genap'],
            'predikat' => ['A','B','C','D','E'],
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
        
        $rules = [
            'nisn' => ['required','min:10',new SiswaExist],
            'kelas' => ['required', new KelasExist],
            'semester' => 'required',
            'tahun_pelajaran' => 'required',
            'skp_spiritual_predikat' => 'required',
            'skp_spiritual_deskripsi' => 'required',
            'skp_sosial_predikat' => 'required',
            'skp_sosial_deskripsi' => 'required',
        ];

        for($i = 0; $i < count($request->nm_mapel); $i++) {
            if(!$request->nm_mapel[$i]) $rules['nm_mapel[]'] = 'required';
            if(!$request->p_kkm[$i]) $rules['p_kkm[]'] = 'required';
            if(!$request->p_angka[$i]) $rules['p_angka[]'] = 'required';
            if(!$request->p_predikat[$i]) $rules['p_predikat[]'] = 'required';
            if(!$request->p_deskripsi[$i]) $rules['p_deskripsi[]'] = 'required';
            if(!$request->k_kkm[$i]) $rules['k_kkm[]'] = 'required';
            if(!$request->k_angka[$i]) $rules['k_angka[]'] = 'required';
            if(!$request->k_predikat[$i]) $rules['k_predikat[]'] = 'required';
            if(!$request->k_deskripsi[$i]) $rules['k_deskripsi[]'] = 'required';
        }
        
        $validatedData = $request->validate($rules);
        $validatedData['siswa_id'] = Siswa::select('id','nisn')->where('nisn',$request->nisn)->get()[0]->id;
        $validatedData['kelas_id'] = Kelas::select('id','nm_kelas')->where('nm_kelas',$request->kelas)->get()[0]->id;
        unset($validatedData['nisn']);
        unset($validatedData['kelas']);

        $nilai = Nilai::create($validatedData);
        for($i = 0; $i < count($request->nm_mapel); $i++) {
            NilaiMapel::create([
                'nilai_id' => $nilai->id,
                'nm_mapel' => $request->nm_mapel[$i],
                'p_kkm' => $request->p_kkm[$i],
                'p_angka' => $request->p_angka[$i],
                'p_predikat' => $request->p_predikat[$i],
                'p_deskripsi' => $request->p_deskripsi[$i],
                'k_kkm' => $request->k_kkm[$i],
                'k_angka' => $request->k_angka[$i],
                'k_predikat' => $request->k_predikat[$i],
                'k_deskripsi' => $request->k_deskripsi[$i],
            ]);
        }

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
            'nilai_mapel' => $laporan->nilai_mapels,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $laporan)
    {
        $this->authorize('admin');
        return view('dashboard.laporan.edit',[
            'title' => 'Laporan',
            'nilai' => $laporan,
            'semester' => ['Ganjil','Genap'],
            'predikat' => ['A','B','C','D','E']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $laporan)
    {
        $this->authorize('admin');
        
        $rules = [
            'nisn' => ['required','min:10',new SiswaExist],
            'kelas' => ['required', new KelasExist],
            'semester' => 'required',
            'tahun_pelajaran' => 'required',
            'skp_spiritual_predikat' => 'required',
            'skp_spiritual_deskripsi' => 'required',
            'skp_sosial_predikat' => 'required',
            'skp_sosial_deskripsi' => 'required',
        ];

        for($i = 0; $i < count($request->nm_mapel); $i++) {
            if(!$request->nm_mapel[$i]) $rules['nm_mapel[]'] = 'required';
            if(!$request->p_kkm[$i]) $rules['p_kkm[]'] = 'required';
            if(!$request->p_angka[$i]) $rules['p_angka[]'] = 'required';
            if(!$request->p_predikat[$i]) $rules['p_predikat[]'] = 'required';
            if(!$request->p_deskripsi[$i]) $rules['p_deskripsi[]'] = 'required';
            if(!$request->k_kkm[$i]) $rules['k_kkm[]'] = 'required';
            if(!$request->k_angka[$i]) $rules['k_angka[]'] = 'required';
            if(!$request->k_predikat[$i]) $rules['k_predikat[]'] = 'required';
            if(!$request->k_deskripsi[$i]) $rules['k_deskripsi[]'] = 'required';
        }

        $validatedData = $request->validate($rules);
        $validatedData['siswa_id'] = Siswa::select('id','nisn')->where('nisn',$request->nisn)->get()[0]->id;
        $validatedData['kelas_id'] = Kelas::select('id','nm_kelas')->where('nm_kelas',$request->kelas)->get()[0]->id;
        unset($validatedData['nisn']);
        unset($validatedData['kelas']);

        Nilai::where('id',$laporan->id)->update($validatedData);
        for($i = 0; $i < count($request->nm_mapel); $i++) {
            NilaiMapel::where('id', $request->nilai_mapel_id[$i])->update([
                'nm_mapel' => $request->nm_mapel[$i],
                'p_kkm' => $request->p_kkm[$i],
                'p_angka' => $request->p_angka[$i],
                'p_predikat' => $request->p_predikat[$i],
                'p_deskripsi' => $request->p_deskripsi[$i],
                'k_kkm' => $request->k_kkm[$i],
                'k_angka' => $request->k_angka[$i],
                'k_predikat' => $request->k_predikat[$i],
                'k_deskripsi' => $request->k_deskripsi[$i],
            ]);
        }

        return redirect('dashboard/laporan')->with('success','Data <strong>laporan</strong> berhasil diperbarui');
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

    public function cetak(Nilai $nilai) {
        view()->share([
            'nilai' => $nilai,
            'nilai_mapels' => NilaiMapel::where('nilai_id',$nilai->id)->get(),
        ]);
        $pdf = Pdf::loadView('dashboard.laporan.cetak')->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-'.strtolower($nilai->siswa->slug).''.strtolower($nilai->kelas->nm_kelas).''.strtolower($nilai->semester).'.pdf');
    }
}
