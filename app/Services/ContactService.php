<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function create(array $data)
    {
        $contact = $this->contactRepository->create($data);

        return $contact;
    }

    public function getById($id)
    {
        $contact = $this->contactRepository->getById($id);

        return $contact;
    }

    
}
