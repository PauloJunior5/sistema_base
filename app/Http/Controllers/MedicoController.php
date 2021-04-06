<?php

namespace App\Http\Controllers;

use App\Repositories\CidadeRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\PaisRepository;
use App\Services\MedicoService;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->medicoRepository = new MedicoRepository;
        $this->medicoService = new MedicoService;
        $this->paisRepository = new PaisRepository;
        $this->estadoRepository = new EstadoRepository;
        $this->cidadeRepository = new CidadeRepository;
    }

    public function index()
    {
        $medicos = $this->medicoRepository->mostrarTodos();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        return view('medicos.create', compact('cidades', 'estados', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'crm' => 'unique:medicos,crm',
            'cpf' => 'unique:medicos,cpf',
            'rg' => 'unique:medicos,rg',
        ]);

        if ($validatedData) {
            $medico = Medico::create($request->all());
            if ($medico) {
                return redirect()->route('medico.index')->with('Success', 'Médico criado com sucesso.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $medico = Medico::findOrFail($request->id_medico);
        return $medico;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $cidades = Cidade::all(); // Modal add cidade
        $estados = Estado::all(); // Modal add estado
        $paises = Pais::all(); // Modal add pais
        $cidade = Cidade::findOrFail($medico->id_cidade);
        $estado = Estado::findOrFail($cidade->id_estado);
        return view('medicos.edit', compact('medico', 'cidades', 'estados', 'paises', 'cidade', 'estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'crm' => 'unique:medicos,crm,' . $id,
            'cpf' => 'unique:medicos,cpf,' . $id,
            'rg' => 'unique:medicos,rg,' . $id,
        ]);

        if ($validatedData) {
            $medico = Medico::whereId($id)->update($request->except('_token', '_method'));
            if ($medico) {
                return redirect()->route('medico.index')->with('Success', 'Médico alterado com sucesso.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $medico = Medico::where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('medico.index')->with('Warning', 'Não foi possivel excluir médico. Esse Médico possui vínculo com Pacientes.');
        }
        if ($medico) {
            return redirect()->route('medico.index')->with('Success', 'Médico excluido com sucesso.');
        }
    }

    public function createMedico(Request $request)
    {
        $validatedData = $request->validate([
            'crm' => 'unique:medicos,crm',
            'cpf' => 'unique:medicos,cpf',
            'rg' => 'unique:medicos,rg',
        ]);

        if ($validatedData) {
            $medico = Medico::create($request->all());
            if ($medico) {
                return Redirect::back()->withInput()->with('error_code', 7);
            }
        }
    }
}
