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
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
        <div class="inputBox">
                <label for="price">Price</label>
                <input type="text" name="price" id="price">
            </div>
            <div class="inputBox">
                <label for="brand">BrandName</label>
                <select name="brand" id="brand">
                <?php
                        $manuFac = $dbConnect->query(('select * from brand_info'));
                        while(list($brName,$brId) = $manuFac->fetch_row()) {
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
// require_once('brand.php');



if(isset($_POST['insertBtn'])) {
    $brandName= $_POST['brand'];
    $price = $_POST['price'];

    var_dump ($brandName, $contact);

    $insertBrand = $dbConnect->query("call add_products('$brandName', '$price')");
}

?>