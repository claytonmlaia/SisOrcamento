{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')
@section('title', 'SIS Orçamento')
@section('content_header')
@stop
@section('content')
    <p>Bem vindo ao Sistema de Orçamentos.</p>
@stop
<div id="msg">
    @include('flash::message')
</div>
@section('css')
    @yield('startPageScript')
    <!-- Styles -->
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/startPageScript.js') }}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/valida_documentos.js') }}"></script>


    {{-- BUSCA RAPIDA, POREM SEM PAGINAÇÃO --}}
    <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.quick.search.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Flash Msgs-->
    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay('{{ Config::get('app.alertDelay') }}').fadeOut('{{ Config::get('app.alertFadeOut') }}');
    </script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/endPageScript.js') }}"></script>
    @yield('endPageScript')
@stop
