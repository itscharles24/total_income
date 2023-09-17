<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "total_income";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die ("failed connect".mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>total_income</title>
</head>
<body>
    <table>
        <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>total income</th>
        </tr>


        <?php
        
        $sql = "SELECT `name`,`price`,`quantity` FROM `sales`";

        $result = mysqli_query($conn,$sql);

        if(!$result){
            die ("failed".mysqli_error($conn));
        }else{
            $subtotal = 0;
            while($row = mysqli_fetch_array($result)){

                ?>

                <tr>
                    <td><?php echo $row['name'] ;  ?></td>
                    <td><?php echo $row['price'] ;  ?></td>
                    <td><?php echo $row['quantity'] ;  ?></td>
              

                <td>


                <!-- total price calculation ine hiya -->
                    <?php
                    $total = $price = $row['price'] * $quantity = $row['quantity'];
                    echo $total;

                    $subtotal += $total;

                     ?>

                </td>
                  </tr>


                <?php
            }
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="background-color:yellow;text-align:right;">Subtotal:</td>
            <td style="background-color:yellow;"> <?php echo " ". $subtotal; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tax</td>
            <td>5%</td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td>tax amount</td>
        <td><?php echo number_format(($subtotal / 100)*5,2) ; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Total Amount</td>
            <td><?php 

         $tax = ($subtotal / 100) * 5;
        $grandtotal = $subtotal + $tax;
        echo number_format($grandtotal, 2);
            
            ?></td>
        </tr>
    </table>
</body>
</html>



