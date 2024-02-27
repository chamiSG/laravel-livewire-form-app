<?php

namespace App\Repositories;

use App\Models\Contact;
use Exception;

class ContactRepository
{
    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function getById($id)
    {
        return Contact::findOrFail($id);
    }
}
