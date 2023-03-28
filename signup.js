let profile;
let url = "https://2954-2601-444-80-a6c0-3b-41d9-1216-4265.ngrok.io/";
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
            console.log(localStorage.getItem("selectedSchedule"));
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
  console.log(profile);
  foodoption = document.getElementById("food-options").value;
  console.log(foodoption);

  ticketdata = {
    ticketSID: selectedscheduleID,
    accountSID: profile[0].sid,
    foodOptionSID: foodoption,
  };
  console.log(ticketdata);
  let ticketdata1 = JSON.stringify(ticketdata);
  localStorage.setItem("ticketdata", ticketdata1);
  console.log(localStorage.getItem("ticketdata"));

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
  let ticketdata = JSON.parse(localStorage.getItem("ticketdata"));
  console.log(ticketdata.ticketSID, ticketdata.accountSID, ticketdata.foodOptionSID);
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

