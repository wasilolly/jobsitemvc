const email = document.getElementById("email");
const username = document.getElementById("username");
const register = document.getElementById("register")

function check() {
  password = document.getElementById("password").value
  repeatpass = document.getElementById("repeatpass")
  console.log(password)
    if (repeatpass.value === password) {
      register.classList.remove("disabled")
      console.log(register)
    } else {
      register.classList.add("disabled")
      console.log(register)
    }
}



