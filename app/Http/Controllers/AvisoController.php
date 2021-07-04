<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Departamento;
use Illuminate\Http\Request;
class AvisoController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'nombre'=>'required|max:255|min:5',
            'remitente'=>'required|max:255|min:5',
            'documento' => 'required',
           // 'departamento_id'=>'required|size:4',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avisos = Aviso::all();
        //dd($nominas->all());
        return view('aviso.avisoIndex',compact('avisos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('aviso.avisoForm');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules );
        Aviso::create($request->all());
        return redirect()->route('aviso.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function show(Aviso $aviso)
    {
        $departamentos = Departamento::get();
        return view('aviso.avisoShow', compact('aviso', 'departamentos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        return view('aviso.avisoForm', compact('aviso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aviso $aviso)
    {
        $request->validate($this->rules );
        Aviso::where('id',$aviso->id)->update($request->except('_token','_method'));
        return redirect()->route('aviso.show',$aviso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aviso $aviso)
    {
        $aviso->delete();
        return redirect()->route('aviso.index');
    }
    public function agregaDepartamento(Request $request, Aviso $aviso)
    {
       //  dd($request->all());
       // $aviso->departamentos()->attach($request->departamento_id);
       $aviso->departamentos()->sync($request->departamento_id);
        return redirect()->route('aviso.show', $aviso);
    }
   

}
