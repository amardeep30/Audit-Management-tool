<?php
// include "config/database.php";

// if(isset($_POST['submit'])){

//     $query = "select * from emp_id where username=".$_POST['username']." and  password = " .$_POST['password'].";";
//     $result = $conn-> query($query);

//     if ($result->num_rows>0){
//         while($row=$result->fetch_assoc()){
//             $_SESSION['user_id']=$row["id"];
//             echo $_SESSION['user_id'];
//             header("location: auditor_portal.php");
//             exit();
//         }
//     }
// }
// else {
//     header("location: index.php");
// }