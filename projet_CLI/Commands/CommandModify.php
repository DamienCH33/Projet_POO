<?php
require_once 'ContactManager.php';
class CommandModify
{
    private $command;

    public function __construct()
    {
        $this->command = new ContactManager();
    }

    public function modify($id)
    {
        if (!is_numeric($id)) {
            echo "ID invalide.\n";
            return;
        }

        $contact = $this->command->findById($id);

        if (!$contact) {
            echo "Aucun contact trouvé avec cet ID.\n";
            return;
        }

        echo "Nom actuel : " . $contact->getName() . "\n";
        echo "Nouveau nom (laisser vide pour ne pas changer) : ";
        $name = trim(readline());
        if (empty($name)) {
            $name = $contact->getName();
        }

        echo "Email actuel : " . $contact->getEmail() . "\n";
        echo "Nouvel email (laisser vide pour ne pas changer) : ";
        $email = trim(readline());
        if (empty($email)) {
            $email = $contact->getEmail();
        }

        echo "Téléphone actuel : " . $contact->getPhoneNumber() . "\n";
        echo "Nouveau téléphone (laisser vide pour ne pas changer) : ";
        $phone = trim(readline());
        if (empty($phone)) {
            $phone = $contact->getPhoneNumber();
        }

        $updatedContact = $this->command->modifyContact($id, $name, $email, $phone);
        if ($updatedContact) {
            echo "Contact modifié avec succès.\n";
            echo "ID : {$updatedContact['id']}\n";
            echo "Nom : {$updatedContact['name']}\n";
            echo "Email : {$updatedContact['email']}\n";
            echo "Téléphone : {$updatedContact['phone_number']}\n";
            return $updatedContact;
        }
    }
}
