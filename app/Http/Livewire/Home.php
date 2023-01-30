<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Home extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Tech Tips, Tricks & Tutorials | WebMentor');
        SEOMeta::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        SEOMeta::setCanonical('https://webmentor.online');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Tech Tips, Tricks & Tutorials | WebMentor');
        OpenGraph::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
        OpenGraph::setUrl('https://webmentor.online');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::setUrl('/');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Tech Tips, Tricks & Tutorials | WebMentor');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Tech Tips, Tricks & Tutorials | WebMentor');
        JsonLd::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        JsonLd::addImage('/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');

        return view('livewire.home', [
            'blogs' => Blog::latest()->where('is_active', true)->limit(4)->get(),
            'web' => Blog::where('category_id', 1)->with(['category', 'user'])->where('is_active', true)->latest()->limit(4)->get(),
            'linux' => Blog::where('category_id', 2)->with(['category', 'user'])->where('is_active', true)->latest()->limit(4)->get(),
            'gaming' => Blog::where('category_id', 3)->with(['category', 'user'])->where('is_active', true)->latest()->limit(4)->get(),
            'featured' => Blog::where('featured', 'yes')->with(['category', 'user'])->where('is_active', true)->latest()->limit(1)->get(),
        ]);
    }
}