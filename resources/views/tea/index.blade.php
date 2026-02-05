<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tea List</h1>
     <a href="/homepage/{{ $user->id }}/create">Add New Tea</a>
    <ul>
        @foreach ($teas as $tea)
            <li>{{ $tea->tea_name }}</li>
        @endforeach
    </ul>
   
</body>
</html>