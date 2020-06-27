@extends('layouts.popUp')

@section('content')
    @foreach($clientes as $cliente) @endforeach
    <body onload="bloqueiacampos()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient-indigo">
                    <!--Bem vindo {{ Auth::user()->name }}-->
                        <h4>Editar Clientes</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- CADOS QUE APARECERÃO NA TELA --}}
                        <form id="cadastro_clientes" method="POST" action="{{ route('salvaclienteeditado') }}" name="cadastro_clientes" onload="bloqueiacampos()">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input value="{{ $cliente->id }}" name="id" hidden>
                                    <label for="inputCity">Tipo de Cliente</label>
                                    <select class="form-control" id="tipo_cliente" name="tipo_cliente" onchange="validarForm()">
                                        <optgroup label="Tipo de cliente">
                                            <option value="{{ $cliente->cliente_tipo_id }}">{{ $cliente->tipocliente->cliDescricao }}</option>
                                        </optgroup>
                                        <optgroup label="Escolha o tipo de cliente">
                                            @foreach ($tipocliente as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->cliDescricao }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nome do cliente / responsável</label>
                                    <input type="text" class="form-control" id="cliente_responsavel" name="cliente_responsavel" value="{{ $cliente->nome_cliente_responsavel }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->cpf }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="{{ $cliente->celular }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Razão Social</label>
                                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ $cliente->razao_social }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Nome Fantasia</label>
                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{ $cliente->nome_fantasia }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">CNPJ</label>
                                    <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ $cliente->cnpj }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Estadual</label>
                                    <input type="text" id="inscricao_estadual" name="inscricao_estadual" class="form-control" value="{{ $cliente->inscricao_estadual }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Municipal</label>
                                    <input type="text" id="inscricao_municioal" name="inscricao_municioal" class="form-control" value="{{ $cliente->inscricao_municipal }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Telefone Comercial</label>
                                    <input type="text" id="telefone_comercial" name="telefone_comercial" name="telefone_comercial" class="form-control" value="{{ $cliente->telefone_contato }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">CEP</label>
                                    <input type="text" id="cep" name="cep" class="form-control" value="{{ $cliente->cep }}">
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="inputZip">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $cliente->endereco }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $cliente->complemento }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Observação</label>
                                    <input type="text" class="form-control" id="observacao" name="observacao" value="{{ $cliente->observacao }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> ATUALIZAR</button>
                        </form>
                        {{-- FIM DOS DADOS QUE APARECERÃO NA TELA --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        //INICIA A PÁGINA COM CAMPOS DE PESSOA JURIDICA DESABILITADOS
        function bloqueiacampos(){
            document.getElementById("razao_social").disabled = true;
            document.getElementById("nome_fantasia").disabled = true;
            document.getElementById("cnpj").disabled = true;
            document.getElementById("inscricao_estadual").disabled = true;
            document.getElementById("inscricao_municioal").disabled = true;
        }
        //DESABILITA CAMPOS, SE ESCOLHER PESSOA JURIDICA - FAZER A PARTIR DESTE
        function validarForm() {
            var optionSelect = document.getElementById("tipo_cliente").value;

            if(optionSelect =="1" ){
                document.getElementById("razao_social").disabled = true;
                document.getElementById("nome_fantasia").disabled = true;
                document.getElementById("cnpj").disabled = true;
                document.getElementById("inscricao_estadual").disabled = true;
                document.getElementById("inscricao_municioal").disabled = true;
            }else{
                //CAMPO FICA HABILITADO
                document.getElementById("razao_social").disabled = false;
                document.getElementById("nome_fantasia").disabled = false;
                document.getElementById("cnpj").disabled = false;
                document.getElementById("inscricao_estadual").disabled = false;
                document.getElementById("inscricao_municioal").disabled = false;
                // CAMPO TORNA OBRIGATÓRIO
                document.getElementById("razao_social").required = true;
                document.getElementById("nome_fantasia").required = true;
                document.getElementById("cnpj").required = true;
                document.getElementById("inscricao_estadual").required = true;
                document.getElementById("inscricao_municioal").required = true;
            }
        }
    </script>
    <!--SCRIPT PARA PREENCHER COM CEP -->
    <script src="js/jquery.js"></script>
    <script>
        $("#cep").blur(function () {
            var cep = this.value.replace(/[^0-9]/, "");
            if (cep.length != 8) {
                return false;
            }
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.getJSON(url, function (dadosRetorno) {
                if(dadosRetorno.logradouro != undefined){
                    try {
                        $("#endereco").val(dadosRetorno.logradouro+' - '+dadosRetorno.bairro+' - '+dadosRetorno.localidade+' - '+dadosRetorno.uf);
                    } catch (ex) {
                        $("#endereco").val(dadosRetorno.logradouro);
                    }
                }else{
                    $("#endereco").val("CEP não encontrado, digite o endereço manualmente");
                }
            });
        });
    </script>

    <script>
        //MASCARAS
        $(document).ready(function(){
            $('#cep').mask('99999-999');
            $('#telefone_comercial').mask('(99) 9999-9999');
            $('#celular').mask('(99) 99999-9999');
            $('#cpf').mask('999.999.999-99');
            $('#cnpj').mask('99.999.999/9999-99');
            $('#inscricao_estadual').mask('999.999.999.999');
        });
    </script>
@endsection
