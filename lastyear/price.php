<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <caption>Upto 5000 price Products Data</caption>
        <?php 
        require_once ('db_con.php');
        $pro_view = $db_conn->query('select * from slect_pro');

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
</body>
</html>