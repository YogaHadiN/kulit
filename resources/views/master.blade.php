<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    {{-- <title>INSPINIA | Empty Page</title> --}}
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="{{ url('css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
								<img alt="image" class="img-circle" src="{{ \Auth::user()->thisAvatar }}" height="100px" width="100px" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ \Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">PPDS Dermatovenerologi</span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="{{ url('users/' . \Auth::user()->id) . '/edit' }}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Data-data</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="{{ url('contacts') }}">Kontak PPDS</a></li>
                            <li ><a href="{{ url('sms_infos') }}">Format SMS INFO</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Kegiatan</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('jadwals') }}">Jadwal Kegiatan</a></li>
                            <li><a href="{{ url('jenis_kegiatans') }}">Jenis Kegiatan</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                    </li>
                    <li class="landing_link">
                        <a target="_blank" href="Landing_page/index.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                    </li>
                    <li class="special_link">
                        <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang PPDS DV</span>
                </li>


                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
					@yield('breadcrumb')	
				</div>
                <div class="col-sm-8">
                    <div class="title-action">
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="animated fadeInRight">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							@if (Session::has('pesan'))
								{!! Session::get('pesan')!!}
							@endif
						</div>
					</div>
						@yield('content')
					
					</div>
                </div>
            </div>
        </div>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>

        </div>
        </div>

    <!-- Mainly scripts -->

    <!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- MOMENT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="{{ url('js/id.js') }}"></script>
    <!-- BOOTSTRAP JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- METIS MENU JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <!-- SLIMSCROLL JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <!-- PACE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$('.tanggal').datetimepicker({
			'format' : 'YYYY-MM-DD HH:mm:SS'
		});
	</script>
	@yield('footer')

</body>

</html>
