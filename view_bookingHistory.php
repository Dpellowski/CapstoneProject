<!DOCTYPE html>
<html>

<head>
    <title>Bullet Train Website - View Booking History</title>
    <style>
        html {
            margin: 0;
            height: 100%;
        }

        body {
            font-family: "Fredoka One";
            letter-spacing: 2px;
            font-size: 20px;
            margin: 0;
            height: 100%;
        }

        .smallfont {
            font-size: 12px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        table.rightAlignTD:first-child td {
            text-align: right;
        }

        .buttonContainer {
            border-radius: 20px;
            font-size: 18px;
            width: fit-content;
            font-family: "Fredoka One";
            letter-spacing: 2px;
        }

        button {
            cursor: pointer;
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
            letter-spacing: 5px;
        }

        .savework {
            font-size: 19px;
            font-family: "Fredoka One";
            padding-block: 5px;
            border-radius: 30px;
            cursor: pointer;
            outline: none;
            color: black;
            background-color: #add8e6;
            margin-top: 10px;
        }

        .savework:active {
            background-color: #add8e6;
            box-shadow: 0 2px #666;
            transform: translateY(4px);
        }

        .savework:hover {
            font-weight: bold;
        }

        td {
            padding-top: 15px;
        }

        input[type="text"] {
            font-size: 18px;
        }

        span {
            font-size: 18px;
        }

        a {
            font-size: 18px;
        }

        a:hover {
            font-weight: bold;
        }

        header {
            height: fit-content;
            display: inline-flex;
            width: 100%;
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
            grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr;
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

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 95%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .requestbtn_container {
            text-align: center;
        }

        .refundbtn {
            max-width: 350px;
            min-width: 200px;
            border-radius: 20px;
            font-size: 20px;
            width: 8%;
            height: 40px;
            font-family: 'Times New Roman', Times, serif;
        }

        .refundbtn:hover {
            font-weight: bold;
            background-color: #add8e6;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="Homepage.html">
                    <img class="navbar-homeIcon" src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp" /></a>
                <a href="Homepage.html">Home</a>
                <a href="bookticket.php">Ticket</a>
                <a href="Trainschedule.php">Schedule</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>

            </div>

            <div class="dropdown">
                <img class="dropbtn" src="http://cdn.onlinewebfonts.com/svg/img_569204.png" style="width:40px;height:40px;">
                <div class="dropdown-content">
                    <a href="userProfile.php">Account</a>
                    <a href="#editProfile">Security</a>
                    <a href="logout_msg.html">Log out</a>
                </div>
            </div>
        </div>
    </header>
    <h1 align="center">Booking History</h1>
    <br />
    <div class="requestbtn_container">
        <a href="refund.php"><button type="submit" class="refundbtn" id="refund" value="Request Refund">Request Refund</button></a>
    </div>
    <br />

    <table>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Train Name</th>
            <th>Passenger(s)</th>
            <th>Starting location</th>
            <th>Destination</th>
            <th>One-way/Round-trip</th>
            <th>Food Option</th>
            <th>Total price</th>

        </tr>
        <tr>
            <td>May 10</td>
            <td>10:30 AM</td>
            <td>Acela Express </td>
            <td>2</td>
            <td>California_station1</td>
            <td>Nevada_station1</td>
            <td>Round-trip</td>
            <td>Kosher</td>
            <td>$80</td>

        </tr>
        <tr>
            <td>August 5</td>
            <td>9:00 AM</td>
            <td>Avelia Liberty</td>
            <td>2</td>
            <td>Pennsylvania_station2</td>
            <td>New York_station 1</td>
            <td>One-way</td>
            <td>Kosher</td>
            <td>$200</td>

        </tr>
        <tr>
            <td>March 2</td>
            <td>11:00 AM</td>
            <td>Avelia Liberty</td>
            <td>2</td>
            <td>California_station1</td>
            <td>Utah_station2</td>
            <td>Round-trip</td>
            <td>Meat</td>
            <td>$100</td>
        </tr>
        <tr>
            <td>December 12</td>
            <td>1:30 PM</td>
            <td>Acela Express</td>
            <td>2</td>
            <td>California_station1</td>
            <td>Utah_station2</td>
            <td>Round-trip</td>
            <td>Meat</td>
            <td>$160</td>
        </tr>
    </table>
</body>

</html>