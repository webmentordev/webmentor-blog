<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Course;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        SEOMeta::setTitle("Courses - WebMentor");
        return view('livewire.dashboard.courses', [
            'courses' => Course::latest()->paginate(10)
        ]);
    }
}
