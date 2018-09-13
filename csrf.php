<!--
/**
 * Created by PhpStorm.
 * User: Layangi
 * Date: 8/28/2018
 * Time: 8:01 PM
 */
 -->
<?php

session_start();

if(isset($_POST["request"]))
{
    $data["token"]=$_SESSION['CSRF_Token'];

    echo json_encode($data);
}


?>