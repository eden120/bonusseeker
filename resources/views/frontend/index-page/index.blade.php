@extends('frontend.layout.master')

@section('headTag')
    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "url": "{{ url('/') }}",
    "logo": "{{ url(Storage::url($settings->logo)) }}"
}
    </script>
    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "{{ $settings->name }}",
    "alternateName": "Bonus Seeker",
    "url": "{{ url('/') }}"
}
    </script>
@endsection

@section('content')
    @php $region_slug = \App\Region::where('id', 1)->get() @endphp
    {{-- Top Slider with Intro Video --}}
    @include('frontend.index-page.sections.index-page-top-section')
    {{-- Top 5 Casino Lists --}}
    @include('frontend.index-page.sections.best-online-casinos')
    {{-- Online News Section --}}
    @include('frontend.index-page.sections.online-news-section')

    @include('frontend.index-page.sections.index_page_main_description')

    @include('frontend.index-page.sections.best-online-casino-bonus-codes')
    @include('frontend.index-page.sections.best-online-promo-codes')
    @include('frontend.index-page.sections.casino-games')
@endsection

@section('customJS')
    <script>
        $("[rel='tooltip']").tooltip();

        $('.games-card-content').hover(
            function() {
                $(this).find('.games-hover-card').slideDown(250); //.fadeIn(250)
            },
            function() {
                $(this).find('.games-hover-card').slideUp(250); //.fadeOut(205)
            }
        );
    </script>

    <script>
        $(function() {
            $('.best-online-casino-match-height').matchHeight();
        });

        $(function() {
            $('.play-now-section-col').matchHeight();
        });
    </script>

    <?php $agent = new Jenssegers\Agent\Agent(); ?>
    @if(!$agent->isMobile())
        <script>
            $('a').click(function() {
                $('.main-navbar-section').css({'padding': '0', 'margin-bottom': '0'});
                $('.main-navbar-section nav').removeClass('navbar-fixed-top');
            });

            $('.main-navbar-section').scroll(function() {
                $('.main-navbar-section').css({'padding': '10px 0', 'margin-bottom': '150px'});
                $('.main-navbar-section nav').addClass('navbar-fixed-top');
            });
        </script>
    @endif
@endsection