<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<!-- Styles -->
	<!-- Bootstrap core CSS-->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="{{ asset('datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="{{ asset('css/custompopup.css') }}" rel="stylesheet">
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


	<!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    {{-- COR DA MENSAGEM DE ERRO DO VALIDADOR DE CPF E CNPJ --}}
    <style>
        .error{
              color:red
        }
 </style>
</head>
<body>

<div id="app">
	<main class="py-4">
		@yield('content')
	</main>
</div>
<div id="msg">
	@include('flash::message')
</div>
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

<!-- Core plugin JavaScript-->
<script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Flash Msgs-->
<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay('{{ Config::get('app.alertDelay') }}').fadeOut('{{ Config::get('app.alertFadeOut') }}');
</script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/endPageScript.js') }}"></script>
</body>
</html>
