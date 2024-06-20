<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
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
        .card a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 1.2em;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        .card a:hover {
            background-color: #0056b3;
        }
       
    </style>
</head>
<body>

<div class="container">
    <h1>STUDENT LIST</h1>

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

    // Query to get the list of students
    $sql = "SELECT id, name FROM students_info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each student and create a card
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'><a href='studs.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></div>";
        }
    } else {
        echo "<div class='card'>No students found</div>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
