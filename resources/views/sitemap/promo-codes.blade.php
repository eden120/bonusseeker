<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . url('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>
<?php $region_slug = \App\Region::where('id', 1)->get(); ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($promo_codes as $promo_code)
        <url>
            <loc>{{ route('front-end.show-promo', ['region' => $region_slug[0]['slug'], 'slug' => $promo_code->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($promo_code->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{ url(Storage::url($promo_code->banner)) }}</image:loc>
                <image:title>{{ $promo_code->name }}</image:title>
                <image:caption>{{ $promo_code->seo_description }}</image:caption>
            </image:image>
        </url>
    @endforeach
</urlset>