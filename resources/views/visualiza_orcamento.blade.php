@extends('layouts.popUp')

@section('content')
    @foreach($orcamentos as $orcamento) @endforeach
    <body onload="bloqueiacampos()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient-indigo">
                    <!--Bem vindo {{ Auth::user()->name }}-->
                        <h4>ORÇAMENTO</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- CADOS QUE APARECERÃO NA TELA --}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Nª: </label>
                                <span>{{ $orcamento->id }}</span><br>
                                <label for="inputEmail4">Clinete: </label>
                                <span>@if($orcamento->clientes->cliente_tipo_id == 2){{ $orcamento->clientes->razao_social }} @else 'O mesmo' @endif</span><br>
                                <label for="inputEmail4">Responsável: </label>
                                <span>@if($orcamento->clientes->cliente_tipo_id == 2){{ $orcamento->clientes->nome_cliente_responsavel }} @else 'O mesmo' @endif</span><br>
                                <label for="inputAddress">Telefone: </label>
                                <span id="celular" name="celular">{{ $orcamento->clientes->telefone_contato }}</span><br>
                                <label for="inputAddress">Celular: </label>
                                <span id="celular" name="celular">{{ $orcamento->clientes->celular }}</span><br>
                                <label for="inputAddress2">Email: </label>
                                <span id="email" name="email">{{ $orcamento->clientes->email }}</span><br>
                                <label for="inputPassword4">Endereço: </label>
                                <span id="endereco" name="endereco">{{ $orcamento->clientes->endereco }} {{ $orcamento->clientes->complemento }} - CEP: {{ $orcamento->clientes->cep }}</span><br>
                            </div>
                            {{--TABELA COM PEDIDOS--}}
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor Unit.</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemorcamentos as $itemorcamento)
                                        <tr>
                                            <td>{{ $itemorcamento->itmQuantidade }}</td>
                                            <td>{{ $itemorcamento->itmQuantidade }}</td>
                                            <td>{{ $itemorcamento->itmQuantidade }}</td>
                                            <td>{{ $itemorcamento->itmQuantidade }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
