<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estatísticas da URL {{$url->shorten_url}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="app">
        <stats></stats>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
