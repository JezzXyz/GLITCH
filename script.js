// script.js

document.addEventListener("DOMContentLoaded", function() {
    // Form submit event
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();  // Prevent default form submission
            const username = document.querySelector('#username').value;
            const password = document.querySelector('#password').value;

            // XSS Vulnerability Example - Displaying user input (bahaya banget buat eksperimen XSS)
            document.querySelector('.user-info').innerHTML = `
                <p><strong>Username:</strong> ${username}</p>
                <p><strong>Password:</strong> ${password}</p>
            `;
            
            // You could add malicious code here (misalnya JavaScript inject)
            alert("Data submitted (sudah ada XSS vulnerability di sini)!");

            // Validasi sederhana
            if (username === '' || password === '') {
                alert('Please fill out all fields!');
            } else {
                // Lanjutkan ke server atau logika lainnya
                console.log("Data submitted:", { username, password });
            }
        });
    }

    // Contoh CSRF (Cross-Site Request Forgery)
    const csrfBtn = document.querySelector('#csrf-btn');
    if (csrfBtn) {
        csrfBtn.addEventListener('click', function() {
            alert('Mungkin kamu bisa eksploitasi CSRF dengan tombol ini!');
            // Misalnya ngerubah data tanpa persetujuan user
        });
    }
});
