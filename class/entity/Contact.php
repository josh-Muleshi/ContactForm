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
    
    public static function fromArray(array $data): ?Contact {
        return new self(
            $data['id'] ?? uniqid(),
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['description'] ?? ''
        );
    }

    public function toArray(): ?array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
        ];
    }
    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getDescription(): string {
        return $this->description;
    }
}
