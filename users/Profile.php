<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username from the session

    // Include the database connection file
    include 'db.php';

    $sql = "SELECT `Last Name`, `First Name`, Email, Password, `Phone Number` FROM users WHERE Email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_name = $row['Last Name'];
        $first_name = $row['First Name'];
        $email = $row['Email'];
        $phone_no = $row['Phone Number'];
    }
} else {
    // Handle the case where the username is not available in the session
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Profile </title>


    <link rel="icon" href="images/logo.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="style/profile.css">
    <link rel="stylesheet" href="style/transitions.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">



 
    
</head>
<body>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="images/MediFlowHub.png" alt="">

            <i class='bx bx-x' id="close-sidebar"></i>
        </div>
            <ul class="menu">

                <li>
                    <a href="dashboard.php" >
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="appointments.php">
                        <i class='bx bxs-time-five'></i>
                        <span>Appointments</span>
                    </a>
                </li>


                
                <li>
                    <a href="availabledoctors.php">
                        <i class='bx bxs-user-rectangle' ></i>
                        <span>Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="Payments.php">
                        <i class='bx bxs-credit-card'></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li>
                    <a href="locations.php">
                    <i class='bx bxs-map'></i>
                        <span>Locations</span>
                    </a>
                </li>

                <li>
                    <a href="notifications.php">
                        <i class='bx bxs-bell' ></i>
                        <span>Notifications</span>
                    </a>
                </li>

                <li class="active">
                    <a href="Profile.php">
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

                        <div class="notification" id="notif-icon">
                                    <i class='bx bx-bell'   ></i>
                                    <span class="num">8</span>

                        </div>
               
                        <div class="user-profile">

                            <button class="profile-icon" id="profile-icon"></button>
                            
                        </div>

                        
                        <div class="dropdown-profile">

                            <div class="sub-menu">

                                    <div class="user-info">
                                        <button class="usermain-profile"></button>
                                        <p>Username</p>
                                    </div>

                                    <div class="edit-profile">
                                        <div class="edit-profile1">
                                        <i class='bx bxs-user-circle' ></i>
                                        <p>Edit Profile</p>
                                        </div>
                                    
                                        <i class='bx bx-chevron-right' ></i>
                                    </div>

                                    <div class="help-support">
                                        <div class="edit-profile1">
                                        <i class='bx bxs-help-circle' ></i>
                                        <p>Help & Support</p>
                                        </div>
                                        <i class='bx bx-chevron-right' ></i>
                                    </div>



                            </div>


                        </div>

                        <div class="dropdown-notifications">
                                <p class="Notiftitle">Notifications</p>

                                <p class="ReminderTitle">Reminder</p>
                               
                                <div class="notif-box">

                                        <div class="notif-message">
                                            <p>Your appointment with Dr. Quack Quack starts in 1hr.</p>

                                            <i class='bx bx-chevron-right'></i>

                                        </div>

                                        <div class="notif-time">

                                             <i class='bx bxs-time-five'></i>
                                             <p>Now</p>
                                            
                                        </div>
                                       

                                </div>

                                <div class="notif-box">

                                        <div class="notif-message">
                                            <p>Your appointment with Dr. Quack Quack starts in 1hr.</p>

                                            <i class='bx bx-chevron-right'></i>

                                        </div>

                                        <div class="notif-time">

                                             <i class='bx bxs-time-five'></i>
                                             <p>Now</p>
                                            
                                        </div>
                                       

                                </div>




                        </div>



                       

            </div>
           
        </div>


        <div class="first-container">
            <h1>Account settings</h1>

            <div class="account-container">

                <div class="account-options">

                        <li id="profile-btn" class="active">
                            <i class='bx bxs-user-circle'></i>
                            <p>Profile</p>
                        </li>

                        <li id="address-btn" class="active3">
                            <i class='bx bxs-edit-location'></i>
                            <p>Address</p>
                        </li>
                            
                   
                        <li id="password-btn" class="active2" >
                            <i class='bx bxs-lock-alt' ></i>
                            <p>Password</p>
                        </li>

                </div>


                <div id="account-edit" class="account-edit">

                    <div class="image-edit">

                    <div class="image-prof">
                        <img id="profile-image" src="images/PROFILE1.png" alt="">
                        <i id="upload-icon" class="bx bxs-camera"></i>
                        <input type="file" id="image-upload" style="display: none;">
                    </div>

                            <div class="image-buttons">

                                <button class="upload-btn">Upload here</button>
                              
                                <button class="delete-btn">Delete</button>

                            </div>
                        

                    </div>

                    <form class="form-input">

                        <div class="input-box">
                                <p>FIRST NAME<span>*</span></p>
                                <input type="text"  placeholder="First Name....." required="required" value="<?php echo $first_name; ?>">
                                
                        </div>

                        <div class="input-box">
                                <p>LAST NAME <span>*</span></p>
                                <input type="text"  placeholder="Last Name....." required="required" value="<?php echo $last_name; ?>">
                                
                        </div>

                        <div class="input-box">
                                <p>EMAIL <span>*</span></p>
                                <input type="text"  placeholder="Email Address....." required="required" value="<?php echo $email; ?>">
                                
                        </div>

                        <div class="input-box">
                                <p>MOBILE NO. <span>*</span></p>
                                <input type="text"  placeholder="63+" required="required" value="<?php echo $phone_no; ?>">
                                
                        </div>

                        <div class="input-box">
                                <p>Date of Birth. <span>*</span></p>
                                <input type="date"   required="required">
                                
                        </div>


                      

                        <div class="input-radio">
                                <p>GENDER <span>*</span></p>

                                <div class="radio-inputs">

                                        <div class="gender">
                                            <input type="radio" id="gender" name="age" value="30">
                                            <label for="gender">Male</label><br>

                                        </div>

                                        <div class="gender">
                                            <input type="radio" id="gender" name="age" value="30">
                                            <label for="gender">Female</label><br>

                                        </div>
                                            

                                            

                                </div>

                                
                        </div>



                    </form>


                    <div class="confirmchanges">
                        <button class="confirm-btn">Confirm Changes</button>
                    </div>




                </div>


                <div id="password-edit" class="password-edit">


                        <form class="form-input">
                            <div class="input-box">
                                    <p>CURRENT PASSWORD <span>*</span></p>
                                    <input type="text"  placeholder="Current Password....." required="required">
                                    
                            </div>

                            <div class="input-box">
                                    <p>NEW PASSWORD <span>*</span></p>
                                    <input type="text"  placeholder="New Password....." required="required">
                                    
                            </div>

                        </form>

                            <div class="confirmpassword">
                                <button class="confpass-btn">
                                    Confim Password
                                </button>
                            </div>

                </div>




                 <div id="address-edit" class="address-edit">

                   
                    <form class="form-input-address">

                        <div class="input-box">
                                <p>Full Address<span>*</span></p>
                                <input type="text"  placeholder="Full Address" required="required">
                                
                        </div>

                        <p>Region, Province, City, Barangay<span>*</span></p>


                        <div class="select-container">

                                <div class="select-box">
                        
                                    <select id="region"></select>
                                    <input type="hidden" name="region_text" id="region-text">
                                </div>


                                <div class="select-box">
                                    <select id="province"></select>
                                    <input type="hidden" name="province_text" id="province-text">
                                </div>

                                <div class="select-box">
                                    <select id="city"></select>
                                    <input type="hidden" name="city_text" id="city-text">
                                </div>


                                <div class="select-box">
                                    <select id="barangay"></select>
                                    <input type="hidden" name="barangay_text" id="barangay-text">
                                </div>

            
                               

                        </div>

                        


                        <div class="input-box">
                                <p>Zip Code<span>*</span></p>
                                <input type="text"  placeholder="Zip Code....." required="required">
                                
                        </div>
                                                    

                    


                    </form>


                    <div class="confirmchanges">
                        <button class="confirm-btn">Confirm Changes</button>
                    </div>




                </div>



            </div>


          



            




        </div>






      


    </div>


    <script src="script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 
</body>


<script>


                var my_handlers = {
                // fill province
                fill_provinces: function() {
                    //selected region
                    var region_code = $(this).val();

                    // set selected text to input
                    var region_text = $(this).find("option:selected").text();
                    let region_input = $('#region-text');
                    region_input.val(region_text);
                    //clear province & city & barangay input
                    $('#province-text').val('');
                    $('#city-text').val('');
                    $('#barangay-text').val('');

                    //province
                    let dropdown = $('#province');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                    dropdown.prop('selectedIndex', 0);

                    //city
                    let city = $('#city');
                    city.empty();
                    city.append('<option selected="true" disabled></option>');
                    city.prop('selectedIndex', 0);

                    //barangay
                    let barangay = $('#barangay');
                    barangay.empty();
                    barangay.append('<option selected="true" disabled></option>');
                    barangay.prop('selectedIndex', 0);

                    // filter & fill
                    var url = 'ph-json/province.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.region_code == region_code;
                        });

                        result.sort(function(a, b) {
                            return a.province_name.localeCompare(b.province_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                        })

                    });
                },
                // fill city
                fill_cities: function() {
                    //selected province
                    var province_code = $(this).val();

                    // set selected text to input
                    var province_text = $(this).find("option:selected").text();
                    let province_input = $('#province-text');
                    province_input.val(province_text);
                    //clear city & barangay input
                    $('#city-text').val('');
                    $('#barangay-text').val('');

                    //city
                    let dropdown = $('#city');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                    dropdown.prop('selectedIndex', 0);

                    //barangay
                    let barangay = $('#barangay');
                    barangay.empty();
                    barangay.append('<option selected="true" disabled></option>');
                    barangay.prop('selectedIndex', 0);

                    // filter & fill
                    var url = 'ph-json/city.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.province_code == province_code;
                        });

                        result.sort(function(a, b) {
                            return a.city_name.localeCompare(b.city_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                        })

                    });
                },
                // fill barangay
                fill_barangays: function() {
                    // selected barangay
                    var city_code = $(this).val();

                    // set selected text to input
                    var city_text = $(this).find("option:selected").text();
                    let city_input = $('#city-text');
                    city_input.val(city_text);
                    //clear barangay input
                    $('#barangay-text').val('');

                    // barangay
                    let dropdown = $('#barangay');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                    dropdown.prop('selectedIndex', 0);

                    // filter & Fill
                    var url = 'ph-json/barangay.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.city_code == city_code;
                        });

                        result.sort(function(a, b) {
                            return a.brgy_name.localeCompare(b.brgy_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                        })

                    });
                },

                onchange_barangay: function() {
                    // set selected text to input
                    var barangay_text = $(this).find("option:selected").text();
                    let barangay_input = $('#barangay-text');
                    barangay_input.val(barangay_text);
                },

                };


                $(function() {
                // events
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);
                $('#barangay').on('change', my_handlers.onchange_barangay);

                // load region
                let dropdown = $('#region');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose Region</option>');
                dropdown.prop('selectedIndex', 0);
                const url = 'ph-json/region.json';
                // Populate dropdown with list of regions
                $.getJSON(url, function(data) {
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
                    })
                });

                });








</script>







</html>
