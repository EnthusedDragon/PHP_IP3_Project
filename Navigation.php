<!--
    James Joubert 212104578
    Faizel Jabaar 211093041 
    Ryan Carstens 213133040
-->

<?php
    session_start(); 
    //require_once 'DisplayItems.php';
    
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
    else if(isset($_GET['btnsearch']))
    {                
        get($_GET["search"]);
    } 
    else if(isset($_GET['btnLogout'])) {

        $doc = new DOMDocument();
        $doc->loadHTMLFile("LoginPage.html");
        echo $doc->saveHTML();
        exit;
    }

        $doc = new DOMDocument();
        $doc->loadHTMLFile("NewCustomerPage.html");
        echo $doc->saveHTML();
        exit;
    
    /*else if(isset($_GET['btnsearch']))
    {                
        get($_GET["search"]);
    }*/
?>