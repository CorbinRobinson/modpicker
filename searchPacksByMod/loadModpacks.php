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
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $modpackModlist = $row['modlist'];
            $flag = true;
            foreach ($mods as $modKey => $modValue) {
                if ($modValue == true && !str_contains($modpackModlist, $modKey)) {
                    $flag = false;
                    break;
                } else if ($modValue == false && str_contains($modpackModlist, $modKey)) {
                    $flag = false;
                    break;
                }
            }
            if ($flag) {
                echo '
                        <li>
                            <a href="' . $row['url'] . '" target="_blank" >
                                <img title="' . $row['name'] . '" class="pack" src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"/>
                            </a>
                        </li>
                    ';
            }
        }
    } else {
        echo "sql broked";
    }
} else {
    echo "no mods selected";
}
