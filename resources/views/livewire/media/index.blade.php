<div class="row g-6 g-xl-9 mb-6 mb-xl-9">
    @foreach($medias as $media)
        @livewire('media.index-item', ['media' => $media], key("media_" . microtime() . "_$media->id"))
    @endforeach
</div>
