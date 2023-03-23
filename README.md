<h1>Overview</h1>

<p>The Schedule Maker and Profile Updater web application is a secure and user-friendly platform that allows users to manage their schedules and update their profiles. The application includes several pages, including registration, login, dashboard, edit schedule, update profile, and logout.</p>

<h2>File Structure and Usage</h2>

<p>The following files are included in the application:</p>

<ul>
    <li>index.php: the main login page where users can enter their login credentials or register for an account</li>
    <li>register.php: the page where users can register for a new account</li>
    <li>dashboard.php: the page where users can create and view schedules, as well as send schedules via email</li>
    <li>edit_schedule.php: the page where users can edit the title, date, and time of a specific schedule</li>
    <li>update_profile.php: the page where users can update their username, password, and email</li>
    <li>includes/auth.php: the file that handles authentication and session management</li>
    <li>includes/email.php: the file that handles sending emails with schedules</li>
    <li>includes/header.php: the header file that is included in all pages</li>
    <li>includes/footer.php: the footer file that is included in all pages</li>
    <li>users.json: the file that stores user information</li>
    <li>schedules.json: the file that stores schedules information</li>
</ul>

<h2>Mind Map of Code</h2>

<ul>
    <li>Registration Page</li>
    <li>Login Page</li>
    <li>Dashboard Page</li>
    <li>Save Schedule Form</li>
    <li>Send Schedules to Email Form</li>
    <li>Schedules Table</li>
    <li>Edit Schedule Page</li>
    <li>Update Profile Page</li>
    <li>Logout Functionality</li>
</ul>

<h2>Code Features</h2>

<p>The following features are included in the application:</p>

<ul>
    <li>Registration and login forms with data validation</li>
    <li>Password hashing and salting for enhanced security</li>
    <li>Session management for persistent user authentication</li>
    <li>CSRF protection to prevent cross-site request forgery attacks</li>
    <li>Saving and retrieving schedules in JSON format</li>
    <li>Sending emails with schedules using PHPMailer</li>
    <li>Updating user profile with new username, password, or email</li>
    <li>Responsive design using CSS for optimal display on various devices</li>
    <li>Animation effects using CSS to enhance user experience</li>
</ul>

<p>(C) Copyright 2023 HarshitEthic | HARSHIT SHARMA 
Visit my site <a href="https://harshitethic.in">https://harshitethic.in</a> for more information.</p>
