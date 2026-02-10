const tramites = [
    {
        id: 1,
        titulo: "Grado de Discapacidad",
        descripcion: "Reconocimiento, calificación y valoración del grado de discapacidad en Andalucía.",
        palabrasClave: ["discapacidad", "minusvalia", "grado", "dependencia"]
    },
    {
        id: 2,
        titulo: "Familia Numerosa",
        descripcion: "Expedición, renovación y modificación del título de familia numerosa.",
        palabrasClave: ["familia", "numerosa", "titulo", "descuento"]
    },
    {
        id: 3,
        titulo: "Beca 6000",
        descripcion: "Ayudas para alumnado que curse bachillerato o ciclos formativos de grado medio.",
        palabrasClave: ["beca", "ayuda", "estudiar", "dinero"]
    },
    {
        id: 4,
        titulo: "Renovar Demanda de Empleo",
        descripcion: "Acceso directo a la oficina virtual del SAE para renovar el paro.",
        palabrasClave: ["empleo", "paro", "trabajo", "renovar"]
    },
    {
        id: 5,
        titulo: "Parejas de Hecho",
        descripcion: "Inscripción en el registro de parejas de hecho de la comunidad autónoma.",
        palabrasClave: ["boda", "pareja", "hecho", "registro"]
    },
    {
        id: 6,
        titulo: "Licencia de Caza o Pesca",
        descripcion: "Obtención de las licencias necesarias para actividades cinegéticas o de pesca.",
        palabrasClave: ["caza", "pesca", "escopeta", "rio"]
    }
];

const rejilla = document.getElementById('rejilla-tramites');
const entradaBusqueda = document.getElementById('buscador-tramites');
const sinResultados = document.getElementById('sin-resultados');
const botonLimpiar = document.getElementById('boton-limpiar');
const botonSugerencia = document.getElementById('boton-sugerencia');

function mostrarTramites(datos) {
    rejilla.innerHTML = '';
    
    if (datos.length === 0) {
        sinResultados.hidden = false;
        return;
    }

    sinResultados.hidden = true;
    
    datos.forEach(tramite => {
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta';
        tarjeta.tabIndex = 0; // Accesible por teclado
        tarjeta.innerHTML = `
            <div>
                <h3>${tramite.titulo}</h3>
                <p>${tramite.descripcion}</p>
            </div>
            <div class="pie-tarjeta">
                Iniciar trámite <span>&rarr;</span>
            </div>
        `;
        
        tarjeta.addEventListener('click', () => alert(`Iniciando trámite: ${tramite.titulo}`));
        tarjeta.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') alert(`Iniciando trámite: ${tramite.titulo}`);
        });

        rejilla.appendChild(tarjeta);
    });
}

// Renderizado inicial
mostrarTramites(tramites);

// Lógica de búsqueda
entradaBusqueda.addEventListener('input', (e) => {
    const termino = e.target.value.toLowerCase().trim();
    
    botonLimpiar.hidden = termino.length === 0;

    const filtrados = tramites.filter(tramite => {
        return tramite.titulo.toLowerCase().includes(termino) || 
               tramite.descripcion.toLowerCase().includes(termino) ||
               tramite.palabrasClave.some(p => p.includes(termino));
    });

    mostrarTramites(filtrados);
});

botonLimpiar.addEventListener('click', () => {
    entradaBusqueda.value = '';
    botonLimpiar.hidden = true;
    mostrarTramites(tramites);
    entradaBusqueda.focus();
});

botonSugerencia.addEventListener('click', (e) => {
    e.preventDefault();
    entradaBusqueda.value = 'ayuda';
    entradaBusqueda.dispatchEvent(new Event('input'));
});
