<!DOCTYPE html>
<html>

<head>
    <style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    body {
        background-image: url('C:\xampp\htdocs\bullet train\fill-out-concept-illustration_114360-5450.avif');
        background-size: cover;
        background-position: center;
    }

    .navbar {
        height: 100px;
        display: inline-block;
        flex-direction: row;
        flex: 0 0 100%;
        /* Let it fill the entire space horizontally */
        width: 100%;
    }

    .navbar-homeIcon {
        height: 100px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navbar-container-left img {
        height: inherit;
        width: 100%;
        max-width: 100px;
        max-height: 100px;
    }

    .navbar-container-left {
        float: left;
        display: inline-grid;
        height: 100%;
        grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr 2fr;
    }

    .navbar-container-left a {
        font-size: 20px;
        color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .navbar-container-left a:hover:not(:first-child) {
        font-weight: 700;
    }

    .dropdown {
        float: right;
        overflow: hidden;
        height: inherit;
    }

    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: black;
        padding: 13px 40px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .dropdown:hover .dropbtn {
        font-weight: bold;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .logo {
        width: 150px;
        height: auto;
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .logo:hover {
        opacity: 0.5;
    }



    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin: 20px 0;
    }

    input[type="text"] {
        padding: 10px;
        margin: 10px;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        border: 0;
    }

    .no-border {
        border: 0;
    }

    th {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    select {
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border-radius: 5px;
        color: #444444;
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 8px;
        width: 200px;
    }

    option {
        background-color: #ffffff;
        color: #444444;
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 8px;
    }

    option:hover {
        background-color: #6278b9;
    }

    button,
    input[type="submit"] {
        background-color: #3d6885;
        border: none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        font-family: Arial, sans-serif;
        font-size: 16px;
        padding: 10px 20px;
        text-transform: uppercase;
    }

    button:hover,
    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }



    h2 {
        font-size: 20px;
        font-weight: bold;
        margin-top: 30px;
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type=text],
    input[type=email],
    input[type=tel],
    select,
    textarea,
    input[type=number],
    input[type=date] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }
    </style>


</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="Homepage.html"> <img class="logo"
                        src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp"
                        alt="Logo"></a>

                <a href="Homepage.html">Home</a>
                <a href="Trainschedule.php">Train Schedule</a>
                <a href="bookticket.php">Book Ticket</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <div class="dropdown">
                    <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png"
                        style="width:40px;height:40px;">
                    <div class="dropdown-content">
                        <a href="user_setting.php">Account</a>
                        <a href="edit-profile.php">Security</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <main>
        <form method="POST" action="">

            <table class="travel info">
                <tr>
                    <td>
                        <h2>Travel Details</h2>
                    </td>
                <tr>
                    <td><label>Train</label></td>
                    <td><select name="Train">
                            <option value="Bullblue">Bullblue</option>
                            <option value="Bullwight">Bullwight</option>
                            <option value="Bullred">Bullred</option>
                        </select> </td>
                </tr>
                <tr>
                    <td>
                        <label>Departure Station:</label>
                    </td>
                    <td>
                        <select name="departure">
                            <option value="New York">New York</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Denver">Denver</option>
                            <option value="Salt Lake City">Salt Lake City</option>
                            <option value="California">California</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Arrival Station:</label>
                    </td>
                    <td><select name="arrival">
                            <option value="New York">New York</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Denver">Denver</option>
                            <option value="Salt Lake City">Salt Lake City</option>
                            <option value="California">California</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Travel Date:</label>
                    </td>
                    <td><input type="date" name="date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="class">Class:</label>
                    </td>
                    <td>
                        <select id="class" name="class" required>
                            <option value="">Select a class</option>
                            <option value="standard">Standard</option>
                            <option value="first">First</option>
                            <option value="business">Business</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Number of Passengers:</label>
                    </td>
                    <td><input type="number" id="passengers" name="passengers" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Special Requests</h2>
                    </td>
                </tr>
                <tr>
                    <td><label for="food-options">Choose a food option:</label> </td>
                    <td>
                        <select id="food-options" name="food">
                            <option value="halal">Halal ($15.99)</option>
                            <option value="kosher">Kosher ($18.99)</option>
                            <option value="meat">Meat ($20.99)</option>
                            <option value="vegan">Vegan ($16.99)</option>
                            <option value="vegetable">Vegetable ($12.99)</option>
                        </select>
                        <a href="foodoption.php">
                            <button type="button" class="menu">View Menu</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="assistance">Is Assistance Required:</label>
                    </td>
                    <td>
                        <select id="assistance" name="assistance">
                            <option value="">Select an assistance</option>
                            <option value="wheelchair">Wheelchair Assistance</option>
                            <option value="signlanguage">Sign Language Interpreter</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Passenger Information </h2>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <td><label>Age:</label></td>
                    <td><input type="text" name="age" required></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td> <input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td> <input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td> <textarea id="address" name="address" required></textarea></td>
                </tr>
                <tr>
                    <td>
                        <h2>Payment Information</h2>
                <tr>
                    <td><label>Credit/Debit Card Number:</label></td>
                    <td> <input type="text" id="cardnumber" name="cardnumber" required></td>
                </tr>
                <tr>
                    <td><label>Name on Card:</label></td>
                    <td> <input type="text" id="cardname" name="cardname" required></td>
                </tr>
                <tr>
                    <td><label>Expiration Date:</label></td>
                    <td> <input type="month" id="expiry" name="expiry" required></td>
                </tr>
                <tr>
                    <td><label>CVV:</label></td>
                    <td> <input type="text" id="cvv" name="cvv" required></td>
                </tr>

            </table>


            </table>
            <input type="submit" value="Book Now">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate input fields
            if (empty($_POST['departure'])) {
                $error['departure'] = "Please select the departure station.";
            } else {
                $departure = $_POST['departure'];
            }
            if (empty($_POST['arrival'])) {
                $error['arrival'] = "Please select the arrival station.";
            } else {
                $arrival = $_POST['arrival'];
            }
            if (empty($_POST['date'])) {
                $error['date'] = "Please select the travel date.";
            } else {
                $date = $_POST['date'];
            }
            if (empty($_POST['passengers'])) {
                $error['passengers'] = "Please select the number of passengers.";
            } else {
                $passengers = $_POST['passengers'];
            }
            if (empty($_POST['name'])) {
                $error['name'] = "Please enter your name.";
            } else {
                $name = $_POST['name'];
            }
            if (empty($_POST['age'])) {
                $error['age'] = "Please enter your age.";
            } else {
                $age = $_POST['age'];
            }

            // If there are no errors, store the data in the database
            if (!isset($error)) {
                // Connect to the database
                //save the data in array format
                $data = array(
                    'departure' => $departure,
                    'arrival' => $arrival,
                    'date' => $date,
                    'passengers' => $passengers,
                    'name' => $name,
                    'age' => $age,
                );
                // URL where the data will be stored
                $url = '#';

                // Use cURL to send the data
                $ch = curl_init(); // Initialize a cURL session

                curl_setopt($ch, CURLOPT_URL, $url); // Set the URL for the cURL session

                curl_setopt($ch, CURLOPT_POST, 1); // Set the request method to POST

                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Set the data to be sent with the request

                $result = curl_exec($ch); // Execute the cURL session

                curl_close($ch); // Close the cURL session
            }
            /**$ch = curl_init(); - Initializes a cURL session and stores the session handle in the $ch variable.
curl_setopt($ch, CURLOPT_URL, $url); - Sets the URL for the cURL session to the value stored in the $url variable.
curl_setopt($ch, CURLOPT_POST, 1); - Sets the request method to POST.
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); - Sets the data to be sent with the request to the value stored in the $data array, converted to a URL-encoded query string using http_build_query().
curl_exec($ch); - Executes the cURL session.
curl_close($ch); - Closes the cURL session, freeing up resources and ending the session. */

            if ($result === false) {
                echo "Error: cURL failed to send the data to the URL.";
            } else {
                echo "Booking Confirmed!<br>";
                echo "Departure Station: " . $departure . "<br>";
                echo "Arrival Station: " . $arrival . "<br>";
                echo "Travel Date: " . $date . "<br>";
                echo "Number of Passengers: " . $passengers . "<br>";
                echo "Name: " . $name . "<br>";
                echo "Age: " . $age . "<br>";
            }
        }
        ?>

    </main>
</body>

</html>