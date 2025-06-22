<?php
require_once 'ContactManager.php';
class CommandDetail
{
    private $command;

    public function __construct()
    {
        $this->command = new ContactManager();
    }

    public function details($id)
    {
        $contact = $this->command->findById($id);

        if (empty($contact)) {
            echo "Aucun contact trouvé.\n";
        } else {
            echo $contact . "\n";
        }
    }
}