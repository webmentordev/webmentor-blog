<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Contact extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Contact | WebMentor');
        SEOMeta::setDescription('Contact WebMentor by filling the form here.WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        SEOMeta::setCanonical('https://webmentor.online/contact-us');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Contact | WebMentor');
        OpenGraph::setDescription('Contact WebMentor by filling the form here.WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
        OpenGraph::setUrl('https://webmentor.online/contact-us');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::setUrl('/');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Contact | WebMentor');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('Contact | WebMentor');
        JsonLd::setDescription('Contact WebMentor by filling the form here.WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        JsonLd::addImage('/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');

        return view('livewire.contact');
    }
}
