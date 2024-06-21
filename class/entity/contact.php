<?php
namespace App\Class\Entity;

class Contact {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $description;

    public static function fromArray(array $data) {
        $contact = new self();
        $contact->id = $data['id'] ?? uniqid();
        $contact->name = $data['name'] ?? '';
        $contact->email = $data['email'] ?? '';
        $contact->phone = $data['phone'] ?? '';
        $contact->description = $data['description'] ?? '';
        return $contact;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
        ];
    }
}

