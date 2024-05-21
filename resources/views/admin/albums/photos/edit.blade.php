<x-app-layout>
    <div class="p-6">
        <div class="text-gray-800 text-normal font-semibold leading-tight">
            <span class="text-gray-800 text-normal flex items-center gap-2 font-semibold leading-tight">
                @lang('admin.photo')
                <x-heroicon-m-arrow-small-right class="size-4" />
                @lang('admin.edit')
            </span>
        </div>
        <div class="mt-6">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white px-8 pb-8 pt-0 shadow sm:rounded-lg">
                    <form action="{{ route('admin.photos.update', ['photo' => $photo->id]) }}" method="POST"
                        class="space-y-4 needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <label class="form-control w-full">
                            <div class="label" for="album_id">
                                <span class="label-text">@lang('admin.album')</span>
                            </div>
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
                        </label>
                        <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">@lang('admin.post.title')</span>
                                    </div>
                                    <input type="text" name="name" value="{{ old('name', $photo->name) }}"
                                    placeholder="title photo..." @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('name'),
                                        'w-full',
                                    ]) />
                                </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('admin.content')</span>
                            </div>
                            <textarea name="content" id="content" class="hidden">
                                {!! $photo->content !!}
                            </textarea>
                        </label>
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
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('admin.photos.index') }}" class="btn-light btn">@lang('admin.btn.cancel')
                            </a>
                            <button type="submit" class="btn btn-success ml-2">
                                @lang('admin.btn.submit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @pushonce('bottom_scripts')
        <x-admin.forms.tinymce-config column="content"/>
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
    @endpushonce
</x-app-layout>
