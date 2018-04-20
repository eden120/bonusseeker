<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php echo '<?xml-stylesheet type="text/xsl" href="' . asset('xsl-stylesheet/xml-sitemap.xsl') . '"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ route('sitemap.pages') }}</loc>
        <lastmod>{{ \Carbon\Carbon::yesterday()->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.casinos') }}</loc>
        <lastmod>{{ $casino->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.promo-codes') }}</loc>
        <lastmod>{{ $casino->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.games') }}</loc>
        <lastmod>{{ $games->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.game-providers') }}</loc>
        <lastmod>{{ $game_providers->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.game-categories') }}</loc>
        <lastmod>{{ $game_categories->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.news') }}</loc>
        <lastmod>{{ $news->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>