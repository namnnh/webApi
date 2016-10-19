<!DOCTYPE html>
<html lang="eng">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>123</title>
        <link rel="stylesheet" href="/css/back.css" />
         @yield('head')
    </head>

    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Top menu -->
                <ul class="nav navbar-right top-nav">
                    <li><a href="#">{{trans('back/admin.home')}}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/logout') }}" id="logout">
                                    <span class="fa fa-fw fa-power-off"></span>
                                </a>   
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Side menu -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">                
                        <li>
                            <a href="#"><span class="fa fa-fw fa-dashboard"></span>{{trans('back/admin.dashboard')}}</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#usermenu"><span class="fa fa-fw fa-user"></span> {{ trans('back/admin.users') }} <span class="fa fa-fw fa-caret-down"></span></a>
                                <ul id="usermenu" class="collapse">
                                    <li><a href="#">{{ trans('back/admin.see-all') }}</a></li>
                                    <li><a href="#">{{ trans('back/admin.add') }}</a></li>
                                    <li><a href="#">{{ trans('back/roles.roles') }}</a></li>
                                    <li><a href="#">{{ trans('back/admin.blog-report') }}</a></li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            

            <div id="page-wrapper">

                <div class="container-fluid">

                    @yield('main')

                </div>

            </div>

        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @yield('scripts')

    </body>
     <script>

        </script>
</html>