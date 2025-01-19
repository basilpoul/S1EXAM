<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("localhost", "root", "", "test");
        if (!$conn) {
            die("Unable to connect");
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        $q = "SELECT * FROM USERS WHERE USERNAME='" . $username . "' AND PASSWORD='" . $password . "'";
        $res = $conn->query($q);
        if ($res->num_rows > 0) {
            echo "<script>alert('Welcome " . $username . "');</script>";
        } else {
            echo "<script>alert('Invalid Username/Password');</script>";
        }


    }
    ?>
    <h1>Sign In</h1>
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
                <td colspan="2"><input type="submit" class="submit" /></td>
            </tr>
        </table>
    </form>
    </table>
</body>

</html>