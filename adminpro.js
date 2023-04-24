let url = "https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/";
let selectedscheduleID;
function onStart() {
    let profile = JSON.parse(localStorage.getItem("profile"));
    display(profile);
}

function display(profile) {
    console.log(profile);
    if (document.getElementById("email") != null) {
        document.getElementById("email").innerHTML = profile[0].email;
    }

    if (document.getElementById("username") != null) {
        document.getElementById("username").innerHTML = profile[0].name;
    }
}
/**
 * This function handles the behavior of the "show form" button on the page.
 * When the button is clicked, it toggles the display of a hidden form element.
 * If the form is currently hidden, it will be displayed. If it is currently
 * displayed, it will be hidden. If the form is in any other state, it will be
 * hidden.
 *
 * @param {Event} event - The click event that triggered the function.
 * @returns {void}
 */
function showaddform() {
    const showFormBtn = document.getElementById('show-form-btn');
    const hiddenForm = document.getElementById('schedule-form');

    showFormBtn.addEventListener('click', () => {
        if (hiddenForm.style.display == 'none') {
            hiddenForm.style.display = 'block';
        } else if (hiddenForm.style.display == 'block') {
            hiddenForm.style.display = 'none';
        } else {
            hiddenForm.style.display = 'none';
        }
    });
}
/**
 * This function creates new tickets by sending a POST request to the server with the provided form data.
 * @param {number} openSeats - The number of open seats for the new ticket.
 * @param {string} name - The name of the new ticket.
 * @param {string} destination - The destination of the new ticket.
 * @param {string} departStation - The departure station of the new ticket.
 * @param {string} departTime - The departure time of the new ticket.
 * @param {string} arrivalTime - The arrival time of the new ticket.
 * @throws {Error} - If the server returns an error response.
 */
function addSchedule() {
    const openSeats = document.getElementById("openSeats").value;
    const name = document.getElementById("name").value.toString();
    const destination = document.getElementById("destination").value.toString();
    const departStation = document.getElementById("departStation").value.toString();
    const departTime = document.getElementById("departTime").value.toString();
    const arrivalTime = document.getElementById("arrivalTime").value.toString();

    const formData = new FormData();
    formData.append("openSeats", openSeats);
    formData.append("name", name);
    formData.append("destination", destination);
    formData.append("departStation", departStation);
    formData.append("departTime", departTime);
    formData.append("arrivalTime", arrivalTime);

    fetch(`${url}api/capstone/CreateNewTickets`, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            // Add the new schedule to the table
            const scheduleTableBody = document.getElementById('schedule-table-body');

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
   <td>${name}</td>
   <td>${destination}</td>
   <td>${departStation}</td>
   <td>${departTime}</td>
   <td>${arrivalTime}</td>
   <td>${openSeats}</td>
 `;

            scheduleTableBody.appendChild(newRow);


        })
        .catch(error => {
            console.error('Error:', error);
        });
}
/**
 * This function is responsible for handling the form submission event for deleting tickets by location.
 * It prevents the default form submission behavior and retrieves the destination value from the form.
 * It then sends a POST request to the server to retrieve all tickets for the specified destination.
 * @param {Event} event - The form submission event.
 * @returns {void}
 */
function getselectedschedule() {
    const deleteForm = document.querySelector('#delete-form');
    const scheduleBox = document.querySelector('#schedule-box');
    const scheduleTableBody = document.querySelector('#schedule-table tbody');
    const selectedScheduleLabel = document.querySelector('#selected-schedule-label');

    deleteForm.addEventListener('submit', event => {
        event.preventDefault();
        destination = deleteForm.elements.destination.value;

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
                    const timeDiff = (departTime - currentTime) / (1000 * 60 * 60); // Convert to hours
                    return timeDiff >= 1;
                });

                // Clear existing table rows
                scheduleTableBody.innerHTML = '';

                // Render the filtered data in the table
                filteredData.forEach(schedule => {
                    // Create a delete button
                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-danger', 'delete-button');
                    deleteButton.textContent = 'Delete';

                    // Add an event listener to the delete button
                    deleteButton.addEventListener('click', () => {
                        deleteSchedule(schedule); // Call the deleteSchedule function

                        // Fetch the updated data after deleting the schedule
                        fetch(`${url}api/capstone/GetTicketsByLocation?destination=${destination}`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                const updatedData = data.filter(schedule => {
                                    const departTime = new Date(schedule.departTime);
                                    const currentTime = new Date();
                                    const timeDiff = (departTime - currentTime) / (1000 * 60 * 60); // Convert to hours
                                    return timeDiff >= 1;
                                });

                                // Render the updated data in the table
                                scheduleTableBody.innerHTML = '';
                                updatedData.forEach(schedule => {
                                    // Create a delete button
                                    const deleteButton = document.createElement('button');
                                    deleteButton.classList.add('btn', 'btn-danger', 'delete-button');
                                    deleteButton.textContent = 'Delete';

                                    // Add an event listener to the delete button
                                    deleteButton.addEventListener('click', () => {
                                        deleteSchedule(schedule); // Call the deleteSchedule function
                                    });

                                    schedule.departTime = new Date(schedule.departTime);
                                    schedule.arrivalTime = new Date(schedule.arrivalTime);

                                    const row = document.createElement('tr');
                                    row.innerHTML = `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.departStation}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;

                                    // Add a new column to the row with the delete button
                                    const deleteColumn = document.createElement('td');
                                    deleteColumn.appendChild(deleteButton);
                                    row.appendChild(deleteColumn);

                                    // Add a data attribute to the row with the schedule ID
                                    row.setAttribute('data-sid', schedule.sid);

                                    // Add the row to the table body
                                    scheduleTableBody.appendChild(row);
                                });
                            })
                            .catch(error => console.error(error));
                    });

                    schedule.departTime = new Date(schedule.departTime);
                    schedule.arrivalTime = new Date(schedule.arrivalTime);
                    const row = document.createElement('tr');
                    row.innerHTML =
                        `<td>${schedule.trainSID}</td><td>${schedule.seatNumber}</td><td>${schedule.departStation}</td><td>${schedule.destination}</td><td>${schedule.departTime}</td><td>${schedule.arrivalTime}</td>`;

                    // Add a new column to the row with the delete button
                    const deleteColumn = document.createElement('td');
                    deleteColumn.appendChild(deleteButton);
                    row.appendChild(deleteColumn);
                    scheduleTableBody.appendChild(row);
                });

                scheduleBox.style.display = 'block';
            })
            .catch(error => console.error(error));
    });
}
/**
 * This function shows or hides a delete form when the delete button is clicked.
 * @function showdeleteform
 * @returns {void}
 */
