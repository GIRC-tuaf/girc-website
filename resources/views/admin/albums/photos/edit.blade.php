<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-800 text-xl font-semibold leading-tight">
            @lang('admin.photos')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8" style="text-align: -webkit-center;">
                    <div class="max-w-4xl text-start">
                        <form action="{{ route('admin.photos.update', ['photo' => $photo->id]) }}" method="POST"
                            class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row mb-3">
                                <div class="mb-3 max-w-xs">
                                    <x-input-label for="album_id" :value="__('Album')" />
                                    <select name="album_id" required @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('album_id'),
                                        'w-full',
                                    ])>
                                        @foreach ($albums as $album)
                                            <option value="{{ $album->id }}"
                                                {{ $photo->album_id == $album->id ? 'selected' : '' }}>
                                                {{ $album->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 max-w-xs">
                                    <x-input-label for="name" :value="__('Title')" />
                                    <input type="text" name="name" value="{{ old('name', $photo->name) }}" 
                                        placeholder="title photo..." @class([
                                            'input',
                                            'input-bordered',
                                            'input-error' => $errors->has('name'),
                                            'w-full',
                                            'max-w-xs',
                                        ]) />
                                </div>

                                <div class="row mb-3">
                                    <label for="content">@lang('admin.description')</label>
                                    <x-trix-input name="content" id="content" value="{!! old('content', $photo->content) !!}"/>
                                    <x-rich-text::styles />
                                    <style>
                                        trix-editor {
                                            min-height: 240px;
                                        }
                                    </style>

                                </div>

                                <div class="flex items-center space-x-6">
                                    <div class="shrink-0">
                                        <img id="preview_img" class="h-16 w-16 rounded-full object-cover"
                                            src="{{ $photo->getFirstMedia('album_photo')->getUrl('thumb') }}"
                                            alt="{{ $photo->getFirstMedia('album_photo')->name }}" />
                                    </div>
                                    <label class="block">
                                        <span class="sr-only">Choose photo</span>
                                        <div class="input input-bordered flex items-center gap-2 border px-3 py-2">
                                            File:
                                            <span
                                                id="selected_file_name">{{ $photo->getFirstMedia('album_photo')->name }}</span>
                                        </div>
    
                                        <input class="hidden" type="file" name="image" onchange="loadFile(event)"
                                            class="file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:px-4 file:py-2 file:text-sm file:font-semibold" />
                                    </label>
                                </div>
                                <script>
                                    var loadFile = function(event) {
                                        var input = event.target
                                        var file = input.files[0]
                                        var type = file.type
    
                                        var output = document.getElementById('preview_img')
                                        var fileNameSpan = document.getElementById('selected_file_name')
    
                                        output.src = URL.createObjectURL(event.target.files[0])
                                        output.onload = function() {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
    
                                        fileNameSpan.innerText = file.name
                                    }
                                </script>
                            </div>
                            <div>
                                <a href="{{ route('admin.photos.index') }}" class="btn btn-light">@lang('admin.btn.cancel')</a>
                                <button type="submit" class="btn btn-success ml-2">@lang('admin.btn.submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>