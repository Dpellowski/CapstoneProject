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

    .logo {
        width: 150px;
        height: auto;
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .logo:hover {
        opacity: 0.5;
    }

    button {
        cursor: pointer;
    }


    input[type="text"] {
        font-size: 18px;
    }

    span {
        font-size: 18px;
    }

    main {
        letter-spacing: 2px;
        font-size: 20px;
        margin: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    form {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin: 20px 0;
    }

    input[type="text"] {
        padding: 10px;
        margin: 10px;
        font-size: 18px;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        border: 0;
    }

    .no-border {
        border: 0;
    }

    td,
    th {
        border: 0;
        padding: 10px;
        text-align: left;
        font-size: 18px;
    }

    .category {
        font-size: 20px;
        font-weight: bold;
        margin: 20px 0;
    }

    .item {
        display: flex;
        font-size: 18px;
        margin: 10px 0;
    }

    .item-img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .item-details {
        display: flex;
        flex-direction: column;
    }


    .container {
        display: flex;
        flex-wrap: wrap;
    }

    .food-options {
        width: 45%;
        text-align: center;
        padding: 20px;
        border: 1px solid black;
        box-shadow: 2px 2px 5px #999;
        margin: 10px;
    }

    .food-options h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .food-options img {
        width: 100px;
        height: 100px;
        margin-bottom: 20px;
    }

    .food-options p {
        font-size: 18px;
        margin-bottom: 20px;
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
            </div>
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
    </header>
    <main>
        <h1>Food Options</h1>
        <div class="container">
            <div class="food-options">
                <h3>Drinks</h3>
                <img src="https://via.placeholder.com/100x100" alt="drink">
                <p>Coke</p>
                <p>$2.00</p>
                <img src="https://via.placeholder.com/100x100" alt="drink">
                <p>Pepsi</p>
                <p>$2.00</p>
                <img src="https://via.placeholder.com/100x100" alt="drink">
                <p>Sprite</p>
                <p>$2.00</p>
            </div>
            <div class="food-options">
                <h3>Food</h3>
                <img src="https://via.placeholder.com/100x100" alt="food">
                <p>Sandwich</p>
                <p>$5.00</p>
                <img src="https://via.placeholder.com/100x100" alt="food">
                <p>Pizza</p>
                <p>$7.00</p>
                <img src="https://via.placeholder.com/100x100" alt="food">
                <p>Burger</p>
                <p>$6.00</p>
            </div>
            <div class="food-options">
                <h3>Snacks</h3>
                <img src="https://via.placeholder.com/100x100" alt="snack">
                <p>Chips</p>
                <p>$2.00</p>
                <img src="https://via.placeholder.com/100x100" alt="snack">
                <p>Candies</p>
                <p>$2.00</p>
                <img src="https://via.placeholder.com/100x100" alt="snack">
                <p>Popcorn</p>
                <p>$2.00</p>
            </div>
    </main>
    <footer>
        <div class="no-border">
            <table>
                <tr>
                    <td>
                        <a href="Homepage.html">Home</a>
                    </td>
                    <td>
                        <a href="Trainschedule.php">Train Schedule</a>
                    </td>
                </tr>
            </table>
        </div>
    </footer>
</body>

</html>