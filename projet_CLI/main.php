<?php
require_once 'Commands/CommandList.php';
require_once 'Commands/CommandDetail.php';
require_once 'Commands/CommandCreate.php';
require_once 'Commands/CommandDelete.php';
require_once 'Commands/CommandModify.php';
require_once 'Commands/CommandHelp.php';

$commandList = new CommandList();
$commandDetail = new CommandDetail();
$commandCreate = new CommandCreate();
$commandDelete = new CommandDelete();
$commandModify = new CommandModify();
$commandHelp = new CommandHelp();

while (true) {
    $line = readline("Entrez votre commande : ");

    switch (true) {
        case $line === 'exit':
            echo "Fin d'affichage de la liste de contact.\n";
            exit;

        case $line === 'list':
            $commandList->list();
            break;

        case preg_match('/^details (\d+)$/', $line, $matches) === 1:
            $commandDetail->details($matches[1]);
            break;

        case $line === 'details':
            echo "Veuillez spécifier un ID après 'details'.\n";
            break;

        case $line === 'create':
            echo "Nom : ";
            $name = trim(readline());

            echo "Email : ";
            $email = trim(readline());

            echo "Téléphone : ";
            $phone = trim(readline());

            $commandCreate->create($name, $email, $phone);
            break;

        case preg_match('/^delete\s*(\d+)$/', $line, $matches) === 1:
            $commandDelete->delete($matches[1]);
            break;

        case $line === 'delete':
            echo "Veuillez spécifier un ID après 'delete'.\n";
            break;

        case preg_match('/^modify\s*(\d+)$/', $line, $matches) === 1:
            $commandModify->modify($matches[1]);
            break;

        case $line === 'modify':
            echo "Veuillez spécifier un ID après 'modify'.\n";
            break;

        case $line === 'help':
            $commandHelp->help();
            break;

        default:
            echo "Commande inconnue. Tapez 'help' pour la liste des commandes.\n";
            break;
    }
}
