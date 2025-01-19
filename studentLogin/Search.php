<?php
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    $id1 = $_POST['id'];
    $sql = "SELECT * FROM studentregistration WHERE studentid='$id1'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>Id: " . $row["studentid"] . "<br>Name: " . $row["studentname"] .
                "<br>Semester: " . $row["semester"] . "<br>Course: " . $row["coursename"] . "<br>Gender: " .
                $row["gender"] . "<br>Hobbies: " . $row["hobbies"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Search Student</title>
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

            /* Form container */
            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 350px; /* Reduced width */
                text-align: center;
            }

            /* Input fields and labels styling */
            label {
                font-size: 16px;
                color: #333;
                margin-bottom: 8px;
                display: block;
            }

            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }

            /* Submit button styling */
            input[type="submit"] {
                width: 100%;
                padding: 12px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
            }

            /* Button hover effect */
            input[type="submit"]:hover {
                background-color: #45a049;
            }

            /* Output section styling */
            .output {
                margin-top: 20px;
                padding: 20px;
                background-color: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            /* Responsive design for smaller screens */
            @media (max-width: 480px) {
                .form-container {
                    padding: 15px;
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
            <h2>Search Student</h2>
            <form action="" method="post">
                <label for="id">Student Id:</label>
                <input type="text" name="id" required>
                <input type="submit" name="submit" value="Submit">
            </form>

            <!-- Output the student data -->
            <?php if (isset($_POST['submit']) && mysqli_num_rows($result) > 0) { ?>
                <div class="output">
                    <!-- Student data will be displayed here -->
                    <h3>Student Details:</h3>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "Id: " . $row["studentid"] . "<br>Name: " . $row["studentname"] .
                            "<br>Semester: " . $row["semester"] . "<br>Course: " . $row["coursename"] . "<br>Gender: " .
                            $row["gender"] . "<br>Hobbies: " . $row["hobbies"] . "<br>";
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </body>
    </html>
    <?php
}
?>
