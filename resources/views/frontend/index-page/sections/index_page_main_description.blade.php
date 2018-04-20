@unless(empty($index_page_main_description->contents) || $index_page_main_description->contents === NULL)
    <div class="index-page-main-description m-t-20" id="index-page-main-description">
        <div class="m-t-10 m-b-10">
            {!! $index_page_main_description->contents !!}
        </div>
    </div>
@endunless