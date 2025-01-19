<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("localhost", "root", "", "test");
        if ($conn) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
            $cpass = $_POST["cpassword"];
            $mail = $_POST["mail"];
            $phone = $_POST["phone"];
            $q = "INSERT INTO USERS(USERNAME,PASSWORD,EMAIL,PHONE)VALUES('" . $uname . "','" . $pass . "','" . $mail . "','" . $phone . "')";
            if ($conn->query($q)) {
                //Navigating to login after registration
                header("location:login.php");
            } else {
                //Error in query
                echo "failed";
            }
        } else {
            echo "unable to connect";
        }
    }

    ?>
    <h1>Sign Up</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="input" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="input" /></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <td><input type="password" name="cpassword" class="input" /></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="text" name="mail" class="input" /></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" class="input" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="register" class="submit" /></td>
            </tr>
        </table>
    </form>
</body>

</html>