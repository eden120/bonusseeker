<div class="index-page-news-section m-t-20" id="index-page-news-section">
    <h2 class="intro-text text-center">
        <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}">NJ ONLINE CASINO NEWS</a>
    </h2>

    <div class="row index-page-news-row-section">
        <div class="col-md-4 index-page-news-col-1">
            <div class="text-center index-page-news-col-1-heading-parent">
                <h3 class="index-page-news-col-1-heading">KNOW BEFORE YOU PLAY</h3>
            </div>

            <ul class="index-page-news-col-1-card" id="index-page-news-col-1-card">
                @unless(empty($know_before_you_play))
                    @foreach($know_before_you_play as $knowBeforeYouPlay)
                        <li>
                            <div class="row">
                                <div class="col-md-4 index-page-news-col-md-4">
                                    <a href="{{ route('front-end.show-news', ['region' => $knowBeforeYouPlay->region->slug, 'slug' => $knowBeforeYouPlay->slug]) }}">
                                        <img src="{{ Image::url(Storage::url($knowBeforeYouPlay->featured_image), 400, 225, ['crop']) }}" alt="{{ $knowBeforeYouPlay->name }}" class="img-responsive">
                                    </a>
                                </div>

                                <div class="col-md-8 index-page-news-col-md-8">
                                    <a href="{{ route('front-end.show-news', ['region' => $knowBeforeYouPlay->region->slug, 'slug' => $knowBeforeYouPlay->slug]) }}">{{ $knowBeforeYouPlay->name }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endunless
            </ul>
        </div>

        <div class="col-md-4 index-page-news-col-2">
            <div class="text-center index-page-news-col-2-heading-parent">
                <h3 class="index-page-news-col-2-heading">TOP VIDEOS</h3>
            </div>

            @unless(empty($videos))
                @foreach($videos as $video)
                    @php $videoId = Youtube::parseVidFromURL($video->url) @endphp
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="200" width="100%"></iframe>
                    <h3>{{ $video->name }}</h3>
                @endforeach
            @endunless
        </div>

        <div class="col-md-4 index-page-news-col-1">
            <div class="text-center index-page-news-col-1-heading-parent">
                <h3 class="index-page-news-col-1-heading">TRENDING NOW</h3>
            </div>

            <ul class="index-page-news-col-1-card" id="index-page-news-col-1-card">
                @unless(empty($trending_news))
                    @foreach($trending_news as $trending)
                        <li>
                            <div class="row">
                                <div class="col-md-4 index-page-news-col-md-4">
                                    <a href="{{ route('front-end.show-news', ['region' => $trending->region->slug, 'slug' => $trending->slug]) }}">
                                        <img src="{{ Image::url(Storage::url($trending->featured_image), 400, 225, ['crop']) }}" alt="{{ $trending->name }}" class="img-responsive">
                                    </a>
                                </div>

                                <div class="col-md-8 index-page-news-col-md-8">
                                    <a href="{{ route('front-end.show-news', ['region' => $trending->region->slug, 'slug' => $trending->slug]) }}">{{ $trending->name }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endunless
            </ul>
        </div>
    </div>

    <h4 class="text-center">SEE ALL
        <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}" class="btn-large">NJ ONLINE CASINO NEWS</a>
    </h4>
</div>