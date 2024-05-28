<div>
    <x-website.partials.header title="{{ __('web.digital_transformation') }}" />
    <div class="">
        <div class="h-40 bg-white" style="text-align: -webkit-center;">
            @if ($latestVideo)
                <a title="{{ $latestVideo->name }}" onclick="event.preventDefault(); openVideoModalDigital('https://drive.google.com/file/d/{{ $latestVideo->video_id }}/preview', '{{ $latestVideo->name }}')"
                    class="mx-2 flex items-center justify-center overflow-hidden rounded-lg border border-gray-300 bg-white">
                    <img class="w-full h-full" src="{{ $latestVideo->getFirstMedia('album_video')->getUrl() }}"
                        alt="{{ $latestVideo->name }}">
                </a>
            @else
                <p class="text-xs italic hover:text-red-600">@lang('web.no_data')</p>
            @endif
        </div>

        <ul class="divide-y divide-solid px-2">
            @if ($youtubeVideos->isEmpty() && $googleDriveVideos->isEmpty())
                <li class="flex w-full items-start gap-2 py-2">
                    <p class="text-xs italic hover:text-red-600">@lang('web.no_data')</p>
                </li>
            @else
                @forelse ($youtubeVideos as $video)
                    <li class="flex items-center gap-2 w-full py-2">
                        <a class="flex items-center" title="{{ $video->name }}"
                            onclick="event.preventDefault(); openVideoModalDigital('https://www.youtube.com/embed/{{ $video->video_id }}', '{{ $video->name }}')"><x-heroicon-o-play-circle
                                class="size-5 flex-none" />
                            <p class="line-clamp-1 text-xs ml-1">{{ $video->name }}</p>
                        </a>

                    </li>
                @empty
                @endforelse
                @forelse ($googleDriveVideos as $video)
                    <li class="flex items-center gap-2 w-full py-2">
                        <a class="flex items-center" title="{{ $video->name }}"
                            onclick="event.preventDefault(); openVideoModalDigital('https://drive.google.com/file/d/{{ $video->video_id }}/preview', '{{ $video->name }}')">
                            <x-heroicon-o-play-circle class="size-5 flex-none" />
                            <p class="line-clamp-1 text-xs ml-1">{{ $video->name }}</p>
                        </a>

                    </li>
                @empty
                @endforelse
            @endif

            <dialog id="my_modal_3" class="modal">
                <div class="modal-box relative min-w-[80%] min-h-[100%] p-9 h-full">
                    <x-website.show-video-digital />
                    <div class="modal-action absolute top-0 right-0">
                        <button class="btn" onclick="closeModalDigital()">X</button>
                    </div>
                </div>
            </dialog>
        </ul>
    </div>
</div>
<script>
    function openVideoModalDigital(videoUrlIframeDigital, videoTitleDigital) {
        const iframe = document.getElementById('videoIframeDigital');
        const titleElement = document.getElementById('videoTitleDigital');
        iframe.src = videoUrlIframeDigital;
        titleElement.textContent = videoTitleDigital;
        document.getElementById('my_modal_3').showModal();
    }

    function closeModalDigital() {
        const iframe = document.getElementById('videoIframeDigital');
        iframe.src = '';
        document.getElementById('my_modal_3').close();
    }
</script>
