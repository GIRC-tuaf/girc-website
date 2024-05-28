<div class="col-span-8 space-y-3 md:col-span-6 lg:col-span-6">
    <x-website.partials.header main="true" title="{{ __('web.infrastructure') }}" textAlign="left" />

    @if ($youtubeVideos->isEmpty() && $googleDriveVideos->isEmpty())
        <li class="flex w-full items-start gap-2 py-2">
            <p class="text-xs italic hover:text-red-600">@lang('web.no_data')</p>
        </li>
    @else
        <div class="main-carousel h-36 overflow-hidden p-5 pt-0"
            data-flickity='{ 
                "autoPlay": true, 
                "pageDots": false, 
                "wrapAround": true, 
                "contain": true, 
                "cellAlign": "left",
                "index": 0
            }'>
            @forelse ($youtubeVideos as $video)
                <div class="carousel-cell">
                    <a title="{{ $video->name }}"
                        onclick="event.preventDefault(); openVideoModalInfrastructure('https://www.youtube.com/embed/{{ $video->video_id }}', '{{ $video->name }}')"
                        class="mx-2 flex h-36 w-52 items-center justify-center overflow-hidden rounded-lg border border-gray-300 bg-white">
                        <img class="w-full h-full" src="{{ $video->getFirstMedia('album_video')->getUrl() }}"
                            alt="{{ $video->name }}">
                    </a>
                </div>
            @empty
            @endforelse
            @forelse ($googleDriveVideos as $video)
                <div class="carousel-cell">
                    <a title="{{ $video->name }}"
                        onclick="event.preventDefault(); openVideoModalInfrastructure('https://drive.google.com/file/d/{{ $video->video_id }}/preview', '{{ $video->name }}')"
                        class="mx-2 flex h-36 w-52 items-center justify-center overflow-hidden rounded-lg border border-gray-300 bg-white">
                        <img class="w-full h-full" src="{{ $video->getFirstMedia('album_video')->getUrl() }}"
                            alt="{{ $video->name }}">
                    </a>
                </div>
            @empty
            @endforelse
        </div>

    @endif

    <dialog id="my_modal_2" class="modal">
        <div class="modal-box relative min-w-[80%] min-h-[100%] p-9 h-full">
            <x-website.show-video-infrastructure />
            <div class="modal-action absolute top-0 right-0">
                <button class="btn" onclick="closeModalInfrastructure()">X</button>
            </div>
        </div>
    </dialog>

</div>
<script>
    function openVideoModalInfrastructure(videoUrlIframeInfrastructure, videoTitleInfrastructure) {
        const iframe = document.getElementById('videoIframeInfrastructure');
        const titleElement = document.getElementById('videoTitleInfrastructure');
        iframe.src = videoUrlIframeInfrastructure;
        titleElement.textContent = videoTitleInfrastructure;
        document.getElementById('my_modal_2').showModal();
    }

    function closeModalInfrastructure() {
        const iframe = document.getElementById('videoIframeInfrastructure');
        iframe.src = '';
        document.getElementById('my_modal_2').close();
    }
</script>
