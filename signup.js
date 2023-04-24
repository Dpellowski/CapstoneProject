let profile;
let url = "https://9509-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/";
let table;
let tableprinted = false;// flag variable
let selectedscheduleID;
let ticketdata;
let scheduleText;
let foodoption;


function newUser() {
  let username = document.getElementById("username").value;
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;


  fetch("https://9509-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/capstone/CreateUser", {
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
    window.location.replace(
      "http://localhost/ICS499_CapstoneProject/CapstoneProject/userProfile.html"
    );

  } else {
    //display error on the screen
    alert("Failed to sign up!");
  }
}

function getSchedule() {
  const arrival = document.getElementById("arrival").value;
  const arrivalValue = arrival + 1;

  fetch(url + 'api/capstone/GetTicketsByLocation?destination=' + arrival, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      const filteredData = data.filter(schedule => {
        const departTime = new Date(schedule.departTime);
        const currentTime = new Date();
        const timeDiff = (departTime - currentTime) / (1000 * 60 * 60); // Convert to hours
        return timeDiff >= 1;
      });

      if (!tableprinted) { // If table has not been printed before, create new table
        table = document.createElement('table');
        const headerRow = table.insertRow(); // create header row
        headerRow.innerHTML = '<th>TrainSID</th><th>Seat Number</th><th>Destination</th><th>Depart Time</th><th>Arrival Time</th>';
        document.body.appendChild(table);
        tableprinted = true; // set flag to true
      }

      // Add a new table row for each schedule in filteredData
      filteredData.forEach(schedule => {
        const row = table.insertRow(1); // insert at top of table
        row.innerHTML = `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
      });

    })
    .catch(error => console.error(error));
}

function getselectedschedule() {
  const searchForm = document.querySelector('#search-form');
  const scheduleBox = document.querySelector('#schedule-box');
  const scheduleTableBody = document.querySelector('#schedule-table tbody');
  const selectedScheduleLabel = document.querySelector('#selected-schedule-label');

  searchForm.addEventListener('submit', event => {
    event.preventDefault();
    const destination = searchForm.elements.destination.value;

    fetch(`${url}api/capstone/GetTicketsByLocation?destination=${destination}`, {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        const filteredData = data.filter(schedule => {
          const departTime = new Date(schedule.departTime);
          const currentTime = new Date();
          const timeDiff = (departTime - currentTime) / (1000 * 60 *
            60); // Convert to hours
          return timeDiff >= 1;
        });

        // Clear existing table rows
        scheduleTableBody.innerHTML = '';
        // Render the filtered data in the table
        filteredData.forEach(schedule => {

          schedule.departTime = new Date(schedule.departTime);
          schedule.arrivalTime = new Date(schedule.arrivalTime);
          const row = document.createElement('tr');
          row.innerHTML =
            `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
          row.addEventListener('click', () => {
            selectedscheduleID = schedule.sid;

            selectedScheduleLabel.textContent =
              `Selected Schedule: ${schedule.trainSID} ${schedule.seatNumber} (${schedule.departTime} - ${schedule.arrivalTime})`;

            let selectedSchedule = ` seat number: ${schedule.seatNumber} departure time:  ${schedule.departTime} arrival time: ${schedule.arrivalTime} `;
            let selectedSchedule1 = JSON.stringify(selectedSchedule);
            localStorage.setItem("selectedSchedule", selectedSchedule1);
            
          });
          scheduleTableBody.appendChild(row);
        });

        scheduleBox.style.display = 'block';
      })
      .catch(error => console.error(error));
  });
}

function purchaseticket() {
  let profile = JSON.parse(localStorage.getItem('profile'));
  
  foodoption = document.getElementById("food-options").value;
  

  ticketdata = {
    ticketSID: selectedscheduleID,
    accountSID: profile[0].sid,
    foodOptionSID: foodoption,
  };
  
  let ticketdata1 = JSON.stringify(ticketdata);
  localStorage.setItem("ticketdata", ticketdata1);
  

  fetch(url + "api/capstone/PurchaseTicket", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(ticketdata),
  })
    .then(response => response.json())
    .then((response) => (data = response))
    .then(data => {
      
      if (data > 0) {
        window.location.href = 'http://localhost/ICS499_CapstoneProject/CapstoneProject/ticket.html';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    });
}

