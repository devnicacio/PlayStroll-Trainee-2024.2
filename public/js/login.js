function senha() {
    const senhaInput = document.getElementById("senha");
    const icon = document.querySelector(".visualizacao i");

    if(senhaInput.type === "password") {
        senhaInput.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }

    else {
        senhaInput.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}