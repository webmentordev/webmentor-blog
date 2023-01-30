<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.dashboard.categories', [
            'categories' => Category::latest()->with('user')->get()
        ]);
    }
    public function create(){
        $this->validate([
            'title' => 'required|unique:categories'
        ]);
        Category::create([
            'title' => $this->title,
            'slug' => strtolower(str_replace(' ', '-', $this->title)),
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'New Category has been created!');
    }

    public function update(){
        $this->validate([
            'title' => 'required'
        ]);
        Category::create([
            'title' => $this->title,
            'slug' => strtolower(str_replace(' ', '-', $this->title)),
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'New Category has been created!');
    }
}