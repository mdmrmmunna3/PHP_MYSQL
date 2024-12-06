<?php
require_once('dbRootPath.php');

if (!$dbConnect) {
    echo "database connection failed!";
} else {
    echo "database connection successfully!";
}

if (isset($_GET['deleteId'])) {
    $deletedId = $_GET['deleteId'];
    $isDeleted = "DELETE FROM student_info WHERE id = $deletedId";

    if (mysqli_query($dbConnect, $isDeleted) == true) {
        header("location:dbConnect.php");
        echo "User Info Suceessfully Deleted";
        exit();
    } else {
        echo "Error" . mysqli_error($dbConnect);
    }
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
            border: 1px solid black;
            padding: 8px;
            text-align: center;
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
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        .link_btn a {
            text-decoration: none;
            padding: 10px 20px;
            color: white;
            background: linear-gradient(to right, red, crimson);
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56) 0 5px 15px;
            cursor: pointer;
            position: absolute;
            right: 15px;
        }

        .delbtn a {
            background-color: red;
            padding: 4px 15px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .editbtn a {
            background-color: blue;
            padding: 4px 15px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="link_btn">
        <a href="insertStudentInfo.php">Insert User</a>
    </div>
    <h1 class="record_titel">Student Records</h1>
    <table id="table_container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $getStudentInfo = $dbConnect->query('select * from student_info');

            if ($getStudentInfo->num_rows > 0) {
                while (list($id, $name, $email, $phone, $gender) = $getStudentInfo->fetch_row()) {
                    echo "<tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$gender</td>
                        <td><span class='editbtn'> <a href='editUser.php?editId=$id'>Edit</a></span></td>
                        <td><span class='delbtn'> <a href='dbConnect.php?deleteId=$id'>Delete</a></span></td>
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