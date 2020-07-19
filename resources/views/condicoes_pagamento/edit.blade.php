@extends('layouts.app', ['activePage' => 'condicao-pagamento-management', 'titlePage' => __('Condição de Pagamento Management')])
@section('content')
@include('layouts.modais.all-medico')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('condicaoPagamento.update', $condicao_pagamento) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit Condição de Pagamento') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{$condicao_pagamento->id}}" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">Condição de Pagamento</label>
                                    <div class="form-group">
                                        <input class="form-control" name="condicao_pagamento" id="input-condicao-pagamento" type="text" value="{{old('condicao_pagamento', $condicao_pagamento->condicao_pagamento)}}" required />
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label class="col-form-label">Multa (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="multa" id="input-multa" type="number" value="{{old('multa', $condicao_pagamento->multa)}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Juro (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="juro" id="input-juro" type="number" value="{{old('juro', $condicao_pagamento->juro)}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Desconto (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="desconto" id="input-desconto" type="number" value="{{old('desconto', $condicao_pagamento->desconto)}}" required />
                                    </div>
                                </div>
                                <input type="hidden" id="input-parcelas" name="parcelas" value="{{old('parcelas', $condicao_pagamento->parcelas)}}">
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="card">
                                <div style="text-align: center"><h3>PARCELAS</h3></div>
                                <hr>
                                <div class="card-body">
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <form id="frmCadastro" class="form-horizontal">
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Numero de Dias:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_dias" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Porcentual:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_porcentual" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-form-label">CRM</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="crm-medico-input" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Médico Responsável</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="medico-input" readonly />
                                                </div>
                                                <input type="hidden" id="id-medico-input">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal"><i class="material-icons">search</i></button>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" type="button" value="Salvar" id="btnSalvar">Inserir Parcela</button>
                                            </div>
                                        </form>

                                        <table class="table table-bordered table-hover" id="condicao-table"></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('condicaoPagamento.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idMedico').click(function() {
        var id_medico = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/medico/show',
            data: { id_medico : id_medico },
            dataType: "JSON",
            success: function(response){
                $('#crm-medico-input').val(response.crm);
                $('#medico-input').val(response.medico);
                $('#id-medico-input').val(response.id);
                $('#medicoModal').modal('hide')
            }
        });
    });

    $(function(){
        localStorage.clear();
        var condicoes_pagamento = $('#input-parcelas').val();
        localStorage.setItem("tbClientes", condicoes_pagamento);
        var operacao = "A"; //"A"=Adição; "E"=Edição
        var indice_selecionado = -1; //Índice do item selecionado na lista
        var tbClientes = localStorage.getItem("tbClientes");// Recupera os dados armazenados
        tbClientes = JSON.parse(tbClientes); // Converte string para objeto
        if(tbClientes == null) // Caso não haja conteúdo, iniciamos um vetor vazio
        tbClientes = [];

    $("#btnSalvar").on("click",function(){
        if(operacao == "A")
            return Adicionar();
        else
            return Editar();
    });

    function Adicionar(){
        var cliente = JSON.stringify({
            Dias   : $("#id_dias").val(),
            Porcentual     : $("#id_porcentual").val(),
            Pagamento : $("#id-medico-input").val(),
        });
        tbClientes.push(cliente);
        localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
        $('#input-parcelas').val(JSON.stringify(tbClientes));
        alert("Registro adicionado.");
        Listar();
        return true;
    }

    // $("#condicao-table").on("click", ".btnEditar", function(){
    //     operacao = "E";
    //     indice_selecionado = parseInt($(this).attr("alt"));
    //     var cli = JSON.parse(tbClientes[indice_selecionado]);
    //     console.log(cli.Pagamento);
    //     $("#id_dias").val(cli.Dias);
    //     $("#id_porcentual").val(cli.Porcentual);
    //     $("#id-medico-input").val(cli.Pagamento);
    //     $("#id_dias").focus();
    // });

    $("#condicao-table").on("click", ".btnEditar", function(){

        operacao = "E";
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = JSON.parse(tbClientes[indice_selecionado]);
        $("#id_dias").val(cli.Dias);
        $("#id_porcentual").val(cli.Porcentual);
        $("#id-medico-input").val(cli.Pagamento);

        var id_medico = cli.Pagamento;
        $.ajax({
            method: "POST",
            url: url_atual + '/medico/show',
            data: { id_medico : id_medico },
            dataType: "JSON",
            success: function(response){
                alert(response.crm);
                $('#crm-medico-input').val(response.crm);
                $('#medico-input').val(response.medico);
                $('#id-medico-input').val(response.id);
            }
        });

        $("#id_dias").focus();

    });

    function Editar(){
        tbClientes[indice_selecionado] = JSON.stringify({
                Dias   : $("#id_dias").val(),
                Porcentual     : $("#id_porcentual").val(),
                Pagamento : $("#id-medico-input").val(),
            });//Altera o item selecionado na tabela
        localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
        $('#input-parcelas').val(JSON.stringify(tbClientes));
        alert("Informações editadas.")
        operacao = "A"; //Volta ao padrão
        Listar();
        return true;
    }

    $("#condicao-table").on("click", ".btnExcluir",function(){
        indice_selecionado = parseInt($(this).attr("alt"));
        Excluir();
        Listar();
    });

    function Excluir(){
        tbClientes.splice(indice_selecionado, 1);
        localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
        $('#input-parcelas').val(JSON.stringify(tbClientes));
        alert("Registro excluído.");
    }

    function Listar(){
        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "    <tr>"+
            "    <th scope='col'>Id</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
            );

        for(var i in tbClientes){
            var cli = JSON.parse(tbClientes[i]);

            var id_medico = cli.Pagamento;
            $.ajax({
                method: "POST",
                url: url_atual + '/medico/show',
                data: { id_medico : id_medico },
                dataType: "JSON",
                success: function(response){

                    $("#condicao-table tbody").append("<tr>");
                    $("#condicao-table tbody").append("<td></td>");
                    $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
                    $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
                    $("#condicao-table tbody").append("<td>"+response.medico+"</td>");
                    $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
                    $("#condicao-table tbody").append("</tr>");

                }
            });
        }
    }

    $(function() {
        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "   <tr>"+
            "    <th scope='col'>Id</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
            );

        for(var i in tbClientes){
            var cli = JSON.parse(tbClientes[i]);

            var id_medico = cli.Pagamento;
            $.ajax({
                method: "POST",
                url: url_atual + '/medico/show',
                data: { id_medico : id_medico },
                dataType: "JSON",
                success: function(response){

                    $("#condicao-table tbody").append("<tr>");
                    $("#condicao-table tbody").append("<td></td>");
                    $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
                    $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
                    $("#condicao-table tbody").append("<td>"+response.medico+"</td>");
                    $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
                    $("#condicao-table tbody").append("</tr>");

                }
            });
        }
    });

});

</script>
@endsection
