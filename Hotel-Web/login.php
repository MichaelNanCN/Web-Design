<?php
if (isset($_GET["username"])) {
    if (!strcmp($_GET["username"],"admin") and !strcmp($_GET["password"],"admin")){
        header("Location: Administration.php");
    }ELSE{
        ECHO "Login failed";
    }
} else {
    
}

?>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
include ('header.php');
?>
<main>
<h1>Login Page</h1>
<h3>Please enter username and password to log in</h3>
<form action="login.php">
    <label>username:</label>
    <input name="username"></input>
    <br>
    <label>Password:</label>
    <input name="password"></input>
    <br>
    <input type="submit" value="login">
</form>
</main>
</body>