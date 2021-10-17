let modalButton = document.getElementById("headerButton");
modalButton.onclick = function () {
  modalPage.style.display = "block";
  modalCover.style.display = "block";
}

let modalCloseButton = document.getElementById("morderCloseButton");
modalCloseButton.onclick = function () {
  modalPage.style.display = "none";
  modalCover.style.display = "none";
}
