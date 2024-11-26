<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details CRUD Application</title>
</head>

<body>

    <div id="login-form">
        <form method="post" action="./index.php?action=login">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            <button type="submit">Login</button>
        </form>
    </div>
    <br />
    <br />
    <br />
    <h2>Register New Account</h2>
    <!-- <button onclick="toggleRegister()">Register</button> -->

    <div id="register-form">
        <form method="post" action="./index.php?action=register">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" />
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            <button type="submit">Register</button>
        </form>
    </div>
    <script type="text/javascript" src="./script.js"></script>
</body>

</html>