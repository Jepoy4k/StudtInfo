<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #18E6FF;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            flex-grow: 1;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            margin: 10px 0;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        }
        p {
            color: #555;
            font-size: 1.1em;
            margin: 10px 0;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        .back-link a:hover {
            background-color: #0056b3;
        }
       
    </style>
</head>
<body>

<div class="container">
    <h1>Student Details</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school2"; // Connect to the new database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query to get the details of the selected student
        $sql = "SELECT name, department, subject FROM students_info WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display student details
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>Department:</strong> " . $row["department"] . "</p>";
                echo "<p><strong>Subject:</strong> " . $row["subject"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<div class='card'>No student found</div>";
        }
    } else {
        echo "<div class='card'>Invalid ID</div>";
    }

    $conn->close();
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="back-link">
        <a href="home.php">Back to Student List</a>
    </div>
</div>

</body>
</html>
