<?php
// Клас ContactInformation (Завдання 2)
class ContactInformation {
    public string $name;
    public string $email;
    public string $subject;
    public string $message;

    public function __construct($name, $email, $subject, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
}

// Змінна для збереження обʼєкта
$contactObject = null;

// Обробка POST-запиту (Завдання 3)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['subject']) &&
        !empty($_POST['message'])
    ) {
        $contactObject = new ContactInformation(
            $_POST['name'],
            $_POST['email'],
            $_POST['subject'],
            $_POST['message']
        );
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

<header class="bg-gray-800 text-white text-center py-4">
    <h1 class="text-3xl">Contact Me</h1>
</header>

<main class="flex-1 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">

        <!-- Форма Contact Me -->
        <form method="POST" class="space-y-4">
            <div>
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" required
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" required
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Subject</label>
                <input type="text" name="subject" required
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Message</label>
                <textarea name="message" required
                          class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Send
            </button>
        </form>

        <!-- Вивід обʼєкта -->
        <?php if ($contactObject !== null): ?>
            <h2 class="text-xl font-bold mt-6">Submitted Data:</h2>
            <pre class="bg-gray-100 p-4 rounded mt-2">
<?php print_r($contactObject); ?>
            </pre>
        <?php endif; ?>

    </div>
</main>

</body>
</html>
