<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show File</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">{{ $file->title }}</h1>
        <p class="mb-4">{{ $file->description }}</p>
        <p class="mb-4">Downloads: {{ $file->downloads_count }}</p>
        <form action="{{route('file.download', $file->id)}}" method="post">
            @csrf
            @method('PUT')
            <button type="submit">download File</button>
        </form>

    </div>
</body>
</html>
