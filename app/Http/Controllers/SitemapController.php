<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sector;
use App\Models\Event;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $sitemap .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

        // Homepage
        $sitemap .= $this->addUrl(url('/'), '1.0', 'daily', now()->toAtomString());

        // Static pages
        $sitemap .= $this->addUrl(route('about'), '0.8', 'monthly', now()->toAtomString());
        $sitemap .= $this->addUrl(route('contact'), '0.8', 'monthly', now()->toAtomString());
        $sitemap .= $this->addUrl(route('clients'), '0.7', 'monthly', now()->toAtomString());
        $sitemap .= $this->addUrl(route('team'), '0.7', 'monthly', now()->toAtomString());

        // Projects listing
        $sitemap .= $this->addUrl(route('projects.index'), '0.9', 'weekly', now()->toAtomString());
        $sitemap .= $this->addUrl(route('indexOfList'), '0.9', 'weekly', now()->toAtomString());

        // Individual projects
        $projects = Project::all();
        foreach ($projects as $project) {
            $imageUrl = null;
            if ($project->hasMedia('images')) {
                $imageUrl = $project->getFirstMediaUrl('images');
            }
            $sitemap .= $this->addUrl(
                route('projects.show', $project->id),
                '0.8',
                'monthly',
                $project->updated_at->toAtomString(),
                $imageUrl,
                $project->name
            );
        }

        // Sectors listing
        $sitemap .= $this->addUrl(route('sectors.index'), '0.9', 'weekly', now()->toAtomString());

        // Individual sectors
        $sectors = Sector::all();
        foreach ($sectors as $sector) {
            $imageUrl = null;
            if ($sector->hasMedia('images')) {
                $imageUrl = $sector->getFirstMediaUrl('images');
            }
            $sitemap .= $this->addUrl(
                route('sectors.show', $sector->id),
                '0.8',
                'monthly',
                $sector->updated_at->toAtomString(),
                $imageUrl,
                $sector->name
            );
        }

        // News/Events listing
        $sitemap .= $this->addUrl(route('news.index'), '0.9', 'weekly', now()->toAtomString());

        // Individual news/events
        $events = Event::all();
        foreach ($events as $event) {
            $imageUrl = null;
            if ($event->hasMedia('images')) {
                $imageUrl = $event->getFirstMediaUrl('images');
            }
            $sitemap .= $this->addUrl(
                route('news.show', $event->id),
                '0.7',
                'monthly',
                $event->updated_at->toAtomString(),
                $imageUrl,
                $event->name
            );
        }

        // Certificates
        $sitemap .= $this->addUrl(route('certificate.index'), '0.7', 'monthly', now()->toAtomString());

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate a sitemap URL entry
     *
     * @param string $loc The URL location
     * @param string $priority Priority (0.0 to 1.0)
     * @param string $changefreq Change frequency
     * @param string $lastmod Last modification date
     * @param string|null $image Optional image URL
     * @param string|null $imageTitle Optional image title
     * @return string
     */
    private function addUrl($loc, $priority = '0.5', $changefreq = 'monthly', $lastmod = null, $image = null, $imageTitle = null)
    {
        $url = '<url>';
        $url .= '<loc>' . htmlspecialchars($loc) . '</loc>';

        if ($lastmod) {
            $url .= '<lastmod>' . $lastmod . '</lastmod>';
        }

        $url .= '<changefreq>' . $changefreq . '</changefreq>';
        $url .= '<priority>' . $priority . '</priority>';

        if ($image) {
            $url .= '<image:image>';
            $url .= '<image:loc>' . htmlspecialchars($image) . '</image:loc>';
            if ($imageTitle) {
                $url .= '<image:title>' . htmlspecialchars($imageTitle) . '</image:title>';
            }
            $url .= '</image:image>';
        }

        $url .= '</url>';

        return $url;
    }
}
