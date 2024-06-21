<?php
namespace App\Class;
use App\Class\FileHandler;
use App\Class\Entity\Contact;

class ContactManager {

    public function getAllContacts(): array {
        return FileHandler::getContacts();
    }

    public function getContactById(string $id): Contact|null {
        return FileHandler::getContactById($id);
    }

    public function createContact(array $data) {
        $contact = Contact::fromArray($data);
        FileHandler::createContact($contact);
    }

    public function updateContact(string $id, array $data) {
        $contact = Contact::fromArray($data);
        FileHandler::updateContact($id, $contact);
    }

    public function deleteContact(string $id) {
        FileHandler::deleteContact($id);
    }
}
