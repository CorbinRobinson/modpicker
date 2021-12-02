<?php

$query = "SELECT * FROM modpack";
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
