<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . url('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($news as $published_news)
        <url>
            <loc>{{ route('front-end.show-news', ['region' => \App\News::findOrFail($published_news->id)->region->slug, 'slug' => $published_news->slug]) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($published_news->updated_at)->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
            <image:image>
                <image:loc>{{ url(Storage::url($published_news->featured_image)) }}</image:loc>
                <image:title>{{ $published_news->name }}</image:title>
                <image:caption>{{ $published_news->seo_description }}</image:caption>
            </image:image>
        </url>
    @endforeach
</urlset>