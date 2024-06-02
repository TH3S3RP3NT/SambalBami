function showPassword() {
  var x = document.getElementById("wachtwoord");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}