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

        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-item {
            width: 30%;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: hidden;
        }

        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .menu-item h3 {
            margin: 10px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }

        .menu-item p {
            margin: 10px;
            font-size: 1.1em;
            text-align: center;
        }

        .menu-item .price {
            font-weight: bold;
            color: green;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f7f7f7;
            color: #333;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .back-button:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar-container-left">
                <a href="index.html">
                    <img class="logo" src="https://i.fbcd.co/products/resized/resized-750-500/1004-ff00287f81b6351d6c3ff7b3378a00d0a4a5457cbff98964e4e2206bc75f05ab.webp" alt="Logo"></a>

                <a href="index.html">Home</a>
                <a href="Trainschedule.php">Train Schedule</a>
                <a href="bookticket.html">Book Ticket</a>
                <a href="aboutus.html">About Us</a>
                <a href="contactus.html">Contact Us</a>
                <div class="dropdown">
                    <img class="dropbtn" src="https://pic.onlinewebfonts.com/svg/img_24787.png" style="width:40px;height:40px;">
                    <div class="dropdown-content">
                        <a href="user_setting.php">Account</a>
                        <a href="forgot_password.php">Security</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
    </header>
    <main>
        <!--
        <div class="menu">
            <div class="menu-item">
                <img src="halal.jpeg" alt="Halal">
                <h3>Halal</h3>
                <p>Delicious halal dish made with fresh ingredients.</p>
                <p class="price">$15.99</p>
            </div>
            <div class="menu-item">
                <img src="kosher.jpeg" alt="Kosher">
                <h3>Kosher</h3>
                <p>Traditional kosher meal prepared according to Jewish dietary laws.</p>
                <p class="price">$18.99</p>
            </div>
            <div class="menu-item">
                <img src="meat.jpeg" alt="Meat">
                <h3>Meat</h3>
                <p>Juicy and flavorful meat cooked to perfection.</p>
                <p class="price">$20.99</p>
            </div>
            <div class="menu-item">
                <img src="vegan.jpg" alt="Vegan">
                <h3>Vegan</h3>
                <p>Nutritious vegan dish packed with veggies and plant-based protein.</p>
                <p class="price">$16.99</p>
            </div>
            <div class="menu-item">
                <img src="vegetable.jpg" alt="Vegetable">
                <h3>Vegetable</h3>
                <p>Colorful and healthy vegetable platter with a variety of dips.</p>
                <p class="price">$12.99</p>
            </div>
        </div>-->
        <?php

        $url = "https://840b-2601-444-80-a6c0-9cbf-ef2e-45a7-8b16.ngrok.io/api/capstone/GetFoodOptions";
        $json = file_get_contents($url);
        $data = json_decode($json);

        if ($data) {
            echo "<div class='food-options'>";
            foreach ($data as $item) {
                echo "<div class='food-item'>";
                echo "<img src='$item->img' alt='$item->food'>";
                echo "<h3>$item->food</h3>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "Unable to retrieve data.";
        }

        ?>
        <a href="bookticket.php" class="back-button">Go back to booking page</a>
    </main>

</body>

</html>