<?php
namespace App\Class\Entity;

class Contact {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $description;

    public function __construct($id, $name, $email, $phone, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->description = $description;
    }

    public static function fromArray($data) {
        return new self(
            $data['id'] ?? uniqid(),
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['description'] ?? ''
        );
    }

    public function toArray() {
        return get_object_vars($this);
    }
}
// class Contact {
    
//     public function __construct(
//     private int $id,
//     private string $name,
//     private string $email,
//     private string  $description,
//     private string  $phone,
//     ) {}

    
//     public function getId(): int {
//         return $this->id;
//     }

//     public function setId(int $id): void {
//         $this->id = $id;
//     }

//     public function setName(string $name): void {
//         $this->name = $name;
//     }
//     public function getName(): string {
//         return $this->name;
//     }

//     public function setEmail(string $email): void {
//         $this->email = $email;
//     }

//     public function getEmail(): string {
//         return $this->email;
//     }

//     public function setDescription(string $description): void {
//         $this->description = $description;
//     }

//     public function getDescription(): string {
//         return $this->description;
//     }

//     public function setPhone(string $phone): void {
//         $this->phone = $phone;
//     }

//     public function getPhone(): string {
//         return $this->phone;
//     }

//     public static function fromArray($data) {
//         return new self(
//             $data['id'] ?? uniqid(),
//             $data['name'] ?? '',
//             $data['email'] ?? '',
//             $data['phone'] ?? '',
//             $data['description'] ?? ''
//         );
//     }

//     public function toArray() {
//         return get_object_vars($this);
//     }

//     public function __toString(): string {
//         return sprintf("
//         ", $this->id, $this->name, 
//         $this->email, $this->description, $this->phone);
//     }

