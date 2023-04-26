

function onStart(){
    let profile = JSON.parse(localStorage.getItem("profile"));   
        display(profile);
}

function display(profile) {
    console.log(profile);
    if (document.getElementById("email") != null) {
      document.getElementById("email").innerHTML = profile[0].email;
    }

    if(document.getElementById("username") != null){
        document.getElementById("username").innerHTML = profile[0].name;
    }
  }