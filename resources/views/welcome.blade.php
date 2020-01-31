<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{var_dump($trating)}}
    <br>
    <br>
    {{var_dump($data)}}
    <br>
    <br>
    @foreach($tview as $t)
        {{var_dump($t->rating)}}
        <br>
    @endforeach
</body>
</html>