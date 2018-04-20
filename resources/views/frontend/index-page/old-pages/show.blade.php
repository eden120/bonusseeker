@extends('frontend.layout.master-for-old-pages')

@section('content')
    @unless(empty($getOldPage))
        <div class="row show-page-article" style="margin-bottom: 0;">
            <div class="col-xs-12 col-md-12">
                @if(!empty($getOldPage->featured_image) || $getOldPage->featured_image !== NULL)
                    <div class="m-b-15 featured-image text-center">
                        @php list($width, $height) = getimagesize(url(Storage::url($getOldPage->featured_image)));
/*echo 'width: ' . $width . '<br />'; echo 'height: ' .  $height;*/ @endphp

                        @if($width <= 800)
                            <img src="{{ Image::url(Storage::url($getOldPage->featured_image)) }}" alt="{{ $getOldPage->name }}" class="thumbnail">
                        @elseif($height >= 150)
                            <img src="{{ Image::url(Storage::url($getOldPage->featured_image), 300, 200) }}" alt="{{ $getOldPage->name }}" class="thumbnail">
                        @else
                            <img src="{{ Image::url(Storage::url($getOldPage->featured_image), 1140, 480, ['crop']) }}" alt="{{ $getOldPage->name }}">
                        @endif
                    </div>

                    <div class="page-headline">
                        <h1>{{ $getOldPage->name }}</h1>
                    </div>
                @elseif(empty($getOldPage->featured_image) || $getOldPage->featured_image === NULL)
                    <h1>{{ $getOldPage->name }}</h1>
                @endif

                <div class="row m-t-10">
                    <div class="col-md-12">{!! $getOldPage->page_contents !!}</div>
                </div>
            </div>
        </div>
    @endunless
@endsection