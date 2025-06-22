<?php
require_once 'database.php';
require_once 'Contact.php';

class ContactManager
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = (new DBConnect())->getPDO();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM contact";
        $sqlstatement = $this->pdo->query($sql);
        $sqlresults = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];

        foreach ($sqlresults as $sqlresult) {
            $contact = new Contact($sqlresult['id'], $sqlresult['name'], $sqlresult['email'], $sqlresult['phone_number']);
            $contacts[] = $contact;
        }

        return $contacts;
    }

    public function findById($id)
    {
        $sqlId = "SELECT * FROM contact WHERE id = ?";
        $sqlIdstatement = $this->pdo->prepare($sqlId);
        $sqlIdstatement->execute([$id]);
        $sqlIdResult = $sqlIdstatement->fetch(PDO::FETCH_ASSOC);

        if ($sqlIdResult) {
            $contact = new Contact(
                $sqlIdResult['id'],
                $sqlIdResult['name'],
                $sqlIdResult['email'],
                $sqlIdResult['phone_number']
            );
            return $contact;
        }
        return null;
    }

    public function createContact($name, $email, $phone_number)
    {
        $sqlCreation = "INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)";
        $sqlInsertCreation = $this->pdo->prepare($sqlCreation);
        $sqlInsertCreation->execute([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
        ]);
        return [
            'id' => $this->pdo->lastInsertId(),
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number
        ];;
    }

    public function deleteContact($id)
    {
        $sqlDelete = "DELETE FROM contact WHERE id = ?";
        $sqlDeleteContact = $this->pdo->prepare($sqlDelete);
        $sqlDeleteContact->execute([$id]);

        return $sqlDeleteContact->rowCount();
    }

    public function modifyContact($id, $name, $email, $phone_number)
    {
        $sqlModify = "UPDATE contact SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id";
        $sqlModifyContact = $this->pdo->prepare($sqlModify);
        $sqlModifyContact->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
        ]);

        $sqlSelectModify = "SELECT * FROM contact WHERE id = :id";
        $modifyStmt = $this->pdo->prepare($sqlSelectModify);
        $modifyStmt->execute(['id' => $id]);
        $contactFromDb = $modifyStmt->fetch(PDO::FETCH_ASSOC);

        return $contactFromDb;
    }
}
