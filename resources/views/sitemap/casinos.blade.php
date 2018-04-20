<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . url('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($casinos as $casino)
        <url>
            <loc>{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' =>$casino->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($casino->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.7</priority>
            <image:image>
                <image:loc>{{ url(Storage::url($casino->logo)) }}</image:loc>
                <image:title>{{ $casino->name }}</image:title>
                <image:caption>{{ $casino->seo_description }}</image:caption>
            </image:image>
        </url>
    @endforeach
</urlset>