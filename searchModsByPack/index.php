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
    <title>Search Mods by Pack</title>
    <link rel="stylesheet" href="../styles/twoColumn.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".pack").click(function() {
                var thisName = $(this).attr("title");
                $("#grpCheckbox").load("loadMods.php", {
                    name: thisName
                });
            });
        });
    </script>
</head>

<body>
    <header>
        <img id="logo" src="../img/logo.svg" alt="creeper" width="50" height="50">
        <nav id="menu">
            <div class="table">
                <ul id="nav__links">
                    <li><a href="../searchPacksByMod/">Search Packs by Mod</a> &nbsp; &nbsp;</li>
                    <li><a href="../searchModsByPack/">Search Mods by Pack</a> &nbsp; &nbsp;</li>
                    <li><a href="../techsUsed/">Technologies Used</a> &nbsp; &nbsp;</li>
                </ul>
            </div>
        </nav>
        <div>
            <form class="cta" action="../contact/" method="get"><button>Contact</button></form>
        </div>
    </header>

    <div class="row">
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
                                <img style="border-radius: 10px;" title="' . $row['name'] . '" class="pack" src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"/>
                            </li>
                        ';
                    }
                } else {
                    echo "notta";
                }

                ?>
            </ul>

        </div>
        <div class="column">
            <h1>Mods</h1>
            <form id="grpCheckbox" method="post" action>
                <!-- <?php
                        // $query = "SELECT mods FROM allmods";
                        // $result = mysqli_query($conn, $query);
                        // if ($result->num_rows > 0) {
                        //     $row = implode(mysqli_fetch_assoc($result));
                        //     $modsArray = explode(PHP_EOL, $row);
                        //     foreach ($modsArray as $mod) {
                        //         echo '
                        //                 <fieldset class = "oneCheckbox">
                        //                     <input type="text" class="tristate" name="' . $mod . '" 
                        //                         readonly="true" size="1" onfocus="this.blur()" onclick="tristate(this)">
                        //                     <label for="' . $mod . '">' . $mod . '</label>
                        //                 </fieldset>
                        //             ';
                        //     }
                        // } else {
                        //     echo "no results";
                        // }

                        ?> -->
            </form>
        </div>
    </div>
</body>

</html>