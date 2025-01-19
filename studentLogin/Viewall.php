<?php
include 'dbconnection.php';

$sql = "SELECT * FROM studentregistration";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='student-details'>";
        echo "<p><strong>ID:</strong> " . $row["studentid"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["studentname"] . "</p>";
        echo "<p><strong>Semester:</strong> " . $row["semester"] . "</p>";
        echo "<p><strong>Course:</strong> " . $row["coursename"] . "</p>";
        echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
        echo "<p><strong>Hobbies:</strong> " . $row["hobbies"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
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
            flex-direction: column;
        }

        /* Container for student details */
        .student-details {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            margin-top: 20px;
        }

        /* Styling for each piece of student information */
        .student-details p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        .student-details strong {
            color: #4CAF50; /* Green for labels */
        }

        /* Back link styling */
        a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Position the back button at the bottom and center it */
        .back-btn-container {
            position: absolute;
            bottom: 20px; /* Place it at the bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Adjust for exact centering */
        }

        /* Responsive design for smaller screens */
        @media (max-width: 480px) {
            .student-details {
                width: 90%;
                padding: 15px;
            }
            a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="student-details-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            // Output data of each student
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='student-details'>";
                echo "<p><strong>ID:</strong> " . $row["studentid"] . "</p>";
                echo "<p><strong>Name:</strong> " . $row["studentname"] . "</p>";
                echo "<p><strong>Semester:</strong> " . $row["semester"] . "</p>";
                echo "<p><strong>Course:</strong> " . $row["coursename"] . "</p>";
                echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
                echo "<p><strong>Hobbies:</strong> " . $row["hobbies"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
    </div>

    <!-- Back button-->
    <div class="back-btn-container">
        <a href="homepage.php">&lt; Back</a>
    </div>
</body>
</html>
