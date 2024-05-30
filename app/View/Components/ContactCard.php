<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact;

class ContactCard extends Component
{
    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('components.contact-card');
    }
}

