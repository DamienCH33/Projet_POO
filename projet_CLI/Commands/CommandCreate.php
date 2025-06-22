<?php
require_once 'ContactManager.php';
class CommandCreate
{
    private $command;

    public function __construct()
    {
        $this->command = new ContactManager();
    }

    public function create(string $name, string $email, string $phone_number)
    {
        if (empty($name) || (empty($email) || (empty($phone_number)))) {
            echo "Merci de remplir les champs manquants.\n";
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse mail n'est pas valide. \n";
            return;
        }

        $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        if (strlen($phone_number) != 10) {
            echo "Numéro de téléphone invalide. \n";
            return;
        }
        $phone_number = trim(chunk_split($phone_number, 2, ' '));

        $newContact = $this->command->createContact($name, $email, $phone_number);

        if ($newContact) {
            echo "Contact créé avec succès.\n";
            echo "ID : {$newContact['id']}\n";
            echo "Nom : {$newContact['name']}\n";
            echo "Email : {$newContact['email']}\n";
            echo "Téléphone : {$newContact['phone_number']}\n";
            return $newContact;
        }
    }
}
