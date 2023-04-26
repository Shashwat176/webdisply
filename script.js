function hashPassword(password) {
  return crypto.subtle.digest("SHA-256", new TextEncoder().encode(password))
    .then(hash => {
      return Array.from(new Uint8Array(hash))
        .map(b => b.toString(16).padStart(2, "0"))
        .join("");
    });
}

function handleSubmit(event) {
  event.preventDefault();

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  hashPassword(password).then(hashedPassword => {
    const credentials = {username: username, password: hashedPassword};
    localStorage.setItem("credentials", JSON.stringify(credentials));
    window.location.href = "protected.html";
  });
}

document.getElementById("login-form").addEventListener("submit", handleSubmit);
