<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($jobs as $job)
    <url>
        <loc>{{ URL::to('jobs/'.$job->id.'') }}</loc>
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($job->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach

</urlset>