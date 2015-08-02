<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
		
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
		<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">@yield('content')</div>
            </div>
        </div>
    </body>
</html>