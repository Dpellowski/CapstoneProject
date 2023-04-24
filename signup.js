let profile;
let url = "https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/ ";
let table;
let tableprinted = false;// flag variable
let selectedscheduleID;
let ticketdata;
let scheduleText;
let foodoption;
let destination;
let totalPrice;


function newUser() {
  let username = document.getElementById("username").value;
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;


  fetch(url + 'api/capstone/CreateUser', {
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
/**
 * Retrieves train schedules from the server based on the user's selected arrival location and displays them in a table.
 * @function
 * @name getSchedule
 * @returns {void}
 */
function getSchedule() {
  // Get the user's selected arrival location
  const arrival = document.getElementById("arrival").value;
  // Add 1 to the arrival location value
  const arrivalValue = arrival + 1;

  // Send a POST request to the server to retrieve train schedules for the selected arrival location
  fetch(url + 'api/capstone/GetTicketsByLocation?destination=' + arrival, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      // Filter the retrieved data to only include schedules departing at least 1 hour from the current time
      const filteredData = data.filter(schedule => {
        const departTime = new Date(schedule.departTime);
        const currentTime = new Date();
        const timeDiff = (departTime - currentTime) / (1000 * 60 * 60); // Convert to hours
        return timeDiff >= 1;
      });

      // If the table has not been printed before, create a new table with a header row
      if (!tableprinted) {
        table = document.createElement('table');
        const headerRow = table.insertRow(); // create header row
        headerRow.innerHTML = '<th>TrainSID</th><th>Seat Number</th><th>Departure Station</th><th>Destination</th><th>Depart Time</th><th>Arrival Time</th>';
        document.body.appendChild(table);
        tableprinted = true; // set flag to true
      }

      // Add a new table row for each schedule in filteredData
      filteredData.forEach(schedule => {
        const row = table.insertRow(1); // insert at top of table
        row.innerHTML = `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.departStation}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
      });

    })
    .catch(error => console.error(error));
}
/**
 * This function clears the existing table rows and renders the filtered data in the table.
 * It also adds a click event listener to each row that sets the selected schedule ID and label,
 * and stores the selected schedule in local storage.
 *
 * @param {Array} filteredData - An array of schedule objects that have been filtered based on user input.
 * @param {HTMLElement} scheduleTableBody - The table body element where the filtered data will be rendered.
 * @param {HTMLElement} scheduleBox - The container element for the schedule table.
 * @param {HTMLElement} selectedScheduleLabel - The label element that displays the selected schedule information.
 * @param {Number} selectedscheduleID - The ID of the currently selected schedule.
 */
function getselectedschedule() {
  const searchForm = document.querySelector('#search-form');
  const scheduleBox = document.querySelector('#schedule-box');
  const scheduleTableBody = document.querySelector('#schedule-table tbody');
  const selectedScheduleLabel = document.querySelector('#selected-schedule-label');

  searchForm.addEventListener('submit', event => {
    event.preventDefault();
    destination = searchForm.elements.destination.value;

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
            `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.departStation}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;
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
/**
 * This function is responsible for purchasing a ticket for a selected schedule and storing the ticket data in local storage.
 * @function purchaseticket
 * @returns {void}
 * @throws {Error} If an error occurs during the fetch request, an error message will be displayed to the user.
 */
function purchaseticket() {
  const confirmed = confirm(`Are you sure you want to purchase this ticket?`);

  // If the user cancels the deletion, return without doing anything
  if (!confirmed) {
    return;
  }
  let profile = JSON.parse(localStorage.getItem('profile'));
  // console.log(profile);
  foodoption = document.getElementById("food-options").value;
  // console.log(foodoption);

  ticketdata = {
    ticketSID: selectedscheduleID,
    accountSID: profile[0].sid,
    foodOptionSID: foodoption,
  };
  // console.log(ticketdata);
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
/**
 * This function calculates the total price of a ticket and food option selected by the user.
 * It listens for changes in the food options and search select elements and updates the total price accordingly.
 * @function
 * @name price
 * 
 * @returns {void}
 * 
 * @example
 * // Call the price function to calculate the total price
 * price();
 */

/**
 * This function checks if both the food option and search select elements have been selected by the user.
 * If both elements have been selected, it calculates the total price and displays it on the page.
 * If either element has not been selected, it hides the total price label.
 * @function
 * @name checkForm
 * 
 * @returns {void}
 */
function price() {
  const foodOptions = document.getElementById("food-options");
  const searchSelect = document.getElementById("search-select");
  const ticketPrice = 80;
  const totalPriceLabel = document.getElementById("total-price");

  foodOptions.addEventListener("change", checkForm);
  searchSelect.addEventListener("change", checkForm);

  function checkForm() {
    const foodValue = foodOptions.value;
    const searchValue = searchSelect.value;
    if (foodValue !== "null" && searchValue !== "null") {
      const selectedOption = foodOptions.options[foodOptions.selectedIndex];
      const price = selectedOption.dataset.price;
      totalPrice = parseFloat(price) + ticketPrice;
      totalPriceLabel.textContent = `Total price = $${totalPrice.toFixed(2)}`;
      totalPriceLabel.style.display = "block";
    } else {
      totalPriceLabel.style.display = "none";
    }
  }
}
/**
 * This function displays the ticket data on the ticket container element in the HTML document.
 * It retrieves the ticket data and selected schedule from the local storage and formats the food option.
 * The function then sets the innerHTML of the ticket container element to display the ticket information.
 * @function
 * @name displayTicketData
 * @returns {void}
 */
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
    <p><strong>Total Price:</strong> ${totalPrice}</p>
  `;

}

//For forgot password page 
/**
 * This function is responsible for resetting the user's password by making an API request to change the password using the input values.
 * @function resetPassword
 * @returns {void}
 * @throws {Error} If an error occurs while making the API request.
 */

/**
 * Retrieves the user's profile from local storage and gets the new password and confirmation password from the input fields.
 * Constructs an account object with the user's accountSID and the new password.
 * @function resetPassword
 * @returns {void}
 */
function resetPassword() {
  let profile = JSON.parse(localStorage.getItem('profile'));
  const newPassword = document.getElementById('newPW').value;
  let confirm = document.getElementById('confirm_newPW').value;

  account = {
    accountSID: profile[0].sid,
    newPassword: newPassword
  };

  if (confirm == newPassword) {
    // Make an API request to change the password using the input values
    fetch(`${url}api/capstone/ReplacePassword`, {
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

function getPassword() {
  const form = document.getElementById('updatePassword');
  form.addEventListener('submit', event => {
    event.preventDefault();
    resetPassword();
  });
}
/**
 * Retrieves the booking history of the user from the server and redirects to the booking history page.
 * @function
 * @name getBookHistory
 * @returns {void}
 * @throws {Error} If an error occurs while fetching the booking history from the server.
 * @description This function retrieves the booking history of the user from the server by sending a POST request to the server's "GetAccountTickets" API endpoint. The email of the user is sent as a parameter in the request body. If the request is successful, the function redirects the user to the booking history page. If an error occurs while fetching the booking history from the server, an error message is displayed to the user.
 */
function getBookHistory() {
  let profile = JSON.parse(localStorage.getItem('profile'));

  fetch(`${url}api/capstone/GetAccountTickets`, {
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
        // localStorage.setItem("email", email);
        window.location.href = 'http://localhost/ICS499_CapstoneProject/CapstoneProject/view_bookingHistory.php';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    });
}











