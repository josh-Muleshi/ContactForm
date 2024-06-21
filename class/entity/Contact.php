<?php
namespace App\Class\Entity;

class Contact {

    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $phone,
        private string $description
    ) {}
    
    public static function fromArray(array $data) {
        return new self(
            $data['id'] ?? uniqid(),
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['description'] ?? ''
        );
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
