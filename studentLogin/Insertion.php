<?php
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['studentname'];
    $crse = $_POST['coursename'];
    $sem = $_POST['semester'];
    $gender1 = $_POST['gender'];

    // Handle hobbies as an array and join them into a single string
    if (isset($_POST['hobbies'])) {
        $hobbies1 = implode(", ", $_POST['hobbies']); // Convert array to comma-separated string
    } else {
        $hobbies1 = ""; // If no hobbies are selected, set as empty
    }

    $sql = "INSERT INTO studentregistration (studentname, coursename, semester, gender, hobbies) 
            VALUES ('$fname', '$crse', '$sem', '$gender1', '$hobbies1')";

    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    ?>
    <html>
    <head>
        <style>
            /* General styles */
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

            .form-container {
                width: 100%;
                max-width: 450px; /* Reduced the width */
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                box-sizing: border-box;
            }

            h2 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .form-container label {
                display: block;
                font-size: 14px;
                color: #333;
                margin: 8px 0 5px;
            }

            .form-container input[type="text"],
            .form-container input[type="radio"],
            .form-container input[type="checkbox"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .form-container input[type="radio"],
            .form-container input[type="checkbox"] {
                width: auto;
                margin: 5px 10px 5px 0;
            }

            .form-container input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                font-size: 16px;
                margin-top: 10px;
            }

            .form-container input[type="submit"]:hover {
                background-color: #45a049;
            }

            .hobbies-label {
                display: inline-block;
                margin-right: 15px;
            }

            /* Media Queries for responsiveness */
            @media (max-width: 768px) {
                .form-container {
                    padding: 20px;
                }

                .form-container input[type="text"] {
                    padding: 8px;
                }

                .form-container input[type="submit"] {
                    font-size: 14px;
                    padding: 10px;
                }
            }

            @media (max-width: 480px) {
                .form-container {
                    width: 90%;
                }

                .form-container input[type="submit"] {
                    font-size: 14px;
                    padding: 10px;
                }

                .form-container input[type="text"] {
                    padding: 8px;
                }

                .hobbies-label {
                    display: block;
                    margin-bottom: 8px;
                }
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h2>Student Registration Form</h2>
            <form action="" method="post">
                <label for="studentname">Student Name:</label>
                <input type="text" id="studentname" name="studentname" required><br>

                <label for="semester">Semester:</label>
                <input type="text" id="semester" name="semester" required><br>

                <label for="coursename">Course:</label>
                <input type="text" id="coursename" name="coursename" required><br>

                <label>Gender:</label>
                <input type="radio" name="gender" value="female" required> Female
                <input type="radio" name="gender" value="male" required> Male<br>

                <label>Hobbies:</label>
                <div class="hobbies-label">
                    <input type="checkbox" name="hobbies[]" value="sports"> Sports
                </div>
                <div class="hobbies-label">
                    <input type="checkbox" name="hobbies[]" value="reading"> Reading
                </div>
                <div class="hobbies-label">
                    <input type="checkbox" name="hobbies[]" value="dance"> Dance
                </div>
                <div class="hobbies-label">
                    <input type="checkbox" name="hobbies[]" value="music"> Music<br>
                </div>

                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
