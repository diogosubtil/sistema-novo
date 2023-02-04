<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Gestão</title>
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
        <link rel="icon" href="{{ asset('/files/assets/images/favicon.ico') }}" type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/new-styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/icofont/css/icofont.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/feather/css/feather.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/scss/partials/menu/_pcmenu.htm') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/switchery/css/switchery.min.css') }}">
    </head>
    <body class="bg-primary" _c_t_common="1" cz-shortcut-listen="true">
        {{ $slot }}
    </body>
</html>
