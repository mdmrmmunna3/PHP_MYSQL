
<?php 
require_once('db_root.php');
if(isset($_POST['insertManuBtn'])) {
    $name = $_POST['name'];
    $address = $_POST['add'];
    $contact = $_POST['contact'];

    $db_conn->query("call manufact ('$name', '$address', '$contact')");
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit;
}
// insert product 
if(isset($_POST['insertProBtn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manuId = $_POST['manu_id'];

    $db_conn->query("call products ('$name', '$price', '$manuId')");
    if($price > 5000) {
        header('Location: price.php');
    }
    // header("Location:" . $_SERVER["PHP_SELF"]);
    // exit;
}

// delete
if(isset($_POST['delBtn'])) {
    $manuId = $_POST['manu_id'];

    $db_conn->query("delete from manufacture where id = $manuId ");
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacture Info</title>
    <style>
        #formContainer {
            width: 400px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 5px;
            /* border: none; */
            box-shadow: rgba(0, 0, 0, 0.56) 0px 5px 15px;
        }

        .input_box {
            margin-bottom: 10px;
            width: 390px;
        }

        .input_box input {
            width: 100%;
            padding: 8px 0 8px 8px;
            border: none;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56)0px 5px 15px;
            border: 2px solid white;
        }
        .input_box textarea {
            width: 100%;
            padding: 8px 0 8px 8px;
            border: none;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56)0px 5px 15px;
            border: 2px solid white;
        }

        .input_box select {
            width: 400px;
            padding: 8px 0 8px 8px;
            border: none;
            outline: none;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.56)0px 5px 15px;
        }

        .input_box input:focus {
            border: 2px solid green;
            outline: none;
        }

        .input_box label {
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
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <section>
        <form action="" method="post" id="formContainer">
            <caption>Insert Manufacture Form!</caption>
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input_box">
                <label for="add">Address</label>
                <textarea name="add" id="add"></textarea>
            </div>
            <div class="input_box">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact">
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufacture" name="insertManuBtn">
            </div>
        </form>
    </section>


    <section style="margin-top: 20px;">
        <form action="" method="post" id="formContainer">
            <caption>Insert Product Form!</caption>
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input_box">
                <label for="price">Price</label>
                <input type="text" name="price" id="price"></input>
            </div>
            <div class="input_box">
                <label for="contact">ManuBrand</label>
                <select name="manu_id" id="manu_id">
                    <?php 
                    $getManufa = $db_conn->query("select * from manufacture");
                    while(list($manufa_Id,$manu_name) = $getManufa->fetch_row()) {
                        echo "<option value='$manufa_Id'>$manu_name</option>";
                    }
                    ?>
                    
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufacture" name="insertProBtn">
            </div>
        </form>
    </section>

    <section style="margin-top: 20px;">
        <form action="" method="post" id="formContainer">
            <caption>Manufact Delete Form!</caption>
            
            <div class="input_box">
                <label for="contact">ManuBrand</label>
                <select name="manu_id" id="manu_id">
                    <?php 
                    $getManufa = $db_conn->query("select * from manufacture");
                    while(list($manufa_Id,$manu_name) = $getManufa->fetch_row()) {
                        echo "<option value='$manufa_Id'>$manu_name</option>";
                    }
                    ?>
                    
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufacture" name="delBtn">
            </div>
        </form>
    </section>

    <section style="margin-top: 20px;">
    <table>
        <caption style="font-size: 20px;">Show Products Data</caption>
        <?php 

        $pro_view = $db_conn->query('select * from product_details');

        echo "<tr>
        <th>Procuct Name</th>
        <th>Price</th>
        <th>Brand Name</th>
        <th>Brand Address</th>
        <th>Contact</th>
        </tr>
        ";

        if($pro_view->num_rows > 0) {
            while(list( $pro_name, $pro_price, , $brand_name, $brand_address, $brand_contact) = $pro_view->fetch_row()) {
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