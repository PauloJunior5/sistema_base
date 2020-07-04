@extends('layouts.app', ['activePage' => 'medico-management', 'titlePage' => __('Médico Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('medico.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Médico') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{$medico->id}}" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Médico</label>
                                    <div class="form-group">
                                        <input class="form-control" name="medico" type="text" value="{{$medico->medico}}" required />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Crm</label>
                                    <div class="form-group">
                                        <input class="form-control" name="crm" type="text" value="{{$medico->crm}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Especialidade</label>
                                    <div class="form-group">
                                        <input class="form-control" name="especialidade" type="text" value="{{$medico->especialidade}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{$medico->endereco}}">
                                </div>
                                <div class="col-md-1">
                                    <label>nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{$medico->numero}}">
                                </div>
                                <div class="col-md-2">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{$medico->complemento}}">
                                </div>
                                <div class="col-md-2">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{$medico->bairro}}">
                                </div>
                                <div class="col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$medico->cep}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input">
                                </div>
                                <div class="col-md-4">
                                    <label>Cidade</label>
                                    <input class="form-control" id="cidade-input" value="{{$medico->id_cidade}}" readonly />
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="">
                                </div>
                                <div class="col-md-1">
                                    <label>UF</label>
                                    <input class="form-control" name="uf_cidade" id="uf-cidade-input" value="" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{$medico->telefone}}">
                                </div>
                                <div class="col-md-3">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{$medico->celular}}">
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$medico->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" name="cpf" value="{{$medico->cpf}}">
                                </div>
                                <div class="col-md-3">
                                    <label>RG</label>
                                    <input type="text" class="form-control" name="rg" value="{{$medico->rg}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="nascimento">Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{$medico->nascimento}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="observacao">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{$medico->observacao}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{$medico->created_at->format('Y-m-d')}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{$medico->updated_at->format('Y-m-d')}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('medico.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection