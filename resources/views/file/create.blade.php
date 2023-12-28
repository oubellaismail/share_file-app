<x-layout>
    <div class="bg-gray-900 text-white flex justify-center items-center mt-24">
        <div class="bg-gray-800 rounded-lg p-6 w-full max-w-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Add File</h1>
            <form method="POST" action="{{$file ? route('file.update', $file->id) : route('file.store')}}" enctype="multipart/form-data">
                @csrf
    
                @if ($file)
                    @method('PUT')
                @endif
    
                <div class="mb-4">
                    <label for="title" class="block mb-2 font-bold text-gray-300">Title</label>
                    <input id="title" type="text" class="form-input w-full bg-gray-700 text-gray-100 rounded-md p-2" name="title" value="{{$file ? $file->title :  @old('title')}}" required>
                </div>
    
                <div class="mb-4">
                    <label for="description" class="block mb-2 font-bold text-gray-300">Description</label>
                    <textarea id="description" class="form-textarea w-full bg-gray-700 text-gray-100 rounded-md p-2" name="description" rows="4" required>
                        {{$file ? $file->description :  @old('description')}}
                    </textarea>
                </div>
    
                <div class="mb-4">
                    <label for="file" class="block mb-2 font-bold text-gray-300">File</label>
                    <input id="file" type="file" class="form-input w-full bg-gray-700 text-gray-100 rounded-md p-2" name="file" required>
                </div>
    
    <div class="mb-4">
        <label for="category_id" class="block mb-2 font-bold text-gray-300">Category:</label>
        <select id="category_id" name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3  text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{$file ? 'Update ' :  'Add '}} File</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
