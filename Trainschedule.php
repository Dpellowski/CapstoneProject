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


    main {
        justify-content: center;
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

    img {
        size: 30%;
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

    div[image] {
        flex: 1;
        max-width: 50%;
        padding: 24px;
        max-width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    }

    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
        /* Center align table */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    th {
        background-color: #1abc9c;
        color: white;
        text-align: left;
        padding: 10px;
    }

    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    /* Button style */
    button {
        background-color: #1abc9c;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 20px 0;
        cursor: pointer;
        border-radius: 4px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    button:hover {
        background-color: #16a085;
    }

    img {
        height: 300px;
        width: 500px;
    }
    </style>
    <script src="signup.js"></script>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="index.html">
                    <img class="logo"
                        src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp"
                        alt="Logo"></a>

                <a href="index.html">Home</a>
                <a href="Trainschedule.php">Train Schedule</a>
                <a href="bookticket.html">Book Ticket</a>
                <a href="aboutus.html">About Us</a>
                <a href="contactus.html">Contact Us</a>

                <div class="dropdown">
                    <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png"
                        style="width:40px;height:40px;">
                    <div class="dropdown-content">
                        <a href="userProfile.html">Account</a>
                        <a href="forgot_password.php">Security</a>
                        <a href="logout_msg.html">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="image">
            <img src="https://img.freepik.com/free-vector/schedule-concept-illustration_114360-1531.jpg?w=826&t=st=1680036683~exp=1680037283~hmac=c101d301215a0166b38e5d908a31b9771b64fd70a05e96f65467778c7f66238b"
                alt="Train schedule">
        </div>
        <table class="no-border">
            <tr>
                <td> <label for="arrival">Arrival:</label>
                    <select id="arrival" required>
                        <option value="">Select Arrival Station</option>
                        <option value="New York">New York</option>
                        <option value="Chicago">Chicago</option>
                        <option value="Denver">Denver</option>
                        <option value="Salt Lake City">Salt Lake City</option>
                        <option value="California">California</option>
                        <option value="Boston">Boston</option>
                    </select>
                    <button type="submit" onclick="getSchedule()">Search</button>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>