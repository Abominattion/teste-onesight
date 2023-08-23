let btnMobile = document.querySelector(".btn-mobile");
let nav = document.querySelector(".nav");
btnMobile.addEventListener("click", () => {
    nav.classList.toggle("open-nav");
    btnMobile.classList.toggle("active");
});


// ==== MOSTRAR SENHA ==== //
let btnShowPasswordRe = document.querySelector('.see-password-icon');
if (btnShowPasswordRe) {
    btnShowPasswordRe.addEventListener('click', function () {
        let inputPasswordRe = document.querySelector('#inputPassword');
        if (inputPasswordRe.getAttribute('type') == 'password') {
            inputPasswordRe.setAttribute('type', 'text');
        } else {
            inputPasswordRe.setAttribute('type', 'password');
        }
    });
}

// ==== MUDAR ICONE ==== //
let changeBtnPassword = document.querySelector(".see-password-icon");
if (changeBtnPassword) {
    changeBtnPassword.addEventListener("click", function () {
        if (changeBtnPassword.classList.contains("bx-show-alt")) {
            changeBtnPassword.classList.remove("bx-show-alt");
            changeBtnPassword.classList.add("bx-hide");
        } else {
            changeBtnPassword.classList.remove("bx-hide");
            changeBtnPassword.classList.add("bx-show-alt");
        }
    });
}