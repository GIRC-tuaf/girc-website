<x-app-layout>
    <div class="p-6">
        <div class="text-normal font-semibold leading-tight text-gray-800">
            <span class="text-normal flex items-center gap-2 font-semibold leading-tight text-gray-800">
                @lang('admin.science_information')
                <x-heroicon-m-arrow-small-right class="size-4" />
                @lang('admin.add')
            </span>
        </div>
        <x-admin.alerts.error />
        <div class="mt-6">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white px-8 pb-8 pt-0 shadow sm:rounded-lg">
                    <form action="{{ route('admin.science-information.store') }}" method="POST" class="needs-validation space-y-4" novalidate enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <div class="flex gap-4">
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">@lang('admin.post.published_at')</span>
                                </div>
                                <x-admin.forms.calendar name="published_at" value="{{ old('published_at') }}" />
                            </label>
                        </div>

                        <div class="flex gap-4">
                            <label class="form-control w-full">
                                <span class="label">
                                    <span class="label-text">@lang('admin.post.title')</span>
                                </span>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="title" @class([
                                    'input',
                                    'input-bordered',
                                    'input-error' => $errors->has('title'),
                                    'w-full',
                                ]) />
                            </label>
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">@lang('admin.science_information.title_en')</span>
                                </div>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Title english(if have)" @class([
                                    'input',
                                    'input-bordered',
                                    'input-error' => $errors->has('title_en'),
                                    'w-full',
                                ]) />
                            </label>

                        </div>

                        <label class="form-control w-full">
                            <span class="label">
                                <span class="label-text">@lang('admin.content')</span>
                            </span>
                            <textarea name="content" id="content" class="hidden">
                                {{ old('content') }}
                            </textarea>
                        </label>
                        <label class="form-control w-full">
                            <span class="label">
                                <span class="label-text">@lang('admin.content_en')</span>
                            </span>
                            <textarea name="content_en" id="content_en" class="hidden">
                                {{ old('content_en') }}
                            </textarea>
                        </label>
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id="preview_img" class="h-16 w-16 rounded-full object-cover" src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c" alt="Current photo" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose photo</span>
                                <input type="file" name="image" onchange="loadFile(event)" class="file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:px-4 file:py-2 file:text-sm file:font-semibold" />
                            </label>
                        </div>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('admin.science_information.keep_on_top')</span>
                            </div>
                            <select name="keep_on_top" @class(['input', 'input-bordered', 'w-full'])>
                                <option @selected(old('keep_on_top') == 0) value="0">@lang('admin.false')</option>
                                <option @selected(old('keep_on_top') == 1) value="1">@lang('admin.true')</option>
                            </select>
                        </label>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('admin.science-information.index') }}" class="btn-light btn">@lang('admin.btn.cancel')
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
    <x-admin.forms.tinymce-config-en-vi column="content" columnen="content_en" model="ScienceInformation"/>
        <script>
            var loadFile = function(event) {
                var input = event.target
                var file = input.files[0]
                var type = file.type

                var output = document.getElementById('preview_img')

                output.src = URL.createObjectURL(event.target.files[0])
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            }
        </script>
    @endpushonce
</x-app-layout>
