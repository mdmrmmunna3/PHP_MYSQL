<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Product</title>
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
        a{
            text-decoration: none;
            padding: 10px 15px;
            background-color:#61bbd9;
            color:white;
            margin-top: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <a href="manufacture.php">Got to add</a>
<table>
        <caption>Upto 5000 Price Products Data</caption>
        <?php 
        require_once('db_conn.php');
        $pro_view = $db_conn->query('select * from display_up');

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
</body>
</html>