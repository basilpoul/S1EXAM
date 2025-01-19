<?php
include 'dbconnection.php';
if (isset($_POST['submit'])) {
    $id1 = $_POST['id'];
    $sql = "DELETE FROM studentregistration WHERE studentid='$id1'";
    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    ?>
    <html>
    <head>
        <title>Delete Student</title>
        <style>
            /* General body styling */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            /* Centering the form */
            .form-container {
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 100%;
                max-width: 300px; /* Reduced the width */
            }

            /* Title styling */
            h2 {
                color: #333;
                margin-bottom: 20px;
            }

            /* Input field styling */
            input[type="text"] {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
            }

            /* Submit button styling */
            input[type="submit"] {
                background-color: #f44336;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                width: 100%;
            }

            /* Button hover effect */
            input[type="submit"]:hover {
                background-color: #e53935;
            }

            /* Responsive design for smaller screens */
            @media (max-width: 480px) {
                .form-container {
                    padding: 20px;
                    width: 90%;
                }

                input[type="text"], input[type="submit"] {
                    font-size: 14px;
                    padding: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h2>Delete Student</h2>
            <form action="" method="post">
                <label for="id">Student Id:</label>
                <input type="text" name="id" required><br>
                <input type="submit" name="submit" value="Delete">
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
