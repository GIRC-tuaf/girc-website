<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @lang('admin.category')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <div class="max-w-xl">
                        <form action="{{ route('admin.categories.store') }}" method="POST" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="row mb-3 ">
                                <div class="col-md-6">
                                    <div>
                                        <x-input-label for="title" :value="__('Title')" />
                                        <x-text-input id="title" type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror" required />
                                    </div>

                                </div>


                            </div>
                            <div>
                                <a href="{{ route('admin.categories.index') }}"
                                    class="btn btn-light">@lang('app.btn.cancel')</a>
                                <button type="submit" class="btn btn-success ml-2">@lang('app.btn.submit')</button>
                            </div>
                            <script>
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        let inputName = document.getElementById('title');
                                        inputName.addEventListener("keyup", () => {
                                            inputName.value = inputName.value.replace(/^\w/, c => c.toUpperCase());
                                        });

                                        var forms = document.getElementsByClassName('needs-validation');
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
