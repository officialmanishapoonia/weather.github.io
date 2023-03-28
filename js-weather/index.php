<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App-WW</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;1,200;1,300&display=swap" rel="stylesheet">
</head>
<style>
    .add{
        margin-left:2em;
        margin-top:0.75em;
        float:left;
        width: 30%;
        backdrop-filter: blur(10px);
    padding: 3em 1.8em;
    border: 2px solid var(--trans-white-2);
    border-radius: 0.6em;
    box-shadow: 0 1.8em 3.7em var(--shadow);
    text-align:center;
    }
    .days{
        margin-right:2em;
        margin-top:0.75em;
        float:right;
        width: 30%;
        backdrop-filter: blur(10px);
    padding: 3em 1.8em;
    border: 2px solid var(--trans-white-2);
    border-radius: 0.6em;
    box-shadow: 0 1.8em 3.7em var(--shadow);
    text-align:center;
    }
</style>
<body>
   <?php
   require('navbar.html');
   ?>

    <div class="wrapper">
        
        
        <div class="shape shape-1">

        </div>
        <div class="shape shape-2">
            
        </div>
        <div class="container">

            <div class="search-container">
                <input type="text" placeholder="Enter city name" id="city" value="Mumbai"/>
                <button id="search-btn">Search</button>
            </div>
            <div id="result"></div>
        </div>
    </div>
        <br>
        
   
    <div class="add " >
        <div class="search-container">
            <input type="text" placeholder="Enter city name" id="pref" value=""/>
          <button id="add-btn"><a href="index.php" style="text-decoration: none; color: var(--blue-2);">Add</a></button>  
        </div>
        
        <div id="prefres"></div>
        <div class="pref">
            <?php
            require('connection.php');
            session_start();
            if(isset($_SESSION["email"])){
$email=$_SESSION["email"];
            
                $query="SELECT p1,p2,p3 FROM pref WHERE email='$email'";
                $query_run=mysqli_query($conn,$query);
                $res=mysqli_fetch_assoc($query_run);
                if($res!=NULL){
                if($res["p1"]!=NULL ){
                    $city=$res["p1"];
                ?>
                
                <div class="container" style="margin-top:3em; ">
                    <input type="hidden" id="prefcity1" value='<?=$city?>'/>
                    <div id="weatherpref1"></div>
                </div>
                <?php
            }
            if($res["p2"]!=NULL ){
                $city=$res["p2"];

                ?>
                <div class="container" style="margin-top:3em; ">
                    <input type="hidden" id="prefcity2" value='<?=$city?>'/>
                    <div id="weatherpref2"></div>
                </div>
                <?php
            }
            if($res["p3"]!=NULL ){
                $city=$res["p3"];

                ?>
                <div class="container" style="margin-top:3em; ">
                    <input type="hidden" id="prefcity3" value='<?=$city?>'/>
                    <div id="weatherpref3"></div>
                </div>

                <?php
            }
            }     }   

            ?>
        </div>
    </div>


    <div class="days">
        <h3>Weather 7 day Forecast</h3>
        <div id="forecast1"></div>
    </div>

   




    <!-- Script -->
    <script src="key.js"></script>
    <script src="script.js"></script>

</body>
</html>