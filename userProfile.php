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
  </style>
  <link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <h1 align="center">Account Overview</h1>
</body>

</html>