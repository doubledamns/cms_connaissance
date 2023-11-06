function validerEmail() {
  
    var email = document.getElementById("email").value;
    var reg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!reg.test(email)) {
        return false; 
        alert("test");
    }
    return true; 
}
document.addEventListener("DOMContentLoaded", () => {
var loginForm = document.getElementById("clickform");
loginForm.addEventListener("submit", function(e) {
    var username=document.getElementById('email').value;
    var password=document.getElementById('password').value;

    if(!validerEmail()){
        e.preventDefault();
    }
   
    if(username==""||password==""){
        alert("veuiller remplir tous les champs obligatoires");
        e.preventDefault();
    }

    return true;
}); 
});   






