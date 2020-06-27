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
                                    <label for="inputCity">Tipo de Cliente</label><br>
                                    <span>{{ $cliente->tipocliente->cliDescricao }}</span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nome do cliente / responsável</label><br>
                                    <span>{{ $cliente->nome_cliente_responsavel }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">CPF</label><br>
                                    <span id="cpf" name="cpf">{{ $cliente->cpf }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Celular</label><br>
                                    <span id="celular" name="celular">{{ $cliente->celular }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Email</label><br>
                                    <span id="email" name="email">{{ $cliente->email }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Razão Social</label><br>
                                    <span id="razao_social" name="razao_social">{{ $cliente->razao_social }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Nome Fantasia</label><br>
                                    <span id="nome_fantasia" name="nome_fantasia">{{ $cliente->nome_fantasia }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">CNPJ</label><br>
                                    <span id="cnpj" name="cnpj">{{ $cliente->cnpj }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Estadual</label><br>
                                    <span id="inscricao_estadual" name="inscricao_estadual">{{ $cliente->inscricao_estadual }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Municipal</label><br>
                                    <span id="inscricao_municioal" name="inscricao_municioal">{{ $cliente->inscricao_municipal }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Telefone Comercial</label><br>
                                    <span id="telefone_comercial" name="telefone_comercial" name="telefone_comercial">{{ $cliente->telefone_contato }}</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">CEP</label><br>
                                    <span id="cep" name="cep">{{ $cliente->cep }}</span>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="inputZip">Endereço</label><br>
                                    <span id="endereco" name="endereco">{{ $cliente->endereco }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Complemento</label><br>
                                    <span id="complemento" name="complemento">{{ $cliente->complemento }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Observação</label><br>
                                    <span id="observacao" name="observacao">{{ $cliente->observacao }}</span>
                                </div>
                            </div>
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
                document.getElementById("razao_social").disabled = false;
                document.getElementById("nome_fantasia").disabled = false;
                document.getElementById("cnpj").disabled = false;
                document.getElementById("inscricao_estadual").disabled = false;
                document.getElementById("inscricao_municioal").disabled = false;
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
