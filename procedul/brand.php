<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Brand</title>
</head>
<body>
    <section>
        <form action="" method="post">
            
            <div class="inputBox">
                <label for="brand">BrandName</label>
                <select name="brand" id="brand">
                    <option value="" select="selected">Select Brand</option>
                    <option value="walton">Walton</option>
                    <option value="redmi">Redmi</option>
                    <option value="samsung">samsung</option>
                    <option value="apple">Apple</option>
                    <option value="vivo">Vivo</option>
                </select>
            </div>
            <div class="inputBox">
                <label for="contact">Contact</label>
                <input type="tel" name="contact" id="contact">
            </div>

            <div class="btn">
                <input type="submit" value="Insert" name="insertBtn">
            </div>
        </form>
    </section>

    <br><br><br>
    <section>
        <form action="" method="post">
        <div class="inputBox">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
        <div class="inputBox">
                <label for="price">Price</label>
                <input type="text" name="price" id="price">
            </div>
            <div class="inputBox">
                <label for="brandName">BrandName</label>
                <select name="brandName" id="brandName">
                <?php
                        $dbConnect =mysqli_connect('localhost','root','','products');
                        $manuFac = $dbConnect->query(('select * from brand_info'));
                        while(list($brId,$brName) = $manuFac->fetch_row()) {
                            echo "<option value='$brId'>$brName</option>";
                        }
                    ?>
                </select>
            </div>
            

            <div class="btn">
                <input type="submit" value="Insert" name="insertBtn">
            </div>
        </form>
    </section>
</body>
</html>


<?php 
require_once('dbRootPath.php');

if(isset($_POST['insertBtn'])) {
    $brandName= $_POST['brand'];
    $contact = $_POST['contact'];

    var_dump ($brandName, $contact);

    $insertBrand = $dbConnect->query("call insert_brand('$brandName', '$contact')");
}

?>