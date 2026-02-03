<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us | Real Estate</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

<main class="flex-1 container mx-auto p-6 max-w-lg">
    <form id="contactForm" class="bg-white p-6 rounded shadow space-y-4">
        <input type="text" name="name" placeholder="Name" required class="w-full border p-2 rounded">
        <input type="email" name="email" placeholder="Email" required class="w-full border p-2 rounded">
        <input type="date" name="birth_date" required class="w-full border p-2 rounded">
        <input type="text" name="subject" placeholder="Subject" required class="w-full border p-2 rounded">
        <textarea name="message" placeholder="Message" required class="w-full border p-2 rounded"></textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Send Message
        </button>

        <button type="reset" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-500 transition">
            Clear Form
        </button>

    </form>

    <div id="formFeedback" class="mt-4 text-center"></div>
</main>

<script>
    const form = document.getElementById('contactForm');
    const feedback = document.getElementById('formFeedback');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        feedback.innerHTML = 'Sending...';
        feedback.className = 'mt-4 text-center text-gray-700';

        const formData = {
            name: form.name.value,
            email: form.email.value,
            birthDate: form.birth_date.value,
            subject: form.subject.value,
            message: form.message.value
        };

        try {
            const res = await fetch('/endpoints/contacts.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const data = await res.json();

            if (data.success) {
                feedback.innerHTML = '✅ Your message has been sent!';
                feedback.className = 'mt-4 text-center text-green-600';
                form.reset();
            } else {
                feedback.innerHTML = '⚠️ ' + (data.errors ? data.errors.join('<br>') : 'Something went wrong');
                feedback.className = 'mt-4 text-center text-red-600';
            }
        } catch (err) {
            feedback.innerHTML = '⚠️ Network error';
            feedback.className = 'mt-4 text-center text-red-600';
        }
    });
    </script>
</body>
</html>
