let profile;
let url = "https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/";

function returnText() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  fetch(url + 'api/capstone/Login', {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      email: email,
      password: password,
    }),
  })
    .then((response) => response.json())
    .then((profile) => {
      if (profile.length > 0) {
        let profileJson = JSON.stringify(profile);
        localStorage.setItem("profile", profileJson);
        console.log(profile);
        if (profile[0].accountTypeSID === 1) {
          window.location.replace(
           "http://localhost/ICS499_CapstoneProject/CapstoneProject/adminProfile.html"
          );
        } else if (profile[0].accountTypeSID === 2) {
          window.location.replace(
            "http://localhost/ICS499_CapstoneProject/CapstoneProject/userProfile.html"
          );
        } else {
          alert("Invalid account type!");
        }
      } else {
        alert("Login Failed!");
      }
    })
    .catch((error) => console.error(error));
}



