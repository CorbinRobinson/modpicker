 <!--
    Corbin Robinson
    10/13/2021
-->

 <?php
    //connect to mysql
    $conn = new mysqli("localhost", "root", "", "modPickerDB");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <title>Search Packs by Mod</title>
     <link rel="stylesheet" href="../styles/twoColumn.css">
 </head>

 <body>
     <header>
         <img id="logo" src="../img/logo.svg" alt="creeper" width="50" height="50">
         <nav id="menu">
             <div class="table">
                 <ul id="nav__links">
                     <li><a href="../searchPacksByMod/">Search Packs by Mod</a> &nbsp; &nbsp;</li>
                     <li><a href="../searchModsByPack/">Search Mods by Pack</a> &nbsp; &nbsp;</li>
                 </ul>
             </div>
         </nav>
         <div>
             <a class="cta" href="/html/contact/"><button>Contact</button></a>
         </div>
     </header>


     <div class="row">
         <div class="column">
             <h1 id="modsHeader">Mods</h1>
             <button id="search">Search</button>
             <ul id="grpCheckbox">
                 <?php
                    $query = "SELECT mods FROM allmods";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        $row = implode(mysqli_fetch_assoc($result));
                        $modsArray = explode(PHP_EOL, $row);
                        //echo $modsArray[3];
                        foreach ($modsArray as $mod) {
                            echo '
                                <li class = "oneCheckbox">
                                    <input type="text" class="tristate" name="' . $mod . '" readonly="true" size="1" onfocus="this.blur()" value="-" onclick="tristate(this)">
                                    <label for="' . $mod . '">' . $mod . '</label>
                                </li>
                            ';
                            // echo $mod;
                        }
                    } else {
                        echo "no results";
                    }

                    ?>
                 <!-- <div class="oneCheckbox">
                     <input type="text" id="box1" class="tristate" name="ATM6" readonly="true" size="1" onfocus="this.blur()" value='-' onclick='tristate(this)'>
                     <label for="box1">ATM6</label>
                 </div>

                 <div class="oneCheckbox">
                     <input type="checkbox" id="box2" name="RLCraft">
                     <label for="box2">RLCraft</label>
                 </div>

                 <div class="oneCheckbox">
                     <input type="checkbox" id="box3" name="Sky Factory">
                     <label for="box3">Sky Factory</label>
                 </div> -->
             </ul>

         </div>
         <div class="column">
             <h1>Modpacks</h1>
             <p id="checkboxTest"></p>
             <ul id="packs__list">
                 <?php
                    $query = "SELECT img, url, name FROM modpack";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <li>
                                    <a href="' . $row['url'] . '" target="_blank" >
                                        <img title="' . $row['name'] . '" class="pack" src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"/>
                                    </a>
                                </li>
                            ';
                        }
                    } else {
                        echo "notta";
                    }
                    ?>
             </ul>
         </div>
     </div>
     <script src="packsByMod.js">
     </script>
 </body>

 </html>

 <?php


    //$query = "SELECT modlist, name FROM modpack WHERE name = 'all-the-mods-6'";
    // $query = "SELECT mods FROM allmods";
    // $result = mysqli_query($conn, $query);
    // if ($result->num_rows > 0) {
    //     $row = implode(mysqli_fetch_assoc($result));
    //     $modsArray = explode(PHP_EOL, $row);
    //     //echo $modsArray[3];
    //     foreach ($modsArray as $mod) {
    //         echo $mod;
    //     }
    // } else {
    //     echo "no results";
    // }

    ?>