@extends('layouts.app', ['activePage' => 'cliente-management', 'titlePage' => __('Cliente Management')])
@section('content')
@include('layouts.modais.cidadeEstadoPais')
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
                <form method="post" action="{{route('cliente.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('FICHA CADASTRAL') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Tipo</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input tipo" type="radio" name="tipo" value="pessoaFisica" {{ old('tipo') == 'pessoaFisica' ? 'checked' : '' }} id="pessoa-fisica" checked required> Física
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input tipo" type="radio" name="tipo" value="pessoaJuridica" {{ old('tipo') == 'pessoaJuridica' ? 'checked' : '' }} id="pessoa-juridica" required> Jurídica
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"><span style="color: red">*</span> Cliente</label>
                                    <input type="text" class="form-control" name="cliente" value="{{ old('cliente') }}" required>
                                </div>
                                <div class="col-md-4 campoPessoaFisica">
                                    <label class="col-form-label"><span style="color: red">*</span> Apelido</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="apelido" value="{{ old('apelido') }}" required>
                                </div>
                                <div class="col-md-4 campoPessoaJuridica">
                                    <label class="col-form-label"><span style="color: red">*</span> Nome Fantasia</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="nome_fantasia" value="{{ old('nome_fantasia') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label"><span style="color: red">*</span> Endereço</label>
                                    <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label"><span style="color: red">*</span> nº</label>
                                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Bairro</label>
                                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input type="text" class="form-control" id="codigo-cidade-input" name="codigo_cidade" value="{{ old('codigo_cidade') }}" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"><span style="color: red">*</span> Cidade</label>
                                    <input class="form-control readonly" id="cidade-input" name="cidade" value="{{ old('cidade') }}" required>
                                    <input type="hidden" id="id-cidade-input" name="id_cidade" value="{{ old('id_cidade') }}">
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input class="form-control" id="uf-cidade-input" name="estado" value="{{ old('estado') }}" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cidadeModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Telefone</label>
                                    <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" value="{{ old('celular') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Nacionalidade</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="{{ old('nacionalidade') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}" required>
                                </div>
                            </div>
                            <div class="row campoPessoaFisica">
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> CPF</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="cpf" value="{{ old('cpf') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> RG</label>
                                    <input type="text" class="form-control inputPessoaFisica" name="rg" value="{{ old('rg') }}" required>
                                </div>
                            </div>
                            <div class="row campoPessoaJuridica">
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Inscricão Estadual</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="inscricao_estadual" value="{{ old('inscricao_estadual') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> CNPJ</label>
                                    <input type="text" class="form-control inputPessoaJuridica" name="cnpj" value="{{ old('cnpj') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-form-label">Observação</label>
                                    <input type="text" class="form-control" name="observacao" value="{{ old('observacao') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"><span style="color: red">*</span> Limite de Crédito</label>
                                    <input class="form-control" type="number" name="limite_credito" value="{{ old('limite_credito') }}" required>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">Código</label>
                                    <input class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label"><span style="color: red">*</span> Condição de Pagamento</label>
                                    <input class="form-control" readonly>
                                    {{-- <input type="hidden" id="" name="id_condicao_pagamento" value=""> --}}
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#condicaoPagamamento" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Created_at</label>
                                    <input type="datetime-local" class="form-control" name="created_at" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <input type="datetime-local" class="form-control" name="updated_at" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto float-right">
                            <a href="{{route('cliente.index')}}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
   $( document ).ready(function() {
        if($(".tipo").val() == "pessoaFisica") {
            $(".campoPessoaFisica").show();
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required',false);
        } else {
            $(".campoPessoaJuridica").show();
            $(".campoPessoaFisica").hide();
            $('.inputPessoaFisica').prop('required',false);
        }
    });

    $(".tipo").on("change", function () {
        if($(this).val() == "pessoaFisica") {
            $(".campoPessoaFisica").show();
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required',false);
            $('.inputPessoaFisica').prop('required',true);
        }
        else if($(this).val() == "pessoaJuridica") {
            $(".campoPessoaFisica").hide();
            $(".campoPessoaJuridica").show();
            $('.inputPessoaFisica').prop('required',false);
            $('.inputPessoaJuridica').prop('required',true);
        }
    });

</script>

<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idCidade').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                $('#codigo-cidade-input').val(response.cidade.codigo);
                $('#cidade-input').val(response.cidade.cidade);
                $('#uf-cidade-input').val(response.estado.codigo);
                $('#id-cidade-input').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });

    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
                $('#codigo-estado-input').val(response.estado.codigo);
                $('#estado-input').val(response.estado.estado);
                $('#id-estado-input').val(response.estado.id);
                $('#pais-input').val(response.pais.pais);
                $('#estadoModal').modal('hide')
            }
        });
    });

    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-codigo-pais').val(response.codigo);
                $('#input-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
    <script>
        $(function() {
            $('#cidadeModal').modal('show');
        });
    </script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
        $(function() {
            $('#cidadeModal').modal('show');
        });
        $(function() {
            $('#cidadeCreateModal').modal('show');
        });
        $(function() {
            $('#estadoModal').modal('show');
        });
    </script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
    <script>
        $(function() {
            $('#estadoModal').modal('show');
        });
        $(function() {
            $('#estadoCreateModal').modal('show');
        });
        $(function() {
            $('#paisModal').modal('show');
        });
    </script>
@endif

<script>
    $(".readonly").on('keydown paste', function(e){
        e.preventDefault();
    });
</script>

<style>
    .readonly {
        background-color: #e9ecef;
        opacity: 1;
    }

    .readonly:hover {
        background-color: #e9ecef;
        opacity: 1;
    }

    .readonly:focus {
        background-color: #e9ecef;
        opacity: 1;
    }

</style>

@endsection
