<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="/js/jquery-3.3.1.min.js"></script>

    <title> Update Information </title>

</head>
<body>

<div class="login-box">

    <img src="images/user.png" class="avatar">
    <h1>Update User Profile</h1>

    <!-- check if the user logged or not -->
    <?php
    if(isset($_COOKIE['session_cookie'])) {
        echo "
						<form action='endpoint.php' method='POST' enctype='multipart/form-data' onsubmit='updateForm(this);'>
                            <!-- CSRF Token -->
                            <input type='hidden' name='csrf_Token' id='csrf_Token' value=''>
                              
                            <p>Full Name</p>
                            <input type='text' id='name' name='name' placeholder='Enter name' required>
                            
                            <p>Email</p>
                            <input type='text' id='email' name='email' placeholder='Enter Email' required>
                            
                            <p>Gender</p>
                            <input type='text' id='gender' name='gender' placeholder='Enter Gender' required>
              
                            <p>Age</p>
                            <input type='text' id='age' name='age' placeholder='Enter Age' required>

                            <input type='submit' id='submit' name='submit' value='Update'>
                       </form>" ;
           }
    ?>
    <script >

        //To retrieve CSRF token from the cookie
        function getCookie(cName)
        {
            var name = cName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++)
            {
                var c = ca[i];
                while (c.charAt(0) == ' ')
                {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0)
                {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        //To set hidden CSRF input value in the form
        function updateForm(fElement)
        {
            document.getElementById("csrf_Token").value=getCookie("csrf_Token");
        }

    </script>
</div>
</body>
</html>