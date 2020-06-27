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
                        <h4>Cadastrar Acabamentos Extras</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- CADOS QUE APARECERÃO NA TELA --}}
                        <form id="cadastro_acabamento" method="POST" action="{{ route('salvacabamento') }}" name="cadastro_acabamento" onload="bloqueiacampos()">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">ACABAMENTO</label>
                                    <input type="text" class="form-control" id="acabamento" name="acabamento">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">PREÇO</label>
                                    <input type="text" class="form-control" id="preco_acabamento" name="preco_acabamento">
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
