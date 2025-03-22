<?php 
require_once ('db_con.php');
//insert manufact 

if(isset($_POST['insertManuBtn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $db_conn->query("call tem_manu('$name', '$address', '$contact')");
    header("Location:" . $_SERVER["PHP_SELF"]);
}
//insert product 

if(isset($_POST['insertProudctBtn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manuId = $_POST['manuId'];

    $db_conn->query("call tem_product('$name', '$price', '$manuId')");
    if($price > 5000) {
        header('Location: price.php');
        exit;
    }

}
//delete product 

if(isset($_POST['deleteBtn'])) {
    $manuId = $_POST['manuId'];
    $db_conn->query("delete from manufact where id = $manuId ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert manufac</title>
</head>
<body>
    <section>
        <form action="" method="post" id="form_container">
            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="Manu Name">
            </div>
            <div class="inputBox"> 
                <textarea name="address" id="address" placeholder="address"></textarea>
            </div>
            <div class="inputBox">
                <input type="text" name="contact" id="contact" placeholder="Contact">
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufac" name="insertManuBtn">
            </div>
        </form>
        <br><br><br>
        <form action="" method="post" id="form_container">
            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="product Name">
            </div>
            <div class="inputBox"> 
                <input type="text" name="price" id="price" placeholder="price">
            </div>
            <div class="inputBox">
                <select name="manuId" id="manuId">
                    <?php 
                       $getManufact = $db_conn->query('select * from manufact');
                       while(list($id, $name) = $getManufact->fetch_row()) {
                            echo "<option value='$id'>$name</option>";
                       }
                    ?>
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Insert Manufac" name="insertProudctBtn">
            </div>
        </form>

        <br><br><br>
        <form action="" method="post" id="form_container">
            
            <div class="inputBox">
                <select name="manuId" id="manuId">
                    <?php 
                       $getManufact = $db_conn->query('select * from manufact');
                       while(list($id, $name) = $getManufact->fetch_row()) {
                            echo "<option value='$id'>$name</option>";
                       }
                    ?>
                </select>
            </div>
            <div class="btn">
                <input type="submit" value="Delete" name="deleteBtn">
            </div>
        </form>

        <br><br>

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

    <br><br><br>
        
    </section>
</body>
</html>