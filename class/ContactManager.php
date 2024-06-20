<?php
namespace App\Class;
use App\Class\FileHandler;

class ContactManager {

    public function getAllContacts() {
        return FileHandler::getContact();
    }

    public function getContactById(string $id) {
        return FileHandler::getContactById($id);
    }

    public function createContact(array $data) {
        FileHandler::createContact($data);
    }

    public function updateContact(string $id, array $data) {
        FileHandler::updateContact($id, $data);
    }

    public function deleteContact(string $id) {
        FileHandler::deleteContact($id);
    }
}