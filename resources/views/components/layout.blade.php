<html lang="en">
<title>Sistema de Gestão</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="#">
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="#">

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="icon" href="https://demo.dashboardpack.com/adminty-html/files/assets/images/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('/css/feather.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('/css/icofont.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/switchery.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-tagsinput.css') }}">


<style type="text/css">/* Chart.js */
    /*
     * DOM element rendering detection
     * https://davidwalsh.name/detect-node-insertion
     */

    #profileButton:hover, #logoutButton:hover {
        color: silver!important;
    }


    @media (min-width: 800px) {

        #userUnidade {
            border-left:1px solid #e5e7eb
        }

        #userDivider {
            display: none;
        }
    }

    @keyframes chartjs-render-animation {
        from { opacity: 0.99; }
        to { opacity: 1; }
    }

    .chartjs-render-monitor {
        animation: chartjs-render-animation 0.001s;
    }

    /*
     * DOM element resizing detection
     * https://github.com/marcj/css-element-queries
     */
    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
        position: absolute;
        direction: ltr;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        pointer-events: none;
        visibility: hidden;
        z-index: -1;
    }

    .chartjs-size-monitor-expand > div {
        position: absolute;
        width: 1000000px;
        height: 1000000px;
        left: 0;
        top: 0;
    }

    .chartjs-size-monitor-shrink > div {
        position: absolute;
        width: 200%;
        height: 200%;
        left: 0;
        top: 0;
    }
