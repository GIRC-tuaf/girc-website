<x-website-layout>
    <section>
        <div class="mx-auto max-w-7xl px-3 sm:px-6 md:items-center lg:px-8">
            <div class="grid grid-cols-8 gap-4">
                <div class="col-span-8 md:col-span-6 lg:col-span-6">
                    <div>
                        <div class="breadcrumbs py-4 text-sm text-blue-800">
                            <ul>
                                <x-website.breadcrumbs />
                                <x-website.breadcrumbs :route="route('science-information.index')" :name="__('web.scienceinfors_lists')" />
                            </ul>
                        </div>
                        <div class="h-0.5 bg-gradient-to-r from-blue-400 via-blue-500 via-70% to-red-500"></div>
                    </div>
                    <ul class="mt-5 space-y-4">
                        @forelse ($scienceInformations as $scienceInformation)
                            <li>
                                <article class="group">
                                    <div class="flex gap-3">
                                        <a href="{{ route('science-information.show', $scienceInformation) }}" class="h-20 w-32 flex-none overflow-hidden">
                                            <img class="h-auto w-full transition-all group-hover:scale-110" src="{{ $scienceInformation->getFirstMedia('science_information_photo')->getUrl('thumb') }}" alt="" />
                                        </a>
                                        <div class="flex flex-col items-start justify-between">
                                            <div>
                                                <a href="{{ route('science-information.show', $scienceInformation) }}">
                                                    <h3 class="line-clamp-2 text-justify font-normal tracking-normal text-blue-950 hover:text-red-500">
                                                        {{ app()->getLocale() === 'en' ? $scienceInformation->title_en : $scienceInformation->title }}
                                                    </h3>
                                                </a>
                                                <p class="line-clamp-1 text-sm text-slate-500">
                                                    {!! Str::limit(html_entity_decode(strip_tags( app()->getLocale() === 'en' && !empty($scienceInformation->content_en) ? $scienceInformation->content_en : $scienceInformation->content )), 200) !!}
                                                    
                                                </p>
                                            </div>
                                            <div class="tooltip tooltip-top flex items-center gap-2 text-green-700" data-tip="{{ $scienceInformation->publishedAtVi }}">
                                                <x-heroicon-m-calendar class="size-4" />
                                                <span class="text-xs">{{ $scienceInformation->publishedAtVi }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @empty
                            <li>
                                <p class="italic">@lang('web.no_data')</p>
                            </li>
                        @endforelse
                    </ul>
                    {{ $scienceInformations->links('pagination.web-tailwind') }}
                </div>
                <div class="col-span-8 hidden space-y-3 md:col-span-2 lg:block">
                    <x-website.announcement />
                    <x-website.science-information />
                    <x-website.aside.extra-curricular-activity />
                    <x-website.aside.study-space />
                </div>
            </div>
        </div>
    </section>
</x-website-layout>
