<?php
namespace App\Class;
use App\Class\Entity\Contact;

class FileHandler {
    private static $filePath = __DIR__ . '/../data/contacts.json';  

    public static function getContacts(): array {
        if (!file_exists(self::$filePath)) {
            echo "File not found: " . self::$filePath . PHP_EOL;
            return [];
        }
        $json = file_get_contents(self::$filePath);
        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON decode error: " . json_last_error_msg() . PHP_EOL;
            return [];
        }
        return array_map(function($item) {
            return Contact::fromArray($item);
        }, $data);
    }

    public static function getContactById(string $id): Contact|null {
        $contacts = self::getContacts();
        foreach ($contacts as $contact) {
            if ($contact->id === $id) {
                return $contact;
            }
        }
        return null;
    }

    public static function createContact(Contact $contact) {
        $contacts = self::getContacts();
        $contacts[] = $contact;
        self::saveContacts($contacts);
    }

    public static function updateContact(string $id, Contact $contact) {
        $contacts = self::getContacts();
        foreach ($contacts as &$existingContact) {
            if ($existingContact->id === $id) {
                $existingContact = $contact;
                break;
            }
        }
        self::saveContacts($contacts);
    }

    public static function deleteContact(string $id) {
        $contacts = self::getContacts();
        $contacts = array_filter($contacts, function($contact) use ($id) {
            return $contact->id !== $id;
        });
        self::saveContacts($contacts);
    }

    private static function saveContacts(array $contacts): bool {
        $data = array_map(function($contact) {
            return $contact->toArray();
        }, $contacts);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON encode error: " . json_last_error_msg() . PHP_EOL;
            return false;
        }
        $result = file_put_contents(self::$filePath, $json);
        if ($result === false) {
            echo "Failed to write to file: " . self::$filePath . PHP_EOL;
            return false;
        }
        return true;
    }
}
