<!DOCTYPE html>
<html>

<head>
    <title>Dial Pad App</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="app">
        <example-component></example-component>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
