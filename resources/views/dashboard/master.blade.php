<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - @yield('title')</title>
    <!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> -->
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/skins/_all-skins.css') }}">
    <!-- Pace style -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/pace/pace.min.css') }}">
    <!-- Pure CSS ripple effect -->
    {{--<link rel="stylesheet" href="{{ asset('assets/css/ripple.min.css') }}">--}}
    <!-- Custom CSS -->
    {{--<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">--}}

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ asset('css/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <link rel="stylesheet" href="{{ asset('css/assets/app.css') }}"> -->

    @yield('stylesheet')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="app">

        @include('dashboard.header')

        @include('dashboard.sidebar')

        @include('dashboard.content')
    </div>
    <!-- /.content-wrapper -->
    @include('dashboard.footer')
    </div>
    <!-- ./wrapper -->

    
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('dashboard/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- PACE -->
    <script src="{{ asset('dashboard/plugins/pace/pace.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('dashboard/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dashboard/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/app.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="{{ asset('css/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('css/dist/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
    <script src="{{ asset('css/assets/app.js')}}"></script>
    <script src="{{ asset('css/assets/app_bs3.js')}}"></script>
    <script src="{{ asset('js/typeahead.bundle.js')}}"></script> -->
    <!-- page script -->
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() {
            Pace.restart();
        });

        // var citynames = new Bloodhound({
        //     datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        //     queryTokenizer: Bloodhound.tokenizers.whitespace,
        //     prefetch: {
        //         url: 'http://blog.test/api/tags',
        //     }
        // });
        // tags.initialize();

        // $('input').tagsinput({
        //     typeaheadjs: {
        //         name: 'tags',
        //         displayKey: 'tags',
        //         valueKey: 'tags',
        //         source: tags.ttAdapter()
        //     }
        // });
    </script>
    @yield('script')
</body>

</html>