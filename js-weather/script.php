
   <?php
   require('connection.php');
   session_start();
   if(isset($_SESSION['email'])){
       $email = $_SESSION['email'];
       
    $data = json_decode(file_get_contents("php://input"), true);
       $city = $data["city"];
      // echo $data["city"];
     //  echo $email;
              $fetch = "SELECT * FROM pref WHERE email='$email'";
       $res1 = mysqli_query($conn,$fetch);
       $res=mysqli_fetch_assoc($res1);
       if($res!=NULL and($city==$res['p1'] or $city==$res['p2'] or $city==$res['p3'])  ){
           echo "Already Added";
       } else {



           if ($res == NULL) {

               $query = "INSERT INTO pref(email,p1) VALUES('$email','$city')";
               $result = mysqli_query($conn, $query);
               //    echo $result;
                  if ($result) {
                      echo $data["city"] . "  Added!";
                  } 
           } else if ($res['p2'] == NULL) {
               $query = " UPDATE pref SET p2='$city' WHERE email='$email'";
               $result = mysqli_query($conn, $query);
               //    echo $result;
                  if ($result) {
                      echo $data["city"] . "  Added!";
                  } 
           } else if ($res['p3'] == NULL) {
               $query = " UPDATE pref SET p3='$city' WHERE email='$email'";
               $result = mysqli_query($conn, $query);
               //    echo $result;
                  if ($result) {
                      echo $data["city"] . "  Added!";
                   header("Location:index.php");
                  } 
           }
           else {
               echo "only 3 preferences can be added";
           }
         
       }

      
    echo PHP_EOL;
   }
   else{
       echo "You are not logged in!! Please login.";
   }

?>