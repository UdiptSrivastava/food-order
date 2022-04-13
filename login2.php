<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
</head>
<body>
    
    <div class="main">
        
        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="login/images/form-img.jpg" alt="Booking Image">
                </div>
               
                <div class="booking-form">
                    <form id="booking-form" method="post" name="form" onsubmit="return validate();" action="action.php?pid=1">
                        <h2>Booking place for your dinner!</h2>
                        <div class="form-group form-input">
                            <input type="text" name="email" id="name" value="" required/>
                            <label for="name" class="form-label">Email</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="number" name="pass" id="phone" value="" required />
                            <label for="phone" class="form-label">Password</label>
                        </div>
                        
                        

                        <div class="form-submit">
                            <input type="submit" value="Sign in" class="submit" id="submit" name="Signin" />
                            <a href="sign.php" class="vertify-booking">
                                New Member ? Register Now
                            </a>
                        </div>
                    </form>
                </div>
           
            </div>
        </div>
    
    </div>

    <!-- JS -->
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>