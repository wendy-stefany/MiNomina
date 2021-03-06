<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->authorizeResource(Empleado::class, 'empleado');
        $this->rules = [
            'id'=>'required|size:10',
            'nombre'=>'required|max:255|min:4',
            'telefono'=>'required|size:10',
            'departamento_id' => 'required|size:4|exists:departamentos,id',
            'user_id'=> 'required|unique:empleados,user_id|exists:users,id',
            
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado.empleadoIndex',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        $departamentos = Departamento::all();
        $usuarios = User::doesntHave('empleado')->get();
        return view('empleado.empleadoForm',compact('departamentos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules + ['user_id' => 'required|unique:App\Models\Empleado,user_id',]);
        Empleado::create($request->all());
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleado.empleadoShow', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        Gate::authorize('admin');
        $departamentos = Departamento::all();
        $usuarios = User::doesntHave('empleado')->get();
        return view('empleado.empleadoForm', compact('empleado','departamentos','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate($this->rules );
        Empleado::where('id',$empleado->id)->update($request->except('_token','_method'));
        return redirect()->route('empleado.index',$empleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        Gate::authorize('admin');
        $empleado->delete();
        return redirect()->route('empleado.index');
    }
}
