<?php

    if (isset($_GET["btnLogin"])) {
            
        get();
    }
            
    function get() {

        $email = $_GET["email"];
        $password = $_GET["password"];
        $conn = new mysqli("localhost","root","","ip3_php_project_db");
        
        $query = "SELECT * FROM customer WHERE customer_email = '$email' AND customer_password = '$password'";

        if ($conn->connect_error) {

            die('Could not connect to database!');
	}
	else {

            if($query_run=$conn->query($query)) {
                
                $valEmail = null;
                $valPass = null;
                
                while ($query_row = $query_run->fetch_assoc()) {
                
                    $valEmail = $query_row["customer_email"];
                    $valPass = $query_row["customer_password"];
                }
                
                if($valEmail == $email && $valEmail!=null && $valPass == $password && $valPass!=null) {
                    
                    $doc = new DOMDocument();
                    $doc->loadHTMLFile("DisplayItems.php");
                    echo $doc->saveHTML();
                    exit;
                }
                else {
                    $doc = new DOMDocument();
                    $doc->loadHTMLFile("LoginPage.html");
                    echo $doc->saveHTML();
                    echo "Invalid details";
                    exit;
                }
            }
            else {
                
                echo mysql_error();
            }
        }
    }
?>