<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
    
</head>
<body>
    <!-- <table border="10" > -->
    <header>
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo">
                <img src="Image/logo.png" alt="logo" class="logo">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
            <h2>Auditor Portal</h2>
        <!-- </div> -->
    </header>
    <br>
    <br>
    <br>

    <!-- <div class="nav" style="
    display: flex; 
    position:relative;
    color:aliceblue;
    font-size:xx-large;
    font-weight:bolder;
    margin-right:2%;
    flex-direction:row-reverse;
    top:100px;">
        <p>Welcome</p>
    </div> -->
    
    <div class="row">
        <div class="column">
            <img src="Image/Audit management software.png" alt="Audit Management Software">
        </div>
        <div class="column">
            <div class="buttons">
                <button name="auditoption" onclick="window.location.href='auditform.php';">DoAudit</button>
                <button name="auditoption" onclick="window.location.href='view_audit.php';">ViewAudit</button>
                <!-- <input type="button1" name="auditOption" value="doAudit" onclick="showAuditForm()">  -->
            
                <!-- <input type="button2" name="auditOption" value="viewAudit" onclick="viewAudit()">      -->
                
            </div>

        </div>
        <div class="column2">
            <h2 id ="Welcome-message">Welcome</h2>
        </div>
    </div>
    
    
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>

    <!-- </table> -->
    <script src="index.js"></script>
</body>
</html>