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

        /* MENU TITTLE */
        .pcoded .pcoded-navbar .pcoded-navigatio-lavel[menu-title-theme=theme5] {
            color: {{ Helper::settings()->color_menu_tittle }}!important;
        }
        /* MENU TITTLE */

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
                        <li class="">
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                        <li id="setUnidadeFull" class="col-10 mt-1 d-flex align-items-center">
                            <span class="input-group-addon bg-primary" ><i class="fa fa-home mr-1" style="font-size: 20px"></i></span>
                            <meta name="_token" content="{{ csrf_token() }}">
                            <select onchange="setUnidade(this.value)" name="unidade" class="form-control col-3 mr-3" style="font-size: 14px">
                                <option value="">Selecione</option>
                                @foreach(Helper::getUnidades() as $unidade)
                                    <option value="{{$unidade}}">{{ Helper::getUnidadeTittle($unidade) }}</option>
                                @endforeach
                            </select>
                            <span class="">Unidade: <strong class="text-primary">{{ Helper::getUnidadeTittle(Session::get('unidade')) }}</strong></span>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-pink">5</span>
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <span class="badge bg-c-green">3</span>
                                </div>
                            </div>
                        </li>
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
                                                <p>{{ Helper::getTittleFuncao(Auth::user()->funcao) }}</p>
                                            </div>
                                        </a>

                                    </div>
                                    <a class="m-0 p-0 text-white" id="profileButton" href="{{ route('profile.edit') }}">
                                        <li class="bg-c-primary">
                                            <i class="feather icon-user"></i> Perfil
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

        <!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                            <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image ">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Josephin Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Lary Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alice</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alia</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Suzen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat start-->
        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
                    <i class="feather icon-chevron-left"></i> Josephin Doe
                </a>
            </div>
            <div class="media chat-messages">
                <a class="media-left photo-table" href="#!">
                    <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                </a>
                <div class="media-body chat-menu-content">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
            <div class="media chat-messages">
                <div class="media-body chat-menu-reply">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media-right photo-table">
                    <a href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                    </a>
                </div>
            </div>
            <div class="chat-reply-box p-b-20">
                <div class="right-icon-control">
                    <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                    <div class="form-icon">
                        <i class="feather icon-navigation"></i>
                    </div>
                </div>
            </div>
        </div>
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
                                    <select onchange="setUnidade(this.value)" name="unidade" class="form-control col-10" style="border: none;font-size: 14px;background: {{ Helper::settings()->color_menu }};color: {{ Helper::settings()->color_menu_letter_active }}">
                                        @foreach(Helper::getUnidades() as $unidade)
                                            <option {{ Session::get('unidade') == $unidade ? 'selected' : null }} style="color: {{ Helper::settings()->color_menu_letter }}" value="{{$unidade}}">{{ Helper::getUnidadeTittle($unidade) }}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->

                        <div class="pcoded-navigatio-lavel">Home</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li id="{{ route('dashboard') }}">
                                <a href="{{ route('dashboard') }}">
                                    <span class="pcoded-micon"><i class="fa fa-bar-chart"></i></span>
                                    <span class="pcoded-mtext">Dashborads</span>
                                </a>
                            </li>
                        </ul>

                        <!-- FUNÇÃO MASTER PARA ACESSAR PAINEL -->
                        @if(Helper::requireFuncao(1))
                        <div class="pcoded-navigatio-lavel">Administração</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                    <span class="pcoded-mtext">Usuarios</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li id="{{ route('users.index') }}">
                                        <a href="{{ route('users.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                    <li id="{{ route('users.create') }}">
                                        <a href="{{ route('users.create') }}">
                                            <span class="pcoded-mtext">Cadastro</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Unidades</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li id="{{ route('unidades.index') }}">
                                        <a href="{{ route('unidades.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                    <li id="{{ route('unidades.create') }}">
                                        <a href="{{ route('unidades.create') }}">
                                            <span class="pcoded-mtext">Cadastro</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="icofont icofont-folder-open"></i></span>
                                    <span class="pcoded-mtext">Registros</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li id="{{ route('registers.index') }}">
                                        <a href="{{ route('registers.index') }}">
                                            <span class="pcoded-mtext">Painel</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="icofont icofont-gear"></i></span>
                                    <span class="pcoded-mtext">Configurações</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li id="{{ route('settings.edit', 1) }}">
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
<script type="text/javascript" src="{{ asset('/js/new-scripts.js') }}"></script>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
