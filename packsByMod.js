function populateModpackList(){
    const modlistElements = [];
    const modlistNames = [
        "ATM6",
        "skyFactory",
        "RLCraft"
    ];

    for(var i=0; i<modlistNames.length; i++){
        modlistElements[i] = document.createElement("li");
        const image = document.createElement("img")
        image.src = "img/"+modlistNames[i]+".png";
        image.className = "pack"
        modlistElements[i].setAttribute('id', "modpack"+i)
        modlistElements[i].appendChild(image)
        document.getElementById("packs__list").appendChild(modlistElements[i]);
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
//setCheckboxOnClick();