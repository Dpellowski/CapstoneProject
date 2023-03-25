let profile;
let url = "https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/"; 

function newUser() {
  let username = document.getElementById("username").value;
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  // console.log(username); 
  // console.log(fname); 
  // console.log(lname);
  // console.log(email);
  // console.log(password);

  fetch("https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/api/capstone/CreateUser",{
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        name: username,
        password: password,
        email: email,
        firstName: fname,
        lastName: lname
      }),
    })
    .then((response) => response.json())
    .then((response) => (profile = response))
    .then((response) => signupCheck());
}

function signupCheck() {
  if (profile > 0) {
    console.log(profile);
    window.location.replace(
      "http://localhost/ICS499_CapstoneProject/CapstoneProject/userProfile.php"
    );
  
  } else {
    //display error on the screen
    console.log("Fail signup");
  }
}
