<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lampang1stop - @yield('title')</title>

	<link href="{{ asset('/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>

	<link href="{{ asset('/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
	<script src="{{ asset('/js/plugins/canvas-to-blob.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/purify.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/fileinput.min.js') }}"></script>

  	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  	<script src="https://use.fontawesome.com/ed07936baa.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		$(function() {
		    $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': {!! json_encode(csrf_token()) !!}
		        }
		    });
		    $('.province').change(function(){     
		    	var provincediv = $(this).attr('id');
		    	var provincedivid = provincediv.split("-");
			    $.ajax({
			      url: "{{ url('/place/getAmphur') }}",
			      type: "post",
			      data: {'provinceid':$(this).val()},
			      success: function(data){
			        var html = '';
			        if(data.length == 0) html += '<option value="0"></option>';
			        else {
			        	if(provincedivid[1] == 3)
			        		html+= '<option value="0">ทุกอำเภอ</option>';
			        }
			        $.each( data, function( key, value ) {
			        	html += '<option value="'+value['AMPHUR_ID']+'">'+value['AMPHUR_NAME']+'</option>';
			        });
			        $('#amphur-'+provincedivid[1]).html(html);
			      }
			    });      
			}); 
		});
	</script>
</head>
<body>

	<!-- <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav> -->

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>BackEnd</span> Lampang1stop</a>
				<ul class="user-menu">
					@if (Auth::guest())
						<!-- <li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li> -->
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	@if (Auth::guest())
	@else
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<?php
			$link = $_SERVER["REQUEST_URI"];
		    $link_array = explode('/',$link);
		    $page = end($link_array);
		    // print_r($menu);
		?>
		<ul class="nav menu">
			<?php foreach($menu as $key => $value){ ?>
				<li class="<?php if($page==$value['route']) echo 'active'; ?>"><a href="<?php echo "".$value['route'] ?>"><svg class="glyph stroked calendar"></svg><?php echo $value['name'] ?></a></li>
			<?php } ?>
			<li role="presentation" class="divider"></li>
			<li><a href="{{ url('/auth/logout') }}"><svg class="glyph stroked male-user"></svg> Logout</a></li>
		</ul>

	</div>
	@endif

	@if (Auth::guest())
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('topic')</h1>
			</div>
			<div class="col-lg-12">
				<div class="panel-body">
					@yield('content')
				</div>
			</div>
		</div>
	@else
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">@yield('topic')</h1>
				</div>
				<div class="col-lg-12">
					<div class="panel-body">
						@yield('content')
					</div>
				</div>
				
			</div>
		</div>
	@endif

	
</body>
</html>
