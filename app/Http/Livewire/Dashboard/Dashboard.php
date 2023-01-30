<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Blog;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        SEOMeta::setTitle("Dashboard - WebMentor");
        return view('livewire.dashboard.dashboard', [
            'blogs' => Blog::with('user')->latest()->get()
        ]);
    }
}