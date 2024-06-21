<?php
namespace App\Class;

use App\Class\FileHandler;
use App\Class\Entity\Contact;

class ContactManager {

    /**
     * @throws \Exception
     */
    public static function getAllContacts(): array {
        return FileHandler::getContacts();
    }

    public static function getContactById(string $id): ?Contact {
        return FileHandler::getContactById($id);
    }

    public function createContact(array $data): void
    {
        $contact = Contact::fromArray($data);
        FileHandler::createContact($contact);
    }

    public static function updateContact(string $id, array $data): void
    {
        $contact = Contact::fromArray($data);
        FileHandler::updateContact($id, $contact);
    }

    public static function deleteContact(string $id): void
    {
        FileHandler::deleteContact($id);
    }
}
