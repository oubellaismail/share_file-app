<x-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Manage Files</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($files as $file)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{route('file.show', $file->id)}}">
                            {{$file->title}}    
                        </a> 
                    </h2>
                    <p>Description: {{$file->description}}</p>
                    <div class="flex justify-between mt-4">
                        <form action="{{route('file.delete',  $file->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </form>
                        @if(auth()->user()->id == $file->user->id)
                            <a href="{{route('file.edit', $file->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
