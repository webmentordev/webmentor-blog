<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\ContactsData;

class Contactdata extends Component
{
    public function render()
    {
        return view('livewire.dashboard.contactdata', [
            'contacts' => ContactsData::latest()->get()
        ]);
    }
}
