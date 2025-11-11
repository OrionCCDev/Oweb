<?php

use App\Helpers\SEOHelper;

if (!function_exists('seo')) {
    /**
     * Get the SEO helper instance
     *
     * @return SEOHelper
     */
    function seo()
    {
        return app(SEOHelper::class);
    }
}
