<div class="max-w-lg mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">Contact Us</h1>

    <form id="contactForm" class="bg-white shadow-lg rounded-lg p-8 space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" name="name" required class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" required class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
            <input type="date" name="birth_date" required class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
            <input type="text" name="subject" required class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea name="message" rows="4" required class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="flex text-center space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition w-1/2">Send</button>
            <button type="reset" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition w-1/2">Clear</button>
        </div>
    </form>

    <div id="formFeedback" class="mt-6 text-center text-gray-700"></div>
</div>

<script>
const form = document.getElementById('contactForm');
const feedback = document.getElementById('formFeedback');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    feedback.innerHTML = 'Sending...';
    feedback.className = 'mt-6 text-center text-gray-700';

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
            feedback.className = 'mt-6 text-center text-green-600';
            form.reset();
            form.name.focus();
        } else {
            feedback.innerHTML = '⚠️ ' + (data.errors ? data.errors.join('<br>') : 'Something went wrong');
            feedback.className = 'mt-6 text-center text-red-600';
        }
    } catch (err) {
        feedback.innerHTML = '⚠️ Network error';
        feedback.className = 'mt-6 text-center text-red-600';
    }
});
</script>
