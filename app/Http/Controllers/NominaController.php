<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NominaController extends Controller
{
    private $rules;
   

    public function __construct()
    {
       // $this->authorizeResource(Nomina::class, 'nomina');

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
         if(Auth::user()->tipo==='admin'){
             $nominas = Nomina::with('empleado')->get(); //$nominas = Nomina::with('empleado:id,nombre')->get();
         }
         else{  
            $empleado = Auth::user()->empleado;
            $nominas = $empleado->nominas()->with('empleado')->get();
        }
         return view('nomina.nominaIndex',compact('nominas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (! Gate::allows('admin')) {
        //     abort(403);
        // }
        Gate::authorize('admin');
        $empleados = Empleado::all();
        return view('nomina.nominaForm',compact('empleados'));
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
        Gate::authorize('admin');
        $empleados = Empleado::all();
        return view('nomina.nominaForm', compact('nomina','empleados'));
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
        Gate::authorize('admin');
        $nomina->delete();
        return redirect()->route('nomina.index');
    }
}
