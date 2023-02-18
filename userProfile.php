<!DOCTYPE html>
<html>

<head>
  <title>Bullet Train Website - userProfile page</title>
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

    table tr th:first-child {
      text-align: right;
      font-size: 20px;
    }

    table {
      margin-left: auto;
      margin-right: auto;
    }

    td {
      padding-top: 1%;
      padding-bottom: 1%;
    }

    .editbtn_container {
      text-align: center;
    }

    .editbtn {
      max-width: 350px;
      min-width: 180px;
      border-radius: 20px;
      font-size: 20px;
      width: 8%;
      height: 40px;
      font-family: 'Times New Roman', Times, serif;
    }

    .editbtn:hover {
      font-weight: bold;
      background-color: rgb(45, 199, 45);
    }

    .bookhistorybtn_container {
      text-align: center;
    }

    .viewhistory {
      max-width: 350px;
      min-width: 230px;
      border-radius: 20px;
      font-size: 20px;
      width: 8%;
      height: 40px;
      font-family: 'Times New Roman', Times, serif;
    }

    .viewhistory:hover {
      font-weight: bold;
      background-color: rgb(45, 199, 45);
    }

    .refundbtn_container {
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
      background-color: rgb(45, 199, 45);
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
        <a href="#ticket">Ticket</a>
        <a href="#schedule">Schedule</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact</a>

      </div>

      <div class="dropdown">
        <img class="dropbtn" src="http://cdn.onlinewebfonts.com/svg/img_569204.png" style="width:40px;height:40px;">
        <div class="dropdown-content">
          <a href="userProfile.php">Account</a>
          <a href="edit-profile.php">Security</a>
          <a href="logout_msg.html">Log out</a>
        </div>
      </div>
    </div>
  </header>
  <h1 align="center">Account Overview</h1>

  <table cellpadding="10" ; cellspacing="10" class="userinfo">
    <tr>
      <th>Username:</th>
      <td>John Doe</td>
    </tr>
    <tr text-decoration="underline" ;>
      <th>Email:</th>
      <td>johndoe1@gmail.com</td>
    </tr>
  </table>
  <br />
  <div class="editbtn_container">
    <a href="#editProfile"><button type="submit" class="editbtn" id="edit" value="Edit Profile">Edit Profile</button></a>
  </div>
  <br />
  <div class="bookhistorybtn_container">
    <a href="#viewBookinghistory"><button type="submit" class="viewhistory" id="history" value="View Booking History">View Booking History</button></a>
  </div>
  <br />
  <div class="refundbtn_container">
    <a href="#request_refund"><button type="submit" class="refundbtn" id="refund" value="Request Refund">Request Refund</button></a>
  </div>
</body>

</html>