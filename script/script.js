document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.querySelector(".sidebar");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.toggle("minimized");
    });


       // Add code to handle the close button click
       const closeSidebarButton = document.getElementById("close-sidebar");
       closeSidebarButton.addEventListener("click", function () {
           sidebar.classList.remove("minimized");
       });
   });








// Get references to the profile-icon and dropdown-profile elements
const profileIcon = document.getElementById("profile-icon");
const dropdownProfile = document.querySelector(".dropdown-profile");

// Add a click event listener to the profile-icon
profileIcon.addEventListener("click", function () {
  // Toggle the visibility and opacity of the dropdown-profile
  if (dropdownProfile.style.display === "block") {
    dropdownProfile.style.opacity = "0"; // Fade out
    setTimeout(() => {
      dropdownProfile.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  } else {
    dropdownProfile.style.display = "block"; // Show
    setTimeout(() => {
      dropdownProfile.style.opacity = "1"; // Fade in after showing
    }, 0); // Delay to ensure smooth transition
  }
});

// Close the dropdown if the user clicks outside of it
document.addEventListener("click", function (event) {
  if (!dropdownProfile.contains(event.target) && !profileIcon.contains(event.target)) {
    dropdownProfile.style.opacity = "0"; // Fade out
    setTimeout(() => {
      dropdownProfile.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  }
});



// Get references to the notif-icon and notifications-dropdown elements
const notifIcon = document.getElementById("notif-icon");
const notificationsDropdown = document.querySelector(".dropdown-notifications");

// Add a click event listener to the notif-icon
notifIcon.addEventListener("click", function () {
  // Toggle the visibility and opacity of the notifications-dropdown
  if (notificationsDropdown.style.display === "block") {
    notificationsDropdown.style.opacity = "0"; // Fade out
    setTimeout(() => {
      notificationsDropdown.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  } else {
    notificationsDropdown.style.display = "block"; // Show
    setTimeout(() => {
      notificationsDropdown.style.opacity = "1"; // Fade in after showing
    }, 0); // Delay to ensure smooth transition
  }
});

// Close the notifications dropdown if the user clicks outside of it
document.addEventListener("click", function (event) {
  if (!notificationsDropdown.contains(event.target) && !notifIcon.contains(event.target)) {
    notificationsDropdown.style.opacity = "0"; // Fade out
    setTimeout(() => {
      notificationsDropdown.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  }
});




var profilebtn = document.getElementById("profile-btn");
var passwordbtn = document.getElementById("password-btn");


var accountedit = document.getElementById("account-edit");
var passwordedit = document.getElementById("password-edit");


passwordbtn.addEventListener("click", () => {
    accountedit.style.display = "none";
    passwordedit.style.display = "block";

    profilebtn.style.backgroundColor = "#F5F6F8"
    passwordbtn.style.backgroundColor = "rgba(91, 91, 91, 0.20)";

});

profilebtn.addEventListener("click", () => {
  accountedit.style.display = "block";
  passwordedit.style.display = "none";

  profilebtn.style.backgroundColor = "rgba(91, 91, 91, 0.20)"
  passwordbtn.style.backgroundColor = "#F5F6F8";

});


