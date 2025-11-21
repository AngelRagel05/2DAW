"use strict";

const email = document.getElementById("email");
const password = document.getElementById("password");
const nombre = document.getElementById("nombre");
const checks = document.querySelectorAll("input[type='checkbox']");
const entradaSelect = document.getElementById("tipo-entrada");
const form = document.getElementById("form-inscripcion");
const totalDiv = document.getElementById("resumen-total");

let total = 0;

const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexPassword = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

// Funciones de validación
function validarNombre() {
  if (nombre.value.trim() === "") {
    document.getElementById("error-nombre").textContent = "El nombre no puede estar vacío";
    nombre.classList.add("error");
    return false;
  } else {
    document.getElementById("error-nombre").textContent = "";
    nombre.classList.remove("error");
    return true;
  }
}

function validarEmail() {
  if (!regexEmail.test(email.value)) {
    document.getElementById("error-email").textContent = "Email no válido";
    email.classList.add("error");
    return false;
  } else {
    document.getElementById("error-email").textContent = "";
    email.classList.remove("error");
    return true;
  }
}

function validarPassword() {
  if (!regexPassword.test(password.value)) {
    document.getElementById("error-password").textContent =
      "La contraseña debe tener al menos 8 caracteres, una mayúscula y un número";
    password.classList.add("error");
    return false;
  } else {
    document.getElementById("error-password").textContent = "";
    password.classList.remove("error");
    return true;
  }
}

// Validación en vivo
nombre.addEventListener("blur", validarNombre);
email.addEventListener("blur", validarEmail);
password.addEventListener("input", validarPassword);

// Función para actualizar total
function actualizarTotal() {
  const entrada = entradaSelect.value;
  const marcados = document.querySelectorAll("input[name='taller']:checked").length;

  entrada === "100"
    ? (total = 100 + marcados * 50)
    : (total = 300 + marcados * 50);

  totalDiv.textContent = "Total a pagar: " + total + "€";
}

entradaSelect.addEventListener("change", actualizarTotal);
checks.forEach((check) => check.addEventListener("change", actualizarTotal));

// Validación al enviar el formulario
form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Ejecutamos las funciones de validación
  const nombreValido = validarNombre();
  const emailValido = validarEmail();
  const passwordValido = validarPassword();

  if (nombreValido && emailValido && passwordValido) {
    form.style.display = "none";
    const mensaje = document.createElement("h2");
    mensaje.textContent = "¡Inscripción completada!";
    form.parentNode.appendChild(mensaje);
  }
});
