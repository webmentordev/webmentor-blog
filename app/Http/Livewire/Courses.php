<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Courses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        SEOMeta::setTitle('P2P Courses In Pakistan | WebMentor');
        SEOMeta::setDescription('Cheap P2P Online Web Development Lectures in Pakistan and India. Learn Web Development by One To One Coaching Online Classes');
        SEOMeta::setCanonical('https://webmentor.online/courses');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('P2P Courses In Pakistan | WebMentor');
        OpenGraph::setDescription('Cheap P2P Online Web Development Lectures in Pakistan and India. Learn Web Development by One To One Coaching Online Classes'); 
        OpenGraph::setUrl('https://webmentor.online/courses');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::setUrl('/');
        OpenGraph::addImage('/images/cover.png');
        OpenGraph::addImage('/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Courses | WebMentor');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setType('card', 'summery');
        TwitterCard::setImage('/images/cover.png');

        JsonLd::setTitle('P2P Courses In Pakistan | WebMentor');
        JsonLd::setDescription('Cheap P2P Online Web Development Lectures in Pakistan and India. Learn Web Development by One To One Coaching Online Classes');
        JsonLd::addImage('/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('/images/cover.png');
        
        return view('livewire.courses', [
            'courses' => Course::latest()->paginate(9)
        ]);
    }
}
