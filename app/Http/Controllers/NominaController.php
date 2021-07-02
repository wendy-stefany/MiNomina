<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;


class NominaController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'semana'=>'required|size:2',
            'percepcion'=>'required',
            'deduccion'=>'required',
            'documento' => 'required',
            'empleado_id' => 'required|size:10',
            
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $nominas = Nomina::all();
        $nomina = Auth::user()->empleado;
        $nominas =$nomina->nominas;
         return view('nomina.nominaIndex',compact('nominas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nomina.nominaForm');
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
        Nomina::create($request->all());
        return redirect()->route('nomina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function show(Nomina $nomina)
    {
        return view('nomina.nominaShow', compact('nomina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomina $nomina)
    {
        return view('nomina.nominaForm', compact('nomina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nomina $nomina)
    {
        $request->validate($this->rules );
        Nomina::where('id',$nomina->id)->update($request->except('_token','_method'));
        return redirect()->route('nomina.index',$nomina);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomina $nomina)
    {
        $nomina->delete();
        return redirect()->route('nomina.index');
    }
}
