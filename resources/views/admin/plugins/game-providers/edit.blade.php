@extends('admin.layout.master')

@section('title')
    @unless(empty($editGameProvider))
        @foreach($editGameProvider as $game_provider)
            Edit {{ $game_provider->name }} - Game Providers
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editGameProvider))
        @foreach($editGameProvider as $game_provider)

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $game_provider->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $game_provider->id }} <i class="ti-shift-right-alt"></i> <strong>Created
                                At:</strong> {{ $game_provider->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $game_provider->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.game-providers.index') }}"
                               class="btn btn-success"><i class="ti-back-left"></i> Back</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmDelete" title="Delete"><i class="ti-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $game_provider->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.game-providers.destroy', ['id' => $game_provider->id]) }}"
                                  method="post" id="deleteLogo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                        class="ti-trash"></i>
                                Delete: {{ $game_provider->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $game_provider->name }} @if($game_provider->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($game_provider->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.game-providers.update', ['id' => $game_provider->id]) }}"
                          method="post"
                          id="gameProviderEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                <label for="name">Game Provider Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $game_provider->name }}"
                                       placeholder="Game Provider Name" maxlength="255" data-max="255">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('name'))
                                    <span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') ?: $game_provider->slug }}" placeholder="URL Slug"
                                       maxlength="255" data-max="255">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
<strong>{{ $errors->first('slug') }}</strong>
</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('cta_text') ? ' has-error' : '' }} col-md-6">
                                <label for="cta_text">CTA Text</label>
                                <input type="text" class="form-control" id="cta_text" name="cta_text"
                                       value="{{ old('cta_text') ?: $game_provider->cta_text }}" placeholder="CTA Text"
                                       maxlength="100" data-max="100">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('cta_text'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('cta_text') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cta_link') ? ' has-error' : '' }} col-md-6">
                                <label for="cta_link">CTA Link</label>
                                <input type="text" class="form-control" id="cta_link" name="cta_link"
                                       value="{{ old('cta_link') ?: $game_provider->cta_link }}" placeholder="CTA Link"
                                       maxlength="1536" data-max="1536">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('cta_link'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('cta_link') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        {{ method_field('PUT') }}

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
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

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes
                                </button>
                            </div>

                        </div>

                    </form>

                    @endforeach
                    @endunless

                </div>
            </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('*[data-max]').keyup(function () {
                // get the max chars for the input
                var text_max       = $(this).data('max');
                // compute current length
                var text_length    = $(this).val().length;
                // compute chars remaining
                var text_remaining = text_max - text_length;
                // display
                $(this).next('.char-max-alert').html(text_remaining + ' Characters Remaining');
            });
        });
    </script>
@endsection