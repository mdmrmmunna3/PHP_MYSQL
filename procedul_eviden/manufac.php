<?php 
require_once('db_root.php');
if(isset($_POST['manufaBtn'])) {
    $manu_name = $_POST['name'];
    $manu_address = $_POST['add'];
    $manu_contact = $_POST['conta'];

    $insertManufac = $db_root->query("call manufac('$manu_name', '$manu_address', '$manu_contact')");
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit;


    
}
// insert product info 

if(isset($_POST['productBtn'])) {
    $pro_name = $_POST['pname'];
    $pro_price = $_POST['price'];
    $manu_id = $_POST['manu_id'];

    $insertManufac = $db_root->query("call products('$pro_name', '$pro_price', '$manu_id')");
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit;

}

// delete product 

if(isset($_POST['delBtn'])) {
    $manu_id = $_POST['manu_id'];
    $db_root->query("delete from manufacture where id = $manu_id ");
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
    <h2>Manufacture Form</h2>
        <form action="" method="post" id="formContainer">
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input_box">
                <label for="add">Address</label>
                <textarea name="add" id="add"></textarea>
            </div>
            <div class="input_box">
                <label for="conta">Contact</label>
                <input type="number" name="conta" id="conta">
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufac" name="manufaBtn">
            </div>
        </form>
    </section>

    <section style="margin-top: 20px;">
        <h2>Product Form</h2>

        <form action="" method="post" id="formContainer">
        <div class="input_box">
                <label for="pname">Product Name</label>
                <input type="text" name="pname" id="pname">
            </div>
       
            <div class="input_box">
                <label for="price">Price</label>
                <input type="number" name="price" id="price">
            </div>
            <div class="input_box">
                <label for="manu_id">Brand</label>
                <select name="manu_id" id="manu_id">
                    <?php 
                    $getManufa = $db_root->query("select * from manufacture");
                    while(list($manufa_Id,$manu_name) = $getManufa->fetch_row()) {
                        echo "<option value='$manufa_Id'>$manu_name</option>";
                    }
                    ?>
                    
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Insert product" name="productBtn">
            </div>
        </form>
    </section>

    <section style="margin-top: 20px;">
        <h2>Delete Product</h2>

        <form action="" method="post" id="formContainer">
            <div class="input_box">
                    <label for="manu_id">Brand</label>
                    <select name="manu_id" id="manu_id">
                        <?php 
                        $getManufa = $db_root->query("select * from manufacture");
                        while(list($manufa_Id,$manu_name) = $getManufa->fetch_row()) {
                            echo "<option value='$manufa_Id'>$manu_name</option>";
                        }
                        ?>
                        
                    </select>
                </div>
            <div class="btn">
                <input type="submit" value="Delete" name="delBtn">
            </div>
        </form>
    </section>

    <section>
    <table>
        <?php 

        $pro_view = $db_root->query('select * from products_details');

        echo "<tr>
        <th>Procuct Name</th>
        <th>Price</th>
        <th>Brand Name</th>
        <th>Brand Address</th>
        <th>Contact</th>
        </tr>
        ";

        if($pro_view->num_rows > 0) {
            while(list( $pro_name, $pro_price, $brand_name, $brand_address, $brand_contact) = $pro_view->fetch_row()) {
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