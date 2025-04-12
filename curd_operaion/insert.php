<?php
require_once('db.php');

if (isset($_POST['insertBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // $sql = "INSERT INTO users(name, email, contact) VALUES('$name', '$email', '$contact')";
    // if (mysqli_query($conn, $sql)) {
    //     echo 'user Information Insert successfully!';
    // } else {
    //     echo "Error" . mysqli_error($dbConnect);
    // }

    // using prepare 
    $sql = 'INSERT INTO users (name, email, contact) VALUES(?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $contact);
    $stmt->execute();
    header('location: display.php');
    echo "User Added successfully!";
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
            <input type="text" name="name" id="name" placeholder="Enter Name">
        </div>
        <div class="text_input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email">
        </div>
        <div class="text_input">
            <label for="contact">Phone</label>
            <input type="text" name="contact" id="contact" placeholder="Enter Phone">
        </div>
        <button type="submit" name="insertBtn">Submit</button>
    </form>
</body>

</html>