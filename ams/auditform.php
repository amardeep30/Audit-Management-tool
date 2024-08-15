<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <header>
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo">
                <img src="Image/logo.png" alt="logo" class="logo">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
            <h2>Audit Form</h2>
        <!-- </div> -->
    </header>
    <div class="container">
        <div class="audit-form-container" id="audit-form-container">
            <h2>Audit Form</h2><br>
            <form id="audit-form" action="audit.php" method="POST" target="_blank">
                <label for="audit-username">Username</label>
                <input type="text" id="audit-username" name="audit-username" placeholder="Enter Username" required><br>
                <label for="group">Group</label>
                <input type="text" id="group" name="group" placeholder="Enter Group">
                <label for="room-number">Room Number</label>
                <input type="text" id="room-number" name="room-number" placeholder="Enter room no." required><br>
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="Enter email"><br>
                <label for="audit-password">Password</label>
                <input type="password" id="audit-password" name="audit-password" placeholder="Enter Password" required><br>
                <!-- <label for="audit-datetime">Audit Date and Time</label> -->
                <!-- <input type="datetime-local" id="audit-datetime" name="audit-datetime" required> -->
                <input type="hidden" id="serial-number" name="serial-number">
                <input type="submit" value="Start Audit">
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>

        <script src="index.js"></script>
</body>
</html>