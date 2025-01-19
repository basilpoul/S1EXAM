<html>
<head>
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

        /* Container for links */
        .menu-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        /* Styling the links */
        a {
            display: block;
            text-decoration: none;
            color: #333;
            font-size: 18px;
            margin: 15px 0;
            padding: 12px;
            background-color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Hover effect on the links */
        a:hover {
            background-color: #45a049;
            color: white;
        }

        /* Add space between links */
        a:last-child {
            margin-bottom: 0;
        }

        /* Optional: Adding a header for context */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Student Management</h1>
        <a href="studentlogin.php">Home</a>
        <a href="insertion.php">Add Student Details</a>
        <a href="viewall.php">View All Students</a>
        <a href="search.php">Search a Student with a Student Id</a>
        <a href="delete.php">Delete a Student</a>
        <a href="update1.php">Update Student Details</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
