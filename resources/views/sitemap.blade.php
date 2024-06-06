<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!--  created with Free Online Sitemap Generator www.xml-sitemaps.com  -->
    <url>
        <loc>https://webmentordev.online</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blogs</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/courses</loc>
        <lastmod>2022-10-21T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blogs/</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/about-us</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/terms-of-service</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/privacy-policy</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/contact-us</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blog/category/web-development</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blog/category/linux-system</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blog/category/gaming</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/blog/category/guide</loc>
        <lastmod>2024-06-03T19:59:09+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/') }}/blog/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @foreach ($courses as $post)
        <url>
            <loc>{{ url('/') }}/course/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>