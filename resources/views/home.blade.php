@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bem vindo {{ Auth::user()->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Aqui ficarão todas as notificações dos orçamentos, agenda, que o usuario precisa saber assim que entrar no sistema.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
