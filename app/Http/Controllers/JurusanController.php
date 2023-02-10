<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jurusan.index',[
            'title' => 'Jurusan',
            'jurusans' => Jurusan::sortable()->filter(request(['s']))->orderByDesc('id')->paginate(10)->OnEachSide(1)->fragment('jurusan')->withQueryString(),
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
        
        return view('dashboard.jurusan.create',[
            'title' => 'Jurusan',
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
            'nm_jurusan' => 'required|unique:jurusan',
            'slug' => 'required|unique:jurusan',
        ]);

        Jurusan::create($validatedData);

        return redirect('/dashboard/jurusan')->with('success','Data <strong>jurusan</strong> baru telah ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        $this->authorize('admin');
        
        return view('dashboard.jurusan.edit',[
            'title' => 'Jurusan',
            'jurusan' => $jurusan
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $this->authorize('admin');
        $rules = [];

        if($request->nm_jurusan !== $jurusan->nm_jurusan) $rules['nm_jurusan'] = 'required|unique:jurusan';
        if($request->slug !== $jurusan->slug) $rules['slug'] = 'required|unique:jurusan';

        $validatedData = $request->validate($rules);

        Jurusan::where('id',$jurusan->id)->update($validatedData);

        return redirect('/dashboard/jurusan')->with('success','Data <strong>jurusan</strong> telah diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $this->authorize('admin');
        
        Jurusan::destroy($jurusan->id);

        return redirect('/dashboard/jurusan');
    }

    public function createSlug(Request $request) {
        $slug = SlugService::createSlug(Jurusan::class,'slug',$request->nm_jurusan);
        return response()->json([
            'slug' => $slug,
        ]);
    }
}
