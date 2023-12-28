<x-layout>
    <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold mb-4">Files</h1>
            <div class="flex justify-end mb-4">
                <a href="{{route('file.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New File</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($files as $file)
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <a href="/file/show/{{$file->id}}">
                            <h2 class="text-xl font-bold mb-2">{{$file->title}}</h2>
                        </a>
                        <p>Description : {{$file->description}}</p>
                        <p>Owner : {{$file->user->name}}</p>
                        <br>
                        <a href="/?category={{$file->category->id}}" class="bg-gray-600 text-gray-200 px-2 py-1 rounded">{{$file->category->name}}</a>
                    </div>
                @endforeach
            </div>
    </div>
</x-layout>