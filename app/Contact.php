<?php
class ContactInformation {
    public string $name;
    public string $email;
    public string $birthDate;
    public string $subject;
    public string $message;

    public function __construct($name, $email, $birthDate, $subject, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->subject = $subject;
        $this->message = $message;
    }

    // Завдання 5
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

// Завдання 4
function averageTextLength(array $fields): float {
    $total = 0;
    foreach ($fields as $field) {
        $total += mb_strlen($field);
    }
    return $total / count($fields);
}

$errors = [];
$contactObject = null;
$avgLength = null;

// Очистити форму (Завдання 2)
if (isset($_POST['clear'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Обробка POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthDate = $_POST['birth_date'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Валідація email (regex)
    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,}$/", $email)) {
        $errors[] = "Некоректна електронна адреса";
    }

    // Валідація дати
    if (strtotime($birthDate) > time()) {
        $errors[] = "Дата народження не може бути в майбутньому";
    }

    if (empty($errors)) {
        $contactObject = new ContactInformation(
            $name, $email, $birthDate, $subject, $message
        );

        $avgLength = averageTextLength([$name, $email, $subject, $message]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<main class="flex-1 flex justify-center items-center p-6">
<div class="bg-white p-6 w-full max-w-lg shadow">

<form method="POST" class="space-y-3">
    <input name="name" placeholder="Name" required class="w-full border p-2" autofocus>
    <input name="email" placeholder="Email" required class="w-full border p-2">
    <input type="date" name="birth_date" required class="w-full border p-2">
    <input name="subject" placeholder="Subject" required class="w-full border p-2">
    <textarea name="message" placeholder="Message" required class="w-full border p-2"></textarea>

    <div class="flex gap-2">
        <button name="submit" class="bg-blue-600 text-white px-4 py-2">Send</button>
        <button name="clear" class="bg-gray-400 text-white px-4 py-2">Clear</button>
    </div>
</form>

<?php if ($errors): ?>
    <div class="text-red-600 mt-3"><?= implode("<br>", $errors) ?></div>
<?php endif; ?>

<?php if ($contactObject): ?>
    <pre class="bg-gray-100 p-3 mt-4"><?php print_r($contactObject); ?></pre>
    <p class="mt-2 font-semibold">
        Середня довжина даних у формі: <?= round($avgLength, 2) ?> символів
    </p>
    <?= $contactObject->toHtmlTable(); ?>
<?php endif; ?>

</div>
</main>
</body>
</html>
