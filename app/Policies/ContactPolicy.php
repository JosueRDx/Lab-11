<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function editContact(User $user, Contact $contact): bool
    {   
        \Log::info("User {$user->id} attempting to edit contact {$contact->id}");
        return $user->id === $contact->user_id;
    }

    public function updateContact(User $user, Contact $contact): bool
    {
        return $user->id === $contact->user_id;
    }

    public function deleteContact(User $user, Contact $contact): bool
    {
        return $user->id === $contact->user_id;
    }
}
