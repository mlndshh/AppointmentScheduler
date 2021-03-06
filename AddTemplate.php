<?php
include('session.php');
?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Add Template</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
           <a class="mdl-navigation__link" href="logout.php"><li class="mdl-menu__item">LogOut</li></a>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>hello@example.com</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item">hello@example.com</li>
              <li class="mdl-menu__item">info@example.com</li>
              <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Visits</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Reports</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Patients</a>
          <a class="mdl-navigation__link" href="AddDoctor.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Doctors</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Payments</a>
          <a class="mdl-navigation__link" href="ScheduleAppointment.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Schedule Appointments</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
		<div>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "clinic";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$tempidsql="SELECT TemplateID FROM templatemaster ORDER BY TemplateID DESC LIMIT 1";
			$tempidres= $conn->query($tempidsql);
			$tempidarr=$tempidres->fetch_assoc();
			if($tempidarr["TemplateID"]<1)
				$tempid=1;
			else
				$tempid = $tempidarr["TemplateID"]+1;
			$_SESSION['templateID'] = $tempid;
		?>
		<form id="addtemplate" method="post">
		<input type="hidden" name="templateid" value=<?php echo $tempid; ?>>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="name" name="name" required>
				<label class="mdl-textfield__label" for="name">Report Template Name</label>         
		</div><br>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="number" id="doctorid" name="doctorid" value=1>
				<label class="mdl-textfield__label" for="doctorid">Conducting Doctor ID</label>         
		</div><br>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="number" id="fees" name="fees" required>
				<label class="mdl-textfield__label" for="fees">Fees</label>         
		</div><br>
		OBS:
		<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
			<input type="checkbox" id="switch-2" class="mdl-switch__input" name="obs">
			<span class="mdl-switch__label"></span>
		</label><br><br>
		
		<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" name="submit">
			Submit
		</button>
		</form>
		</div>
		<?php
		if(isset($_POST["submit"]))
		{
			$tempid=$_POST["templateid"];
			$reportcategoryid=1;
			$tempname=$_POST["name"];
			$doctorid=$_POST["doctorid"];
			$firsttemplatedetailid=0;
			$fees=$_POST["fees"];
			if(isset($_POST["obs"]))
				$obs=1;
			else $obs=0;
			$totalfees=$fees;
			$sql="insert into templatemaster values($tempid,$reportcategoryid,'$tempname',$doctorid,$firsttemplatedetailid,$fees,$obs,0,0,0,0,$totalfees)";
			$res=$conn->query($sql);
			if($res)
			{
				echo "Template created<br>";
			}
			else
			{
				echo "Issues in creating template<br>";
			}
			$GLOBALS["tempid"]=$tempid;
			$GLOBALS["tempname"]=$tempname;
			echo "<b>Template Name:" . $GLOBALS["tempname"] . "</b><br>";
			echo "<a href='TemplateDetails.php' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'> Add Details </a>";

		}
		?>
      </main>
    </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
