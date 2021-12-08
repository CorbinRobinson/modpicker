<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="../styles/contact.css">
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

    <div id="contactCenterDiv">
        <div>
            <canvas id="myCanvas" width="500" height="500" style="border:1px solid #000000;">
            </canvas>
        </div>
        <button id="clearButton">Send us a message!</button>
    </div>


    <script src="contact.js"></script>
</body>

</html>