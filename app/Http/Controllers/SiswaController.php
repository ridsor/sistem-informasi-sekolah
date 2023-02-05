<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            'title' => 'Siswa',
            'siswas' => Siswa::sortable()->filter(request(['s','j','tmpt_lhr','tngl_lhr','j_k','agm','thn_ajrn','nm_a','nm_i','nm_w','almt','np']))->paginate(10)->onEachSide(1)->fragment('siswa')->withQueryString(),
            'jurusans' => Jurusan::all(),
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
        return view('dashboard.siswa.create',[
            'jurusan' => Jurusan::all(),
            'title' => 'Siswa',
            'agama' => ['Islam','Kristen','Budha','Kong Hu Chu', 'Hindu','Katolik'],
            'jenis_kelamin' => ['Laki - Laki', 'Perempuan'],
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
            'nisn' => 'required|unique:siswa|max:10|min:10',
            'nis' => 'required|unique:siswa|max:6|min:6',
            'nm_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'nohp' => 'required|unique:siswa',
            'tahun_ajaran' => 'required',
            'jurusan' => 'required',
            'foto' => 'required|image|file|max:1024',
        ];
        
        if(empty($request->ayah) && empty($request->ibu) && empty($request->wali)) {
            $rules['ayah'] = 'required';
            $rules['ibu'] = 'required';
        }
        
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = SlugService::createSlug(Siswa::class, 'slug', $validatedData['nm_siswa']);
        $validatedData['ayah'] = $request->ayah;
        $validatedData['ibu'] = $request->ibu;
        $validatedData['wali'] = $request->wali;
        $validatedData['jurusan_id'] = $request->jurusan;
        unset($validatedData['jurusan']);
        $validatedData['foto'] = $request->file('foto')->store('siswa-images');

        Siswa::create($validatedData);

        return redirect('/dashboard/siswa')->with('success','Data siswa baru telah ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Siswa $siswa)
    // {
    //     $this->authorize('admin');
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $this->authorize('admin');
        
        return view('dashboard.siswa.edit',[
            'title' => 'Siswa',
            'siswa' => $siswa,
            'jurusan' => Jurusan::all(),
            'agama' => ['Islam','Kristen','Budha','Kong Hu Chu', 'Hindu','Katolik'],
            'jenis_kelamin' => ['Laki - Laki', 'Perempuan'],
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->authorize('admin');

        $rules = [
            'nm_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_ajaran' => 'required',
            'jurusan' => 'required',
        ];

        if($request->nisn !== $siswa->nisn) $rules['nisn'] = 'required|unique:siswa|max:10|min:10';
        if($request->nis !== $siswa->nis) $rules['nis'] = 'required|unique:siswa|max:6|min:6';
        if($request->nohp !== $siswa->nohp) $rules['nohp'] = 'required|unique:siswa';
        if($request->file('foto')) $rules['foto'] = 'required|image|file|max:1024';

        $validatedData = $request->validate($rules);        

        $validatedData['jurusan_id'] = $validatedData['jurusan'];
        unset($validatedData['jurusan']);
        if(strtolower($siswa->nm_siswa) !== strtolower($request->nm_siswa)) $validatedData['slug'] = SlugService::createSlug(Siswa::class,'slug',$request->nm_siswa);
        if($request->file('foto')) {
            if($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('siswa-images');
        }

        Siswa::where('id',$siswa->id)->update($validatedData);

        return redirect('/dashboard/siswa')->with('success', 'Data <strong>siswa</strong> telah diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $this->authorize('admin');

        if($siswa->foto) {
            Storage::delete($siswa->foto);
        }

        Siswa::destroy($siswa->id);

        return redirect('/dashboard/siswa')->with('success','Data siswa telah dihapus');
    }
}
