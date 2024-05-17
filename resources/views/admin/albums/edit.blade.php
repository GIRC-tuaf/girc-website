<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-800 text-xl font-semibold leading-tight">
            @lang('admin.albums')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8" style="text-align: -webkit-center;">
                    <div class="max-w-xl  text-start">
                        <form action="{{ route('admin.albums.update', ['album' => $album->id]) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('patch')

                            <div class="row mb-3">
                                <x-input-label for="name" :value="__('Name')" />
                                <input type="text" name="name" placeholder="Type here"
                                    value="{{ old('name', $album->name) }}" @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('name'),
                                        'w-full',
                                        'max-w-xs',
                                    ]) />
                            </div>

                            <div class="mb-3 max-w-xs">
                                <x-input-label for="type" :value="__('Type')" />
                                <select name="type" required @class([
                                    'input',
                                    'input-bordered',
                                    'input-error' => $errors->has('type'),
                                    'w-full',
                                ])>
                                    <option value="video" {{ $album->type == 'video' ? 'selected' : '' }}>Video</option>
                                    <option value="photo" {{ $album->type == 'photo' ? 'selected' : '' }}>Photo</option>
                                </select>
                            </div>
                            <div>
                                <a href="{{ route('admin.albums.index') }}" class="btn btn-light">@lang('admin.btn.cancel')</a>
                                <button type="submit" class="btn btn-success ml-2">@lang('admin.btn.submit')</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>