<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    /**
     * Reglas de validación compartidas por store y update.
     */
    private function reglas()
    {
        return [
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'fecha_nacimiento' => 'required|date|before:today',
            'ninos' => 'required|integer|min:0|max:30',
            'madre_cabeza' => 'required|in:Sí,No',
            'estudio' => 'required|in:Sí,No',
            'generos' => 'nullable|max:255'
        ];
    }

    /**
     * Los géneros pueden llegar como arreglo (generos[]) o como texto separado por comas.
     */
    private function datos(Request $request)
    {
        $datos = $request->only((new Registro)->getFillable());
        if (is_array($request->generos)) {
            $datos['generos'] = implode(', ', $request->generos);
        }
        return $datos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Registro::orderByDesc('id')->get();
        return view('registros.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('registros.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $this->datos($request);
        $validator = Validator::make($datos, $this->reglas());
        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return back()->withErrors($validator)
                         ->withInput();
        }
        else {
            $registro = Registro::create($datos);
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Registro guardado exitosamente.', 'id' => $registro->id], 201);
            }
            return redirect('registros')->with('type', 'success')
                                        ->with('message', 'Registro creado exitosamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return redirect()->route('registros.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $datos = Registro::findOrFail($id);
        return view('registros.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
        $datos = $this->datos($request);
        $validator = Validator::make($datos, $this->reglas());
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }
        else {
            $registro->update($datos);
            return redirect('registros')->with('type', 'warning')
                                        ->with('message', 'Registro actualizado exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Registro::destroy($id);
        return redirect('registros')->with('type', 'danger')
                                    ->with('message', 'El registro se eliminó exitosamente.');
    }
}
