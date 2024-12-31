<?php 
require_once('db_conn.php');
// insert manufac 
if(isset($_POST['insertBtn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $db_conn->query("call tmp_manu('$name', '$address', '$contact')");
    header("Location:" . $_SERVER["PHP_SELF"]);
}

// insert products 
if(isset($_POST['insertProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manuId = $_POST['manuId'];

    $db_conn->query("call tmp_product('$name', '$price', '$manuId')");
    if($price > 5000) {
        header('location: price.php');
    }
}
// Delete products 
if(isset($_POST['deleteProduct'])) {
    $manuId = $_POST['manuId'];

    $db_conn->query("delete from manufact where id = $manuId");
    header("Location:" . $_SERVER["PHP_SELF"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <style>
        #form_contaner {
            width: 400px;
            margin: 20px auto;
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
        .inputBox textarea {
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

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 600;
        }

        table {
            width: 90%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        caption {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 10px;
            text-align: center;
            background-color: gray;
            color: white;
            border-radius: 8px 8px 0 0;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        td, th {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            color: #555;
        }

        th {
            background-color:#61bbd9;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e8f5e9;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        td {
            border-radius: 4px;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #ff5722;
        }
    </style>
</head>
<body>
    <section>
        <form action="" method="post" id="form_contaner">
            <h2>Insert Manufacture</h2>

            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="Manufac Name">
            </div>
            <div class="inputBox">
                <textarea name="address" id="address" placeholder="address"></textarea>
            </div>
            <div class="inputBox">
                <input type="text" name="contact" id="contact" placeholder="Contact">
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufac" name="insertBtn">
            </div>
        </form>

        <form action="" method="post" id="form_contaner">
            <h2>Insert Proudcts</h2>

            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="Proudcts Name">
            </div>
            <div class="inputBox">
                <input type="text" name="price" id="price" placeholder="Price"></input>
            </div>
            <div class="inputBox">
                <select name="manuId" id="manuId">
                    <?php 
                    $getManufact = $db_conn->query("SELECT * FROM manufact");
                    while(list($manuId, $manuName) = $getManufact->fetch_row()) {
                        echo "
                            <option value='$manuId'>$manuName</option>
                        ";
                    }
                    ?>
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Insert Product" name="insertProduct">
            </div>
        </form>

        <form action="" method="post" id="form_contaner">
            <h2>Delete Proudcts</h2>

            
            <div class="inputBox">
                <select name="manuId" id="manuId">
                    <?php 
                    $getManufact = $db_conn->query("SELECT * FROM manufact");
                    while(list($manuId, $manuName) = $getManufact->fetch_row()) {
                        echo "
                            <option value='$manuId'>$manuName</option>
                        ";
                    }
                    ?>
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Delete" name="deleteProduct">
            </div>
        </form>

        <table>
        <caption>all Products Data</caption>
        <?php 
        $pro_view = $db_conn->query('select * from products_details');

        echo "<tr>
        <th>Procuct Name</th>
        <th>Price</th>
        <th>Brand Name</th>
        <th>Brand Address</th>
        <th>Contact</th>
        </tr>
        ";

        if($pro_view->num_rows > 0) {
            while(list( ,$pro_name, $pro_price, , $brand_name, $brand_address, $brand_contact) = $pro_view->fetch_row()) {
                echo"
                <tr>
                <td>$pro_name</td>
                <td>$pro_price</td>
                <td>$brand_name</td>
                <td>$brand_address</td>
                <td>$brand_contact</td>
            </tr>
                
                ";
            }
        }else {
            echo "No data found";
        }
        ?>
    </table>
    </section>
</body>
</html>