function displayTicketData() {
  const ticketContainer = document.getElementById('ticket-container');
  let ticketdata = JSON.parse(localStorage.getItem("ticketdata"));
  let selectedSchedule2 = JSON.parse(localStorage.getItem("selectedSchedule"));
  let food;
  switch (ticketdata.foodOptionSID) {
    case '1':
      food = "Halal";
      break;
    case '2':
      food = "Kosher";
      break;
    case '3':
      food = "Meat";
      break;
    case '4':
      food = "Vegan";
      break;
    case '5':
      food = "Vegetarian";
      break;
    default: "food not selected";
      break
  }
  ticketContainer.innerHTML = `
    <h2>Your Ticket</h2>
    <p><strong>ticketSID:</strong> ${ticketdata.ticketSID}</p>
    <p><strong>Schedule:</strong> ${selectedSchedule2} </br> </p>
    <p><strong>Food Option:</strong> ${food}</p>
  `;

}

function showDropdown() {
  const profile = localStorage.getItem('profile');
  if (profile) {
    // document.querySelector('dropdown').style.display = 'block';
    // create container element for dropdown menu
    const dropdownContainer = document.createElement('div');
    dropdownContainer.classList.add('dropdown');

    // create button element for dropdown menu
    const dropdownBtn = document.createElement('img');
    dropdownBtn.classList.add('dropbtn');
    dropdownBtn.setAttribute('src', 'https://pic.onlinewebfonts.com/svg/img_24787.png');
    dropdownBtn.setAttribute('style', 'width:40px;height:40px;');

    // create content element for dropdown menu
    const dropdownContent = document.createElement('div');
    dropdownContent.classList.add('dropdown-content');

    // create links for dropdown menu
    const accountLink = document.createElement('a');
    accountLink.setAttribute('href', 'userProfile.html');
    accountLink.textContent = 'Account';

    const securityLink = document.createElement('a');
    securityLink.setAttribute('href', 'edit-profile.php');
    securityLink.textContent = 'Security';

    const logoutLink = document.createElement('a');
    logoutLink.setAttribute('href', 'logout_msg.html');
    logoutLink.textContent = 'Log out';

    // append links to dropdown content
    dropdownContent.appendChild(accountLink);
    dropdownContent.appendChild(securityLink);
    dropdownContent.appendChild(logoutLink);

    // append button and content to container
    dropdownContainer.appendChild(dropdownBtn);
    dropdownContainer.appendChild(dropdownContent);

    // get container element in DOM and append dropdown menu
    const container = document.querySelector('#container');
    container.appendChild(dropdownContainer);

  }
}
 
//For forgot password page 
function resetPassword() {
  let profile = JSON.parse(localStorage.getItem('profile'));
  const newPassword = document.getElementById('newPW').value;
  let confirm = document.getElementById('confirm_newPW').value;

  account = {
    accountSID: profile[0].sid,
    newPassword: newPassword
  };

  if(confirm == newPassword){
    // Make an API request to change the password using the input values
    fetch('https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/api/capstone/ReplacePassword', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(account)
    })
    .then(response => {
      if (response.ok) {
        // Handle the API response to display a success message to the user
        alert('Password changed successfully.');
        window.location.href = 'http://localhost/ICS499_CapstoneProject/CapstoneProject/login.html';
      } else {
        // Handle the API response to display an error message to the user
        alert('Password change failed. Please try again.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    });
  } else {
    alert("Confirmation failed. Please try again.");
  }
}

function getPassword(){
  const form = document.getElementById('updatePassword');
  form.addEventListener('submit', event => {
    event.preventDefault();
    resetPassword();
  });
}

  

  function getBookHistory(){
    let profile = JSON.parse(localStorage.getItem('profile'));
   
    fetch('https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/api/capstone/GetAccountTickets', {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email: profile[0].email
      }),
    })
      .then((response) => response.json())
      .then((response) => (email = response))
      .then(email => {
        console.log(email);
        
        if (email > 0) {
          localStorage.setItem("email", email);
          window.location.href = 'http://localhost/ICS499_CapstoneProject/CapstoneProject/view_bookingHistory.php';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
      });
    }




  
  
  
  