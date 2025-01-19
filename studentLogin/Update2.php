<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Handle form submission
    $id = $_POST['id'];
    $name = $_POST['name'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "";

    // Update student details
    $sql = "UPDATE studentregistration
            SET studentname = '$name', semester = '$semester', coursename = '$course', gender = '$gender', hobbies = '$hobbies'
            WHERE studentid = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit();
}

// Retrieve student data from query parameters
if (isset($_GET['studentid'])) {
    $student = $_GET;
} else {
    echo "No student data provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Details</title>
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
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            display: grid;
            gap: 20px;
        }

        /* Title styling */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        /* Input field styling */
        input[type="text"], input[type="radio"], input[type="checkbox"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Button styling */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Button hover effect */
        button:hover {
            background-color: #45a049;
        }

        /* Flex container for gender and hobbies */
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: flex-start;
        }

        .flex-container div {
            display: flex;
            align-items: center;
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

            .flex-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .flex-container div {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Student Details</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $student['studentid']; ?>">

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $student['studentname']; ?>" required>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" value="<?php echo $student['semester']; ?>" required>

            <label for="course">Course:</label>
            <input type="text" name="course" value="<?php echo $student['coursename']; ?>" required>

            <label>Gender:</label>
            <div class="flex-container">
                <div>
                    <input type="radio" name="gender" value="male" <?php if ($student['gender'] == 'male') echo 'checked'; ?>> Male
                </div>
                <div>
                    <input type="radio" name="gender" value="female" <?php if ($student['gender'] == 'female') echo 'checked'; ?>> Female
                </div>
            </div>

            <label for="hobbies">Hobbies:</label>
            <div class="flex-container">
                <?php $existingHobbies = explode(", ", $student['hobbies']); ?>
                <div>
                    <input type="checkbox" name="hobbies[]" value="sports" <?php if (in_array("sports", $existingHobbies)) echo 'checked'; ?>> Sports
                </div>
                <div>
                    <input type="checkbox" name="hobbies[]" value="music" <?php if (in_array("music", $existingHobbies)) echo 'checked'; ?>> Music
                </div>
                <div>
                    <input type="checkbox" name="hobbies[]" value="dance" <?php if (in_array("dance", $existingHobbies)) echo 'checked'; ?>> Dance
                </div>
                <div>
                    <input type="checkbox" name="hobbies[]" value="reading" <?php if (in_array("reading", $existingHobbies)) echo 'checked'; ?>> Reading
                </div>
            </div>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
