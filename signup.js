let profile;
let url = "https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/";
let tableprinted = false;// flag variable
let selectedscheduleID;
let ticketdata;

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

  fetch("https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/api/capstone/CreateUser", {
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
      "http://localhost/CapstoneProject/userProfile.php"
    );

  } else {
    //display error on the screen
    console.log("Fail signup");
  }
}

function getschedule() {
  fetch(url + 'api/capstone/GetTicketsByLocation?destination=Chicago', {
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


      if (!tableprinted) {// check if table has been printed before
        // Render the filtered data in a table
        const table = document.createElement('table');
        const headerRow = table.insertRow();
        headerRow.innerHTML =
          '<th>TrainSID</th><th>Seat Number</th><th>Destination</th><th>Depart Time</th><th>Arrival Time</th>';

        filteredData.forEach(schedule => {
          const row = table.insertRow();
          row.innerHTML =
            `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
        });

        document.body.appendChild(table);
        tableprinted = true;// set flag to true
      }

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
          const row = document.createElement('tr');
          row.innerHTML =
            `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
          row.addEventListener('click', () => {
            selectedscheduleID = schedule.sid;
            selectedScheduleLabel.textContent =
              `Selected Schedule: ${schedule.trainSID} ${schedule.seatNumber} (${schedule.departTime} - ${schedule.arrivalTime})`;
          });
          scheduleTableBody.appendChild(row);
        });

        scheduleBox.style.display = 'block';
      })
      .catch(error => console.error(error));
  });
}

function purchaseticket() {
  // const form = document.querySelector('#form');
  // const foodOptionsid = document.querySelector('#food-options');

  // add an event listener to the form submit event
  // form.addEventListener('submit', (event) => {
  //   event.preventDefault();
  //   let food = form.elements.food.value;

  let profile = JSON.parse(localStorage.getItem('profile'));
  console.log(profile);
  let foodoption = document.getElementById("food-options").value;
  console.log(foodoption);

  ticketdata = {
    ticketSID: selectedscheduleID,
    accountSID: profile.accountSID,
    foodOptionSID: foodoption,
  };
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
      console.log(data);
      window.location.href = 'http://localhost/CapstoneProject/ticket.html';
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    });
}
function displayTicketData() {
  const ticketContainer = document.getElementById('ticket-container');
  ticketContainer.innerHTML = `
    <h2>Your Ticket</h2>
    <p><strong>ticketSID:</strong> ${selectedscheduleID}</p>
    <p><strong>Schedule:</strong> ${selectedScheduleLabel.textContent}</p>
    <p><strong>Food Option:</strong> ${ticketdata.foodOptionSID}</p>
  `;
}

