<?php
require_once('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $updateSql = "UPDATE users SET name = '$name', email = '$email', contact = '$contact' WHERE id = $id ";
    $result = $conn->query($updateSql);
    if (mysqli_query($conn, $updateSql)) {
        header('location: display.php');
        echo "user information update successfully!";
    } else {
        echo "user update failed!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="text_input">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $user['name'] ?>" placeholder="Enter Name">
        </div>
        <div class="text_input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Enter Email">
        </div>
        <div class="text_input">
            <label for="contact">Phone</label>
            <input type="text" name="contact" id="contact" value="<?= $user['contact'] ?>" placeholder="Enter Phone">
        </div>
        <button type="submit" name="update">Submit</button>
    </form>
</body>

</html>