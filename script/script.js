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



const notifIcon = document.getElementById('notif-icon');
const dropdownNotif = document.querySelector(".dropdown-notifications");


notifIcon.addEventListener("click", function (){

  if (dropdownNotif.style.display === "block") {
    dropdownProfile.style.opacity = "0"; // Fade out
    setTimeout(() => {
      dropdownNotif.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  } else {
    dropdownNotif.style.display = "block"; // Show
    setTimeout(() => {
      dropdownNotif.style.opacity = "1"; // Fade in after showing
    }, 0); // Delay to ensure smooth transition
  }
});



// Close the dropdown if the user clicks outside of it
document.addEventListener("click", function (event) {
  if (!dropdownNotif.contains(event.target) && !notifIcon.contains(event.target)) {
    dropdownNotif.style.opacity = "0"; // Fade out
    setTimeout(() => {
      dropdownNotif.style.display = "none"; // Hide after fading out
    }, 300); // Delay matching the transition duration
  }
});
