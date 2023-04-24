let profile;
let url = "https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/";

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
    // console.log(profile);
    let profileJson = JSON.stringify(profile);
    localStorage.setItem("profile", profileJson);
    console.log(localStorage.getItem("profile"));
    if ((profile.accountTypeSID = 2)) {
      window.location.replace(
        "http://localhost/ICS499_CapstoneProject/CapstoneProject/userProfile.html"
      );
    } else if ((profile.accountTypeSID = 1)) {
      //send to admin page
      window.location.replace(
        "http://localhost/CapstoneProject/adminProfile.html"
      );
    } else {
      //display error on the screen
      alert("Login Failed!");
    }
  } else {
    //display error on the screen
    alert("Login Failed!");
  }
}



