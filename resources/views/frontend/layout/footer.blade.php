<div class="row email-newsletter-subscription-container">
    <div class="email-newsletter-headline text-center">
        <h3>Yes, I want <strong>Free Spins, Exclusive Bonuses, Free Tips and News.</strong></h3>
    </div>

    <div class="email-newsletter-form">
        <div class="col-xs-12 col-md-1 col-1" data-mh="email-newsletter-match-height">
            <img src="{{ Cdn::asset('img/present.svg') }}" alt="Present" class="img-responsive">
        </div>

        <div class="col-xs-12 col-md-10 col-10" data-mh="email-newsletter-match-height">
            <div id="wait" style="display:none;position:absolute;top:50%;left:50%;color: #000000;">
                <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i><br>Loading...
            </div>
            {{-- Form --}}
            <form method="post" class="af-form-wrapper" id="af-form-wrapper" accept-charset="UTF-8" action="{{ route('front-end.section.aweber') }}">
                <div style="display: none;">
                    <input type="hidden" name="meta_web_form_id" value="525895254"/>
                    <input type="hidden" name="meta_split_id" value=""/>
                    <input type="hidden" name="listname" value="awlist4976710"/>
                    <input type="hidden" name="redirect" value="" id="redirect_d2957ae939deadecbd82799eda226e4f"/>

                    <input type="hidden" name="meta_adtracking" value="BS_Site_Footer"/>
                    <input type="hidden" name="meta_message" value="1"/>
                    <input type="hidden" name="meta_required" value="email"/>
                    <input type="hidden" name="meta_forward_vars" value="1"/>
                    <input type="hidden" name="meta_tooltip" value=""/>
                </div>

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <input type="email" class="form-control" id="awf_field-96281542" name="email" value="{{ old('email') }}" placeholder="Enter your e-mail" required="required">

                        <span class="input-group-btn">
                            <button name="submit" type="submit" class="btn btn-success">Subscribe</button>
                        </span>
                    </div>

                    <div style="display: none;">
                        <img src="https://forms.aweber.com/form/displays.htm?id=rEysHJysTKws" alt=""/>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>

        <div class="col-xs-12 col-md-1 col-3" data-mh="email-newsletter-match-height"></div>
    </div>
</div>

<div class="row site-footer">
    <div class="col-xs-12 col-md-4 footer-col-1" data-mh="site-footer-match-height">
        <a href="{{ route('front-end.section.index') }}"><img src="@if($settings->logo === NULL){{ asset('img/logo.svg') }}@else{{ Storage::url($settings->logo) }}@endif" alt="{{ $settings->name }}" height="80"></a>

        <div class="site-footer-features m-t-10">
            <div class="footer-social-buttons">
                <a href="https://www.facebook.com/BonusSeekers" class="facebook" target="_blank"><i class="ti-facebook"></i></a>
                <a href="https://twitter.com/BonusSeekers" class="twitter" target="_blank"><i class="ti-twitter-alt"></i></a>
            </div>
            Made in NYC<br> NJ DGE Registered Vendor
        </div>
    </div>

    <div class="col-xs-12 col-md-4 footer-col-2" data-mh="site-footer-match-height">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if(d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1878253602408708";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div style="width: 100% !important;">
            <div class="fb-page" data-href="https://www.facebook.com/BonusSeekers" data-width="390" data-hide-cover="false" data-show-facepile="true"></div>
        </div>
    </div>

    @php $region_slug = \App\Region::where('id', 1)->select('slug')->first(); @endphp
    <div class="col-xs-12 col-md-4 footer-col-3" data-mh="site-footer-match-height">
        <div class="list-group">
            <a href="{{ route('front-end.promo-codes', ['region' => $region_slug]) }}" class="list-group-item list-group-item-action">NJ Online Casino Promo Codes</a>
            <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug]) }}" class="list-group-item list-group-item-action">NJ Online Casino Bonus Codes</a>
            <a href="{{ route('front-end.section.games', ['region' => $region_slug]) }}" class="list-group-item list-group-item-action">NJ Online Casino Games</a>
            <a href="{{ route('front-end.news', ['region' => $region_slug]) }}" class="list-group-item list-group-item-action">NJ Online Casino News</a>
        </div>
    </div>
</div>