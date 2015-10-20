<?php
    session_start(); 
    
    if(isset($_GET['login'])) {

        $doc = new DOMDocument();
        $doc->loadHTMLFile("LoginPage.html");
        echo $doc->saveHTML();
        exit;
    }
    else if(isset($_GET['signup'])) {

        $doc = new DOMDocument();
        $doc->loadHTMLFile("NewCustomerPage.html");
        echo $doc->saveHTML();
        exit;
    }
    /*else if(isset($_GET['btnsearch']))
    {                
        get($_GET["search"]);
    }*/
?>