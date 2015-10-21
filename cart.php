<!--
    James Joubert 212104578
    Faizel Jabaar 211093041 
    Ryan Carstens 213133040
-->

<?php 
  
    if(isset($_POST['submit'])) { 
          
        foreach($_POST['quantity'] as $key => $val) { 
            
            if($val==0) { 
                
                unset($_SESSION['cart'][$key]); 
            }
            else { 
                
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        }  
    }
    else if(isset($_POST['checkout'])) {
        
//        $date = date("d/m/Y");
//        $sql = "INSERT INTO orders(order_id, customer_id,  date, total_price) VALUES(1, '$date', 2)";
//        
//        if(mysql_query($sql)) {
//                    
//            $sql2 = "SELECT * FROM orders";
//            $query2=mysql_query($sql);

            require("orderDetails.php");

            echo 'YOUR ORDER HAS BEEN PLACED. THANK YOU FOR SHOPPING WITH US. BELOW IS YOUR ORDER DETAILS:';
            echo "<br></br><a href=\"index.php?page=products\" class=\"button\">Return Home Page</a>";
            session_unset();
            exit;
            
//            while($row=mysql_fetch_array($query2)) {
//
//                 echo '\n' . $row['name'];
//            }
//
//            exit;
//        }
    }
  
?> 
  
<h1 text-align="center">Your Cart</h1> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Item</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Total</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products WHERE id_product IN ("; 
                      
                foreach($_SESSION['cart'] as $id => $value) {

                    $sql.=$id.","; 
                } 

                $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                $query=mysql_query($sql); 
                $totalprice=0; 

                while($row=mysql_fetch_array($query)) {

                    $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                    $totalprice+=$subtotal; 
        ?> 
                    <tr> 
                        <td><?php echo $row['name'] ?></td> 
                        <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                        <td>R<?php echo $row['price'] ?></td> 
                        <td>R<?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?></td> 
                    </tr> 
                <?php 

                } 
                ?> 
                    <tr> 
                        <td colspan="4">Grand Total: R<?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br />
    <a href="index.php?page=products" class="button">Return to Products Page</a>
    <button type="submit" name="submit">Update Cart</button>
    <button type="submit" name="checkout">Check Out</button>
</form> 
<br /> 
<p>To remove an item set its quantity to 0.</p>