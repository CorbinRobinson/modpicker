// import modpack from './modpackClass.js'

class modpack{
    constructor(name, modlist){
        this.name = name
        this.modlist = modlist;
    }
}

function populateModpackList(){
    var modpackListElements = [];
    var modpackListNames = [
        "ATM6",
        "skyFactory",
        "RLCraft"
    ];

    for(var i=0; i<modpackListNames.length; i++){
        modpackListElements[i] = document.createElement("li");
        const image = document.createElement("img")
        image.src = "img/"+modpackListNames[i]+".png";
        image.className = "pack"
        modpackListElements[i].setAttribute('id', "modpack"+i)
        modpackListElements[i].appendChild(image)
        document.getElementById("packs__list").appendChild(modpackListElements[i]);
    }
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