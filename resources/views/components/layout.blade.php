<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/tea.css')
    <script src="resources/js/tea.js"></script>
    <title>{{ $title ?? "Tēju saraksts" }}</title>
</head>
<body>
  <x-navigation></x-navigation>
  {{ $slot }}
  
</body>
</html>