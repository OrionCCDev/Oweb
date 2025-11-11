<?php

namespace App\Helpers;

class SEOHelper
{
    protected $title;
    protected $description;
    protected $keywords;
    protected $image;
    protected $url;
    protected $type = 'website';
    protected $author = 'Orion Contracting Company';
    protected $canonical;

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setKeywords($keywords)
    {
        if (is_array($keywords)) {
            $this->keywords = implode(', ', $keywords);
        } else {
            $this->keywords = $keywords;
        }
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;
        return $this;
    }

    public function getTitle()
    {
        return $this->title ?? 'Orion Contracting Company - Leading Construction Experts in UAE & Saudi Arabia';
    }

    public function getDescription()
    {
        return $this->description ?? 'Orion Contracting Company is a premier construction and contracting firm with over 15 years of expertise, specializing in commercial, industrial, and MEP projects across UAE and Saudi Arabia.';
    }

    public function getKeywords()
    {
        return $this->keywords ?? 'construction company UAE, contracting company Dubai, MEP contractors UAE, industrial construction, commercial construction, construction company Saudi Arabia, building contractors Dubai, construction firms UAE';
    }

    public function getImage()
    {
        return $this->image ?? asset('orionFrontAssets/assets/images/favicons/logo-blue.webp');
    }

    public function getUrl()
    {
        return $this->url ?? url()->current();
    }

    public function getCanonical()
    {
        return $this->canonical ?? url()->current();
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function render()
    {
        $html = '';

        // Basic meta tags
        $html .= '<title>' . e($this->getTitle()) . '</title>' . "\n";
        $html .= '<meta name="description" content="' . e($this->getDescription()) . '">' . "\n";
        $html .= '<meta name="keywords" content="' . e($this->getKeywords()) . '">' . "\n";
        $html .= '<meta name="author" content="' . e($this->getAuthor()) . '">' . "\n";
        $html .= '<meta name="robots" content="index, follow">' . "\n";

        // Canonical URL
        $html .= '<link rel="canonical" href="' . e($this->getCanonical()) . '">' . "\n";

        // Open Graph tags
        $html .= '<meta property="og:type" content="' . e($this->getType()) . '">' . "\n";
        $html .= '<meta property="og:title" content="' . e($this->getTitle()) . '">' . "\n";
        $html .= '<meta property="og:description" content="' . e($this->getDescription()) . '">' . "\n";
        $html .= '<meta property="og:image" content="' . e($this->getImage()) . '">' . "\n";
        $html .= '<meta property="og:url" content="' . e($this->getUrl()) . '">' . "\n";
        $html .= '<meta property="og:site_name" content="Orion Contracting Company">' . "\n";

        // Twitter Card tags
        $html .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
        $html .= '<meta name="twitter:title" content="' . e($this->getTitle()) . '">' . "\n";
        $html .= '<meta name="twitter:description" content="' . e($this->getDescription()) . '">' . "\n";
        $html .= '<meta name="twitter:image" content="' . e($this->getImage()) . '">' . "\n";

        return $html;
    }
}
