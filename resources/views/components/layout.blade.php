<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::settings()->name }}</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset(Helper::settings()->favicon) }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/new-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/switchery/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/pages/notification/notification.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/animate.css/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/component.css') }}">


    <!-- SETTINGS -->
    <style>
        /* DROPDOWN MENU USUARIO */
        .header-navbar .navbar-wrapper .navbar-container .header-notification .profile-notification:after {
            border: 10px solid {{ Helper::settings()->color_secondary }};
            border-right-color: transparent;
            border-bottom-color: transparent;
        }
        /* DROPDOWN MENU USUARIO */

        /* MENU BACKGROUD */
        .pcoded .pcoded-header .navbar-logo[logo-theme=theme1] {
            background-color: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .main-menu {
            background-color: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] {
            background: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item>li.pcoded-trigger>a {
            background: {{ Helper::settings()->color_menu }}!important;
        }

        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item .pcoded-hasmenu .pcoded-submenu li.active>a {
            background-color: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item .pcoded-hasmenu .pcoded-submenu li>a {
            background-color: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item .pcoded-hasmenu .pcoded-submenu li {
            background-color: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded[theme-layout=vertical] .pcoded-navbar .pcoded-item[item-border=true][item-border-style=none] li>a:hover {
            background: none!important;
        }

        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item li.pcoded-hasmenu .pcoded-submenu li>a:hover {
            background: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item>li.active>a {
            background: {{ Helper::settings()->color_menu }}!important;
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li.pcoded-trigger>a:before,.pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li>a:before
        {
            border-left-color:{{ Helper::settings()->color_menu }}!important;
        }
        /* MENU BACKGROUD */


        /* MENU ICON */
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item>li>a>span>i {
            color: {{ Helper::settings()->color_menu_icon }}!important;
        }
        /* MENU ICON */

        /* MENU TITLE */
        .pcoded .pcoded-navbar .pcoded-navigatio-lavel[menu-title-theme=theme5] {
            color: {{ Helper::settings()->color_menu_title }}!important;
        }
        /* MENU TITLE */

        /* MENU LETRAS */
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li .pcoded-submenu li.active>a,.pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li .pcoded-submenu li:hover>a
        {
            color:{{ Helper::settings()->color_menu_letter_active }}!important;
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li.pcoded-hasmenu:hover>a
        {
            color:{{ Helper::settings()->color_menu_letter_active }}!important
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li:hover>a
        {
            color:{{ Helper::settings()->color_menu_letter_active }}!important;
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .searchbar-toggle
        {
            color:{{ Helper::settings()->color_menu_letter_active }}!important;
        }
        .pcoded .pcoded-navbar[navbar-theme=theme1] .pcoded-item .pcoded-hasmenu .pcoded-submenu li.active>a {
             color: {{ Helper::settings()->color_menu_letter_active }}!important;
         }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li .pcoded-submenu li.active>a,.pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li .pcoded-submenu li>a
        {
            color:{{ Helper::settings()->color_menu_letter }}!important;
        }

        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li.pcoded-hasmenu>a
        {
            color:{{ Helper::settings()->color_menu_letter }}!important;
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item li>a
        {
            color:{{ Helper::settings()->color_menu_letter }}!important;
        }
        /* MENU LETRAS */

        /* MENU BORDA */
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li.pcoded-trigger .pcoded-submenu li>a:before,.pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li.active .pcoded-submenu li>a:before
        {
            border-left-color:{{ Helper::settings()->color_menu_letter_active }}!important;
        }
        .pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li.pcoded-trigger>a:before,.pcoded .pcoded-navbar[active-item-theme=theme1] .pcoded-item>li.active>a:before
        {
            border-left-color:{{ Helper::settings()->color_menu_letter_active }}!important;
        }
        /* MENU BORDA */


        /* LINKS HOVER */
         a:hover{
             color: {{ Helper::settings()->color_primary }};
         }
        /* LINKS HOVER */

        /* BACKGROUNS TEXT BUTTONS INPUTS */
        .bg-c-primary {
            background: -webkit-gradient(linear, left top, right top, from({{ Helper::settings()->color_primary }}), to({{ Helper::settings()->color_secondary }}));
            background: linear-gradient(to right, {{ Helper::settings()->color_primary }}, {{ Helper::settings()->color_secondary }});
        }
        .btn-primary
        {
            background: {{ Helper::settings()->color_primary }}!important;
            border-color: {{ Helper::settings()->color_primary }}!important;
        }
        .btn-secondary
        {
            background: {{ Helper::settings()->color_secondary }}!important;
            border-color: {{ Helper::settings()->color_secondary }}!important;
        }
        .text-primary
        {
            color: {{ Helper::settings()->color_primary }}!important;
        }
        .text-secondary
        {
            color: {{ Helper::settings()->color_secondary }}!important;
        }
        .bg-primary
        {
            background: {{ Helper::settings()->color_primary }}!important;
        }
        .bg-secondary
        {
            background: {{ Helper::settings()->color_secondary }}!important;
        }
        .frame
        {
            border-left-color:{{ Helper::settings()->color_secondary }}!important;
            border-right-color:{{ Helper::settings()->color_secondary }}!important;
        }
        .ring
        {
            border-left-color:{{ Helper::settings()->color_primary }}!important;
            border-right-color:{{ Helper::settings()->color_primary }}!important;
        }
        .pcoded .pcoded-header .navbar-logo[logo-theme=theme1]
        {
            background-color:{{ Helper::settings()->color_menu }}!important;
        }
        .checkbox-fade.fade-in-primary .cr, .checkbox-fade.zoom-primary .cr, .checkbox-zoom.fade-in-primary .cr, .checkbox-zoom.zoom-primary .cr {
            border: 2px solid {{ Helper::settings()->color_primary }};
        }
        .checkbox-fade.fade-in-primary .cr .cr-icon, .checkbox-fade.zoom-primary .cr .cr-icon, .checkbox-zoom.fade-in-primary .cr .cr-icon, .checkbox-zoom.zoom-primary .cr .cr-icon {
            color: {{ Helper::settings()->color_primary }};
        }
        input:focus, input:active{
            border-color:{{ Helper::settings()->color_primary }}!important;
        }
        select:focus, select:active{
            border-color:{{ Helper::settings()->color_primary }}!important;
        }
        .swal2-styled.swal2-confirm{
            background-color:{{ Helper::settings()->color_primary }}!important;
        }
        .swal2-styled.swal2-confirm:focus {
            box-shadow: none!important;
        }
        /* BACKGROUNS TEXT BUTTONS INPUTS */

        /* BACKGROUNS NOTIFICAÇÃO */
        .growl-animated.alert-inverse {
            background: linear-gradient(to right, #fe9365,#fe9365);;
        }
        /* BACKGROUNS NOTIFICAÇÃO */

    </style>
    <!-- SETTINGS -->

    {{ $stylesheet }}
</head>

<body>

<!-- SWEET ALERT -->
@include('sweetalert::alert')
<!-- SWEET ALERT -->

<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <div style="width: 100%;height: 100%;display: flex;justify-content: center">
                        <a onclick="$('#mobile-collapse').click()" href="#!">
                            <img style="max-width: 100%;max-height: 100%" class="img-fluid" src="{{ asset(Helper::settings()->logo) }}" alt="Logo Sistema">
                        </a>
                    </div>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid col-12">
                    <ul class="nav-left col-7">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                        <li id="setUnidadeFull" class="col-10 mt-1 d-flex align-items-center">
                            <span class="input-group-addon bg-primary" ><i class="fa fa-home mr-1" style="font-size: 20px"></i></span>
                            <meta name="_token" content="{{ csrf_token() }}">
                            <select onchange="setUnidade(this.value)" name="unidade_id" class="form-control col-3 mr-3" style="font-size: 14px">
                                <option value="">Selecione</option>
                                @foreach(Helper::getUnidades() as $unidade)
                                    <option value="{{$unidade}}">{{ Helper::getUnidadeTitle($unidade) }}</option>
                                @endforeach
                            </select>
                            <span class="">Unidade: <strong class="text-primary">{{ Helper::getUnidadeTitle(Session::get('unidade')) }}</strong></span>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li id="notifications"  class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div onclick="openNotification()"  id="qtdNotify" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                </div>
                                <ul id="notifyMobile" class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="overflow: auto;max-height: 65vh">
                                    <li>
                                        <h6>Notificações</h6>
                                    </li>
                                    <div id="bodyNotifications">
                                    </div>
                                    <a id="vermais-noti" onclick="clickLista()" class="text-center p-0">
                                        <h6>Ver mais</h6>
                                    </a>
                                </ul>
                            </div>
                        </li>
{{--                        <li class="header-notification">--}}
{{--                            <div class="dropdown-primary dropdown">--}}
{{--                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    <i class="feather icon-message-square"></i>--}}
{{--                                    <span class="badge bg-c-green">3</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="bg-c-primary m-0 p-0 show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <div class="bg-c-primary m-0 p-0 user-widget-card" style="border-radius: 5px 5px 0px 0px">
                                        <a class="m-0 p-0 text-white" href="{{ route('profile.edit') }}">
                                            <div class="card-block">
                                                <i id="statusUser" class="feather icon-user text-success bg-white card1-icon"></i>
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p>{{ Helper::getTitleFuncao(Auth::user()->funcao) }}</p>
                                            </div>
                                        </a>

                                    </div>
                                    <a class="m-0 p-0 text-white" id="profileButton" href="{{ route('profile.edit') }}">
                                        <li class="bg-c-primary">
                                            <i class="feather icon-user"></i> Perfil
                                        </li>
                                    </a>
                                    <a class="m-0 p-0 text-white" id="profileButton" href="{{ route('supports.indexuser') }}">
                                        <li class="bg-c-primary">
                                            <i class="feather icon-help-circle"></i> Suporte
                                        </li>
                                    </a>
                                    <form class="p-0 m-0" method="POST" action="{{ route('logout') }}" >
                                        @csrf
                                        <a class="p-0 m-0 text-white" id="logoutButton" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                            <li class="bg-c-primary" style="border-radius: 0px 0px 5px 5px">
                                                <i class="feather icon-log-out"></i>
                                                Sair
                                            </li>
                                        </a>
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">

                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->
                        <div id="setUnidadeMobile">
                            <div class="pcoded-navigatio-lavel">Unidade</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="d-flex align-items-center" style="margin-left: 20px">
                                    <span class="pcoded-micon"><i class="fa fa-home" style="font-size: 20px;color: {{ Helper::settings()->color_menu_icon }}"></i></span>
                                    <meta name="_token" content="{{ csrf_token() }}">
                                    <select onchange="setUnidade(this.value)" name="unidade_id" class="form-control col-10" style="border: none;font-size: 14px;background: {{ Helper::settings()->color_menu }};color: {{ Helper::settings()->color_menu_letter_active }}">
                                        @foreach(Helper::getUnidades() as $unidade)
                                            <option {{ Session::get('unidade') == $unidade ? 'selected' : null }} style="color: {{ Helper::settings()->color_menu_letter }}" value="{{$unidade}}">{{ Helper::getUnidadeTitle($unidade) }}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->

                        <div class="pcoded-navigatio-lavel">Home</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="@if(Request::url() == route('dashboard')) pcoded-trigger @endif">
                                <a href="{{ route('dashboard') }}">
                                    <span class="pcoded-micon"><i class="fa fa-bar-chart"></i></span>
                                    <span class="pcoded-mtext">Dashborad</span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu  @if(Request::segment(1) == 'clients') pcoded-trigger @endif">
                                <a href="javascript:void(0)" class="">
                                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                    <span class="pcoded-mtext">Clientes</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('clients.index')) active @endif">
                                        <a href="{{ route('clients.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                    <li class="@if(Request::url() == route('clients.create')) active @endif">
                                        <a href="{{ route('clients.create') }}">
                                            <span class="pcoded-mtext">Cadastro</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->
                        @if(Helper::requireFuncao(1))
                        <div class="pcoded-navigatio-lavel">Administração</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu  @if(Request::segment(1) == 'users') pcoded-trigger @endif">
                                <a href="javascript:void(0)" class="">
                                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                    <span class="pcoded-mtext">Usuarios</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('users.index')) active @endif">
                                        <a href="{{ route('users.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                    <li class="@if(Request::url() == route('users.create')) active @endif">
                                        <a href="{{ route('users.create') }}">
                                            <span class="pcoded-mtext">Cadastro</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::segment(1) == 'unidades') pcoded-trigger @endif">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Unidades</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('unidades.index')) active @endif">
                                        <a href="{{ route('unidades.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                    <li class="@if(Request::url() == route('unidades.create')) active @endif">
                                        <a href="{{ route('unidades.create') }}">
                                            <span class="pcoded-mtext">Cadastro</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::segment(1) == 'supports') pcoded-trigger @endif">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>
                                    <span class="pcoded-mtext">Suporte</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('supports.index')) active @endif">
                                        <a href="{{ route('supports.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::segment(1) == 'registers') pcoded-trigger @endif">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="icofont icofont-folder-open"></i></span>
                                    <span class="pcoded-mtext">Registros</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('registers.index')) active @endif">
                                        <a href="{{ route('registers.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu @if(Request::segment(1) == 'settings') pcoded-trigger @endif">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="icofont icofont-gear"></i></span>
                                    <span class="pcoded-mtext">Configurações</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="@if(Request::url() == route('settings.edit', 1)) active @endif">
                                        <a href="{{ route('settings.edit', 1) }}">
                                            <span class="pcoded-mtext">Tema</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->

                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">

                                    <!-- SLOTS DDA PAGINA -->
                                    {!! $slot !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('/files/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/i18next/js/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/pcoded.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/vartical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/bootstrap-growl.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/pages/notification/notification.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/new-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/notifications.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/websocket-notify.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/modalEffects.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/classie.js') }}?v=<?=hash('md5','123');?>"></script>

<script>
    //WebSocket
    var connectionWeb = new WebSocket('wss://' + window.location.hostname + ':8050');

    connectionWeb.onopen = function(e) {
        console.log("Connection established!");
    };

    connectionWeb.onmessage = function(e) {

        //OBTEM OS DADOS
        let data = JSON.parse(e.data)

        //VERIFICAÇÃO PARA SUPORTE CRIADO
        if(data.msg === 'support-create') {
            @if(Auth::user()->funcao == 1)

            //NOTIFICA OS ADMINS
            notifySupport('Novo Ticket de suporte ', '/supports/' + data.support);

            //ATUALIZA O NUMERO DE NOTIFICAÇÕES
            newsNotify();

            @endif
        }

        //VERIFICAÇÃO PARA SUPORTE RESPONDIDO PELO USUARIO
        if(data.msg === 'support-answer') {
            @if(Auth::user()->funcao == 1)

                //NOTIFICA OS ADMINS
                notifySupport('#' + data.support + ' Ticket de suporte respondido', '/supports/' + data.support);

                //ATUALIZA O NUMERO DE NOTIFICAÇÕES
                newsNotify();

            @endif
        }

        //VERIFICAÇÃO PARA SUPORTE RESPONDIDO PELO ADMIN
        if(data.msg === 'support-answer-{{ Auth::user()->id }}') {

            //NOTIFICA O USUARIO
            notifySupport('#' + data.support + ' Ticket de suporte respondido', '/supports/ticket/' + data.support);

            //ATUALIZA O NUMERO DE NOTIFICAÇÕES
            newsNotify();

        }
    };
    //WebSocket


</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<!-- SLOTS DE SCRIPTS -->
{{ $scripts }}

</body>

</html>
