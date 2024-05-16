<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-800 text-xl font-semibold leading-tight">
            @lang('admin.categories')
        </h2>
        <div>
            <a
                class="flex items-center justify-end"
                href="{{ route('admin.categories.create') }}"
                ><x-heroicon-o-plus-circle class="size-4" />
                @lang('admin.add')
                </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="px-6 py-4">
                        <form
                            action="{{ route('admin.categories.index') }}"
                            method="GET"
                        >
                            <div class="flex items-center">
                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Search by title"
                                    class="text-gray-800 border-gray-200 mr-0 rounded-l-lg border-b border-l border-t bg-white p-2"
                                />
                                <button
                                    type="submit"
                                    class="bg-gray-200 text-gray-800 rounded-r-lg border-b border-r border-t p-2 px-4 font-semibold"
                                >
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>

                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.categories.title')</th>
                                <th>@lang('admin.categories.created_at')</th>
                                <th>@lang('admin.categories.updated_at')</th>
                                <th>@lang('admin.funtion')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th>{{ $startIndex++ }}</th>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>

                                    <td class="flex gap-3">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            ><x-heroicon-s-pencil-square class="size-4 text-green-600"
                                        /></a>
                                        <form
                                            id="delete-form-{{ $category->id }}"
                                            action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="button"
                                                onclick="confirmDelete({{ $category->id }})"
                                            >
                                                <x-heroicon-o-trash class="size-4 text-red-500" />
                                            </button>
                                        </form>

                                        <script>
                                            function confirmDelete(categoryId) {
                                                if (confirm('Are you sure you want to delete this category?')) {
                                                    document.getElementById('delete-form-' + categoryId).submit()
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
