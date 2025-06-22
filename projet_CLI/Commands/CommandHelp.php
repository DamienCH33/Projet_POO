<?php
require_once 'ContactManager.php';
class CommandHelp
{
    private $command;
    public function __construct()
    {
        $this->command = new ContactManager();
    }

    public function help()
    {
        echo "Commandes disponibles :\n";
        echo "  list                 → Affiche la liste de tous les contacts\n";
        echo "  details [id]         → Affiche les détails du contact avec l'identifiant donné\n";
        echo "  create               → Crée un nouveau contact\n";
        echo "  modify [id]          → Modifié un contact\n";
        echo "  delete [id]          → Supprime un contact avec l'identifiant donné\n";
        echo "  help                 → Affiche cette aide\n";
        echo "  exit                 → Quitte le programme\n";
    }
}
