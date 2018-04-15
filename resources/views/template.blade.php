<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		.modal-open .modal {
		    z-index: 10001;
		}
	</style>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="{{asset('assets/images/favicon.ico') }}">

	<title>Menemani</title>

	<link rel="stylesheet" href="{{asset('js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{asset('css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{asset('//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic') }}">

	{{-- <link rel="stylesheet" href="{{asset('css/bootstrap-material-datetimepicker.css') }}"> --}}
	<link rel="stylesheet" href="{{asset('css/bootstrap.css') }}">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/neon-core.css') }}">
	<link rel="stylesheet" href="{{asset('css/neon-theme.css') }}">
	<link rel="stylesheet" href="{{asset('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{asset('css/custom.css') }}">
	<link rel="stylesheet" href="{{asset('js/selectboxit/jquery.selectBoxIt.css') }}">
	<link rel="stylesheet" href="{{asset('css/skins/green.css') }}">
	<link rel="stylesheet" href="{{asset('css/font-icons/font-awesome/css/font-awesome.min.css ') }}">
	<link rel="stylesheet" href="{{asset('css/timepicker.css') }}">
	<link rel="stylesheet" href="{{asset('js/datatables/datatables.css') }}">
	<link rel="stylesheet" href="{{asset('js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{asset('js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{asset('js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{asset('js/rickshaw/rickshaw.min.css') }}">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://bootswatch.com/slate/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</head>
<body class="page-body" data-url="http://neon.dev">
	
	<script type="text/javascript">
	var home_url = "{{url('/')}}";
	
	// $(document).ready(function() {
	// 	$("form").validate();

	// 	$('.numbers').keyup(function () {
 //            this.value = this.value.replace(/[^0-9\.\-]/g,'');
 //        });

 //        //Pattern for NPWP
	//     if ($(".npwpMaskingTextBox").length > 0) {
	//         VMasker($(".npwpMaskingTextBox")).maskPattern('99.999.999.9-999.999');
	//     }

	//     $('.moneyMasking').mask('000,000,000,000,000', {reverse: true});

	// 		//Pattern buat No. HP
	// 		if ($(".hpMaskingTextBox").length > 0) {
	//         VMasker($(".hpMaskingTextBox")).maskPattern('9999-9999-9999-9999');
	//     }
	// });
	</script>

	<meta name="csrf_token" content="{{ csrf_token() }}">

	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		@role('admin')
			@include('includes.menu_admin')
		@endrole
		{{-- @role('staff')
			@include('includes.menu_staff')
		@endrole --}}
		{{-- @role('keuangan')
			@include('includes.menu_keuangan')
		@endrole --}}
		<div class="main-content" id="app">
			@yield('main')
		</div>
	</div>
	<script src="{{asset('js/datatables/datatables.js') }}"></script>
	<script src="{{asset('js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
	<script src="{{asset('js/jvectormap/jquery-jvectormap-europe-merc-en.js')}}"></script>
	<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
	<script src="{{asset('js/rickshaw/vendor/d3.v3.js')}}"></script>
	<script src="{{asset('js/rickshaw/rickshaw.min.js')}}"></script>
	<script src="{{asset('js/raphael-min.js')}}"></script>
	<script src="{{asset('js/morris.min.js')}}"></script>
	<!-- Bottom scripts (common) -->
	<script src="{{asset('js/gsap/TweenMax.min.js') }}"></script>
	<script src="{{asset('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
	<script src="{{asset('js/bootstrap.js') }}"></script>
	<script src="{{asset('js/joinable.js') }}"></script>
	<script src="{{asset('js/resizeable.js') }}"></script>
	<script src="{{asset('js/neon-api.js') }}"></script>
	<!-- Imported scripts on this page -->
	<script src="{{asset('js/fileinput.js')}}"></script>
	<script src="{{asset('js/dropzone/dropzone.js')}}"></script>
	{{-- <script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script> --}}
	{{-- <script src="{{asset('js/daterangepicker/moment.js')}}"></script> --}}
	<script src="{{asset('js/fullcalendar-2/fullcalendar.js')}}"></script>
	{{-- <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> --}}
	{{-- <script src="{{asset('js/moment.min.js')}}"></script>
	<script src="{{asset('js/moment-with-locales.js')}}"></script>
	<script src="{{asset('js/moment-with-locales.min.js')}}"></script> --}}
	<script src="{{asset('js/toastr.js')}}"></script>
	{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
	<script src="{{asset('js/neon-api.js') }}"></script>
	<script src="{{asset('js/select2/select2.min.js') }}"></script>
	<script src="{{asset('js/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{asset('js/typeahead.min.js') }}"></script>
	<script src="{{asset('js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js') }}"></script>
	{{-- <script src="{{asset('js/bootstrap-timepicker.min.js') }}"></script> --}}
	{{-- <script src="{{asset('js/jquery.bootstrap.wizard.min.js') }}"></script> --}}
		<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('js/neon-custom.js') }}"></script>
	<script src="{{asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{asset('js/bootstrap-switch.min.js') }}"></script>
	<script src="{{asset('js/jquery.multi-select.js') }}"></script>
	<script src="{{asset('js/icheck/icheck.min.js') }}"></script>
	<script src="{{asset('js/timepicker.js') }}"></script>
	<script src="{{asset('js/jquery.inputmask.bundle.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.14/dist/vue.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>


		<!-- Demo Settings -->
	<script src="{{asset('js/neon-demo.js') }}"></script>
	<script src="{{asset('js/jquery number/jquery.number.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".numbers").number(true,0);
			$('.moneyMasking').mask('000,000,000,000,000', {reverse: true});
		});

		//Pattern for numbers
	    // if ($(".numberValidation").length > 0) {
	    //     VMasker($(".numberValidation")).maskNumber();
	    // }

	    $('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

	    $('.moneyMasking').mask('000,000,000,000,000', {reverse: true});

	    //Pattern for NPWP
	    if ($(".npwpMaskingTextBox").length > 0) {
	        VMasker($(".npwpMaskingTextBox")).maskPattern('99.999.999.9-999.999');
	    }

	</script>
	@yield('scripts')
</body>
</html>