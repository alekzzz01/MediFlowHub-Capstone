<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/payments.css">
    <link rel="stylesheet" href="transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="images/MediFlowHub.png" alt="">
        </div>
            <ul class="menu">

                <li class="active">
                    <a href="dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="#">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
                <li>
                    <a href="#">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-credit-card'></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-location-plus'></i>
                        <span>Locations</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-bell' ></i>
                        <span>Notifications</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bxs-cog' ></i>
                        <span>Settings</span>
                    </a>
                </li>


                <li class="logout">
                    <a href="logout.php" id="logout-link">
                        <i class='bx bx-log-out'></i>
                        <span>Logout</span>
                    </a>
                </li>






            </ul>
    
    </div>



    <div class="main--content">

        <div class="header--wrapper">
         
            <div class="menu-search">
            
                        <i class='bx bx-menu' id="menu-toggle"></i>

                        <div class="search-box">
                        
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    
                        </div>

            </div>
           
            <div class="user--info">

                        <div class="notification">
                                    <i class='bx bx-bell'></i>
                                    <span class="num">8</span>

                        </div>
               
             
                        <button class="profile-icon"></button>

            </div>
           
        </div>



    <div class="first-container">
                    
   
            
            <div class="container1">

                <p class="Title-1" >Payments</p>

                                    
                <h2>Choose your payment method</h2> 

                    <div class="payments">


                        <div class="paymentContainer">
                                        
                                        <label>
                                            <input type="radio" name="paymentMethod" value="Over the Counter">
                                            <div class="Description"><p>Over the counter</p>
                                            <span>process payments by using cash over-the-counter at physical clinic branches, as well as by cash and payment cards using ATMs.</span></div>
                                            
                                        </label>
                                        <label>
                                            <input type="radio" name="paymentMethod" value="GCash"> 
                                            <div class="Description"><p>Gcash</p>
                                            <span>process payments by using cash over-the-counter at physical clinic branches, as well as by cash and payment cards using ATMs.</span></div>
                                        </label>
                                        <label>
                                            <input type="radio" name="paymentMethod" value="Credit Card">
                                            <div class="Description"><p>Credit Card</p>
                                            <span>process payments by using cash over-the-counter at physical clinic branches, as well as by cash and payment cards using ATMs.</span></div>
                                        </label>
    
    
                        </div>
    
                        <div class="divider"></div>
    
    
    
                        <div class="form-container">
                                <h2>Credit Card Information</h2>

                                    <div class="form-field">
                                    <label for="cardNumber">CARD NUMBER:</label>
                                    <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter Card Number">
                                    </div>

                                    <div class="form-field">
                                    <label for="nameOnCard">NAME ON CARD:</label>
                                    <input type="text" id="nameOnCard" name="nameOnCard" placeholder="Enter Name on Card">
                                    </div>

                                    <div class="form-field">
                                    <label for="expirationDate">EXPIRATION DATE:</label> 
                                    <input type="text" id="expirationDate" name="expirationDate" class="expiration-date" placeholder="MM">
                                    <input type="text" id="expirationYear" name="expirationYear" class="expiration-date" placeholder="YYYY">
                                    </div>
    
    
                        </div>
    
    



                    <div class="confirm-button">
                        <button>Confirm Button</button>
                    </div>



                    </div>
                       






            </div>


            <div class="container2">

            
                    <p> Hidden Text</p>

                                    
                    <h2>Summary</h2> 

            </div>
            
    

    
    
    
    
    
    
    </div>



</div>





    </div>


   
</body>
</html>

