<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class About extends Component
{
    public function render()
    {
        SEOMeta::setTitle('About Us | GiftForPakistan');
        SEOMeta::setDescription('GiftforPakistan is an online store that provides gift services in Pakistan. We offer a wide range of gift options for all occasions, including Birthdays, Weddings, Anniversaries, Eids, and more. We also offer a variety of delivery options to make sure your gift reaches its destination on time.');
        SEOMeta::setCanonical('https://giftforPakistan.com/about-us');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'GiftForPakistan');
        SEOMeta::addMeta('application-name', 'GiftForPakistan');

        OpenGraph::setTitle('About Us | GiftForPakistan');
        OpenGraph::setDescription('GiftforPakistan is an online store that provides gift services in Pakistan. We offer a wide range of gift options for all occasions, including Birthdays, Weddings, Anniversaries, Eids, and more. We also offer a variety of delivery options to make sure your gift reaches its destination on time.'); 
        OpenGraph::setUrl('https://giftforPakistan.com/about-us');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::setUrl('/');
        OpenGraph::addImage('https://giftforPakistan.com/images/cover.png');
        OpenGraph::addImage('https://giftforPakistan.com/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('About Us | GiftForPakistan');
        TwitterCard::setSite('@giftforpakistan');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('https://giftforPakistan.com/images/cover.png');

        JsonLd::setTitle('About Us | GiftForPakistan');
        JsonLd::setDescription('GiftforPakistan is an online store that provides gift services in Pakistan. We offer a wide range of gift options for all occasions, including Birthdays, Weddings, Anniversaries, Eids, and more. We also offer a variety of delivery options to make sure your gift reaches its destination on time.');
        JsonLd::addImage('https://giftforPakistan.com/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforPakistan.com/images/cover.png');
        
        return view('livewire.about');
    }
}
