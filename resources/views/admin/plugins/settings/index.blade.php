@extends('admin.layout.master')

@section('title', 'Site Settings')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
@endsection

@section('content')
    @unless(empty($settings))

        <div class="panel panel-default primary-container">
            <div class="panel-heading">Sites Global Settings [Last
                Updated: {{ \Carbon\Carbon::parse($settings->updated_at)->diffForHumans() }}]
            </div>

            <div class="panel-body">
                @if (session('settingsUpdated'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('settingsUpdated') }}</strong>
                    </div>
                @endif

                <form action="{{ route('admin.settings.update', ['id' => $settings->id]) }}" method="post"
                      id="siteSettings">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') ?: $settings->name }}"
                               placeholder="Site Name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('slogan') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="slogan" name="slogan"
                               value="{{ old('slogan') ?: $settings->slogan }}" placeholder="Site Slogan">

                        @if ($errors->has('slogan'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('slogan') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="author" name="author"
                               value="{{ old('author') ?: $settings->author }}" placeholder="Site Author">

                        @if ($errors->has('author'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('owner') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="owner" name="owner"
                               value="{{ old('owner') ?: $settings->owner }}"
                               placeholder="Site Owner">

                        @if ($errors->has('owner'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('owner') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email') ?: $settings->email }}" placeholder="Site E-Mail Address">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{ old('phone') ?: $settings->phone }}"
                               placeholder="Site Phone">

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('google_analytics') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="google_analytics" name="google_analytics"
                               value="{{ old('google_analytics') ?: $settings->google_analytics }}"
                               placeholder="Google Analytics">

                        @if ($errors->has('google_analytics'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('google_analytics') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('facebook_analytics') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="facebook_analytics" name="facebook_analytics"
                               value="{{ old('facebook_analytics') ?: $settings->facebook_analytics }}"
                               placeholder="Facebook Analytics">

                        @if ($errors->has('facebook_analytics'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('facebook_analytics') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('google_site_verification') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="google_site_verification"
                               name="google_site_verification"
                               value="{{ old('google_site_verification') ?: $settings->google_site_verification }}"
                               placeholder="Google Site Verification">

                        @if ($errors->has('google_site_verification'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('google_site_verification') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('bing_site_verification') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="bing_site_verification"
                               name="bing_site_verification"
                               value="{{ old('bing_site_verification') ?: $settings->bing_site_verification }}"
                               placeholder="Bing Site Verification">

                        @if ($errors->has('bing_site_verification'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('bing_site_verification') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title"
                               value="{{ old('seo_title') ?: $settings->seo_title }}" placeholder="SEO Title"
                               maxlength="255" data-max="255">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" name="seo_description" id="seo_description" rows="2"
                                  placeholder="SEO Description" maxlength="255"
                                  data-max="255">{{ old('seo_description') ?: $settings->seo_description }}</textarea>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                        <label for="seo_keywords">SEO Keywords</label>
                        <textarea class="form-control" name="seo_keywords" id="seo_keywords" rows="2"
                                  placeholder="SEO Keywords" maxlength="255"
                                  data-max="255">{{ old('seo_keywords') ?: $settings->seo_keywords }}</textarea>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_keywords'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_keywords') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-primary" form="siteSettings">Update Settings</button>
                </form>

                @if (session('siteLogoUpdated'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('siteLogoUpdated') }}</strong>
                    </div>
                @endif

                @if (session('siteLogoNotSelected'))
                    <div class="alert alert-warning" role="alert">
                        <strong>{{ session('siteLogoNotSelected') }}</strong>
                    </div>
                @endif

                @if (session('siteLogoDeleted'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('siteLogoDeleted') }}</strong>
                    </div>
                @endif

                <div class="panel panel-default m-t-20">
                    <div class="panel-heading">
                        <h3 class="panel-title">Site Logo Section</h3>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="thumbnail">
                                    <img src="{{ Image::url(Storage::url($settings->logo), 250, 250) }}"
                                         alt="{{ $settings->name }} Logo" class="img-responsive">
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('admin.update.logo', ['id' => $settings->id]) }}" method="post"
                              enctype="multipart/form-data" id="logoUpdate">

                            <div class="row">

                                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} col-md-6">
                                    <input type="file" class="form-control" id="logo" name="logo"
                                           value="{{ old('logo') }}">

                                    @if ($errors->has('logo'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                                    @endif
                                </div>

                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="col-md-6">

                                    <button type="submit" class="btn btn-success" form="logoUpdate">Update Logo</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#confirmDelete"><i
                                                class="ti-trash"></i> Delete Logo
                                    </button>
                                </div>
                            </div>

                        </form>

                        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Delete Site Logo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <strong>Are you sure?</strong> This action is irreversible!
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.delete.logo', ['id' => $settings->id]) }}"
                                              method="post" enctype="multipart/form-data" id="deleteLogo">

                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                        </form>

                                        <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                                    class="ti-trash"></i> Delete Logo
                                        </button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            <i class="ti-back-left"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endunless
@endsection

@section('customJS')
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#logo").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
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
@endsection