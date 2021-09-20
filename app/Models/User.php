<?php

namespace App\Models;

use phpDocumentor\Reflection\Types\Void_;

class User
{
    public $first_name;

    public $last_name;

    public $email;


    public function setFirstName($firstName)
    {
        $this->first_name = trim($firstName);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastName)
    {
        $this->last_name = trim($lastName);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setEmail($email)
    {
        $this->email = trim($email);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName(): string
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function getEmailVariables(): array
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail(),
        ];
    }
}
