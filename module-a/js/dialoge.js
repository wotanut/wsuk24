const dialog = document.querySelector("dialog")[0];
const showButton = document.querySelector("showDialog")[0];
const closeButton = document.querySelector("close")[0];

// "Show the dialog" button opens the dialog modally
showButton.addEventListener("click", () => {
  dialog.showModal();
});

// "Close" button closes the dialog
closeButton.addEventListener("click", () => {
  dialog.close();
});