const nouveauPassword = document.querySelector("#nouveauPassword");
const confirmationNouveauPassword = document.querySelector("#confirmationNouveauPassword");

nouveauPassword.addEventListener("keyup",function() {
    verificationPassword();
})

confirmationNouveauPassword.addEventListener("keyup",function() {
    verificationPassword();
})

function verificationPassword(){
    if(nouveauPassword.value === confirmationNouveauPassword.value){
        document.querySelector("#btnValidation").disabled = false;
        document.querySelector("#erreur").classList.add("d-none");
    } else {
        document.querySelector("#btnValidation").disabled = true;
        document.querySelector("#erreur").classList.remove("d-none");
    }
}