<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . url('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>

<?php $region_slug = \App\Region::where('id', 1)->get(); ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('front-end.section.index') }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('front-end.section.games') }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.7</priority>
    </url>
    @foreach ($regions as $show_region)
        <url>
            <loc>{{ route('front-end.show-parent-post', ['region' => $show_region->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($show_region->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
    @foreach ($old_pages as $old_page)
        <url>
            <loc>{{ route('front-end.show-parent-post', ['region' => $old_page->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($old_page->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.7</priority>
            <image:image>
                <image:loc>{{ url(Storage::url($old_page->featured_image)) }}</image:loc>
                <image:title>{{ $old_page->name }}</image:title>
                <image:caption>{{ $old_page->seo_description }}</image:caption>
            </image:image>
        </url>
    @endforeach
</urlset>