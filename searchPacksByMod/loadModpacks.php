<?php
$conn = new mysqli("localhost", "root", "", "modPickerDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM modpack";
$result = mysqli_query($conn, $query);
$mods = json_decode($_POST["mods"], true);
//TODO: only get packs that match the mod preferences
if (count($mods) > 0) {
    foreach ($mods as $modKey => $modValue) {
        // echo implode(',', $mods);
        echo $modKey;
        if ($mods["{$modKey}"] == true) {
            echo '
                <li>
                    <p>"true: {$modKey}"</p>
                </li>
            ';
        } else if ($mods["{$modKey}"] == false) {
        }
    }
    // while ($row = mysqli_fetch_assoc($result)) {
    //     echo '
    //             <li>
    //                 <a href="' . $row['url'] . '" target="_blank" >
    //                     <img title="' . $row['name'] . '" class="pack" src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"/>
    //                 </a>
    //             </li>
    //         ';
    // }
} else {
    echo "notta";
}
