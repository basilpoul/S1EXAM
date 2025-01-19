<?php
include 'dbconnection.php';

if (isset($_GET['studentid'])) {
    $studentid = $_GET['studentid'];

    // Fetch the existing data for the given student ID
    $sql = "SELECT * FROM studentregistration WHERE studentid = '$studentid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);

        // Redirect to the update page with student data
        $query = http_build_query($student);
        header("Location: update2.php?$query");
        exit();
    } else {
        echo "No student found with ID: $studentid";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Student Details</title>
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

        /* Button styling */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        /* Button hover effect */
        button:hover {
            background-color: #45a049;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            input[type="text"], button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Retrieve Student Details</h2>
        <form method="GET" action="">
            <label for="studentid">Student ID:</label>
            <input type="text" name="studentid" id="studentid" required>
            <button type="submit">Retrieve</button>
        </form>
    </div>
</body>
</html>
