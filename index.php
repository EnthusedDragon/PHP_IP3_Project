<!--
    James Joubert 212104578
    Faizel Jabaar 211093041 
    Ryan Carstens 213133040
-->

<?php 
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }
    
    require("connection.php"); 
    
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page'];      
        }
        else { 
              
            $_page="products";    
        } 
          
    }
    else { 
          
        $_page="products";   
    }
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/style.css" /> 
    
    <title>Pandora's Box</title> 
    
</head> 
  
<body> 
    
    <div align="center">
            
        <form action="index.php">
                
            <h1 align='center'>*** Pandora's Box ***</h1>
            <h3 align='center'>Board Game Specialist</h3>
            <img align='center' src="download.png" alt=""/>   
        </form>
        
        <form action="Navigation.php">
            
            <p><input type="submit" value="Logout" name="btnLogout"/></p>
            <p><input type="text" name="search" /> <input type="submit" class="button" value="Search" name="btnsearch" /> </p>
        </form>
        
    </div>
      
    <div id="container"> 

        <div id="main"> 
              
            <?php
                if(isset($_GET["btnsearch"]))
                    require("productsSearch.php");
                else
                    require($_page.".php");
            ?> 
  
        </div>
        
     <?php
     if($_page!="cart"){
       ?>
        
        <div id="sidebar"> 
              <h1>Cart</h1> 
    <?php 
  
        if(isset($_SESSION['cart'])){ 

            $sql="SELECT * FROM products WHERE id_product IN ("; 

            foreach($_SESSION['cart'] as $id => $value) { 
                $sql.=$id.","; 
            } 

            $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
            $query=mysql_query($sql);
            
            while($row=mysql_fetch_array($query)){ 
              
    ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
    <?php 
              
            } 
    ?> 
        <hr /> 
        
        <a href="index.php?page=cart" class="button">Confirm Items & Check Out</a>
        
    <?php       
    }
        else { 
          
            echo "<p>No products found. Please add products.</p>";   
    } 
    ?>
        </div>
     <?php }?>
    </div>
  
</body> 
</html>