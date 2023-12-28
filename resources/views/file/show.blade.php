<x-layout>
    <div class="container mx-auto p-8">
        <div class="border border-gray-700 rounded-lg p-6">
            <div class="mb-6">
                <p class="font-bold my-2">Owner: {{$file->user->name}}</p>
                <h1 class="text-3xl font-bold my-2">Title: {{ $file->title }}</h1>
                <p class="text-gray-400 mb-4">Description: {{ $file->description }}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="bg-gray-600 text-gray-200 px-2 py-1 rounded">{{$file->category->name}}</span>
                </div>
            </div>
            <p class="font-bold my-2"> Number of Downloads : {{$file->downloads_count}}</p>
            <form action="{{route('file.download', $file->id)}}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Download File</button>
            </form>
            @error('error')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-4 rounded" role="alert">
                    <span class="font-bold block sm:inline">{{$message}}</span>
                </div>
            @enderror
        </div>
    </div>
</x-layout>
