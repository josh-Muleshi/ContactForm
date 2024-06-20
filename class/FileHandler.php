<?php
namespace App\Class;
use \Exception;
use App\Class\Entity\Contact;

class FileHandler {

    private const FILE = '../'. __DIR__ . '/contacts.json';

    public static function getContact(): array {
        if(!is_file(self::FILE)) {
            throw new Exception("Ce fichier n'exte pas");
        }

        $json = json_decode(file_get_contents(self::FILE), true);
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new Exception("Erreur au decodage du fichier : ". json_last_error_msg());
        }
        return $json;
    }

    public static function getContactById(String $id): Contact|null
    {
        $contacts = self::getContact();
        foreach ($contacts as $contact) {
            if ($contact['id'] == $id) {
                return $contact;
            }
        }
        return null;
    }

    public static function putJson(array $data): bool {
        if(!is_file(self::FILE)) {
            throw new Exception("Ce fichier n'exte pas");
        }

        $json = json_encode($data, JSON_PRETTY_PRINT);
        $isEncode = file_put_contents('../'. __DIR__ . '/contacts.json', $json);
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new Exception("Erreur a encodage du fichier : ". json_last_error_msg());
        }
        return $isEncode;
    }

    public static function createContact(array $data)
    {
        $contacts = self::getContact();
        $data['id'] = rand(1000000, 2000000);
        $contacts[] = $data;
        self::putJson($contacts);
        return $data;
    }

    public static function updateContact(string $id, array $data)
    {
        $updateContact = [];
        $contacts = self::getContact();
        foreach ($contacts as $key => $contact) {
            if ($contact['id'] == $id) {
                $contacts[$key] = $updateContact = array_merge($contact, $data);
            }
        }

        self::putJson($contacts);

        return $updateContact;
    }

    public static function deleteContact(string $id)
    {
        $contacts = self::getContact();

        foreach ($contacts as $key => $contact) {
            if ($contact['id'] == $id) {
                array_splice($contact, $key, 1);
            }
        }

        self::putJson($contact);
    }    
}