<!DOCTYPE html>
<html>

<head>
    <title>Bullet Train Website - Edit Profile</title>
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

    input {
        height: 30px;
    }

    th {
        text-align: right;
    }

    table {
        margin-left: auto;
        margin-right: auto;
    }

    tr>th,
    tr>td {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    h1,
    h2,
    h3 {
        text-align: center;
        font-weight: bold;
    }

    .submitbtn {
        background-color: #74dc38;
        border-radius: 30px;
        font-size: 18px;
        padding: 8px 1%;
        font-family: 'Times New Roman', Times, serif;
    }

    .submitbtn:hover {
        font-weight: bold;
    }
    </style>
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

            </div>

            <div class="dropdown">
                <img class="dropbtn" src="http://cdn.onlinewebfonts.com/svg/img_569204.png"
                    style="width:40px;height:40px;">
                <div class="dropdown-content">
                    <a href="userProfile.php">Account</a>
                    <a href="edit-profile.php">Security</a>
                    <a href="logout_msg.html">Log out</a>
                </div>
            </div>
        </div>
    </header>
    <h1><u>Edit Profile</u></h1>
    <h2><u>Change Email Address</u></h2>
    <form action="#process-edit-profile" method="post">
        <table>
            <tr>
                <th>Current Email:</th>
                <td>abc@gmail.com</td>
            </tr>
            <tr>
                <th>New Email Address:</th>
                <td> <input type="text" id="new_address" name="new_address" size="50"
                        placeholder="Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"></td>
            </tr>
            <tr>
                <th>Confirm New Email Address:</th>
                <td><input type="text" id="confirm_address" name="confirm_address" size="50"
                        placeholder="Re-Enter New Email Address" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]"></td>
            </tr>
        </table>
        <div style="text-align:center">
            <button type="submit" name="updateEmail" value="updateEmail" class="submitbtn">Update Email</button>
        </div>
    </form>

    <h2><u>Change Password</u></h2>

    <form action="#process-edit-profile" method="post">
        <div>
            <table>
                <tr>
                    <th>Current Password:</th>
                    <td> <input type="password" id="current_password" name="current_password" size="50"
                            placeholder="Enter Current Password"></td>
                </tr>
                <tr>
                    <th>New Password:</th>
                    <td> <input type="password" id="new_password" name="new_password" size="50"
                            placeholder="Enter New Password"></td>
                </tr>
                <tr>
                    <th>Confirm New Password:</th>
                    <td><input type="password" id="confirm_password" name="confirm_password" size="50"
                            placeholder="Re-Enter New Password"></td>
                </tr>
            </table>
        </div>
        <div style="text-align:center">
            <button type="submit" name="updatePw" value="updatePw" class="submitbtn">Update Password</button>
        </div>
    </form>

</body>

</html>