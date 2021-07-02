<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'id'=>'required|size:4',
            'departamento'=>'required|max:255|min:5',
            'encargado'=>'required|max:255|min:5',
            'telefono'=>'required|size:10',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        //dd($nominas->all());
        return view('departamento.departamentoIndex',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.departamentoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        
        Departamento::create($request->all());
        return redirect()->route('departamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view('departamento.departamentoShow', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamento.departamentoForm', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate($this->rules);
        Departamento::where('id',$departamento->id)->update($request->except('_token','_method'));
        return redirect()->route('departamento.index',$departamento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamento.index');
    }
}
