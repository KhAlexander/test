<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    {{ Html::style('/bootstrap/css/bootstrap.min.css') }}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{ Html::style('/css/ie10-viewport-bug-workaround.css') }}

    <!-- Custom styles for this template -->
    {{ Html::style('/css/starter-template.css') }}


    <!-- Подключчение дополниетльных файлов стилей -->
    @if(isset($style_files))
        @foreach($style_files as $file)
            {!! Html::style($file) !!}
        @endforeach
    @endif

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>{{ Html::script('/public/js/ie8-responsive-file-warning.js') }}<![endif]-->
    {{ Html::script('/js/ie-emulation-modes-warning.js') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Тестоваое задание</a>
        </div>
    </div>
</nav>

<div class="container">

@yield('content')

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
{{ Html::script('/bootstrap/js/bootstrap.min.js') }}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ Html::script('/js/ie10-viewport-bug-workaround.js') }}

<!-- Подключение дополниетльных библиотек javascript -->
@if(isset($script_files))
    @foreach($script_files as $file)
        {!! Html::script( url($file) ) !!}
    @endforeach
@endif

@yield('javaScriptBlock')

</body>
</html>
