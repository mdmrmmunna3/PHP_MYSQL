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
</head>
<body>
    <section>
        <form action="" method="post">
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

        <form action="" method="post">
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

        <form action="" method="post">
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
</body>
</html>