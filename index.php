<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Rentals | Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/style.css">   
</head>
<body>

<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }

?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Smart Rantals</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="rates.html">RATES</a></li>
                   <li> <div class="dropdown">
                        <button class="dropbtn"><a href="#">SERVICES</a> 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="selfDriveRentalServices.html">Self Drive Rental</a>
                            <a href="weddingsEventsServices.html">Weddings and Events</a>
                            <a href="tours.html">Tours</a>
                            <a href="airportCityTransfers.html">Airport/City Transfers</a>
                            <a href="roadSideAssisttance.html">Road Side Assistance</a>
                            <a href="optionalEquipment.html">Optional Equipment</a>
                        </div>
                    </div> </li>
                    
                    <li><a href="contactus.html">CONTACT</a></li>
                    <li> <button class="adminbtn"><a href="adminlogin.php">ADMIN LOGIN</a></button></li>
                </ul>
            </div>
            
          
        </div>
        <div class="content">
        <div class ="mySlides"><h1>Welcome <br>to our<br> Smart Rentals</h1><br><br></div>
        <div class ="mySlides"><h1>We provide <br>the super vehicles<br> for you</h1><br><br></div>
            <button class="cn"><a href="register.php">JOIN US</a></button>
            <div class="form">
                <h2>Login Here</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <input class="btnn" type="submit" value="Login" name="login"></input>
                </form>
                <p class="link">Don't have an account?<br>
                <a href="register.php">Sign up</a> here</a></p>
                <!-- <p class="liw">or<br>Log in with</p>
                <div class="icon">
                    &emsp;&emsp;&emsp;&ensp;<a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon> </a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon> </a>&ensp;
                    <a href="https://myaccount.google.com/"><ion-icon name="logo-google"></ion-icon> </a>&ensp;
                    
                </div> -->
            </div>
        </div>
    </div>

    <script>
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
    </script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>