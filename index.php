<!DOCTYPE html>
<html>
	<header>
		<title>GMRepo</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="/theme.php">
	</header>
	<body>
		<div class="topbar">
            <!-- unordered list in case there are more buttons on the top bar eventually -->
			<ul>
				<li>
					<label>
                        <input type="checkbox">
					    <i class="material-icons">menu</i>
					</label>
				</li>
			</ul>

            <!-- The all-important logo, which will kind of hang off the side -->
			<img id="tbarlogo" src="logo/logo_128px.png" alt="GMRepo Logo"/>
		</div>

        <!-- This is the drawer that will slide in and out. It will be pinnable -->
        <div class="sidebar">
            <!-- Holds user inonfo and some control buttons -->
            <div class="userinfo">
                <img id="profpic" src="images/DefaultProfile.png" alt="Profile Picture"/>
                <h1> Cool Guy </h1>
            </div>

            <!-- List of categories -->
            <ul class="categorylist">
                
            </ul>

            <!-- Some space for buttons below the categories -->
            <ul class="categorycontrol">

            </ul>
        </div>
	</body>
</html>
