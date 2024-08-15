function myFunction() {
    var x = document.getElementById("password");
    if (x.type==="password") {
        x.type="text";
    } else {
        x.type="password";
    }
}

// document.getElementById('login-form').addEventListener('submit', function(event) {
//     event.preventDefault();
//     var username = document.getElementById('username').value;
//     document.getElementById('navbar').innerHTML = '<h1>Auditor Portal</h1>';
//     document.getElementById('login-container').style.display = 'none';
//     document.getElementById('audit-buttons').style.display = 'block';
//     document.getElementById('welcome-message').innerText = 'Welcome, ' + username;
// });

function showAuditForm() {
    document.getElementById('audit-buttons').style.display = 'none';
    document.getElementById('audit-form-container').style.display = 'block';
    var currentDateTime = new Date().toISOString().slice(0, 16);
    document.getElementById('audit-datetime').value = currentDateTime;
}