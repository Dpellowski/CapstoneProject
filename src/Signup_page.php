<!DOCTYPE html>
<html>

<head>
    <title>Bullet Train Website - Signup</title>
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
        color: #81c784;
        font-family: "Fredoka One";
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
                <a href="Signup_page.php">Book Ticket</a>
                <a href="aboutus.html">About Us</a>
                <a href="contactus.html">Contact Us</a>
            </div>
        </div>
    </header>
    <h1 align="center">Sign Up</h1>
    <div align="center">
        <span>Already have an account?</span>
        <a href="login.html">Log in</a>
        <table class="rightAlignTD">
            <tr>
                <td><label for="username">Username:</label></td>
                <td>
                    <input title="Enter desired username" id="username" type="text" name="username" required="true"
                        spellcheck="false" />
                </td>
            </tr>
            <tr>
                <td><label for="fname">First Name:</label></td>
                <td>
                    <input title="Enter your first name" id="fname" type="text" name="fname" required="true"
                        spellcheck="false" />
                </td>
            </tr>
            <tr>
                <td><label for="lname">Last Name:</label></td>
                <td>
                    <input title="Enter your last name" id="lname" type="text" name="lname" required="true"
                        spellcheck="false" />
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input title="Enter valid email address" id="email" type="text" name="email" required="true"
                        spellcheck="false" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]" />
                </td>
            </tr>
            <tr>
                <td><label for="email_confirm">Email Confirmation:</label></td>
                <td>
                    <input title="Enter valid email address" id="email_confirm" type="text" name="email_confirm"
                        required="true" spellcheck="false" pattern="[a-zA-Z0-9._]+@[a-z].+[a-z]" />
                </td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td>
                    <input title="Enter desired password" id="password" type="text" name="password" required="true"
                        spellcheck="false" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password_confirm">Password Confirmation:</label>
                </td>
                <td>
                    <input title="Reenter password" id="password_confirm" type="text" name="password_confirm"
                        required="true" spellcheck="false" />
                </td>
            </tr>
        </table>
        <br />
        <input class="savework" type="submit" onclick="newUser()" name="requestPassword" value="Create Account" />
    </div>
    <script src="signup.js">

    </script>
</body>

</html>