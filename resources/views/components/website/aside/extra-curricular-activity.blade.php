<div>
    <x-website.partials.header title="{{ __('web.extra_curricular_activities') }}" />
    <div class="">
        <div class="h-44">
            <div class="h-full" style="text-align: -webkit-center;">
                @if ($latestVideo)
                    <a onclick="event.preventDefault(); openVideoModalActivity('https://drive.google.com/file/d/{{ $latestVideo->video_id }}/preview', '{{ $latestVideo->name }}')" class="w-full bg-white">
                        <img class="h-full w-full" src="{{ $latestVideo->getFirstMedia('album_video')->getUrl('photo_aside') }}" alt="{{ $latestVideo->name }}">
                    </a>
                @else
                    <p class="text-xs italic hover:text-red-600">@lang('web.no_data')</p>
                @endif
            </div>
        </div>
        <ul class="divide-y divide-solid px-2" hidden>
            @if ($youtubeVideos->isEmpty() && $googleDriveVideos->isEmpty())
                <li class="flex w-full items-start gap-2 py-2">
                    <p class="text-xs italic hover:text-red-600">@lang('web.no_data')</p>
                </li>
            @else
                @forelse ($youtubeVideos as $video)
                    <li class="flex w-full items-center gap-2 py-2">
                        <a class="flex items-center" title="{{ $video->name }}" onclick="event.preventDefault(); openVideoModalActivity('https://www.youtube.com/embed/{{ $video->video_id }}', '{{ $video->name }}')"><x-heroicon-o-play-circle class="size-5 flex-none" />
                            <p class="ml-1 line-clamp-1 text-xs">{{ $video->name }}</p>
                        </a>

                    </li>
                @empty
                @endforelse
                @forelse ($googleDriveVideos as $video)
                    <li class="flex w-full items-center gap-2 py-2">
                        <a class="flex items-center" title="{{ $video->name }}" onclick="event.preventDefault(); openVideoModalActivity('https://drive.google.com/file/d/{{ $video->video_id }}/preview', '{{ $video->name }}')">
                            <x-heroicon-o-play-circle class="size-5 flex-none" />
                            <p class="ml-1 line-clamp-1 text-xs">{{ $video->name }}</p>
                        </a>

                    </li>
                @empty
                @endforelse
            @endif
        </ul>
    </div>
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box relative h-full min-h-[100%] min-w-[80%] p-1">
            <x-website.show-video-activity />
            <div class="modal-action absolute right-0 top-0">
                <button class="btn mt-[-22px]" onclick="closeModalActivity()">X</button>
            </div>
        </div>
    </dialog>
</div>
<script>
    function openVideoModalActivity(videoUrlIframeActivity, videoTitleActivity) {
        const iframe = document.getElementById('videoIframeActivity');
        const titleElement = document.getElementById('videoTitleActivity');
        iframe.src = videoUrlIframeActivity;
        titleElement.textContent = videoTitleActivity;
        document.getElementById('my_modal_5').showModal();
    }

    function closeModalActivity() {
        const iframe = document.getElementById('videoIframeActivity');
        iframe.src = '';
        document.getElementById('my_modal_5').close();
    }
</script>
