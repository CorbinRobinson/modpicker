// import modpack from './modpackClass.js'

class modpack{
    constructor(name, modlist){
        this.name = name
        this.modlist = modlist;
    }
}

function populateModpackList(){
    var modpackList = [];
    modpackList.push(new modpack("ATM3Remix", ["Thaumcraft", "Tech Rebord", "Toast Control"]))
    modpackList.push(new modpack("ATM6", ["Quark", "Morph-o-Tool", "Immersive Posts"]))
    modpackList.push(new modpack("Plunger", ["Ender Mail", "Crafting Tweaks", "Biomes O' Plenty"]))
    var modpackListElements = [];
    var modpackListNames = [
        "ATM6",
        "skyFactory",
        "RLCraft"
    ];

    for(var i=0; i<modpackListNames.length; i++){
        modpackListElements[i] = document.createElement("li");
        const image = document.createElement("img")
        image.src = "/img/"+modpackList[i].name+".png";
        image.className = "pack"
        modpackListElements[i].setAttribute('id', "modpack"+i)
        modpackListElements[i].setAttribute('title', modpackList[i].name)
        modpackListElements[i].appendChild(image)
        document.getElementById("packs__list").appendChild(modpackListElements[i]);
    }
}

function handleFiles(file) {

    const fl = file
    const reader = new FileReader();

    reader.onload = (event) => {
        const fl = event.target.result;
        const allLines = fl.split(/\r\n|\n/);
        // Reading line by line
        allLines.forEach((line) => {
            console.log(line);
        });
    };

    reader.onerror = (event) => {
        alert(event.target.error.name);
    };

    reader.readAsText(fl);
}

function setSearchOnClick(){
    var searchButton = document.getElementById("search");
    searchButton.addEventListener("click", search);
}

function search(){
    var grpCheckbox = document.getElementById("grpCheckbox");
    var checkboxes = grpCheckbox.getElementsByTagName("INPUT");
    var selected = new Array();
    for(var i=0; i<checkboxes.length; i++){
        if(checkboxes[i].checked){
            selected.push(checkboxes[i]);
        }
    }
    var packsList = document.getElementById("packs__list");
    var packsArray = packsList.getElementsByTagName("IMG");
    //document.getElementById("checkboxTest").innerHTML = selected[0].toString();
    //document.getElementById("checkboxTest").innerHTML = packsArray[0].getAttribute("id");
    for(var i=0; i<packsArray.length; i++){
        packsArray[i].style.visibility = "collapse";
        for(var k=0; k<selected.length; k++){
            if(selected[k].getAttribute("name") == packsArray[i].getAttribute("id")){
                packsArray[i].style.visibility = "visible";
                break;
            }
        }
    }
}

populateModpackList();
setSearchOnClick();
readTextFile("modpackInfo/modpackInfo.txt")