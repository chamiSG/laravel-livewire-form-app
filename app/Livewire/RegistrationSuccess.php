<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Services\ContactService;
use Livewire\Component;

class RegistrationSuccess extends Component
{
    public $status;
    public Contact $data;
    
    public function mount($id)
    {
        $this->status = session()->get('status');
        $this->data = Contact::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.registration-success');
    }
}
