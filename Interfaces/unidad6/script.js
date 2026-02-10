const tramites = [
  {
    id: 1,
    titulo: "Grado de Discapacidad",
    descripcion:
      "Reconocimiento, calificación y valoración del grado de discapacidad en Andalucía.",
    palabrasClave: ["discapacidad", "minusvalia", "grado", "dependencia"],
    icono: "user",
  },
  {
    id: 2,
    titulo: "Familia Numerosa",
    descripcion:
      "Expedición, renovación y modificación del título de familia numerosa.",
    palabrasClave: ["familia", "numerosa", "titulo", "descuento"],
    icono: "users",
  },
  {
    id: 3,
    titulo: "Beca 6000",
    descripcion:
      "Ayudas para alumnado que curse bachillerato o ciclos formativos de grado medio.",
    palabrasClave: ["beca", "ayuda", "estudiar", "dinero"],
    icono: "graduation-cap",
  },
  {
    id: 4,
    titulo: "Renovar Demanda de Empleo",
    descripcion:
      "Acceso directo a la oficina virtual del SAE para renovar el paro.",
    palabrasClave: ["empleo", "paro", "trabajo", "renovar"],
    icono: "briefcase",
  },
  {
    id: 5,
    titulo: "Parejas de Hecho",
    descripcion:
      "Inscripción en el registro de parejas de hecho de la comunidad autónoma.",
    palabrasClave: ["boda", "pareja", "hecho", "registro"],
    icono: "heart",
  },
  {
    id: 6,
    titulo: "Licencia de Caza o Pesca",
    descripcion:
      "Obtención de las licencias necesarias para actividades cinegéticas o de pesca.",
    palabrasClave: ["caza", "pesca", "escopeta", "rio"],
    icono: "fish",
  },
];

const rejilla = document.getElementById("rejilla-tramites");
const entradaBusqueda = document.getElementById("buscador-tramites");
const sinResultados = document.getElementById("sin-resultados");
const botonLimpiar = document.getElementById("boton-limpiar");
const botonSugerencia = document.getElementById("boton-sugerencia");

function mostrarTramites(datos) {
  rejilla.innerHTML = "";

  if (datos.length === 0) {
    sinResultados.hidden = false;
    return;
  }

  sinResultados.hidden = true;

  datos.forEach((tramite) => {
    const col = document.createElement("div");
    col.className = "col-12 col-md-6 col-lg-4";
    col.innerHTML = `
            <div class="tarjeta-tramite" tabindex="0">
                <div class="mb-4">
                    <div class="text-primario mb-3">
                        <i data-lucide="${tramite.icono}" size="32"></i>
                    </div>
                    <h3>${tramite.titulo}</h3>
                    <p>${tramite.descripcion}</p>
                </div>
                <div class="boton-accion">
                    Iniciar trámite <i data-lucide="chevron-right" size="18"></i>
                </div>
            </div>
        `;

    const tarjeta = col.querySelector(".tarjeta-tramite");
    tarjeta.addEventListener("click", () =>
      alert(`Iniciando trámite: ${tramite.titulo}`),
    );
    tarjeta.addEventListener("keypress", (e) => {
      if (e.key === "Enter") alert(`Iniciando trámite: ${tramite.titulo}`);
    });

    rejilla.appendChild(col);
  });

  // Reinicializar iconos de Lucide para los nuevos elementos
  if (window.lucide) {
    window.lucide.createIcons();
  }
}

// Renderizado inicial
mostrarTramites(tramites);

// Lógica de búsqueda
entradaBusqueda.addEventListener("input", (e) => {
  const termino = e.target.value.toLowerCase().trim();

  botonLimpiar.hidden = termino.length === 0;

  const filtrados = tramites.filter((tramite) => {
    return (
      tramite.titulo.toLowerCase().includes(termino) ||
      tramite.descripcion.toLowerCase().includes(termino) ||
      tramite.palabrasClave.some((p) => p.includes(termino))
    );
  });

  mostrarTramites(filtrados);
});

botonLimpiar.addEventListener("click", () => {
  entradaBusqueda.value = "";
  botonLimpiar.hidden = true;
  mostrarTramites(tramites);
  entradaBusqueda.focus();
});

botonSugerencia.addEventListener("click", (e) => {
  e.preventDefault();
  entradaBusqueda.value = "becas";
  entradaBusqueda.dispatchEvent(new Event("input"));
});
