function customSizeCheck() {
  if(document.getElementById("customSize").checked) {
    document.getElementById("customSizeDiv").style.display = "block";
  } 
  else if(document.getElementById("sra").checked || document.getElementById("a3").checked || document.getElementById("a4").checked) {
    document.getElementById("customSizeDiv").style.display = "none";
  }
}