@extends('layouts.template')
@section('content')
    <body onload="bloqueiacampos()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                    <!--Bem vindo {{ Auth::user()->name }}-->
                        <h4>Clientes</h4>
                        {{--CAIXA DE BUSCA--}}
                        </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- CADOS QUE APARECERÃO NA TELA --}}
                        <div class="input-group">
                            <a onclick="aoClicarCadastrar()" href="" class="btn btn-primary"><i class="fas fa-plus"></i> NOVO CLIENTE</a>
                        </div>
                        <br>
                        <form class="busca" action="" method="GET">
                            <input type="text" class="input-search" alt="busca-na-lista" placeholder="Buscar nesta lista" name="buscanatabela"/>
                            <select type="text" name="p_combo">
                                <option value="1">Cliente</option>
                                <option value="2">Responsável</option>
                                <option value="3">CPF</option>
                                <option value="4">CNPJ</option>
                            </select>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                        {{-- GRADE ARQUIVOS ANEXO--}}

                        <div class="input-group">
                            <table name="gradearquivos" class="busca-na-lista table table-striped col-md-12" cellspacing="0" cellpadding="0">
                                <thead class="thead-primary">
                                <tr>
                                    <th>Cliente</th>
                                    <th>Responsável</th>
                                    <th>Telefone(s)</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>
                                          @if($cliente->cliente_tipo_id == 2 && $cliente->razao_social != null){{$cliente->razao_social}}
                                          @elseif($cliente->cliente_tipo_id == 1 && $cliente->razao_social == null) {{$cliente->nome_cliente_responsavel}}
                                          @else {{$cliente->nome_cliente_responsavel}}
                                          @endif
                                        </td>
                                        <td>
                                          @if($cliente->cliente_tipo_id == 2 && $cliente->razao_social != null){{$cliente->nome_cliente_responsavel}}
                                          @elseif($cliente->cliente_tipo_id == 2 && $cliente->razao_social == null) 'O mesmo'
                                          @elseif($cliente->cliente_tipo_id == 1 && $cliente->nome_cliente_responsavel != null) 'O mesmo'
                                          @else 'O mesmo' @endif
                                      </td>

                                        <td>@if($cliente->celular == null) {{$cliente->telefone_contato}} @elseif($cliente->telefone_contato == null) {{$cliente->celular}} @else {{$cliente->celular}} - {{$cliente->telefone_contato}} @endif</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>
                                            <a onclick="aoClicarVisualizar({{ $cliente->id }})"class="btn btn-xs btn-outline-info" href="" title="Visualizar"><i class="fas fa-eye"></i></a>
                                            <a onclick="aoClicarEditar({{ $cliente->id }})" class="btn btn-xs btn-outline-primary" href="" title="Editar cliente"><i class="fas fa-edit editar"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--PAGINAÇÃO--}}
                        {{ $clientes->appends(Request::input())->links() }}
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

    <script>
        //POPUP EDITAR CLIENTE
        function aoClicarEditar(id,pHeight=900,pWidth=1024){

            let dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            let dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            let width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            let height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            let systemZoom = width / window.screen.availWidth;
            let intLeft = (width - pWidth) / 2 / systemZoom + dualScreenLeft;
            let intTop = (height - pHeight) / 2 / systemZoom + dualScreenTop;

            let w = window.open(
                "/clientes/edt/"+id,
                "inscricao",
                "toolbar=no, " +
                "scrollbars=no, " +
                "resizable=no, " +
                "top="+intTop+"," +
                "left="+intLeft+"," +
                "width="+pWidth+", " +
                "height="+pHeight
            );
        }
        //POPUP VISUALIZAR CLIENTE
        function aoClicarVisualizar(id,pHeight=680,pWidth=1024){

            let dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            let dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            let width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            let height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            let systemZoom = width / window.screen.availWidth;
            let intLeft = (width - pWidth) / 2 / systemZoom + dualScreenLeft;
            let intTop = (height - pHeight) / 2 / systemZoom + dualScreenTop;

            let w = window.open(
                "/clientes/vwe/"+id,
                "inscricao",
                "toolbar=no, " +
                "scrollbars=no, " +
                "resizable=no, " +
                "top="+intTop+"," +
                "left="+intLeft+"," +
                "width="+pWidth+", " +
                "height="+pHeight
            );
        }
        //POPUP CADASTRAR CLIENTE
        function aoClicarCadastrar(pHeight=800,pWidth=1024){

            let dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            let dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            let width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            let height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            let systemZoom = width / window.screen.availWidth;
            let intLeft = (width - pWidth) / 2 / systemZoom + dualScreenLeft;
            let intTop = (height - pHeight) / 2 / systemZoom + dualScreenTop;

            let w = window.open(
                "/clientes/cad",
                "inscricao",
                "toolbar=no, " +
                "scrollbars=no, " +
                "resizable=no, " +
                "top="+intTop+"," +
                "left="+intLeft+"," +
                "width="+pWidth+", " +
                "height="+pHeight
            );
        }
    </script>

@endsection
