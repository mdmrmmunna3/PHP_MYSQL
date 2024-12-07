<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert User Info!</title>
    <style>
        #formContainer {
            width: 400px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 5px;
            /* border: none; */
            box-shadow: rgba(0, 0, 0, 0.56) 0px 5px 15px;
        }

        .inputBox {
            margin-bottom: 10px;
            width: 390px;
        }

        .inputBox input {
            width: 100%;
            padding: 8px 0 8px 8px;
            border: none;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56)0px 5px 15px;
            border: 2px solid white;
        }

        .inputBox select {
            width: 400px;
            padding: 8px 0 8px 8px;
            border: none;
            outline: none;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56)0px 5px 15px;
        }

        .inputBox input:focus {
            border: 2px solid green;
            outline: none;
        }

        .inputBox label {
            font-size: 18px;
            padding-bottom: 5px;
        }

        h4 {
            font-size: 22px;
            text-align: center;
            margin: 0 0 10px 0;
            text-transform: uppercase;
        }

        .btn {
            margin-top: 15px;
        }

        .btn input {
            width: 100%;
            border-radius: 5px;
            border: none;
            outline: none;
            padding: 10px 0;
            background-color: #089808;
            color: white;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            text-transform: uppercase;
        }

        .btn input:hover {
            background-color: green;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <section>
        <form action="" method="post" id="formContainer">
            <h3>Insert User Form!</h3>
            <div class="inputBox">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="inputBox">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="inputBox">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" required>
            </div>
            <div class="inputBox">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" select="selected">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="btn">
                <input type="submit" value="Insert User" name="insertBtn">
            </div>
        </form>
    </section>
</body>

</html>

<?php
require_once("dbRootPath.php");

if (isset($_POST['insertBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $insertQuery = "INSERT INTO student_info (name, email, phone, gender) 
                    VALUES ('$name', '$email', '$phone', '$gender')";
    if (mysqli_query($dbConnect, $insertQuery)) {
        echo "User information inserted successfully!";
        header('location:dbConnect.php');
    } else {
        echo "Error" . mysqli_error($dbConnect);
    }
}


?>