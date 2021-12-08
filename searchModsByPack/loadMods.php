<?php
$conn = new mysqli("localhost", "root", "", "modPickerDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST["name"];
$query = "SELECT modlist FROM modpack WHERE name='$name'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    $row = implode(mysqli_fetch_assoc($result));
    $modsArray = explode(PHP_EOL, $row);
    foreach ($modsArray as $mod) {
        echo '
            <fieldset class = "oneCheckbox">
                <input type="text" class="tristate" name="' . $mod . '" 
                    readonly="true" size="1" onfocus="this.blur()" onclick="tristate(this)">
                <label for="' . $mod . '">' . $mod . '</label>
            </fieldset>
        ';
    }
} else {
    echo "no results";
}
