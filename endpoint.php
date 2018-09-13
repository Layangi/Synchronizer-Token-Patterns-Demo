<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>

    <title> Synchronizer Token Pattern </title>
    <h3>Profile Details Updated</h3>
</head>
<body>

<?php
if (isset($_COOKIE['session_cookie'])) {

    session_start();
    //check if the token in the post method equals to the token in the session
    if ($_POST['csrf_Token'] == $_COOKIE['csrf_Token'])  {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        echo "<table>
                 <tr>
                    <td>Full Name</td>
                    <td> $name</td>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td>$email</td>
                 </tr>
                 <tr>
                    <td>Gender</td>
                    <td>$gender</td>
                 </tr>
                 <tr>
                     <td>Age</td>
                     <td>$age</td>
                 </tr>
              </table>";

        echo "<script> alert('Successfully Updated !!') </script>";

    } else {
        echo "<script>alert('WARNING :: CSRF Detected !!')</script>";
    }
}
?>
</body>
</html>