</style>
<style type="text/css">.vue-notification-group{display:block;position:fixed;z-index:5000}.vue-notification-wrapper{display:block;overflow:hidden;width:100%;margin:0;padding:0}.notification-title{font-weight:600}.vue-notification-template{background:#fff}.vue-notification,.vue-notification-template{display:block;box-sizing:border-box;text-align:left}.vue-notification{font-size:12px;padding:10px;margin:0 5px 5px;color:#fff;background:#44a4fc;border-left:5px solid #187fe7}.vue-notification.warn{background:#ffb648;border-left-color:#f48a06}.vue-notification.error{background:#e54d42;border-left-color:#b82e24}.vue-notification.success{background:#68cd86;border-left-color:#42a85f}.vn-fade-enter-active,.vn-fade-leave-active,.vn-fade-move{transition:all .5s}.vn-fade-enter,.vn-fade-leave-to{opacity:0}
</style>
<body themebg-pattern="pattern4"cz-shortcut-listen="true">

<!-- SWEET ALERT -->
@include('sweetalert::alert')
<!-- SWEET ALERT -->

<div id="pcoded" class="pcoded iscollapsed" nav-type="st6" theme-layout="vertical" vertical-placement="left" vertical-layout="wide" pcoded-device-type="desktop" vertical-nav-type="expanded" vertical-effect="shrink" vnavigation-view="view1" fream-type="theme1" sidebar-img="false" sidebar-img-type="img1" layout-type="light">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header iscollapsed" header-theme="theme1" pcoded-header-position="fixed">

            <div class="navbar-wrapper">
                <div class="navbar-logo" logo-theme="theme1">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-toggle-right"></i>
                    </a>
                    <a href="{{ route('dashboard') }}">
                        <img class="img-fluid" src="{{ asset('/img/logo.png') }}" alt="Theme-Logo">
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
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
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('/img/avatar.png') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('/img/avatar2.png') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('/img/avatar3.png') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
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
                                <ul class="m-0 p-0  show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <div class="m-0 p-0  user-widget-card bg-c-blue">
                                        <div class="card-block">
                                            <i id="statusUser" class="feather icon-user bg-success card1-icon"></i>
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p>Master</p>
                                        </div>
                                    </div>
                                    <a class="bg-c-blue m-0 p-0 text-white" id="profileButton" href="{{ route('profile.edit') }}">
                                        <li class="bg-c-blue">
                                            <i class="feather icon-user"></i> Perfil
                                        </li>
                                    </a>
                                    <form class="p-0 m-0" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="p-0 m-0 text-white" id="logoutButton" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                            <li class="bg-c-blue">
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
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 857px;"><div class="main-friend-list" style="overflow: hidden; width: auto; height: 857px;">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="" data-original-title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="{{ asset('/img/avatar.png') }}" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="" data-original-title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="{{ asset('/img/avatar2.png') }}" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="" data-original-title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="{{ asset('/img/avatar3.png') }}" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="" data-original-title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="{{ asset('/img/avatar4.png') }}" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="" data-original-title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="{{ asset('/img/avatar5.png') }}" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div><div class="slimScrollBar" style="background: rgb(27, 139, 249); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
                    <i class="feather icon-chevron-left"></i> Josephin Doe
                </a>
            </div>
            <div class="media chat-messages">
                <a class="media-left photo-table" href="#!">
                    <img class="media-object img-radius img-radius m-t-5" src="{{ asset('/img/avatar3.png') }}" alt="Generic placeholder image">
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
                        <img class="media-object img-radius img-radius m-t-5" src="{{ asset('/img/avatar4.png') }}" alt="Generic placeholder image">
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

        <div class="pcoded-main-container" style="margin-top: 56px;">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar" navbar-theme="theme1" active-item-theme="theme1" sub-item-theme="theme2" active-item-style="style0" pcoded-navbar-position="absolute">
                    <div class="pcoded-inner-navbar main-menu mCustomScrollbar _mCS_1" id="" style="height: calc(100% - 80px);">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical_horizontal mCSB_inside" style="max-height: none;" tabindex="0">
                            <div id="mCSB_1_container_wrapper" class="mCSB_container_wrapper mCS_x_hidden mCS_no_scrollbar_x">
                                <div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 100%;" dir="ltr">
                                    <ul class="pcoded-item active pcoded-left-item mt-3" item-border="true" item-border-style="none" subitem-border="true">
                                        <li class="active" dropdown-icon="style1" subitem-icon="style1">
                                            <a href="{{ route('dashboard') }}">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="">Dashboard</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="pcoded-navigatio-lavel" menu-title-theme="theme5">Agendamentos</div>
                                    <ul class="pcoded-item active pcoded-left-item mt-3" item-border="true" item-border-style="none" subitem-border="true">
                                        <li dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled" href="{{ route('dashboard') }}">
                                                <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                                <span class="">Calendario</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled" href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                                                <span class="pcoded-mtext">Agendamento</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li>
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Painel</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Cadastrar</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Analytics</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled"  href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                                <span class="pcoded-mtext">Relatorios</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                    <a href="javascript:void(0)">
                                                        <span class="pcoded-mtext">Diarios</span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Depilação</span>
                                                            </a>
                                                        </li>
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Estetica</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                    <a href="javascript:void(0)">
                                                        <span class="pcoded-mtext">Mensal</span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Depilação</span>
                                                            </a>
                                                        </li>
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Estetica</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="pcoded-navigatio-lavel" menu-title-theme="theme5">Vendas</div>
                                    <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled"   href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                                                <span class="pcoded-mtext">Venda</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Painel</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Cadastrar</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Analytics</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled"   href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                                <span class="pcoded-mtext">Relatorios</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                    <a href="javascript:void(0)">
                                                        <span class="pcoded-mtext">Diarios</span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Depilação</span>
                                                            </a>
                                                        </li>
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Estetica</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                    <a href="javascript:void(0)">
                                                        <span class="pcoded-mtext">Mensal</span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Depilação</span>
                                                            </a>
                                                        </li>
                                                        <li class=" ">
                                                            <a href="#">
                                                                <span class="pcoded-mtext">Estetica</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="pcoded-navigatio-lavel" menu-title-theme="theme5">Administração</div>
                                    <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                                <span class="pcoded-mtext">Usuarios</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="{{ route('users.index') }}">
                                                        <span class="pcoded-mtext">Painel</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="{{ route('users.create') }}">
                                                        <span class="pcoded-mtext">Cadastro</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                            <a class="disabled" href="javascript:void(0)">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="pcoded-mtext">Unidades</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Painel</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="#">
                                                        <span class="pcoded-mtext">Cadastro</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 216px; max-height: 760px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                        </div>
                                    </div>
                                    <div class="mCSB_draggerRail">
                                    </div>
                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_horizontal" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_horizontal" style="display: none;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 30px; width: 0px; left: 0px;">
                                        <div class="mCSB_dragger_bar">
                                        </div>
                                    </div>
                                    <div class="mCSB_draggerRail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    {{ $slot }}
                                </div>
                            </div>
{{--                            <div id="styleSelector">--}}
{{--                                <div class="selector-toggle"><a href="javascript:void(0)"></a></div><ul><li><p class="selector-title main-title st-main-title"><b>Adminty </b>Customizer</p><span class="text-muted">Live customizer with tons of options</span></li><li><p class="selector-title">Main layouts</p></li><li><div class="theme-color"><a href="#" class="navbar-theme" navbar-theme="themelight1"><span class="head"></span><span class="cont"></span></a><a href="#" class="navbar-theme" navbar-theme="theme1"><span class="head"></span><span class="cont"></span></a></div></li></ul><div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 440px);"><div class="style-cont m-t-10" style="overflow: hidden; width: auto; height: calc(100vh - 440px);"><ul class="nav nav-tabs  tabs" role="tablist"><li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#sel-layout" role="tab">Layouts</a></li><li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sel-sidebar-setting" role="tab">Sidebar Settings</a></li></ul><div class="tab-content tabs"><div class="tab-pane active" id="sel-layout" role="tabpanel"><ul><li class="theme-option"><div class="checkbox-fade fade-in-primary"><label><input type="checkbox" value="false" id="sidebar-position" name="sidebar-position" checked=""><span class="cr"><i class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed Sidebar Position</span></label></div></li><li class="theme-option"><div class="checkbox-fade fade-in-primary"><label><input type="checkbox" value="false" id="header-position" name="header-position" checked=""><span class="cr"><i class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed Header Position</span></label></div></li></ul></div><div class="tab-pane" id="sel-sidebar-setting" role="tabpanel"><ul><li class="theme-option"><p class="sub-title drp-title">Menu Type</p><div class="form-radio" id="menu-effect"><div class="radio radio-inverse radio-inline" data-toggle="tooltip" title="" data-original-title="simple icon"><label><input type="radio" name="radio" value="st6" onclick="handlemenutype(this.value)" checked="true"><i class="helper"></i><span class="micon st6"><i class="feather icon-command"></i></span></label></div><div class="radio  radio-primary radio-inline" data-toggle="tooltip" title="" data-original-title="color icon"><label><input type="radio" name="radio" value="st5" onclick="handlemenutype(this.value)"><i class="helper"></i><span class="micon st5"><i class="feather icon-command"></i></span></label></div></div></li><li class="theme-option"><p class="sub-title drp-title">SideBar Effect</p><select id="vertical-menu-effect" class="form-control minimal"><option name="vertical-menu-effect" value="shrink">shrink</option><option name="vertical-menu-effect" value="overlay">overlay</option><option name="vertical-menu-effect" value="push">Push</option></select></li><li class="theme-option"><p class="sub-title drp-title">Hide/Show Border</p><select id="vertical-border-style" class="form-control minimal"><option name="vertical-border-style" value="solid">Style 1</option><option name="vertical-border-style" value="dotted">Style 2</option><option name="vertical-border-style" value="dashed">Style 3</option><option name="vertical-border-style" value="none">No Border</option></select></li><li class="theme-option"><p class="sub-title drp-title">Drop-Down Icon</p><select id="vertical-dropdown-icon" class="form-control minimal"><option name="vertical-dropdown-icon" value="style1">Style 1</option><option name="vertical-dropdown-icon" value="style2">style 2</option><option name="vertical-dropdown-icon" value="style3">style 3</option></select></li><li class="theme-option"><p class="sub-title drp-title">Sub Menu Drop-down Icon</p><select id="vertical-subitem-icon" class="form-control minimal"><option name="vertical-subitem-icon" value="style1">Style 1</option><option name="vertical-subitem-icon" value="style2">style 2</option><option name="vertical-subitem-icon" value="style3">style 3</option><option name="vertical-subitem-icon" value="style4">style 4</option><option name="vertical-subitem-icon" value="style5">style 5</option><option name="vertical-subitem-icon" value="style6">style 6</option></select></li></ul></div><ul><li><p class="selector-title">Header Brand color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="logo-theme" logo-theme="theme1"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme2"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme3"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme4"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme5"><span class="head"></span><span class="cont"></span></a></div></li><li><p class="selector-title">Header color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="header-theme" header-theme="theme1"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme2"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme3"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme4"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme5"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme6"><span class="head"></span><span class="cont"></span></a></div></li><li><p class="selector-title">Active link color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="active-item-theme small" active-item-theme="theme1">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme2">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme3">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme4">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme5">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme6">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme7">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme8">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme9">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme10">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme11">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme12">&nbsp;</a></div></li><li><p class="selector-title">Menu Caption Color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="leftheader-theme small" lheader-theme="theme1">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme2">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme3">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme4">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme5">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme6">&nbsp;</a></div></li></ul></div></div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 438.737px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div><ul><li><a href="http://html.codedthemes.com/Adminty/doc" target="_blank" class="btn btn-primary btn-block m-r-15 m-t-5 m-b-10">Online Documentation</a></li><li class="text-center"><span class="text-center f-18 m-t-15 m-b-15 d-block">Thank you for sharing !</span><a href="#!" target="_blank" class="btn btn-facebook soc-icon m-b-20"><i class="feather icon-facebook"></i></a><a href="#!" target="_blank" class="btn btn-twitter soc-icon m-l-20 m-b-20"><i class="feather icon-twitter"></i></a></li></ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/jquery.slimscroll.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/css-scrollbars.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/Chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/custom-dashboard.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/amcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/serial.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/light.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/switchery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/dist/js/SmoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/pcoded.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/vartical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/analytic-dashboard.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/inputmask.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.inputmask.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/form-mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/autoNumeric.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/bootstrap-tagsinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-maxlength.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-i18next.min.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/swithces.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/newScripts.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

