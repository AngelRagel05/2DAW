"use strict";

const email = document.getElementById("email-input");

const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

email.addEventListener("input", (e) => {
  const valor = e.target.value;
  regexEmail.test(valor)
    ? (email.classList.remove("invalido"), email.classList.add("valido"))
    : (email.classList.add("invalido"), email.classList.remove("valido"));
});