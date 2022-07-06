const passwordField = document.querySelector(".form input[type='password']"),
icon = document.querySelector(".form .field i");

icon.onclick = () =>{
  if(passwordField.type === "password"){
    passwordField.type = "text";
    icon.classList.add("active");
  }else{
    passwordField.type = "password";
    icon.classList.remove("active");
  }
}
