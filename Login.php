
<!--
    James Joubert 212104578
    Faizel Jabaar 211093041 
    Ryan Carstens 213133040
-->

<?php

    //session_start();
    
    if (isset($_GET["btnLogin"])) {
            
        get();
    }
    else if($_GET["btnSignUp"]) {
        
        require("NewCustomerPage.html");
    }
            
    function get() {

        $email = $_GET["email"];
        $password = $_GET["password"];
        $conn = new mysqli("localhost","root","fjab1991","ip3_php_project_db");
        
        $query = "SELECT * FROM customer WHERE customer_email = '$email' AND customer_password = '$password'";

        if ($conn->connect_error) {

            die('Could not connect to database!');
	}
	else {

            if($query_run=$conn->query($query)) {
                
                $valID = null;
                $valName = null;
                $valSurname = null;
                $valAddress = null;
                $valEmail = null;
                $valPass = null;
                $valBank = null;
                $valCard = null;
                
                while ($query_row = $query_run->fetch_assoc()) {
                
                    $valID = $query_row["customer_id"];
                    $valName = $query_row["customer_name"];
                    $valSurname = $query_row["customer_surname"];
                    $valAddress = $query_row["customer_address"];
                    $valEmail = $query_row["customer_email"];
                    $valPass = $query_row["customer_password"];
                    $valBank = $query_row["customer_bank"];
                    $valCard = $query_row["customer_card_no"];
                }
                
                if($valEmail == $email && $valEmail!=null && $valPass == $password && $valPass!=null) {
                    
                    require("index.php");

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