function showdeleteform() {
    const showFormBtn = document.getElementById('delete-form-btn');
    const hiddenForm = document.getElementById('delete-form');

    showFormBtn.addEventListener('click', () => {
        if (hiddenForm.style.display == 'none') {
            hiddenForm.style.display = 'block';
        } else if (hiddenForm.style.display == 'block') {
            hiddenForm.style.display = 'none';
        } else {
            hiddenForm.style.display = 'none';
        }
    });
}
/**
 * Deletes a schedule from the database.
 * @param {Object} schedule - The schedule object to be deleted.
 * @param {string} schedule.sid - The unique identifier of the schedule.
 * @param {string} schedule.trainSID - The unique identifier of the train associated with the schedule.
 * @param {string} schedule.seatNumber - The seat number of the schedule.
 * @param {string} schedule.departStation - The departure station of the schedule.
 * @param {string} schedule.destination - The destination of the schedule.
 * @returns {void}
 * @throws {Error} If there is an error with the fetch request.
 */
function deleteSchedule(schedule) {
    // Extract the schedule SID from the schedule object
    const scheduleSID = schedule.sid;

    // Prompt the user to confirm the deletion of the schedule
    const confirmed = confirm(`Are you sure you want to delete schedule ${schedule.trainSID} seat number ${schedule.seatNumber} from ${schedule.departStation} to ${schedule.destination}?`);

    // If the user cancels the deletion, return without doing anything
    if (!confirmed) {
        return;
    }

    // Construct the data object to be sent in the fetch request
    const data = {
        "command": "DELETE",
        "ticketSid": scheduleSID
    };

    // Send a fetch request to the server to delete the schedule
    fetch(`${url}api/capstone/DeleteTicket`, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // If the deletion was successful, display a success message to the user
            if (data.ok) {
                alert(`Schedule ${schedule.trainSID} ${schedule.seatNumber} from ${schedule.departStation} to ${schedule.destination} deleted successfully.`);
            }
        })
        .catch(error => console.error(error));
}

// Listen for clicks on a row in the table
scheduleTableBody.addEventListener('click', event => {
    const row = event.target.closest('tr'); // Get the closest parent row element
    const scheduleSID = row.dataset.sid; // Get the schedule ID from the data attribute
    selectedScheduleLabel.textContent = `Selected Schedule: ${scheduleSID}`;
    // Set the value of the hidden input field in the delete form to the schedule ID
    deleteForm.elements.scheduleSID.value = scheduleSID;
});