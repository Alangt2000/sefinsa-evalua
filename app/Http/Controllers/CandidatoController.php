<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidatoController extends Controller
{
    public function index(Request $request)
{
    $busqueda = trim((string) $request->input('buscar'));
    $estado = trim((string) $request->input('estado'));
    $puesto = trim((string) $request->input('puesto'));
    $ciudad = trim((string) $request->input('ciudad'));

    $candidatos = Candidato::query()
        ->when($busqueda, function ($consulta) use ($busqueda) {
            $consulta->where(function ($subconsulta) use ($busqueda) {
                $subconsulta
                    ->where('nombre', 'like', "%{$busqueda}%")
                    ->orWhere('apellido_paterno', 'like', "%{$busqueda}%")
                    ->orWhere('apellido_materno', 'like', "%{$busqueda}%")
                    ->orWhere('correo', 'like', "%{$busqueda}%")
                    ->orWhere('puesto_solicitado', 'like', "%{$busqueda}%")
                    ->orWhere('ciudad', 'like', "%{$busqueda}%")
                    ->orWhere('usuario', 'like', "%{$busqueda}%");
            });
        })
        ->when($estado, function ($consulta) use ($estado) {
            $consulta->where('estado', $estado);
        })
        ->when($puesto, function ($consulta) use ($puesto) {
            $consulta->where('puesto_solicitado', $puesto);
        })
        ->when($ciudad, function ($consulta) use ($ciudad) {
            $consulta->where('ciudad', $ciudad);
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $puestos = Candidato::query()
        ->whereNotNull('puesto_solicitado')
        ->where('puesto_solicitado', '!=', '')
        ->distinct()
        ->orderBy('puesto_solicitado')
        ->pluck('puesto_solicitado');

    $ciudades = Candidato::query()
        ->whereNotNull('ciudad')
        ->where('ciudad', '!=', '')
        ->distinct()
        ->orderBy('ciudad')
        ->pluck('ciudad');

    return view('candidatos.index', compact(
        'candidatos',
        'busqueda',
        'estado',
        'puesto',
        'ciudad',
        'puestos',
        'ciudades'
    ));
}


    public function create()
    {
        return redirect()->route('candidatos.index');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellido_paterno' => ['required', 'string', 'max:100'],
            'apellido_materno' => ['nullable', 'string', 'max:100'],
            'correo' => ['nullable', 'email', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'puesto_solicitado' => ['required', 'string', 'max:150'],
            'ciudad' => ['required', 'in:Torreón,Saltillo,Monclova,Monterrey'],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'correo.email' => 'El correo electrónico no es válido.',
            'puesto_solicitado.required' => 'El puesto solicitado es obligatorio.',
            'ciudad.in' => 'Selecciona una ciudad válida.',
        ]);

        $usuario = $this->generarUsuario(
            $datos['nombre'],
            $datos['apellido_paterno']
        );

        $passwordTemporal = Str::upper(Str::random(8));

        $candidato = Candidato::create([
            ...$datos,
            'usuario' => $usuario,
            'password' => $passwordTemporal,
            'estado' => 'pendiente',
            'credenciales_activas' => true,
        ]);

        return redirect()
            ->route('candidatos.index')
            ->with('registro_exitoso', true)
            ->with('candidato_registrado', [
                'id' => $candidato->id,
                'nombre' => $candidato->nombre_completo,
                'puesto' => $candidato->puesto_solicitado,
                'ciudad' => $candidato->ciudad,
                'usuario' => $usuario,
                'password' => $passwordTemporal,
            ]);
    }

public function show(Candidato $candidato)
{
    $candidato->load([
        'evaluaciones' => function ($consulta) {
            $consulta
                ->with('respuestas')
                ->orderByDesc('id');
        },
    ]);

    $evaluacionMatematicas = $candidato->evaluaciones
        ->firstWhere('tipo', 'matematicas');

    $evaluacionPsicometrica = $candidato->evaluaciones
        ->firstWhere('tipo', 'psicometrico');

    return view('candidatos.show', compact(
        'candidato',
        'evaluacionMatematicas',
        'evaluacionPsicometrica'
    ));
}

    public function edit(Candidato $candidato)
    {
        return view('candidatos.edit', compact('candidato'));
    }

    public function update(Request $request, Candidato $candidato)
    {
$datos = $request->validate([
    'nombre' => ['required', 'string', 'max:100'],
    'apellido_paterno' => ['required', 'string', 'max:100'],
    'apellido_materno' => ['nullable', 'string', 'max:100'],
    'correo' => ['nullable', 'email', 'max:150'],
    'telefono' => ['nullable', 'string', 'max:20'],
    'puesto_solicitado' => ['required', 'string', 'max:150'],
    'ciudad' => ['required', 'in:Torreón,Saltillo,Monclova,Monterrey'],
], [
    'nombre.required' => 'El nombre es obligatorio.',
    'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
    'correo.email' => 'Ingresa un correo electrónico válido.',
    'puesto_solicitado.required' => 'El puesto solicitado es obligatorio.',
    'ciudad.required' => 'La ciudad es obligatoria.',
    'ciudad.in' => 'Selecciona una ciudad válida.',
]);

        $candidato->update($datos);

        return redirect()
            ->route('candidatos.show', $candidato)
            ->with('success', 'Los datos del candidato fueron actualizados.');
    }

    public function cambiarAcceso(Candidato $candidato)
    {
        $nuevoEstado = ! $candidato->credenciales_activas;

        $candidato->update([
            'credenciales_activas' => $nuevoEstado,
            'estado' => $nuevoEstado
                ? (
                    $candidato->estado === 'bloqueado'
                        ? 'pendiente'
                        : $candidato->estado
                )
                : 'bloqueado',
        ]);

        return back()->with(
            'success',
            $nuevoEstado
                ? 'Las credenciales fueron activadas.'
                : 'Las credenciales fueron desactivadas.'
        );
    }

    public function destroy(Candidato $candidato)
    {
        $nombre = $candidato->nombre_completo;

        $candidato->delete();

        return redirect()
            ->route('candidatos.index')
            ->with('success', "El candidato {$nombre} fue eliminado.");
    }

    private function generarUsuario(
        string $nombre,
        string $apellidoPaterno
    ): string {
        $primerNombre = Str::of($nombre)
            ->ascii()
            ->lower()
            ->trim()
            ->explode(' ')
            ->first();

        $apellido = Str::of($apellidoPaterno)
            ->ascii()
            ->lower()
            ->replace(' ', '');

        $base = Str::limit(
            substr((string) $primerNombre, 0, 1) . $apellido,
            20,
            ''
        );

        $numero = 1;

        $usuario = $base .
            str_pad((string) $numero, 3, '0', STR_PAD_LEFT);

        while (Candidato::where('usuario', $usuario)->exists()) {
            $numero++;

            $usuario = $base .
                str_pad((string) $numero, 3, '0', STR_PAD_LEFT);
        }

          return $usuario;
    }
}
