"use strict";

const tabla = document.getElementById("tablaEmpleados").querySelector("tbody");

function cargarEmpleados() {
  fetch("api.php?recurso=empleados")
    .then((respuesta) => respuesta.json())
    .then((empleados) => {
      tabla.innerHTML = "";

      empleados.forEach((empleado) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
    <td>${empleado.nombre}</td>
    <td>${empleado.puesto}</td>
    <td>${empleado.salario}€</td>
    <td>
      <button class="editar">Editar</button>
      <button class="eliminar">Eliminar</button>
    </td>
  `;
        tabla.appendChild(tr);

        // Eliminar
        tr.querySelector(".eliminar").addEventListener("click", () => {
          fetch(`api.php?recurso=empleados&id=${empleado.id}`, {
            method: "DELETE",
          })
            .then((res) => res.json())
            .then(() => cargarEmpleados())
            .catch((err) => alert("Error al eliminar: " + err));
        });

        // Editar / Guardar
        const btnEditar = tr.querySelector(".editar");
        btnEditar.addEventListener("click", () => {
          if (btnEditar.textContent === "Editar") {
            tr.children[0].innerHTML = `<input value="${empleado.nombre}">`;
            tr.children[1].innerHTML = `<input value="${empleado.puesto}">`;
            tr.children[2].innerHTML = `<input type="number" value="${empleado.salario}">`;
            btnEditar.textContent = "Guardar";
          } else {
            const nuevosDatos = {
              nombre: tr.children[0].querySelector("input").value,
              puesto: tr.children[1].querySelector("input").value,
              salario: parseFloat(tr.children[2].querySelector("input").value),
            };
            fetch(`api.php?recurso=empleados&id=${empleado.id}`, {
              method: "PUT",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify(nuevosDatos),
            })
              .then((res) => res.json())
              .then(() => cargarEmpleados())
              .catch((err) => alert("Error al actualizar: " + err));
          }
        });
      });

      const trForm = document.createElement("tr");
      trForm.innerHTML = `
        <td><input type="text" id="nuevoNombre" placeholder="Nombre" required></td>
        <td><input type="text" id="nuevoPuesto" placeholder="Puesto" required></td>
        <td><input type="number" id="nuevoSalario" placeholder="Salario" required></td>
        <td><button id="btnAgregar">Añadir</button></td>
        `;
      tabla.appendChild(trForm);

      document.getElementById("btnAgregar").addEventListener("click", () => {
        const datos = {
          nombre: document.getElementById("nuevoNombre").value,
          puesto: document.getElementById("nuevoPuesto").value,
          salario: parseFloat(document.getElementById("nuevoSalario").value),
        };

        fetch("api.php?recurso=empleados", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(datos),
        })
          .then((respuesta) => respuesta.json())
          .then((respuesta) => {
            alert("Empleado añadido correctamente");
            cargarEmpleados();
          })
          .catch((err) => alert("Error al añadir empleado: " + err));
      });
    })
    .catch((err) => console.error("Error al cargar empleados:", err));
}

cargarEmpleados();
