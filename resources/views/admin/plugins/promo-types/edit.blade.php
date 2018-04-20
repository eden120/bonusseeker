@extends('admin.layout.master')

@section('title')
    @unless(empty($editPromoType))
        @foreach($editPromoType as $promo_type)
            Edit {{ $promo_type->name }} - Promo Types
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editPromoType))
        @foreach($editPromoType as $promo_type)

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $promo_type->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $promo_type->id }} <i class="ti-shift-right-alt"></i> <strong>Created
                                At:</strong> {{ $promo_type->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $promo_type->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.promo-types.index') }}"
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
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $promo_type->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.promo-types.destroy', ['id' => $promo_type->id]) }}"
                                  method="post" id="deleteLogo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                        class="ti-trash"></i>
                                Delete: {{ $promo_type->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $promo_type->name }} @if($promo_type->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($promo_type->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.promo-types.update', ['id' => $promo_type->id]) }}" method="post"
                          id="promoTypeEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                <label for="name">Promo Type Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $promo_type->name }}"
                                       placeholder="Promo Type Name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') ?: $promo_type->slug }}"
                                       placeholder="URL Slug">

                                @if ($errors->has('slug'))
                                    <span class="help-block">
<strong>{{ $errors->first('slug') }}</strong>
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
@endsection