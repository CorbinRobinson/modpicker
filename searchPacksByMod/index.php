 <!--
    Corbin Robinson
    10/13/2021
-->
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
             <div id="grpCheckbox">

                 <div class="oneCheckbox">
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

                 </div>
             </div>

         </div>
         <div class="column">
             <h1>Modpacks</h1>
             <p id="checkboxTest"></p>
             <ul id="packs__list">
                 <!-- <li><img class="pack" id="ATM6" src="img/ATM6.gif"></li>
                    <li><img class="pack" id="RLCraft" src="img/rlCraft.png"></li>
                    <li><img class="pack" id="Sky Factory" src="img/skyFactory.png"></li> -->
             </ul>

         </div>
     </div>
     <script src="packsByMod.js">
     </script>
 </body>

 </html>