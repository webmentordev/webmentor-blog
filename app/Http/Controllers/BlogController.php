<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogImages;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BlogController extends Controller
{

    public function index(){
        return view('create-blog', [
            'categories' => Category::all()
        ]);
    }
    
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filename = $request->file('upload')->storeAs('blog_images', str_replace(' ', '-', $request->file('upload')->getClientOriginalName()), 'public_disk');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'.$filename); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function updateImg(Request $request){
        $this->validate($request, [
            'blog_imges' => 'required|image|mimes:jpg,png,jpeg,webp|max:150',
        ]);

        BlogImages::create([
            'image' => $request->blog_imges->storeAs('blog_images', str_replace(' ', '-', $request->blog_imges->getClientOriginalName()), 'public_disk'),
        ]);

        return back()->with('success', 'Blog Image has been uploaded!');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'small_thumb' => 'required|image|mimes:jpg,png,jpeg,webp|max:50|unique:blogs',
            'large_thumb' => 'required|image|mimes:jpg,png,jpeg,webp|max:300|unique:blogs',
            'summary_ckeditor' => 'required',
            'tags' => 'required',
            'category' => 'required|numeric',
            'description' => 'required',
        ]);
        Blog::create([
            'title' => $request->title,
            'small_thumb' => $request->small_thumb->storeAs('blog_small', str_replace(' ', '-', $request->small_thumb->getClientOriginalName()), 'public_disk'),
            'large_thumb' => $request->large_thumb->storeAs('blog_large', str_replace(' ', '-', $request->large_thumb->getClientOriginalName()), 'public_disk'),
            'message' => $request->summary_ckeditor,
            'tags' => $request->tags,
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'description' => $request->description
        ]);
        return back()->with('success', 'Blog has been uploaded!');
    }

    public function blogs(){
        SEOMeta::setTitle('Blogs | WebMentor');
        SEOMeta::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        SEOMeta::setCanonical('https://webmentor.online/blogs');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
        SEOMeta::addMeta('application-name', 'WebMentor');

        OpenGraph::setTitle('Blogs | WebMentor');
        OpenGraph::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
        OpenGraph::setUrl('https://webmentor.online/blogs');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://webmentor.online/images/cover.png');
        OpenGraph::addImage('https://webmentor.online/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Blogs | WebMentor');
        TwitterCard::setSite('@webmentordev');
        TwitterCard::setImage('https://webmentor.online/images/cover.png');
        TwitterCard::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');

        JsonLd::setTitle('Blogs | WebMentor');
        JsonLd::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
        JsonLd::addImage('https://webmentor.online/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://webmentor.online/images/cover.png');
        return view('blogs', [
            'blogs' => Blog::where('is_active', true)->latest()->paginate(20)
        ]);
    }

    public function search(Request $request){
            SEOMeta::setTitle($request->search. ' | WebMentor');
            SEOMeta::setDescription('Search Blogs available on WebMentor. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            SEOMeta::setCanonical('https://webmentor.online');
            SEOMeta::setRobots('index, follow');
            SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
            SEOMeta::addMeta('application-name', 'WebMentor');

            OpenGraph::setTitle($request->search. ' | WebMentor');
            OpenGraph::setDescription('Search Blogs available on WebMentor. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
            OpenGraph::setUrl('https://webmentor.online');
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl('/');
            OpenGraph::addImage('https://webmentor.online/images/cover.png');
            OpenGraph::addImage('https://webmentor.online/images/cover.png', ['height' => 630, 'width' => 1200]);

            TwitterCard::setTitle($request->search. ' | WebMentor');
            TwitterCard::setSite('@webmentordev');
            TwitterCard::setImage('https://webmentor.online/images/cover.png');
            TwitterCard::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');

            JsonLd::setTitle($request->search. ' | WebMentor');
            JsonLd::setDescription('Search Blogs available on WebMentor. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            JsonLd::addImage('https://webmentor.online/images/logo.png');
            JsonLd::setType('WebSite');
            JsonLd::addImage('https://webmentor.online/images/cover.png');
        return view('blogs', [
            'blogs' => Blog::where('title', 'LIKE', '%'.$request->search.'%')->where('is_active', true)->orWhere('tags', 'LIKE', '%'.$request->search.'%')->paginate(20)
        ]);
    }

    public function blogsCategory($category){
        $result = Category::where('slug', $category)->get();
        if(count($result) && $result != null){
            SEOMeta::setTitle('Blogs By Category | WebMentor');
            SEOMeta::setDescription('Search your Blog by category will help alot. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            SEOMeta::setCanonical("https://webmentor.online/blog/category/{$category}");
            SEOMeta::setRobots('index, follow');
            SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
            SEOMeta::addMeta('application-name', 'WebMentor');

            OpenGraph::setTitle('Blogs By Category | WebMentor');
            OpenGraph::setDescription('Search your Blog by category will help alot. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
            OpenGraph::setUrl("https://webmentor.online/blog/category/{$category}");
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl('/');
            OpenGraph::addImage('https://webmentor.online/images/cover.png');
            OpenGraph::addImage('https://webmentor.online/images/cover.png', ['height' => 630, 'width' => 1200]);

            TwitterCard::setTitle('Blogs By Category | WebMentor');
            TwitterCard::setSite('@webmentordev');
            TwitterCard::setImage('https://webmentor.online/images/cover.png');
            TwitterCard::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');

            JsonLd::setTitle('Blogs By Category | WebMentor');
            JsonLd::setDescription('Search your Blog by category will help alot. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            JsonLd::addImage('https://webmentor.online/images/logo.png');
            JsonLd::setType('WebSite');
            JsonLd::addImage('https://webmentor.online/images/cover.png');
            return view('blogs', [
                'blogs' => Blog::where('category_id', $result[0]->id)->where('is_active', true)->orWhere('tags', 'LIKE', '%'.$category.'%')->orWhere('title', 'LIKE', '%'.$category.'%')->paginate(20)
            ]);
        }else{
            abort(404, 'page not found');
        }
    }

    public function blogsTags($tag){
        SEOMeta::setTitle('Blogs By Tags | WebMentor');
            SEOMeta::setDescription('Search your blogs with tag. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            SEOMeta::setCanonical('https://webmentor.online');
            SEOMeta::setRobots('index, follow');
            SEOMeta::addMeta('apple-mobile-web-app-title', 'WebMentor');
            SEOMeta::addMeta('application-name', 'WebMentor');

            OpenGraph::setTitle('Blogs By Tags | WebMentor');
            OpenGraph::setDescription('Search your blogs with tag. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.'); 
            OpenGraph::setUrl('https://webmentor.online');
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl('/');
            OpenGraph::addImage('https://webmentor.online/images/cover.png');
            OpenGraph::addImage('https://webmentor.online/images/cover.png', ['height' => 630, 'width' => 1200]);

            TwitterCard::setTitle('Blogs By Tags | WebMentor');
            TwitterCard::setSite('@webmentordev');
            TwitterCard::setImage('https://webmentor.online/images/cover.png');
            TwitterCard::setDescription('WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');

            JsonLd::setTitle('Blogs By Tags | WebMentor');
            JsonLd::setDescription('Search your blogs with tag. WebMentor is a Linux System Admin, DevOps, Development and Gaming blog that publishes articles and tutorials about development problem solving, guide for products.');
            JsonLd::addImage('https://webmentor.online/images/logo.png');
            JsonLd::setType('WebSite');
            JsonLd::addImage('https://webmentor.online/images/cover.png');
        return view('blogs', [
            'blogs' => Blog::where('tags', 'LIKE', '%'.$tag.'%')->where('is_active', true)->paginate(20)
        ]);
    }


    public function updateIndex($id){
        $result = Blog::find($id);
        if($result != null){
            return view('update-blog', [
                'categories' => Category::all(),
                'blogdata' => $result,
                'update_id' => $result->id,
                'images' => BlogImages::latest()->get()
            ]);
        }else{
            abort(500, 'Internal Server Error');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'small_thumb' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:50',
            'large_thumb' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:300',
            'summary_ckeditor' => 'required',
            'tags' => 'required',
            'slug' => 'required',
            'category' => 'nullable|numeric',
            'description' => 'required',
            'featured' => 'nullable',
            'active' => 'nullable',
        ]);

        if($request->active == 'true'){
            $status = true;
        }elseif($request->active == 'false'){
            $status = true;
        }else{
            $status = null;
        }
        $array = array(
            "title" => $request->title,
            "message" => $request->summary_ckeditor,
            "tags" => $request->tags,
            "slug" => $request->slug,
            "category" => $request->category,
            "description" => $request->description,
            "featured" => $request->featured,
            "is_active" => $status,
        );

        if($request->small_thumb != null){
            $small_thumb = $request->small_thumb->storeAs('blog_small', str_replace(' ', '-', $request->small_thumb->getClientOriginalName()), 'public_disk');
            $array['small_thumb'] = $small_thumb;
        }
        if($request->large_thumb != null){
            $large_thumb = $request->large_thumb->storeAs('blog_large', str_replace(' ', '-', $request->large_thumb->getClientOriginalName()), 'public_disk');
            $array['large_thumb'] = $large_thumb;
        }
        $results = Blog::find($id);
        $results->update(array_filter($array));
        $results->save();
        return back()->with('success', 'Blog Successfully Updated!');
    }
}