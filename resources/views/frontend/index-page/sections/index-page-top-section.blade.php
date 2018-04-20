<div class="row m-t-10 main-page-slider">
    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 slider-text text-center">
        <h1 class="slider-text-title">The Best Online Casinos in New Jersey</h1>
    </div>
</div>

<?php $agent = new Jenssegers\Agent\Agent(); ?>
@if(!$agent->isMobile())
    <div class="row index-page-features-stack">
        <div class="col-md-3 features-stack-parent-column">
            <div class="col-md-4 features-stack-col-01">
                <a href="{{ url('/') }}#index-page-best-online-casinos"><img src="{{ Cdn::asset('img/location-icon-01.png') }}" alt="Reviews Icon" class="img-responsive"></a>
            </div>

            <div class="col-md-8 features-stack-col-02">
                <div class="feature-stack-headline">
                    <a href="{{ url('/') }}#index-page-best-online-casinos">Reviews</a>
                </div>
                <div>
                    <a href="{{ url('/') }}#index-page-best-online-casinos">The Best New Jersey Online Casinos</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 features-stack-parent-column">
            <div class="col-md-4 features-stack-col-01">
                <a href="{{ url('/') }}#index-page-news-section"><img src="{{ Cdn::asset('img/location-icon-02.png') }}" alt="News Icon" class="img-responsive"></a>
            </div>

            <div class="col-md-8 features-stack-col-02">
                <div class="feature-stack-headline"><a href="{{ url('/') }}#index-page-news-section">News</a></div>
                <div><a href="{{ url('/') }}#index-page-news-section">Read the latest U.S Gaming News</a></div>
            </div>
        </div>

        <div class="col-md-3 features-stack-parent-column">
            <div class="col-md-4 features-stack-col-01">
                <a href="{{ url('/') }}#index-page-online-casino-bonuses"><img src="{{ Cdn::asset('img/location-icon-03.png') }}" alt="Bonus Codes Icon" class="img-responsive"></a>
            </div>

            <div class="col-md-8 features-stack-col-02">
                <div class="feature-stack-headline">
                    <a href="{{ url('/') }}#index-page-online-casino-bonuses">Bonuses</a></div>
                <div>
                    <a href="{{ url('/') }}#index-page-online-casino-bonuses">NJ Casino Bonus &amp; Promo Codes</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 features-stack-parent-column">
            <div class="col-md-4 features-stack-col-01">
                <a href="{{ url('/') }}#index-page-online-games"><img src="{{ Cdn::asset('img/location-icon-04.png') }}" alt="Games Icon" class="img-responsive"></a>
            </div>

            <div class="col-md-8 features-stack-col-02">
                <div class="feature-stack-headline">
                    <a href="{{ url('/') }}#index-page-online-games">Games</a></div>
                <div>
                    <a href="{{ url('/') }}#index-page-online-games">Play NJ Online Casino Games for Free</a>
                </div>
            </div>
        </div>
    </div>
@endif