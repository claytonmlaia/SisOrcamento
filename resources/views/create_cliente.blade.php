@extends('layouts.popUp')

@section('content')
    {{--@foreach() @endforeach--}}
    <body onload="bloqueiacampos()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient-indigo">
                    <!--Bem vindo {{ Auth::user()->name }}-->
                        <h4>Cadastrar Clientes</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- CADOS QUE APARECERÃO NA TELA --}}
                        <form id="cadastro_clientes" method="POST" action="{{ route('salvacliente') }}" name="cadastro_clientes" onload="bloqueiacampos()">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Tipo de Cliente</label>
                                    <select class="form-control" id="tipo_cliente" name="tipo_cliente" onchange="validarForm()">
                                        @foreach ($tipocliente as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->cliDescricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nome do cliente / responsável</label>
                                    <input type="text" class="form-control" id="cliente_responsavel" name="cliente_responsavel" placeholder="Nome do responsavel pelo pedido">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do responsavel">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Telefone para contato com cliente">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email para contato">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Razão Social</label>
                                    <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão social da empresa">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Nome Fantasia</label>
                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Nome fantasia da empresa">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">CNPJ</label>
                                    <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="CNPJ da empresa">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Estadual</label>
                                    <input type="text" id="inscricao_estadual" name="inscricao_estadual" class="form-control" placeholder="Inscrição estadual da empresa">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Inscrição Municipal</label>
                                    <input type="text" id="inscricao_municioal" name="inscricao_municioal" class="form-control" placeholder="Inscrição municipal da empresa">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Telefone Comercial</label>
                                    <input type="text" id="telefone_comercial" name="telefone_comercial" name="telefone_comercial" class="form-control" placeholder="Telefone comercial da empresa">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">CEP</label>
                                    <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP da empresa ou cliente">
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="inputZip">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço do cliente">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Numero, casa, apartamento, etc">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Observação</label>
                                    <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Alguma observação importante se houver">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> CADASTRAR</button>
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
                // HABILITA OS CAMPOS QUANDO É PESSOA JURÍDICA
                document.getElementById("razao_social").disabled = false;
                document.getElementById("nome_fantasia").disabled = false;
                document.getElementById("cnpj").disabled = false;
                document.getElementById("inscricao_estadual").disabled = false;
                document.getElementById("inscricao_municioal").disabled = false;
                // TORNA OS CAMPOS OBRIGATÓRIOS QUANDO É PESSOA JURÍDICA
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
