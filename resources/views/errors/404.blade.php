<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIEVDEV | 404 Error</title>
    {{ Html::style('admin/css/all.css') }}
</head>
<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">Page Not Found</h3>
        <div class="error-desc">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser.
        </div>
        <br>
        <div class="row">
        <a class="btn btn-lg btn-primary" href="/adm">Go to dashboard
        </a>
        </div>
    </div>
    <!-- Mainly scripts -->
    {{ Html::script('admin/js/jquery-2.1.1.js') }}
    {{ Html::script('admin/js/bootstrap.min.js') }}
</body>
</html>
