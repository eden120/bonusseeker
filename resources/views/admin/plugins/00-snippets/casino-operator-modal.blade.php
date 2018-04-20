<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success m-b-15" data-toggle="modal" data-target="#casinoListsModal">
    <i class="ti-medall"></i> Operator Lists
</button>

<!-- Modal -->
<div id="casinoListsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title bold-700">Casinos &amp; Permalinks</h4>
            </div>
            <div class="modal-body">
                @unless(empty($casinoOperators))
                    @foreach($casinoOperators as $casinoOperator)
                        <a href="#show-{{ $casinoOperator->slug }}" class="btn btn-default m-b-10">{{ $casinoOperator->name }}</a>
                    @endforeach
                @endunless

                @unless(empty($casinoOperators))
                    @foreach($casinoOperators as $casinoOperator)
                        <div class="panel panel-default" id="show-{{ $casinoOperator->slug }}">
                            <div class="panel-heading">
                                <h3 class="panel-title bold-700">{{ $casinoOperator->name }}</h3>
                            </div>
                            <div class="panel-body">
                                <label for="show-casino-name-{{ $casinoOperator->slug }}">{{ $casinoOperator->name }}</label>
                                <div class="input-group m-b-10">
                                    <input type="text" id="show-casino-name-{{ $casinoOperator->slug }}" class="form-control bold-700" value="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casinoOperator->id)->region->slug, 'slug' => $casinoOperator->slug]) }}">

                                    <span class="input-group-btn">
                                                        <button class="btn btn-default casino-name-{{ $casinoOperator->slug }}" id="casino-name-{{ $casinoOperator->slug }}" type="button" data-clipboard-target="#show-casino-name-{{ $casinoOperator->slug }}" data-toggle="tooltip" data-original-title="Copied!">
                                            <img class="clippy" src="{{ asset('img/clippy.svg') }}" width="13" alt="Copy to clipboard"></button>
                                                    </span>
                                </div>

                                <label for="show-casino-logo-{{ $casinoOperator->slug }}">Logo URL</label>
                                <div class="input-group m-b-10">
                                    <input type="text" id="show-casino-logo-{{ $casinoOperator->slug }}" class="form-control bold-700" value="{{ url(Image::url(Storage::url($casinoOperator->logo), 150, 75)) }}">

                                    <span class="input-group-btn">
                                                        <button class="btn btn-default casino-logo-{{ $casinoOperator->slug }}" id="casino-logo-{{ $casinoOperator->slug }}" type="button" data-clipboard-target="#show-casino-logo-{{ $casinoOperator->slug }}" data-toggle="tooltip" data-original-title="Copied!">
                                            <img class="clippy" src="{{ asset('img/clippy.svg') }}" width="13" alt="Copy to clipboard"></button>
                                                    </span>
                                </div>

                                <?php $explode_permalink = explode(',', $casinoOperator->permalink); ?>
                                <label for="casinoPermalink{{ $explode_permalink[12] }}">{{ $explode_permalink[12] }}</label>
                                <div class="input-group m-b-10">
                                    <input type="text" id="casinoPermalink{{ $explode_permalink[12] }}" class="form-control" value="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casinoOperator->id)->region->slug, 'slug' => $explode_permalink[12]]) }}">

                                    <span class="input-group-btn">
                                        <button class="btn btn-default show-casino-permalink-{{ $explode_permalink[12] }}" id="show-casino-permalink-{{ $explode_permalink[12] }}" type="button" data-clipboard-target="#casinoPermalink{{ $explode_permalink[12] }}" data-toggle="tooltip" data-original-title="Copied!">
                                            <img class="clippy" src="{{ asset('img/clippy.svg') }}" width="15" alt="Copy to clipboard"></button>
                                    </span>
                                </div>

                                <label for="casinoPermalink{{ $explode_permalink[13] }}">{{ $explode_permalink[13] }}</label>
                                <div class="input-group m-b-10">
                                    <input type="text" id="casinoPermalink{{ $explode_permalink[13] }}" class="form-control" value="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casinoOperator->id)->region->slug, 'slug' => $explode_permalink[13]]) }}">

                                    <span class="input-group-btn">
                                        <button class="btn btn-default show-casino-permalink-{{ $explode_permalink[13] }}" id="show-casino-permalink-{{ $explode_permalink[13] }}" type="button" data-clipboard-target="#casinoPermalink{{ $explode_permalink[13] }}" data-toggle="tooltip" data-original-title="Copied!">
                                            <img class="clippy" src="{{ asset('img/clippy.svg') }}" width="15" alt="Copy to clipboard"></button>
                                    </span>
                                </div>

                                <label for="casinoPermalink{{ $explode_permalink[14] }}">{{ $explode_permalink[14] }}</label>
                                <div class="input-group m-b-10">
                                    <input type="text" id="casinoPermalink{{ $explode_permalink[14] }}" class="form-control" value="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casinoOperator->id)->region->slug, 'slug' => $explode_permalink[14]]) }}">

                                    <span class="input-group-btn">
                                        <button class="btn btn-default show-casino-permalink-{{ $explode_permalink[14] }}" id="show-casino-permalink-{{ $explode_permalink[14] }}" type="button" data-clipboard-target="#casinoPermalink{{ $explode_permalink[14] }}" data-toggle="tooltip" data-original-title="Copied!">
                                            <img class="clippy" src="{{ asset('img/clippy.svg') }}" width="15" alt="Copy to clipboard"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            </div>
        </div>

    </div>
</div>