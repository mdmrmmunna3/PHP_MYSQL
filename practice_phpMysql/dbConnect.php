<?php
require_once('dbRootPath.php');

if (!$dbConnect) {
    echo "database connection failed!";
} else {
    echo "database connection successfully!";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Table</title>
    <style>
        .record_titel {
            text-align: center;
            text-transform: uppercase;
            font-size: 25px;
        }

        #table_container {
            width: 100%;
            border-collapse: collapse;
        }

        #table_container,
        th,
        td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        #table_container tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table_container tr:hover {
            background-color: #ddd;
        }

        #table_container th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1 class="record_titel">Student Records</h1>
    <table id="table_container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $getUserInfo = $dbConnect->query('select * from student_info');

            if ($getUserInfo->num_rows > 0) {
                while (list($id, $name, $email, $phone, $gender) = $getUserInfo->fetch_row()) {
                    echo "<tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$gender</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>