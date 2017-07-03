<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPDS DV | Login</title>

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ url('css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet">

</head>

<body class="gray-bg">
	@yield('content')
    <!-- Mainly scripts -->
    <script src="{{ url('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
	@yield('footer')
</body>
</html>
