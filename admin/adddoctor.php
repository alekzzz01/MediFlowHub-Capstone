

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information Form</title>
</head>
<body>



<form action="process_form.php" method="post">
    <label for="doctor_id">Doctor ID:</label>
    <input type="text" id="doctor_id" name="doctor_id" required><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="specialty">Specialty:</label>
    <input type="text" id="specialty" name="specialty" required><br>

    <label for="contact_info">Contact Information:</label><br>
    Phone Number: <input type="tel" id="phone_number" name="phone_number" required><br>
    Email Address: <input type="email" id="email" name="email" required><br>

    <label for="qualifications">Qualifications and Degrees:</label>
    <textarea id="qualifications" name="qualifications" rows="4" cols="50" required></textarea><br>

    <label for="work_schedule">Work Schedule:</label>
    <input type="text" id="work_schedule" name="work_schedule" required><br>

    <label for="appointment_availability">Appointment Availability:</label>
    <input type="text" id="appointment_availability" name="appointment_availability" required><br>

    <label for="experience">Experience:</label>
    <input type="text" id="experience" name="experience" required><br>

    <label for="notes">Notes/Comments:</label>
    <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>

    <label for="online_consultation">Availability for Online Consultations:</label>
    <input type="text" id="online_consultation" name="online_consultation" required><br>

    <input type="submit" value="Submit">
</form>

</body>

