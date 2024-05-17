<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-800 text-xl font-semibold leading-tight">
            @lang('admin.videos')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8" style="text-align: -webkit-center;">
                    <div class="max-w-4xl text-start">
                        <form action="{{ route('admin.videos.update', ['video' => $video->id]) }}" method="POST"
                            class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3 flex w-full">
                                <div class="mb-3 max-w-xs w-full mr-12">
                                    <x-input-label for="album_id" :value="__('Album')" />
                                    <select name="album_id" required @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('album_id'),
                                        'w-full',
                                    ])>
                                        <option value="">Select Album</option>
                                        @foreach ($albums as $album)
                                            <option value="{{ $album->id }}"
                                                {{ $video->album_id == $album->id ? 'selected' : '' }}>
                                                {{ $album->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 max-w-xs w-full">
                                    <x-input-label for="name" :value="__('Title')" />
                                    <input type="text" name="name" value="{{ old('name', $video->name) }}"
                                        placeholder="title video..." @class([
                                            'input',
                                            'input-bordered',
                                            'input-error' => $errors->has('name'),
                                            'w-full',
                                            'max-w-xs',
                                        ]) />
                                </div>
                            </div>
                            <div class="row mb-3 flex w-full">
                                <div class="mb-3 max-w-xs w-full mr-12">
                                    <x-input-label for="source" :value="__('Source')" />
                                    <select name="source" required @class([
                                        'input',
                                        'input-bordered',
                                        'input-error' => $errors->has('source'),
                                        'w-full',
                                    ])>
                                        @foreach (App\Enums\VideoSourceEnum::cases() as $source)
                                            <option value="{{ $source->value }}"
                                                {{ $video->source == $source ? 'selected' : '' }}>{{ $source->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 max-w-xs w-full">
                                    <x-input-label for="video_id" :value="__('VideoID')" />
                                    <input type="text" name="video_id"
                                        value="{{ old('video_id', $video->video_id) }}" placeholder="put on video ID..."
                                        @class([
                                            'input',
                                            'input-bordered',
                                            'input-error' => $errors->has('video_id'),
                                            'w-full',
                                            'max-w-xs',
                                        ]) />
                                </div>

                            </div>
                            <div>
                                <a href="{{ route('admin.videos.index') }}" class="btn btn-light">@lang('admin.btn.cancel')</a>
                                <button type="submit" class="btn btn-success ml-2">@lang('admin.btn.submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>