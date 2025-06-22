<?php
require_once 'ContactManager.php';
class CommandList
{
    private $commandList;
    public function __construct()
    {
        $this->commandList = new ContactManager();
    }
    public function list()
    {
        echo "Liste des contacts :\n";
        $contacts = $this->commandList->findAll();

        if (empty($contacts)) {
            echo "Aucun contact trouvé.\n";
        } else {

            foreach ($contacts as $contact) {
                echo $contact . "\n";
            }
        }
    }
}