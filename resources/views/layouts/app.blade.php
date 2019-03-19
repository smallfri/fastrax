<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multi-Level Menu - Demo 1</title>
    <meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects"/>
    <meta name="keywords"
          content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery"/>
    <meta name="author" content="Codrops"/>

    <!--Pages Links-->
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/default.css"/>
    <link rel="stylesheet" type="text/css" href="/css/component.css"/>
    <script src="/js/modernizr.custom.js"></script>

    <!--jQuery-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!--Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!--Datatables -->
    <link href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!--Fonts-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!--Sidebar menu-->
    <script src="/js/jquery.dlmenu.js"></script>
    <script>
        $(function () {
            $('#dl-menu').dlmenu();
        });
    </script>
    <?php use Khill\FontAwesome\FontAwesome;?>
    {!! FontAwesome::css()  !!}



</head>
@include('layouts.navbar')
@include('layouts.sidebar')
@include('flash-message')
<div class="container">
    @yield('content')
</div>