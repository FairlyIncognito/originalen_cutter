// show boxes for custom size if custom size is ticked, else hide.
function customSizeCheck() {
  if(document.getElementById("customSize").checked) {
    document.getElementById("customSizeDiv").style.display = "block";
  } 
  else if(document.getElementById("sra").checked || document.getElementById("a3").checked || document.getElementById("a4").checked) {
    document.getElementById("customSizeDiv").style.display = "none";
  }
};

// toggle switch for custom variables
function toggleCustomValue() {
  var sheetSizeX = document.getElementById("sheetSizeX");
  var sheetSizeY = document.getElementById("sheetSizeY");
  var x = sheetSizeX.value;
  var y = sheetSizeY.value;
  sheetSizeX.value = y;
  sheetSizeY.value = x;
};

// load previously checked radio on page refresh
$(document).ready(function(){
  if(localStorage.selected) {
    $('#' + localStorage.selected ).attr('checked', true);
  }
  $('.sheetSize').click(function(){
    localStorage.setItem("selected", this.id);
  });
  // If customSizeDiv was checked, show block on page refresh, else hide.
  if(document.getElementById("customSize").checked) {
    document.getElementById("customSizeDiv").style.display = "block";
  }
  else if(document.getElementById("sra").checked || document.getElementById("a3").checked || document.getElementById("a4").checked) {
    document.getElementById("customSizeDiv").style.display = "none";
  }
});
