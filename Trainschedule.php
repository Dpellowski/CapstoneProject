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

        .logo {
            width: 150px;
            height: auto;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .logo:hover {
            opacity: 0.5;
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

        button {
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

        button:hover {
            background-color: #2980b9;
        }

        input[type="date"] {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 5px;
            color: #444444;
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 8px;
            width: 200px;
        }

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

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        table,
        th,
        td {
            border: 0;
            border-collapse: collapse;
            padding: 5px;
        }

        th {
            background-color: #ddd;
        }

        .book {
            background-color: #3d6885;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .book:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="Homepage.html"> <img class="logo" src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp" alt="Logo"></a>

                <a href="Homepage.html">Home</a>
                <a href="Trainschedule.php">Train Schedule</a>
                <a href="bookticket.php">Book Ticket</a>
                <a href="aboutus.html">About Us</a>
                <a href="contactus.html">Contact Us</a>
                <a href="Signup_page.php">Login/Signup</a>
            </div>
        </div>
    </header>
    <main>
        <form>
            <div class="image">
                <img src="schedule.avif" alt="Train schedule">
            </div>
            <table class="no-border">
                <tr>
                    <td> <label for="arrival">Arrival:</label>
                        <select id="arrival">
                            <option value="">Select Arrival Station</option>
                            <option value="New York">New York</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Denver">Denver</option>
                            <option value="Salt Lake City">Salt Lake City</option>
                            <option value="California">California</option>
                        </select>
                        <button type="submit">Search</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // $schedule = array(
        //     array(
        //         "train_number" => "001",
        //         "departure_station" => "New York",
        //         "arrival_station" => "Chicago",
        //         "date" => "2023-02-17",
        //         "departure_time" => "08:00",
        //         "arrival_time" => "14:30"
        //     ),
        //     array(
        //         "train_number" => "002",
        //         "departure_station" => "Chicago",
        //         "arrival_station" => "Denver",
        //         "date" => "2023-02-18",
        //         "departure_time" => "10:00",
        //         "arrival_time" => "17:45"
        //     ),
        //     array(
        //         "train_number" => "003",
        //         "departure_station" => "Denver",
        //         "arrival_station" => "Salt Lake City",
        //         "date" => "2023-02-19",
        //         "departure_time" => "09:30",
        //         "arrival_time" => "13:45"
        //     ),
        //     array(
        //         "train_number" => "004",
        //         "departure_station" => "Salt Lake City",
        //         "arrival_station" => "California",
        //         "date" => "2023-02-20",
        //         "departure_time" => "11:00",
        //         "arrival_time" => "18:15"
        //     )
        // );
        // foreach ($schedule as $train) {
        //     echo "<tr>";
        //     echo "<td>" . $train['train_number'] . "</td>";
        //     echo "<td>" . $train['departure_station'] . "</td>";
        //     echo "<td>" . $train['arrival_station'] . "</td>";
        //     echo "<td>" . $train['date'] . "</td>";
        //     echo "<td>" . $train['departure_time'] . "</td>";
        //     echo "<td>" . $train['arrival_time'] . "</td>";
        //     echo "<td><button class='book'>Book</button></td>";
        //     echo "</tr>";
        // } 

        // Fetch train data from API endpoint
        $apiEndpoint = "https://840b-2601-444-80-a6c0-9cbf-ef2e-45a7-8b16.ngrok.io/api/capstone/GetFoodOptions";
        $trainDataJSON = file_get_contents($apiEndpoint);
        $trainData = json_decode($trainDataJSON, true);

        if (isset($_POST['arrival_station'])) {
            $arrival_station = $_POST['arrival_station'];

            // filter data to show searched station on top
            usort($trainData, function ($a, $b) use ($arrival_station) {
                if ($a['arrival_station'] == $arrival_station) {
                    return -1;
                } elseif ($b['arrival_station'] == $arrival_station) {
                    return 1;
                } else {
                    return ($a['departure_time'] < $b['departure_time']) ? -1 : 1;
                }
            });
        }

        // print table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Train Name</th>';
        echo '<th>Departure Station</th>';
        echo '<th>Arrival Station</th>';
        echo '<th>Date</th>';
        echo '<th>Departure Time</th>';
        echo '<th>Arrival Time</th>';
        echo '<th>Book Ticket</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($data as $train) {
            echo '<tr>';
            echo '<td>' . $train['train_name'] . '</td>';
            echo '<td>' . $train['departure_station'] . '</td>';
            echo '<td>' . $train['arrival_station'] . '</td>';
            echo '<td>' . $train['date'] . '</td>';
            echo '<td>' . $train['departure_time'] . '</td>';
            echo '<td>' . $train['arrival_time'] . '</td>';
            echo '<td><a href="booking.php?id=' . $train['id'] . '">Book</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        ?>
    </main>
</body>

</html>