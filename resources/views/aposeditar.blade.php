@extends('layouts.popUp')

@section('content')
    <body onload="fechaJanela()">
    <form name="uploadArquivo" id="uploadArquivo" action="" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="modal-body">
            <div class="container col-md-12">
                <div class="row">

                </div>
            </div>
        </div>
    </form>
    </body>

    <script>
        function fechaJanela() {
            // dá um refresh na página principal
            opener.location.href=opener.location.href;
            // fechando a janela atual ( popup )
            window.close();
        }
    </script>
@endsection