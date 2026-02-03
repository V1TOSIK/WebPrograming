<?php
require_once __DIR__ . '/../repositories/ContactRepository.php';
require_once __DIR__ . '/../models/ContactInformation.php';

class ContactService {
    private ContactRepository $repo;

    public function __construct(ContactRepository $repo) {
        $this->repo = $repo;
    }

    // Зберігаємо контакт з валідацією
    public function saveContact(ContactInformation $contact): array {
        $errors = [];

        // Валідація email
        if (!filter_var($contact->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Некоректна електронна адреса";
        }

        // Валідація дати народження
        if (strtotime($contact->birthDate) > time()) {
            $errors[] = "Дата народження не може бути в майбутньому";
        }

        if (!empty($errors)) return ['success' => false, 'errors' => $errors];

        $success = $this->repo->save($contact);

        return ['success' => $success, 'errors' => []];
    }

    public function getAllContacts(): array {
        return $this->repo->getAll();
    }

    public function averageTextLength(ContactInformation $contact): float {
        $fields = [$contact->name, $contact->email, $contact->subject, $contact->message];
        $total = array_sum(array_map('mb_strlen', $fields));
        return $total / count($fields);
    }
}
