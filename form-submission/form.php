<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <center>

<?php
$nameErr = $emailErr = $dobErr = $genderErr = $religionErr ="";
$name = $email = $dob = $gender = $religion = "";

$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else { 
    if (str_word_count($_POST["name"])>=2){
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' _]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
  }
    else{
    $nameErr = "Type atleast two words";
  }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["religion"])) {
    $religionErr = "Religion is required";
  } else {
    $religion = test_input($_POST["religion"]);
  }

  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else { 
    if (str_word_count($_POST["username"]) ==1 && strlen($_POST["username"])>=2) {
    	$username = test_input($_POST["username"]);
      if (!preg_match("/^[a-z0-9.-_]/i",$username)) {
      	$usernameErr = "Only alpha numeric characters, period, dash or
underscore allowed";
      }
      }
    else {
    $usernameErr = "Type atleast two characters without any space";
  }
  }

  if(!empty($_POST["password"])) {
      $password = test_input($_POST["password"]);
      if(!preg_match("/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m", $password)) {
          $passwordErr="Password should include at least one special character(@,#,$,%)";
        }
      if (strlen($password) < 8){
          $passwordErr="Password should be at least 8 characters in length";
      }
}
  else{
  $passwordErr = "Password is required";   
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


    <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <fieldset>
                <legend>1. Basic Information</legend>
                <label for "firstname">First Name :</label><br>
                <input type="text" id=="firstname" name="firstname">
                <span class="error">* <?php echo $nameErr;?></span><br>
                <label for "lastname">Last Name :</label><br>
                <input type="text" id=="lastname" name="lastname">
                <span class="error">* <?php echo $nameErr;?></span><br>
                <label for "gender">Gender :</label>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="error">* <?php echo $genderErr;?></span><br>
                <label for "dob">Date Of Birth :</label>
                <input type="date" id=="dob" name="dob">
                <span class="error">* <?php echo $dobErr;?></span><br>
                <label for "religion">Religion :</label>
                <select id=="religion" name="religion">
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="christian">Christian</option>
                    <option value="buddhist">Buddhist</option>
                </select>
                <span class="error">* <?php echo $religionErr;?></span><br>
            </fieldset>
            <fieldset>
                <legend>2. Contact Information :</legend>
                <label for "preadd">Present Address:</label><br>
                <textarea id="preadd" name="preadd" row="4" cols="40"></textarea><br>
                <label for "peradd">Permanent Address :</label><br>
                <textarea id="peradd" name="peradd" row="4" cols="40"></textarea><br>
                <label for "phone">Phone :</label><br>
                <input type="tel" id=="phone" name="phone"><br>
                <label for "email">Email :</label><br>
                <input type="email" id=="email" name="email">
                <span class="error">* <?php echo $emailErr;?></span><br>
                <label for "perweb">Personal Website Link :</label><br>
                <a href="https://github.com/iamzisan">Personal Website</a><br>
            </fieldset>
            <fieldset>
                <legend>3. Account Information</legend>
                <label for "username">User Name :</label><br>
                <input type="text" id=="username" name="username">
                <span class="error">* <?php echo $usernameErr;?></span><br>
                <label for "password">Password :</label><br>
                <input type="password" id=="password" name="password">
                <span class="error">* <?php echo $passwordErr;?></span><br>
            </fieldset>
        </center>
    </body>
</html>

