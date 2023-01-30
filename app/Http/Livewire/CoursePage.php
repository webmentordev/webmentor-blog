<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class CoursePage extends Component
{
    public $course;
    
    public function render()
    {
        return view('livewire.course-page');
    }

    public function mount($slug){
        $course = Course::where('slug', $slug)->get();
        if($course->count() == 1){
            $this->course = $course;
            $this->title = $course[0]->title;
            
            SEOMeta::setTitle($course[0]->title. ' - WebMentor');
            SEOMeta::setDescription($course[0]->detail);
            SEOMeta::setCanonical("https://webmentor.online/course/".$course[0]->slug);
            SEOMeta::addMeta('apple-mobile-web-app-title', $course[0]->title);
            SEOMeta::addMeta('application-name', 'WebMentor');
            SEOMeta::addMeta('article:published_time', $course[0]->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:modified_time', $course[0]->updated_at->toW3CString(), 'property');
            
            OpenGraph::setTitle($course[0]->title);
            OpenGraph::setDescription($course[0]->detail); 
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('image:secure', 'http://');
            OpenGraph::addProperty('image:alt', $course[0]->title. ' Image');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl("https://webmentor.online/course/".$course[0]->slug);
            OpenGraph::addImage("https://webmentor.online/storage/".$course[0]->thumb);
            OpenGraph::setSiteName($course[0]->title);
            

            TwitterCard::setTitle($course[0]->title);
            TwitterCard::setSite('@webmentordev');
            TwitterCard::setImage("https://webmentor.online/storage/".$course[0]->thumb);
            TwitterCard::setDescription($course[0]->detail);
            
            JsonLd::setTitle($course[0]->title);
            JsonLd::setDescription($course[0]->detail);
            JsonLd::addImage("/storage/".$course[0]->thumb);
            JsonLd::setType('WebSite');
            JsonLd::addImage("/storage/".$course[0]->thumb);
        }else{
            abort(404);
        }
    }
}
