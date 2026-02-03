<?php
class ContactInformation {
    public string $name;
    public string $email;
    public string $birthDate;
    public string $subject;
    public string $message;

    public function __construct(string $name, string $email, string $birthDate, string $subject, string $message) {
        $this->name = $name;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function toHtmlTable(): string {
        return "
        <table class='table-auto border mt-4 w-full'>
            <tr><th>Name</th><td>{$this->name}</td></tr>
            <tr><th>Email</th><td>{$this->email}</td></tr>
            <tr><th>Birth Date</th><td>{$this->birthDate}</td></tr>
            <tr><th>Subject</th><td>{$this->subject}</td></tr>
            <tr><th>Message</th><td>{$this->message}</td></tr>
        </table>";
    }
}
