function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username === "user" && password === "817495") {
        window.location.href = "protected.html";
    } else {
        document.getElementById("message").innerHTML = "Invalid username or password.";
    }
}
