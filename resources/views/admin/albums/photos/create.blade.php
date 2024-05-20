<x-app-layout>
    <div class="p-6">
        <div class="text-gray-800 text-normal font-semibold leading-tight">
            <span class="text-gray-800 text-normal flex items-center gap-2 font-semibold leading-tight">
                @lang('admin.photo')
                <x-heroicon-m-arrow-small-right class="size-4" />
                @lang('admin.add')
            </span>
        </div>
        <div class="mt-6">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8" style="text-align: -webkit-center">
                    <div class="max-w-4xl text-start">
                        <form action="{{ route('admin.photos.store') }}" method="POST" class="needs-validation"
                            novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="mb-3 max-w-xs">
                                    <x-input-label for="album_id" :value="__('Album')" />
                                    <select name="album_id" required @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('album_id'),
                                        'w-full',
                                    ])>
                                        <option value="">Select Album</option>
                                        @foreach ($albums as $album)
                                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 max-w-xs">
                                    <x-input-label for="name" :value="__('Title')" />
                                    <input type="text" name="name" placeholder="title photo..."
                                        @class([
                                            'input',
                                            'input-bordered',
                                            'input-error' => $errors->has('name'),
                                            'w-full',
                                            'max-w-xs',
                                        ]) />
                                </div>

                                <div class="row mb-3">
                                    <label for="content">@lang('admin.content')</label>
                                    <x-admin.forms.rich-text id="content" name="content" model="photo"
                                        :value="old('content')" />
                                </div>

                                <div class="flex items-center space-x-6">
                                    <div class="shrink-0">
                                        <img id="preview_img" class="h-16 w-16 rounded-full object-cover"
                                            src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c"
                                            alt="Current photo" />
                                    </div>
                                    <label class="block">
                                        <span class="sr-only">Choose photo</span>
                                        <input type="file" name="image" onchange="loadFile(event)"
                                            class="file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:px-4 file:py-2 file:text-sm file:font-semibold" />
                                    </label>
                                </div>
                                <script>
                                    var loadFile = function(event) {
                                        var input = event.target
                                        var file = input.files[0]
                                        var type = file.type

                                        var output = document.getElementById('preview_img')

                                        output.src = URL.createObjectURL(event.target.files[0])
                                        output.onload = function() {
                                            URL.revokeObjectURL(output.src)
                                        }
                                    }
                                </script>
                            </div>
                            <div>
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
    </div>
</x-app-layout>
