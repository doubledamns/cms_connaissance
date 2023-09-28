var isActiveMenu = false;

function doMenu() {
  if(isActiveMenu)
  {
    document.querySelector("#responsive-menu").style.display = "none";
    isActiveMenu = false;
  }
  else
  {
    document.querySelector("#responsive-menu").style.display = "flex";
    isActiveMenu = true;
  }
}