@extends('admin.layout.master')

@section('title', 'Create Operator')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
    <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-medall"></i> Create Operator</div>

        <div class="panel-body">

            <form action="{{ route('admin.casinos.store') }}" method="post" enctype="multipart/form-data" id="casinoCreate">

                <div class="row">
                    <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} col-md-6">
                        <label for="region_id">Market Name</label>
                        <select class="form-control selectpicker" id="region_id" name="region_id" data-live-search="true" title="Select Market Name">
                            <?php $regions = \App\Region::where('is_active', '>=', 1)->get(); ?>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('region_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('region_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('game_provider_id') ? ' has-error' : '' }} col-md-6">
                        <label for="game_provider_id">Game Providers</label>

                        <select name="game_provider_id[]" multiple id="game_provider_id" class="form-control selectpicker" data-live-search="true" title="Select Game Providers">

                            @php $game_providers = \App\GameProvider::where('is_active', '>=', 1)->get() @endphp
                            @foreach($game_providers as $game_provider)
                                <option value="{{ $game_provider->id }}">{{ $game_provider->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('game_provider_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('game_provider_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} col-md-6">
                        <label for="is_featured">Is Featured?</label>

                        <select class="selectpicker form-control" id="is_featured" name="is_featured" required>
                            <option value="1">Yes</option>
                            <option value="0" selected="selected">No</option>
                        </select>

                        @if ($errors->has('is_featured'))
                            <span class="help-block">
                                <strong>{{ $errors->first('is_featured') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">Operator Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Operator Name" onkeyup="getName()" maxlength="255" data-max="255" required autofocus>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                        <label for="slug">URL Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="URL Slug" maxlength="255" data-max="255" required>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('slug'))
                            <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }} col-md-6">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Subtitle" maxlength="255" data-max="255">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('subtitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subtitle') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} col-md-6">
                        <label for="video">Video URL</label>
                        <input type="text" class="form-control" id="video" name="video" value="{{ old('video') }}" placeholder="Video URL" maxlength="1024" data-max="1024">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('video'))
                            <span class="help-block">
                                <strong>{{ $errors->first('video') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('cta_text') ? ' has-error' : '' }} col-md-6">
                        <label for="cta_text">Main Page CTA Text</label>
                        <input type="text" class="form-control" id="cta_text" name="cta_text" value="{{ old('cta_text') }}" placeholder="Main Page CTA Text" maxlength="100" data-max="100">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('cta_text'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cta_text') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('cta_link') ? ' has-error' : '' }} col-md-6">
                        <label for="cta_link">Tracking Link</label>
                        <input type="text" class="form-control" id="cta_link" name="cta_link" value="{{ old('cta_link') }}" placeholder="Tracking Link" maxlength="1536" data-max="1536">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('cta_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cta_link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('play_store_link') ? ' has-error' : '' }} col-md-6">
                        <label for="play_store_link">Google Play Store Link</label>
                        <input type="text" class="form-control" id="play_store_link" name="play_store_link" value="{{ old('play_store_link') }}" placeholder="Google Play Store Link" maxlength="1536" data-max="1536">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('play_store_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('play_store_link') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('ios_link') ? ' has-error' : '' }} col-md-6">
                        <label for="ios_link">iOS Link</label>
                        <input type="text" class="form-control" id="ios_link" name="ios_link" value="{{ old('ios_link') }}" placeholder="iOS Link" maxlength="1536" data-max="1536">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('ios_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ios_link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="casinoBonusHeading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#casinoBonusCollapse" aria-expanded="true" aria-controls="casinoBonusCollapse">
                                    <i class="ti-angle-down"></i> Bonus Code Section </a>
                            </h4>
                        </div>
                        <div id="casinoBonusCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="casinoBonusHeading">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('no_deposit_bonus') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus">No Deposit Bonus</label> <input
                                                type="text" class="form-control" id="no_deposit_bonus" name="no_deposit_bonus" value="{{ old('no_deposit_bonus') }}" placeholder="No Deposit Bonus" maxlength="255" data-max="255"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('no_deposit_bonus_code') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_code">No Deposit Bonus Code</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_code" name="no_deposit_bonus_code" value="{{ old('no_deposit_bonus_code') }}" placeholder="No Deposit Bonus Code" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('free_spins') ? ' has-error' : '' }} col-md-6">
                                        <label for="free_spins">Free Spins</label>
                                        <input type="text" class="form-control" id="free_spins" name="free_spins" value="{{ old('free_spins') }}" placeholder="Free Spins" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('free_spins'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('free_spins') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('free_spin_jackpot') ? ' has-error' : '' }} col-md-6">
                                        <label for="free_spin_jackpot">Free Spin Jackpot</label>
                                        <input type="text" class="form-control" id="free_spin_jackpot" name="free_spin_jackpot" value="{{ old('free_spin_jackpot') }}" placeholder="Free Spin Jackpot" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('free_spin_jackpot'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('free_spin_jackpot') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('no_deposit_bonus_amount') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_amount">No Deposit Bonus Amount</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_amount" name="no_deposit_bonus_amount" value="{{ old('no_deposit_bonus_amount') }}" placeholder="No Deposit Bonus Amount" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('no_deposit_bonus_playthrough_requirement') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_playthrough_requirement">No Deposit Bonus Playthrough Requirement</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_playthrough_requirement" name="no_deposit_bonus_playthrough_requirement" value="{{ old('no_deposit_bonus_playthrough_requirement') }}" placeholder="No Deposit Bonus Playthrough Requirement" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_playthrough_requirement'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_playthrough_requirement') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('no_deposit_bonus_cta') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_cta">No Deposit Bonus CTA</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_cta" name="no_deposit_bonus_cta" value="{{ old('no_deposit_bonus_cta') }}" placeholder="No Deposit Bonus CTA" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_cta'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_cta') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('no_deposit_bonus_info') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_info">No Deposit Bonus Info</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_info" name="no_deposit_bonus_info" value="{{ old('no_deposit_bonus_info') }}" placeholder="No Deposit Bonus Info" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_info'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_info') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('no_deposit_bonus_start_day') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_start_day">No Deposit Bonus Start Day</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_start_day" name="no_deposit_bonus_start_day" value="{{ old('no_deposit_bonus_start_day') }}" placeholder="No Deposit Bonus Start Day">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_start_day'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_start_day') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('no_deposit_bonus_end_day') ? ' has-error' : '' }} col-md-6">
                                        <label for="no_deposit_bonus_end_day">No Deposit Bonus End Day</label>
                                        <input type="text" class="form-control" id="no_deposit_bonus_end_day" name="no_deposit_bonus_end_day" value="{{ old('no_deposit_bonus_end_day') }}" placeholder="No Deposit Bonus End Day">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('no_deposit_bonus_end_day'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_deposit_bonus_end_day') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('first_deposit_bonus') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus">First Deposit Bonus</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus" name="first_deposit_bonus" value="{{ old('first_deposit_bonus') }}" placeholder="First Deposit Bonus" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('first_deposit_bonus_code') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus_code">First Deposit Bonus Code</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus_code" name="first_deposit_bonus_code" value="{{ old('first_deposit_bonus_code') }}" placeholder="First Deposit Bonus Code" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('first_deposit_bonus_cta') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus_cta">First Deposit Bonus CTA</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus_cta" name="first_deposit_bonus_cta" value="{{ old('first_deposit_bonus_cta') }}" placeholder="First Deposit Bonus CTA" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus_cta'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus_cta') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('first_deposit_bonus_info') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus_info">First Deposit Bonus Info</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus_info" name="first_deposit_bonus_info" value="{{ old('first_deposit_bonus_info') }}" placeholder="First Deposit Bonus Info" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus_info'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus_info') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('first_deposit_bonus_start_day') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus_start_day">First Deposit Bonus Start Day</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus_start_day" name="first_deposit_bonus_start_day" value="{{ old('first_deposit_bonus_start_day') }}" placeholder="First Deposit Bonus Start Day">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus_start_day'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus_start_day') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('first_deposit_bonus_end_day') ? ' has-error' : '' }} col-md-6">
                                        <label for="first_deposit_bonus_end_day">First Deposit Bonus End Day</label>
                                        <input type="text" class="form-control" id="first_deposit_bonus_end_day" name="first_deposit_bonus_end_day" value="{{ old('first_deposit_bonus_end_day') }}" placeholder="First Deposit Bonus End Day">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('first_deposit_bonus_end_day'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_deposit_bonus_end_day') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="ti-angle-down"></i> Summaries </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="form-group{{ $errors->has('short_summary') ? ' has-error' : '' }}">
                                    <label for="short_summary">Short Summary</label>
                                    <textarea class="form-control" name="short_summary" id="short_summary" rows="3" maxlength="255" data-max="255">{{ old('short_summary') }}</textarea>

                                    <p class="help-block char-max-alert"></p>

                                    @if ($errors->has('short_summary'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('short_summary') }}</strong>
                            </span>
                                    @endif
                                </div>

                                {{-- Include Casino Operator Modal --}}
                                @include('admin.plugins.00-snippets.casino-operator-modal')

                                <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                    <label for="summary">Summary</label>
                                    <textarea class="form-control" name="summary" id="summary" rows="3">{{ old('summary') }}</textarea>

                                    @if ($errors->has('summary'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('summary') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('special_features') ? ' has-error' : '' }}">
                                    <label for="special_features">Special Features</label>
                                    <textarea class="form-control" name="special_features" id="special_features" rows="3" maxlength="255" data-max="255">{{ old('special_features') }}</textarea>

                                    <p class="help-block char-max-alert"></p>

                                    @if ($errors->has('special_features'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('special_features') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="casinoDetailHeading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#casinoDetailCollapse" aria-expanded="true" aria-controls="casinoDetailCollapse"><i class="ti-angle-down"></i> Detailed Information</a>
                            </h4>
                        </div>
                        <div id="casinoDetailCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="casinoDetailHeading">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('established') ? ' has-error' : '' }} col-md-6">
                                        <label for="established">Established At</label>
                                        <input type="text" class="form-control" id="established" name="established" value="{{ old('established') }}" placeholder="Established At" maxlength="4" data-max="4">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('established'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('established') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('payout') ? ' has-error' : '' }} col-md-6">
                                        <label for="payout">Payout</label>
                                        <input type="text" class="form-control" id="payout" name="payout" value="{{ old('payout') }}" placeholder="Payout" maxlength="10" data-max="10">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('payout'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('payout') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('software') ? ' has-error' : '' }} col-md-6">
                                        <label for="software">Software</label>
                                        <input type="text" class="form-control" id="software" name="software" value="{{ old('software') }}" placeholder="Software" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('software'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('software') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }} col-md-6">
                                        <label for="languages">Languages</label>

                                        <select multiple class="form-control selectpicker" id="languages" name="languages[]" data-live-search="true">
                                            <option value="Afrikaans">Afrikaans</option>
                                            <option value="Albanian">Albanian</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Armenian">Armenian</option>
                                            <option value="Basque">Basque</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="Bulgarian">Bulgarian</option>
                                            <option value="Catalan">Catalan</option>
                                            <option value="Cambodian">Cambodian</option>
                                            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                            <option value="Croatian">Croatian</option>
                                            <option value="Czech">Czech</option>
                                            <option value="Danish">Danish</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="English" selected="selected">English</option>
                                            <option value="Estonian">Estonian</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finnish">Finnish</option>
                                            <option value="French">French</option>
                                            <option value="Georgian">Georgian</option>
                                            <option value="German">German</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option value="Hebrew">Hebrew</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Hungarian">Hungarian</option>
                                            <option value="Icelandic">Icelandic</option>
                                            <option value="Indonesian">Indonesian</option>
                                            <option value="Irish">Irish</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Javanese">Javanese</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Latin">Latin</option>
                                            <option value="Latvian">Latvian</option>
                                            <option value="Lithuanian">Lithuanian</option>
                                            <option value="Macedonian">Macedonian</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Maltese">Maltese</option>
                                            <option value="Maori">Maori</option>
                                            <option value="Marathi">Marathi</option>
                                            <option value="Mongolian">Mongolian</option>
                                            <option value="Nepali">Nepali</option>
                                            <option value="Norwegian">Norwegian</option>
                                            <option value="Persian">Persian</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Quechua">Quechua</option>
                                            <option value="Romanian">Romanian</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Samoan">Samoan</option>
                                            <option value="Serbian">Serbian</option>
                                            <option value="Slovak">Slovak</option>
                                            <option value="Slovenian">Slovenian</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="Swahili">Swahili</option>
                                            <option value="Swedish ">Swedish</option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Tatar">Tatar</option>
                                            <option value="Telugu">Telugu</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Tibetan">Tibetan</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Ukrainian">Ukrainian</option>
                                            <option value="Urdu">Urdu</option>
                                            <option value="Uzbek">Uzbek</option>
                                            <option value="Vietnamese">Vietnamese</option>
                                            <option value="Welsh">Welsh</option>
                                            <option value="Xhosa">Xhosa</option>
                                        </select>

                                        @if ($errors->has('languages'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('languages') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('currencies') ? ' has-error' : '' }} col-md-6">
                                        <label for="currencies">Currencies</label>

                                        <select multiple class="form-control selectpicker" id="currencies" name="currencies[]" data-live-search="true" required="required">
                                            <option value="AUD">Australian Dollar</option>
                                            <option value="BRL">Brazilian Real</option>
                                            <option value="CAD">Canadian Dollar</option>
                                            <option value="CHF">Swiss Franc</option>
                                            <option value="CZK">Czech Koruna</option>
                                            <option value="DKK">Danish Krone</option>
                                            <option value="EUR">Euro</option>
                                            <option value="GBP">Pound Sterling</option>
                                            <option value="HKD">Hong Kong Dollar</option>
                                            <option value="HUF">Hungarian Forint</option>
                                            <option value="ILS">Israeli New Sheqel</option>
                                            <option value="JPY">Japanese Yen</option>
                                            <option value="MXN">Mexican Peso</option>
                                            <option value="MYR">Malaysian Ringgit</option>
                                            <option value="NOK">Norwegian Krone</option>
                                            <option value="NZD">New Zealand Dollar</option>
                                            <option value="PHP">Philippine Peso</option>
                                            <option value="PLN">Polish Zloty</option>
                                            <option value="SEK">Swedish Krona</option>
                                            <option value="SGD">Singapore Dollar</option>
                                            <option value="THB">Thai Baht</option>
                                            <option value="TRY">Turkish Lira</option>
                                            <option value="TWD">Taiwan New Dollar</option>
                                            <option value="USD" selected="selected">US Dollar</option>
                                        </select>

                                        @if ($errors->has('currencies'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('currencies') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('operating_systems') ? ' has-error' : '' }} col-md-6">
                                        <label for="operating_systems">Operating Systems</label>

                                        <select multiple class="form-control selectpicker" id="operating_systems" name="operating_systems[]" data-live-search="true">
                                            <option value="Android">Android</option>
                                            <option value="iPhone OS">iPhone OS</option>
                                            <option value="Linux">Linux</option>
                                            <option value="Mac">Mac</option>
                                            <option value="Others">Others (Flash Based)</option>
                                            <option value="Windows Phone">Windows Phone</option>
                                            <option value="Windows" selected="selected">Windows</option>
                                        </select>

                                        @if ($errors->has('operating_systems'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('operating_systems') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('casino_versions') ? ' has-error' : '' }} col-md-6">
                                        <label for="casino_versions">Operator Versions</label>
                                        <input type="text" class="form-control" id="casino_versions" name="casino_versions" value="{{ old('casino_versions') }}" placeholder="Operator Versions" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('casino_versions'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('casino_versions') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('awards') ? ' has-error' : '' }} col-md-6">
                                        <label for="awards">Awards</label>
                                        <input type="text" class="form-control" id="awards" name="awards" value="{{ old('awards') }}" placeholder="Awards" maxlength="255" data-max="255">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('awards'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('awards') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>{{-- Detail Heading --}}

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="casinosContactHeading">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#casinosContactCollapse" aria-expanded="false" aria-controls="casinosContactCollapse">
                                    <i class="ti-angle-down"></i> Contact Information </a>
                            </h4>
                        </div>
                        <div id="casinosContactCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="casinosContactHeading">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-md-6">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" maxlength="30" data-max="30">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                                        <label for="email">E-Mail Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" maxlength="100" data-max="100">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} col-md-6">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}" placeholder="Website" maxlength="1024" data-max="1024">

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('live_chat') ? ' has-error' : '' }} col-md-6">
                                        <label for="live_chat">Live Chat Available?</label>

                                        <select class="form-control selectpicker" id="live_chat" name="live_chat">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>

                                        @if ($errors->has('live_chat'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('live_chat') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>{{-- Contact Info--}}


                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="casinoCashiering">
                            <h4 class="panel-title">
                                <a
                                        role="button" data-toggle="collapse" data-parent="#accordion" href="#casinoCashieringCollapse" aria-expanded="true" aria-controls="casinoCashieringCollapse"
                                > <i class="ti-angle-down"></i> Depositing &amp; Cashing Out </a>
                            </h4>
                        </div>
                        <div
                                id="casinoCashieringCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="casinoCashiering"
                        >
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group{{ $errors->has('cashiering_deposit_methods') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_deposit_methods">Deposit Methods</label> <input
                                                type="text" class="form-control" id="cashiering_deposit_methods" name="cashiering_deposit_methods" value="{{ old('cashiering_deposit_methods') }}" placeholder="Deposit Methods" maxlength="100" data-max="100"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_deposit_methods'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('cashiering_deposit_methods') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('cashiering_minimum_deposit') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_minimum_deposit">Minimum Deposit</label> <input
                                                type="text" class="form-control" id="cashiering_minimum_deposit" name="cashiering_minimum_deposit" value="{{ old('cashiering_minimum_deposit') }}" placeholder="Minimum Deposit" maxlength="20" data-max="20"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_minimum_deposit'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('cashiering_minimum_deposit') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('cashiering_withdrawal_methods') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_withdrawal_methods">Withdrawal Methods</label> <input
                                                type="text" class="form-control" id="cashiering_withdrawal_methods" name="cashiering_withdrawal_methods" value="{{ old('cashiering_withdrawal_methods') }}" placeholder="Withdrawal Methods" maxlength="100" data-max="100"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_withdrawal_methods'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('cashiering_withdrawal_methods') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('cashiering_withdrawal_limits') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_withdrawal_limits">Withdrawal Limits</label> <input
                                                type="text" class="form-control" id="cashiering_withdrawal_limits" name="cashiering_withdrawal_limits" value="{{ old('cashiering_withdrawal_limits') }}" placeholder="Withdrawal Limits" maxlength="20" data-max="20"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_withdrawal_limits'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('cashiering_withdrawal_limits') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('cashiering_minimum_withdrawal') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_minimum_withdrawal">Minimum Withdrawal</label> <input
                                                type="text" class="form-control" id="cashiering_minimum_withdrawal" name="cashiering_minimum_withdrawal" value="{{ old('cashiering_minimum_withdrawal') }}" placeholder="Minimum Withdrawal" maxlength="20" data-max="20"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_minimum_withdrawal'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('cashiering_minimum_withdrawal') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('cashiering_withdrawal_timeframes') ? ' has-error' : '' }} col-md-6">
                                        <label for="cashiering_withdrawal_timeframes">Withdrawal Timeframes</label>
                                        <input
                                                type="text" class="form-control" id="cashiering_withdrawal_timeframes" name="cashiering_withdrawal_timeframes" value="{{ old('cashiering_withdrawal_timeframes') }}" placeholder="Withdrawal Timeframes" maxlength="30" data-max="30"
                                        >

                                        <p class="help-block char-max-alert"></p>

                                        @if ($errors->has('cashiering_withdrawal_timeframes'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('cashiering_withdrawal_timeframes') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- Cashiering --}}

                    <hr>

                    <div class="panel panel-default" id="available-payment-methods">
                        <div class="panel-heading">
                            <h3 class="panel-title">Available Payment Methods</h3>
                        </div>

                        <div class="panel-body">
                            {{-- Payment Methods --}}
                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_visa" checked="checked" data-toggle="tooltip" data-placement="top" title="Visa"/>
                                    <div class="state p-success">
                                        <label>Visa</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_mastercard" checked="checked" data-toggle="tooltip" data-placement="top" title="MasterCard"/>
                                    <div class="state p-success">
                                        <label>MasterCard</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_prepaid_card" checked="checked" data-toggle="tooltip" data-placement="top" title="Prepaid Card"/>
                                    <div class="state p-success">
                                        <label>Prepaid Card</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_cash_at_the_cage" checked="checked" data-toggle="tooltip" data-placement="top" title="Cash at Casino Cage"/>
                                    <div class="state p-success">
                                        <label>Cash at Casino Cage</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_ach" checked="checked" data-toggle="tooltip" data-placement="top" title="ACH"/>
                                    <div class="state p-success">
                                        <label>ACH</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_paypal" checked="checked" data-toggle="tooltip" data-placement="top" title="PayPal"/>
                                    <div class="state p-success">
                                        <label>PayPal</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_skrill" checked="checked" data-toggle="tooltip" data-placement="top" title="Skrill"/>
                                    <div class="state p-success">
                                        <label>Skrill</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 m-b-10">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="pm_pay_near_me" checked="checked" data-toggle="tooltip" data-placement="top" title="Pay Near Me"/>
                                    <div class="state p-success">
                                        <label>Pay Near Me</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="panel panel-default" id="available-game-types">
                        <div class="panel-heading">
                            <h3 class="panel-title">Available Game Types</h3>
                        </div>

                        <div class="panel-body">

                            <h4>Casino</h4>

                            <div class="row">
                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_slots" data-toggle="tooltip" data-placement="top" title="Slots"/>
                                        <div class="state p-success">
                                            <label>Slots</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_blackjack" data-toggle="tooltip" data-placement="top" title="Blackjack"/>
                                        <div class="state p-success">
                                            <label>Blackjack</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_roulette" data-toggle="tooltip" data-placement="top" title="Roulette"/>
                                        <div class="state p-success">
                                            <label>Roulette</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_live_games" data-toggle="tooltip" data-placement="top" title="Live Dealer"/>
                                        <div class="state p-success">
                                            <label>Live Dealer</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_video_poker" data-toggle="tooltip" data-placement="top" title="Video Poker"/>
                                        <div class="state p-success">
                                            <label>Video Poker</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_baccarat" data-toggle="tooltip" data-placement="top" title="Baccarat"/>
                                        <div class="state p-success">
                                            <label>Baccarat</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_casino_bingo" data-toggle="tooltip" data-placement="top" title="Bingo"/>
                                        <div class="state p-success">
                                            <label>Bingo</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <h4>Poker</h4>

                            <div class="row">

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_poker_texas_hold_em" data-toggle="tooltip" data-placement="top" title="Texas Hold&#039;em"/>
                                        <div class="state p-success">
                                            <label>Texas Hold&#039;em</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_poker_omaha" data-toggle="tooltip" data-placement="top" title="Omaha"/>
                                        <div class="state p-success">
                                            <label>Omaha</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_poker_stud" data-toggle="tooltip" data-placement="top" title="Stud"/>
                                        <div class="state p-success">
                                            <label>Stud</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_poker_draw" data-toggle="tooltip" data-placement="top" title="Draw"/>
                                        <div class="state p-success">
                                            <label>Draw</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <h4>Sportsbetting</h4>

                            <div class="row">

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_nfl" data-toggle="tooltip" data-placement="top" title="NFL"/>
                                        <div class="state p-success">
                                            <label>NFL</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_nba" data-toggle="tooltip" data-placement="top" title="NBA"/>
                                        <div class="state p-success">
                                            <label>NBA</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_mlb" data-toggle="tooltip" data-placement="top" title="MLB"/>
                                        <div class="state p-success">
                                            <label>MLB</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_mls" data-toggle="tooltip" data-placement="top" title="MLS"/>
                                        <div class="state p-success">
                                            <label>MLS</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_nhl" data-toggle="tooltip" data-placement="top" title="NHL"/>
                                        <div class="state p-success">
                                            <label>NHL</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_epl" data-toggle="tooltip" data-placement="top" title="EPL"/>
                                        <div class="state p-success">
                                            <label>EPL</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_sportsbetting_esports" data-toggle="tooltip" data-placement="top" title="eSports"/>
                                        <div class="state p-success">
                                            <label>eSports</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <h4>Racing</h4>

                            <div class="row">

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_racing_horse_racing" data-toggle="tooltip" data-placement="top" title="Horse Racing"/>
                                        <div class="state p-success">
                                            <label>Horse Racing</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-10">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="gt_racing_greyhound_racing" data-toggle="tooltip" data-placement="top" title="Greyhound Racing"/>
                                        <div class="state p-success">
                                            <label>Greyhound Racing</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>{{-- Game Types --}}

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_software') ? ' has-error' : '' }}">
                                <label for="cont_software">Software</label>
                                <textarea name="cont_software" id="cont_software" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_software') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_software'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_software') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_mobile_app') ? ' has-error' : '' }}">
                                <label for="cont_mobile_app">Mobile App</label>
                                <textarea name="cont_mobile_app" id="cont_mobile_app" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_mobile_app') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_mobile_app'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_mobile_app') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_network_partners') ? ' has-error' : '' }}">
                                <label for="cont_network_partners">Network Partners</label>
                                <textarea name="cont_network_partners" id="cont_network_partners" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_network_partners') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_network_partners'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_network_partners') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_game_selection') ? ' has-error' : '' }}">
                                <label for="cont_game_selection">Game Selection</label>
                                <textarea name="cont_game_selection" id="cont_game_selection" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_game_selection') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_game_selection'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_game_selection') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_vip_program') ? ' has-error' : '' }}">
                                <label for="cont_vip_program">VIP Program</label>
                                <textarea name="cont_vip_program" id="cont_vip_program" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_vip_program') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_vip_program'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_vip_program') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_deposit_methods') ? ' has-error' : '' }}">
                                <label for="cont_deposit_methods">Deposit Methods</label>
                                <textarea name="cont_deposit_methods" id="cont_deposit_methods" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_deposit_methods') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_deposit_methods'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_deposit_methods') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_customer_support') ? ' has-error' : '' }}">
                                <label for="cont_customer_support">Customer Support</label>
                                <textarea name="cont_customer_support" id="cont_customer_support" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_customer_support') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_customer_support'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_customer_support') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('cont_background') ? ' has-error' : '' }}">
                                <label for="cont_background">Background</label>
                                <textarea name="cont_background" id="cont_background" class="form-control" maxlength="65535" data-max="65535">{{ old('cont_background') }}</textarea>

                                <div class="counter-container"></div>

                                @if ($errors->has('cont_background'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cont_background') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>{{-- Operator Contents --}}

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="editorsReviewHeading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#editorsReviewCollapse" aria-expanded="true" aria-controls="editorsReviewCollapse">
                                    <i class="ti-angle-down"></i> Editors Review </a>
                            </h4>
                        </div>
                        <div id="editorsReviewCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="editorsReviewHeading">
                            <div class="panel-body">
                                <div class="row">

                                    <div class="form-group{{ $errors->has('editors_review_casino_bonus') ? ' has-error' : '' }} col-md-6">
                                        <label for="editors_review_casino_bonus">Operator Bonus</label>
                                        <input type="text" class="form-control rating rating-loading" id="editors_review_casino_bonus" name="editors_review_casino_bonus" value="{{ old('editors_review_casino_bonus') }}" data-min="0" data-max="5" data-step="0.1" data-size="sm">

                                        @if ($errors->has('editors_review_casino_bonus'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('editors_review_casino_bonus') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('editors_review_game_selection') ? ' has-error' : '' }} col-md-6">
                                        <label for="editors_review_game_selection">Game Selection</label>
                                        <input type="text" class="form-control rating rating-loading" id="editors_review_game_selection" name="editors_review_game_selection" value="{{ old('editors_review_game_selection') }}" data-min="0" data-max="5" data-step="0.1" data-size="sm">

                                        @if ($errors->has('editors_review_game_selection'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('editors_review_game_selection') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group{{ $errors->has('editors_review_support') ? ' has-error' : '' }} col-md-6">
                                        <label for="editors_review_support">Support</label>
                                        <input type="text" class="form-control rating rating-loading" id="editors_review_support" name="editors_review_support" value="{{ old('editors_review_support') }}" data-min="0" data-max="5" data-step="0.1" data-size="sm">

                                        @if ($errors->has('editors_review_support'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('editors_review_support') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('editors_review_banking') ? ' has-error' : '' }} col-md-6">
                                        <label for="editors_review_banking">Banking</label>
                                        <input type="text" class="form-control rating rating-loading" id="editors_review_banking" name="editors_review_banking" value="{{ old('editors_review_banking') }}" data-min="0" data-max="5" data-step="0.1" data-size="sm">

                                        @if ($errors->has('editors_review_banking'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('editors_review_banking') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- Editors Review --}}

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="seoHeading">
                            <h3 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#casinoSeoCollapse" aria-expanded="true" aria-controls="casinoSeoCollapse"><i class="ti-angle-down"></i> Operators SEO Meta</a>
                            </h3>
                        </div>

                        <div id="casinoSeoCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="seoHeading">
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title') }}" placeholder="SEO Title" maxlength="255" data-max="255">

                                    <p class="help-block char-max-alert"></p>

                                    @if ($errors->has('seo_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control mceNoEditor" name="seo_description" id="seo_description" rows="3" maxlength="255" data-max="255">{{ old('seo_description') }}</textarea>

                                    <p class="help-block char-max-alert"></p>

                                    @if ($errors->has('seo_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('seo_description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control mceNoEditor" name="seo_keywords" id="seo_keywords" rows="3" maxlength="255" data-max="255">{{ old('seo_keywords') }}</textarea>

                                    <p class="help-block char-max-alert"></p>

                                    @if ($errors->has('seo_keywords'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('seo_keywords') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>{{-- SEO Meta --}}

                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-6">
                        <label for="sort_by">Sort By</label>
                        <input type="text" class="form-control" id="sort_by" name="sort_by" value="{{ old('sort_by') }}" placeholder="Sort By" maxlength="10" data-max="10">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('sort_by'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sort_by') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} col-md-6">
                        <label for="logo">Operator Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo') }}" required>

                        @if ($errors->has('logo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
                        <label for="is_active">Action</label>

                        <select class="selectpicker form-control" name="is_active" id="is_active">
                            <option value="1" selected="selected">Publish</option>
                            <option value="0">Draft</option>
                        </select>

                        @if ($errors->has('is_active'))
                            <span class="help-block">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                {{ csrf_field() }}

                <button type="submit" class="btn btn-success" form="casinoCreate">
                    <i class="ti-plus"></i> Create Operator
                </button>

            </form>

        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/speakingurl.min.js') }}"></script>
    <script src="{{ asset('js/slugify.min.js') }}"></script>
    <script>
        jQuery(function ($) {
            $('#slug').slugify('#name');
        });
    </script>

    <script>
        function getName() {
            var getName = document.getElementById("name").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#logo").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "textarea:not(.mceNoEditor)",
            plugins: 'advlist autolink link image lists charmap print preview wordcount anchor autosave code codemirror contextmenu media hr imagetools paste searchreplace table visualblocks autoresize',
            contextmenu: "link image inserttable | cell row column deletetable",
            mediaembed_max_width: 450,
            autoresize_min_height: 200,
            menubar: 'edit insert view format table tools',
            codemirror: {
                indentOnInit: true,
                path: '{{ asset('vendor/tinymce/plugins/codemirror/codemirror-4.8') }}',
                config: {
                    mode: 'application/x-httpd-php',
                    lineNumbers: true,
                    lineWrapping: true,
                    indentUnit: 4,
                    smartIndent: true
                },
                width: 1140,
                height: 650,
                saveCursorPosition: true,
                jsFiles: [
                    'mode/clike/clike.js',
                    'mode/php/php.js'
                ]
            },
            file_browser_callback: function (field_name, url, type, win) {
                var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    x = w.innerWidth || e.clientWidth || g.clientWidth,
                    y = w.innerHeight || e.clientHeight || g.clientHeight;

                var cmsURL = '{{ asset('vendor/file-browser/index-BS0uFniDw1vRuAhsMLs5f54qagb7aNYj.html') }}?&field_name=' + field_name;

                if (type === 'image') {
                    cmsURL = cmsURL + "&type=images";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'File Manager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        });
    </script>

    <script src="{{ asset('js/star-rating.min.js') }}" type="text/javascript"></script>

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

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#no_deposit_bonus_start_day').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();

        $('#no_deposit_bonus_end_day').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();

        $('#first_deposit_bonus_start_day').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();

        $('#first_deposit_bonus_end_day').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();
    </script>

    {{-- Include Casino Operator JS --}}
    @include('admin.plugins.00-snippets.casino-operator-js')

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0.3/dist/pretty-checkbox.min.css">
@endsection