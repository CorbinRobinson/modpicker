// import modpack from './modpackClass.js'

class modpack {
  constructor(name, modlist) {
    this.name = name;
    this.modlist = modlist;
  }
}

function populateModpackList() {
  var modpackList = [];
  modpackList.push(
    new modpack("all-the-mods-3-remix", [
      "Thaumcraft",
      "Tech Rebord",
      "Toast Control",
    ])
  );
  modpackList.push(
    new modpack("all-the-mods-6", ["Quark", "Morph-o-Tool", "Immersive Posts"])
  );
  modpackList.push(
    new modpack("plunger", [
      "Ender Mail",
      "Crafting Tweaks",
      "Biomes O' Plenty",
    ])
  );

  var modpackListElements = [];

  for (var i = 0; i < modpackList.length; i++) {
    modpackListElements[i] = document.createElement("li");
    const image = document.createElement("img");
    image.src = "../img/" + modpackList[i].name + ".png";
    image.className = "pack";
    modpackListElements[i].setAttribute("id", "modpack" + i);
    modpackListElements[i].setAttribute("title", modpackList[i].name);
    modpackListElements[i].appendChild(image);
    document.getElementById("packs__list").appendChild(modpackListElements[i]);
  }
}

function handleFiles(file) {
  const fl = file;
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

function setSearchOnClick() {
  var searchButton = document.getElementById("search");
  searchButton.addEventListener("click", search);
}

function search() {
  var grpCheckbox = document.getElementById("grpCheckbox");
  var checkboxes = grpCheckbox.getElementsByTagName("INPUT");

  //Get checkbox preferences
  var modsArray = new Array();
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].value == "\u2705") {
      modsArray[checkboxes[i].getAttribute("name")] = true;
    } else if (checkboxes[i].value == "\u274C") {
      modsArray[checkboxes[i].getAttribute("name")] = false;
    }
  }

  // var packsList = document.getElementById("packs__list");
  // var packsArray = packsList.getElementsByTagName("IMG");
  // //document.getElementById("checkboxTest").innerHTML = packsArray[0].getAttribute("id");
  // for (var i = 0; i < packsArray.length; i++) {
  //   packsArray[i].style.visibility = "collapse";
  //   for (var k = 0; k < selected.length; k++) {
  //     if (
  //       selected[k].getAttribute("name") == packsArray[i].getAttribute("id")
  //     ) {
  //       packsArray[i].style.visibility = "visible";
  //       break;
  //     }
  //   }
  // }
}

/**
 *  loops thru the given 3 values for the given control
 */
function tristate(control) {
  let value1 = "-";
  let value2 = "\u2705";
  let value3 = "\u274C";
  switch (control.value.charAt(0)) {
    case value1:
      control.value = value2;
      break;
    case value2:
      control.value = value3;
      break;
    case value3:
      control.value = value1;
      break;
    default:
      // display the current value if it's unexpected
      alert(control.value);
  }
}

//populateModpackList();
//setSearchOnClick();
