function validerEmail() {
  
    var email = document.getElementById("email").value;
    var reg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!reg.test(email)) {
        return false; 
    }
    return true; 
}
document.addEventListener("DOMContentLoaded", () => {
var loginForm = document.getElementById("clickform");
loginForm.addEventListener("submit", function(e) {
    e.preventDefault();
    var username=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    if(!validerEmail()){
        return false;
    }
   
    if(username==""||password==""){
        alert("veuiller remplir tous les champs obligatoires");
        return false;
    }
    return true;
}); 
});   






