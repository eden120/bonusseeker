@extends('frontend.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"
                style="font-weight: bold; text-transform: uppercase; font-family: 'Dosis', sans-serif; font-size: 44px;">
                New Exclusive Page</h1>
            <p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt
                consequat posuere. Duis pulvinar lacus eu libero rhoncus maximus.
                Praesent velit lorem, rutrum sed dui et, efficitur auctor lorem. Proin
                maximus quis dui sit amet dignissim. Mauris porttitor fringilla tellus,
                eu tempor dolor volutpat vitae. Duis a tristique nibh. Cras interdum
                ipsum purus, at aliquet justo cursus a. Ut finibus egestas leo, et
                eleifend mi posuere vitae. Ut scelerisque non turpis ut porta. Quisque
                nec enim justo. Duis sit amet sagittis nibh. Vestibulum sodales magna et
                ante vulputate, eu pretium mi vehicula. Morbi ut massa ante.
            </p>
            <p>
            </p>
            <p>
                Aliquam erat volutpat. Donec sit amet tortor sagittis, vulputate massa
                id, mollis risus. Quisque aliquet ac ex vitae tristique. Vivamus et ex
                vitae sem ullamcorper lobortis. Nulla varius commodo orci, non bibendum
                magna sagittis at. Vestibulum ornare ultrices sapien, non venenatis dui
                volutpat pellentesque. Aenean maximus risus et dictum varius. Cras et
                erat vel libero imperdiet mattis non a arcu. In semper purus sed dui
                pretium lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing
                elit. Duis rutrum imperdiet nulla nec tristique. In et libero bibendum,
                auctor lacus sed, volutpat ligula. Sed libero risus, pulvinar eget elit
                at, placerat congue enim. Curabitur consequat, odio in bibendum congue,
                nibh justo rhoncus turpis, vel dignissim elit ante id lorem. Fusce
                pretium, risus sed placerat consequat, purus ligula dapibus est, nec
                bibendum risus neque ac quam. Aenean diam elit, cursus sed enim sit
                amet, pharetra congue nibh.&nbsp;</p>
        </div>

        <div class="col-md-12 exclusive-section">
            <div class="col-md-4 col-md-offset-4 m-t-20 m-b-20 text-center">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="coupon" id="coupon" class="form-control"
                               value="{{ old('coupon') }}" placeholder="Enter Coupon Code" maxlength="50"
                               data-max="50">
                        <span class="input-group-btn">
                                <a class="btn btn-success" name="reveal-codes" id="reveal-codes"><i
                                            class="ti-ticket"></i> Reveal Codes</a>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row index-page-best-online-casinos p-t-15 m-b-15">
        @unless(empty($casinos))
            @foreach($casinos as $casino)
                <div class="row index-page-best-online-casino-card">
                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-1 text-center"
                         data-mh="best-online-casino-match-height">
                        <span class="rating-badge">{{ $casino->sort_by }}</span>
                        <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img
                                    src="{{ Image::url(Storage::url($casino->logo), 150, 75, ['crop']) }}"
                                    alt="{{ $casino->name }} Logo" width="150" height="75"></a>

                        <div class="m-t-10">
                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center"
                         data-mh="best-online-casino-match-height">
                        <strong>RATING</strong><br>
                        <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                <?php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; ?>
                                {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                        </div>
                        <input title="{{ round(array_sum($ratings) / 4, 2) }}"
                               value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5"
                               data-step="0.1" data-display-only="true" data-size="xs">
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-3"
                         data-mh="best-online-casino-match-height">
                        <div class="bold-600">SPECIAL FEATURES</div>
                        {!! $casino->special_features !!}
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge"
                         data-mh="best-online-casino-match-height">
                        <div class="row text-center">
                            <div class="col-xs-6">
                                @unless(empty($casino->ios_link))
                                    <a href="{{ $casino->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}"
                                                                           alt="App Store Badge" class="img-responsive"></a>
                                @endunless
                            </div>

                            <div class="col-xs-6">
                                @unless(empty($casino->play_store_link))
                                    <a href="{{ $casino->play_store_link }}"><img
                                                src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge"
                                                class="img-responsive"></a>
                                @endunless
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center"
                         data-mh="best-online-casino-match-height">
                        <strong>FREE PLAY</strong><br>
                        <span class="bonus-code-amount-green">@if(!empty($casino->no_deposit_bonus_amount)){{ $casino->no_deposit_bonus_amount }}</span>
                        Free @endif

                        <div class="use-code-section">
                            <div class="use-code-new">
                                <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                {{ $casino->no_deposit_bonus_code }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center"
                         data-mh="best-online-casino-match-height">
                        <div class="show-casino-anchored-name">
                            <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}">{{ $casino->name }}
                                Review</a>
                        </div>

                        <div class="play-now-button">
                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                            <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'permalink' => $explode_permalink[8]]) }}"
                               class="btn btn-primary" target="_blank">PLAY NOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt
                consequat posuere. Duis pulvinar lacus eu libero rhoncus maximus.
                Praesent velit lorem, rutrum sed dui et, efficitur auctor lorem. Proin
                maximus quis dui sit amet dignissim. Mauris porttitor fringilla tellus,
                eu tempor dolor volutpat vitae. Duis a tristique nibh. Cras interdum
                ipsum purus, at aliquet justo cursus a. Ut finibus egestas leo, et
                eleifend mi posuere vitae. Ut scelerisque non turpis ut porta. Quisque
                nec enim justo. Duis sit amet sagittis nibh. Vestibulum sodales magna et
                ante vulputate, eu pretium mi vehicula. Morbi ut massa ante.
            </p>
            <p>
            </p>
            <p>
                Aliquam erat volutpat. Donec sit amet tortor sagittis, vulputate massa
                id, mollis risus. Quisque aliquet ac ex vitae tristique. Vivamus et ex
                vitae sem ullamcorper lobortis. Nulla varius commodo orci, non bibendum
                magna sagittis at. Vestibulum ornare ultrices sapien, non venenatis dui
                volutpat pellentesque. Aenean maximus risus et dictum varius. Cras et
                erat vel libero imperdiet mattis non a arcu. In semper purus sed dui
                pretium lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing
                elit. Duis rutrum imperdiet nulla nec tristique. In et libero bibendum,
                auctor lacus sed, volutpat ligula. Sed libero risus, pulvinar eget elit
                at, placerat congue enim. Curabitur consequat, odio in bibendum congue,
                nibh justo rhoncus turpis, vel dignissim elit ante id lorem. Fusce
                pretium, risus sed placerat consequat, purus ligula dapibus est, nec
                bibendum risus neque ac quam. Aenean diam elit, cursus sed enim sit
                amet, pharetra congue nibh.&nbsp;</p>
        </div>

    </div>
@endsection

@section('customJS')
    <script>
        $(function () {
            $('.best-online-casino-match-height').matchHeight();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('*[data-max]').keyup(function () {
                // get the max chars for the input
                var text_max = $(this).data('max');
                // compute current length
                var text_length = $(this).val().length;
                // compute chars remaining
                var text_remaining = text_max - text_length;
                // display
                $(this).next('.char-max-alert').html(text_remaining + ' Characters Remaining');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#reveal-codes').attr('disabled', true);
            $('#coupon').keyup(function () {
                if ($(this).val().length !== 0)
                    $('#reveal-codes').attr('disabled', false);
                else
                    $('#reveal-codes').attr('disabled', true);
            });
        });
    </script>
@endsection