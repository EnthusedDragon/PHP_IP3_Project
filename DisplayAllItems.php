<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = new mysqli("localhost","root","fjab1991","ip3_php_project_db");
		

		if ($conn->connect_error) {

			die('Could not connect to database!');
		}
		else {
                    //search = $_GET["search"];
			$query = "SELECT * FROM items";

			if($query_run = $conn->query($query)) {
                        
					
					echo'<html>'; 
					echo '<body>';
					
					echo'<table width="100%" align=center style="border-style:solid;">'; 
					
					echo'<tr width=100% align=center style="border-style:solid;">'; 
					echo'<td width=10%>'. "ITEM ID".'</td>';
					echo'<td width=20$>'. "ITEM CODE".'</td>';
					echo'<td width=30$>'. "ITEM NAME".'</td>';
					echo'<td width=20%>'. "ITEM PRICE".'</td>';
					echo'<tr>';
					echo '<form action="addToCart.php">';
				while ($query_row = $query_run->fetch_assoc()) {
                    				
					$price = $query_row['item_price'];				
					echo'<tr width=100% align=center style="border-style:solid;">'; 
					echo'<td width=10% style="border-style:solid;"><input type="submit" action="addToCart.php" value="'. $query_row['item_id'] .'" name="addToCart" /></td>';
					echo'<td width=30$ style="border-style:solid;">'. $query_row['item_code'].'</td>';
					echo'<td width=30$ style="border-style:solid;">'. $query_row['item_name'].'</td>';
					echo'<td width=30% style="border-style:solid;">R'. $price .'</td>';			
					echo'<tr>';
				
					
					//echo $customerName;
					//$customer = new Customer($name, $surname, $address, $email, $password, $bank, $card_no);
				}
				echo '</form>';
				echo'</table>'; 
				echo '</body>';
				echo'</html>'; 
				
				$conn->close();
				exit;
			}
		}

?>