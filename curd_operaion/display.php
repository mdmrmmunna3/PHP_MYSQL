<?php
require_once('db.php');
if (isset($_GET['deleteId'])) {
    $deleteId = intval($_GET['deleteId']);
    $sql = "DELETE FROM users WHERE id = $deleteId";
    if (mysqli_query($conn, $sql)) {
        echo "user deleted successfully";
    } else {
        echo "deleted failed";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display user info</title>
    <style>
        .user {
            font-size: 30px;
            text-align: center;
        }

        .table_main {
            width: 100%;
            border-collapse: collapse;
        }

        .table_main th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="user">User Inforamtion </h2>

    <table class="table_main">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Conatct</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('db.php');
            $getData = $conn->query("Select * from users");
            while ($row = $getData->fetch_assoc()) {
                echo "
                   <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['contact']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                        <a href='display.php?deleteId={$row['id']}'>Delete</a>
                    </td>
                   </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>