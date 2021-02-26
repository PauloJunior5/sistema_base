<?php

namespace App\Http\Controllers;

use App\Interfaces\PaisInterface;
use App\Http\Requests\PaisRequest;
use App\Models\Pais;
use Carbon\Carbon;

class PaisController extends Controller
{
    public function __construct(PaisInterface $paisInterface)
    {
        $this->paisInterface = $paisInterface;
    }

    public function index()
    {
        return $this->paisInterface->index();
    }

    public function create()
    {
        return $this->paisInterface->create();
    }

    public function store(PaisRequest $request)
    {
        $pais = new Pais;

        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(Carbon::now()->toDateTimeString());

        return $this->paisInterface->store($pais);
    }

    public function show(PaisRequest $request)
    {
        return $this->paisInterface->show($request);
    }

    public function edit($pais_id)
    {
        return $this->paisInterface->edit($pais_id);
    }

    public function update(PaisRequest $request)
    {
        return $this->paisInterface->update($request);
    }

    public function destroy($pais_id)
    {
        return $this->paisInterface->destroy($pais_id);
    }

    public function createPais(PaisRequest $request)
    {
        return $this->paisInterface->createPais($request);
    }
}
