<!DOCTYPE html>
<html>

<head>
    <title>Bullet Train Webpage - Login</title>
    <style>
        body {
            text-align: center;
        }

        input {
            height: 40px;
            margin-left: 10px;
            font-size: 17px;
        }

        table tr th:first-child {
            text-align: right;
            font-size: 25px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        td {
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .forgot_password {
            font-size: 18px;
        }

        .forgot_password:hover {
            font-weight: bold;
        }

        .account_not_exist {
            font-size: 18px;
        }

        .account_not_exist:hover {
            font-weight: bold;
        }

        #reset_PW_btn {
            background-color: rgb(45, 199, 45);
            border-radius: 20px;
            font-size: 18px;
            width: 8%;
            height: 40px;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
        }

        #reset_PW_btn:active {
            transform: translateY(4px);
            background-color: rgb(45, 199, 45);
            box-shadow: 0 2px #666;
        }

        strong {
            font-size: 30px;
            color: red;
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
            grid-template-columns: 1fr 1fr 1fr;
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
                <a href="Homepage.html"><img class="navbar-homeIcon" src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp" /></a>
                <a href="Homepage.html">Home</a>
            </div>
        </div>
    </header>
    <div>
        <img src="https://uxwing.com/wp-content/themes/uxwing/download/web-app-development/forgot-password-icon.png" width="80" height="90">
    </div>
    <h1 align="center">Reset Password</h1>
    <br />
    <table>
        <tr>
            <th>New password:</th>
            <td>
                <input type="text" name="newPW" size="50" min="6" placeholder="Enter your password." required="true" />
            </td>
        </tr>
        <tr>
            <th>Confirm new password:</th>
            <td>
                <input type="password" name="confirm_newPW" size="50" placeholder="Re-enter your new password." required="true" />
            </td>
        </tr>
    </table>
    <br />
    <div class="submitbtn">
        <input type="submit" id="reset_PW_btn" name="reset_PW_btn" value="Reset password" />
    </div>
</body>

</html>