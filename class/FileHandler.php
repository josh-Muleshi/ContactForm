<?php
namespace App\Class;

use \Exception;
use App\Class\Entity\Contact;

class FileHandler {
    private static string $filePath = __DIR__ . '/../data/contacts.json';

    public static function getContacts(): array
    {
        if (!file_exists(self::$filePath)) {
            return [];
        }
        $json = (string) file_get_contents(self::$filePath);
        $data = (array) json_decode($json, true);
        if (empty($data)) {
            self::saveContacts([]);
        }
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erreur au décodage du fichier : " . json_last_error_msg());
        }
        return array_map(function($item) {
            return Contact::fromArray((array) $item);
        }, $data);
    }

    /**
     * @throws Exception
     */
    public static function getContactById(string $id): ?Contact {
        $contacts = self::getContacts();
        foreach ($contacts as $contact) {
            if ($contact->id === $id) {
                return $contact;
            }
        }
        return null;
    }

    public static function createContact(?Contact $contact): void
    {
        $contacts = self::getContacts();
        $contacts[] = $contact;
        self::saveContacts($contacts);
    }

    public static function updateContact(string $id, ?Contact $contact): void
    {
        $contacts = self::getContacts();
        foreach ($contacts as &$existingContact) {
            if ($existingContact->id === $id) {
                $existingContact = $contact;
                break;
            }
        }
        self::saveContacts($contacts);
    }

    public static function deleteContact(string $id): void
    {
        $contacts = self::getContacts();
        $contacts = array_filter($contacts, function($contact) use ($id) {
            return $contact->id !== $id;
        });
        self::saveContacts($contacts);
    }

    private static function saveContacts(array $contacts): void
    {
        $data = array_map(function($contact) {
            return $contact->toArray();
        }, $contacts);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erreur à l'encodage du fichier : " . json_last_error_msg());
        }
        file_put_contents(self::$filePath, $json);
    }
}
