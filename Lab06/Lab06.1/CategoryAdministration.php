<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Administration</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .input-text {
            margin: 10px;
        }
    </style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "bai_tap";

$con = mysqli_connect($servername, $username, $password, $db_name);

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "INSERT INTO category VALUES ('', '$name', '$title', '$description')";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    ?>
    <h1>Category administration</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM category";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <form method="post" action="">
        Name: <input type="text" class="input-text" name='name'><br>
        Title: <input type="text" class="input-text" name='title'><br>
        Description: <input type="text" class="input-text" name='description'><br>
        <button type="submit">Add</button>
    </form>
</body>

</html>