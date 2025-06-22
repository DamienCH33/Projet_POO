<?php
require_once 'ContactManager.php';
class CommandDelete
{
    private $command;

    public function __construct()
    {
        $this->command = new ContactManager();
    }

    public function delete($id)
    {
        $deleted = $this->command->deleteContact((int)$id);

        if ($deleted) {
            echo "Contact supprimé avec succès.\n";
        } else {
            echo "Aucun contact trouvé avec cet ID.\n";
        }
    }

    
}
