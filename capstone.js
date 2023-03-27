let profile;
let url = "https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/";

function returnText() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
 
  fetch(url + "api/capstone/Login", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
       email: email,
       password: password,
    }),
  })
    .then((response) => response.json())
    .then((response) => (profile = response))
    .then((response) => loginCheck());
}

function loginCheck() {
  if (profile.length > 0) {
    console.log(profile);
    if ((profile.accountTypeSID = 2)) {
      window.location.replace(
        "http://localhost/ICS499_CapstoneProject/CapstoneProject/userProfile.php"
      );
    } else {
      //send to admin page
    }
  } else {
    //display error on the screen
    alert("Login Failed");
  }
}

function display() {
  alert("Login success");
  if (document.getElementById("email") != null) {
    document.write(email);
  }
}

