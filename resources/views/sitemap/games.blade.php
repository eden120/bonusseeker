<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . url('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($games as $game)
        <url>
            <loc>{{ route('front-end.section.show-game', ['slug' => $game->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($game->updated_at)->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>{{ url(Storage::url($game->logo)) }}</image:loc>
                <image:title>{{ $game->name }}</image:title>
                <image:caption>{{ $game->seo_description }}</image:caption>
            </image:image>
        </url>
    @endforeach
</urlset>