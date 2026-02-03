<?php
require_once __DIR__ . '/../models/ContactInformation.php';

class ContactRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save(ContactInformation $contact): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO contacts (name, email, birth_date, subject, message)
             VALUES (:name, :email, :birthDate, :subject, :message)"
        );

        return $stmt->execute([
            ':name' => $contact->name,
            ':email' => $contact->email,
            ':birthDate' => $contact->birthDate,
            ':subject' => $contact->subject,
            ':message' => $contact->message
        ]);
    }

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM contacts ORDER BY id DESC");
        $contacts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = new ContactInformation(
                $row['name'],
                $row['email'],
                $row['birth_date'],
                $row['subject'],
                $row['message']
            );
        }
        return $contacts;
    }
}
