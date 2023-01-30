<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class CourseController extends Controller
{
    public function index(){
        SEOMeta::setTitle('Create Course - WebMentor');
        return view('courses.create-course');
    }
    public function create(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'lectures' => 'required|numeric',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'thumb' => 'required|image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'body' => 'required',
        ]);
        Course::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'lectures' => $request->lectures,
            'duration' => $request->duration,
            'price' => $request->price,
            'thumb' => $request->thumb->storeAs('courses', str_replace(' ', '_', $request->thumb->getClientOriginalName()), 'public_disk'),
            'description' => $request->description,
            'body' => $request->body,
            'slug' => str_replace(' ','-', strtolower($request->title))
        ]);
        return back()->with('success', 'Course has been created!');
    }

    public function update_index($id){
        SEOMeta::setTitle('Update Course - WebMentor');
        return view('courses.update-course', [
            'course' => Course::find($id),
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'nullable',
            'slug' => 'nullable',
            'lectures' => 'nullable|numeric',
            'duration' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'thumb' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable',
            'body' => 'nullable',
        ]);
        if($request->thumb != null){
            $array = [
                'title' => $request->title,
                'detail' => $request->detail,
                'lectures' => $request->lectures,
                'duration' => $request->duration,
                'price' => $request->price,
                'thumb' => $request->thumb->storeAs('courses', str_replace(' ', '_', $request->thumb->getClientOriginalName()), 'public_disk'),
                'description' => $request->description,
                'body' => $request->body,
                'slug' => str_replace(' ','-', strtolower($request->title))
            ];
        }else{
            $array = [
                'title' => $request->title,
                'detail' => $request->detail,
                'lectures' => $request->lectures,
                'duration' => $request->duration,
                'price' => $request->price,
                'description' => $request->description,
                'body' => $request->body,
                'slug' => str_replace(' ','-', strtolower($request->title))
            ];
        }
        $result = Course::find($id);
        $result->update(array_filter($array));
        $result->save();
        return back()->with('success', 'Course Successfully Updated!');
    }
}