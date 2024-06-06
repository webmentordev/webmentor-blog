<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Blogread extends Component
{
    public $blog, $title;
    public $related;

    public function render()
    {
        return view('livewire.blogread');
    }

    public function mount($slug){
        $blog = Blog::where('slug', $slug)->get();
        if($blog->count() == 1){
            $this->blog = $blog;
            $this->title = $blog[0]->title;
            $this->related = Blog::where('category_id', $blog[0]->category_id)->limit(3)->get();
            
            
            SEOMeta::setTitle($blog[0]->title);
            SEOMeta::setDescription($blog[0]->description);
            SEOMeta::setCanonical("https://webmentordev.online/blog/".$blog[0]->slug);
            SEOMeta::addMeta('apple-mobile-web-app-title', $blog[0]->title);
            SEOMeta::addMeta('application-name', 'WebMentor');
            SEOMeta::addMeta('article:published_time', $blog[0]->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:modified_time', $blog[0]->updated_at->toW3CString(), 'property');
            SEOMeta::addMeta('news_keywords', $blog[0]->tags);
            
            OpenGraph::setTitle($blog[0]->title);
            OpenGraph::setDescription($blog[0]->description); 
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('image:secure', 'http://');
            OpenGraph::addProperty('image:alt', $blog[0]->title. ' Image');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl("https://webmentordev.online/blog/".$blog[0]->slug);
            OpenGraph::addImage("https://webmentordev.online/storage/".$blog[0]->large_thumb);
            OpenGraph::setSiteName($blog[0]->title);
            

            TwitterCard::setTitle($blog[0]->title);
            TwitterCard::setSite('@webmentordev');
            TwitterCard::setImage("https://webmentordev.online/storage/".$blog[0]->large_thumb);
            TwitterCard::setDescription($blog[0]->description);
            
            JsonLd::setTitle($blog[0]->title);
            JsonLd::setDescription($blog[0]->description);
            JsonLd::addImage("/storage/".$blog[0]->large_thumb);
            JsonLd::setType('WebSite');
            JsonLd::addImage("/storage/".$blog[0]->large_thumb);
        }else{
            abort(404);
        }
    }
}