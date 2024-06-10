<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        // Membuat objek sitemap
        $sitemap = Sitemap::create();

        // Tambahkan URL ke sitemap
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(now()));
        $sitemap->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setLastModificationDate(now()));
        
        // Tambahkan URL dinamis dari database (contoh untuk postingan)
        $blogs = Blogs::all();
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create("/blogs/{$blog->slug}")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($blog->updated_at));
        }

        // Generate sitemap.xml
        return $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
