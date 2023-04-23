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

    fetch('https://29f2-2601-444-80-a6c0-6ca7-6f1-c036-e864.ngrok-free.app/api/capstone/CreateNewTickets', {
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
                    const timeDiff = (departTime - currentTime) / (1000 * 60 *
                        60); // Convert to hours
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

                    // row.addEventListener('click', () => {
                    //     selectedscheduleID = schedule.sid;

                    //     selectedScheduleLabel.textContent =
                    //         `Selected Schedule: ${schedule.trainSID} ${schedule.seatNumber} (${schedule.departTime} - ${schedule.arrivalTime})`;

                    //     let selectedSchedule = ` seat number: ${schedule.seatNumber} departure time:  ${schedule.departTime} arrival time: ${schedule.arrivalTime} `;
                    //     let selectedSchedule1 = JSON.stringify(selectedSchedule);
                    //     localStorage.setItem("selectedSchedule", selectedSchedule1);
                    //     console.log(localStorage.getItem("selectedSchedule"));
                    // });
                    scheduleTableBody.appendChild(row);
                });

                scheduleBox.style.display = 'block';
            })
            .catch(error => console.error(error));
    });
}


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
function deleteSchedule(schedule) {
    const confirmed = confirm(`Are you sure you want to delete schedule ${schedule.trainSID} seat number  ${schedule.seatNumber} from ${schedule.departStation} to ${schedule.destination}?`);

    if (!confirmed) {
        return;
    }
    const data = {
        "command": "DELETE",
        "sid": schedule.sid
    };
    fetch(`${url}api/capstone/GetTicketsByLocation?destination=${schedule.destination}`, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            console.log(data);
            if (response.ok) {
                alert(`Schedule ${schedule.trainSID} ${schedule.seatNumber} from ${schedule.departStation} to ${schedule.destination} deleted successfully.`);
                // localStorage.removeItem('selectedSchedule');
                getselectedschedule(); // Refresh the table after deleting the schedule
            } else {
                throw new Error('Error deleting schedule.');
            }
        })
        .catch(error => console.error('Error deleting schedule:', error));
}
