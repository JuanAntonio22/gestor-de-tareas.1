document.addEventListener('DOMContentLoaded', () {
    //declarasion d ela variable
    const entadaTarea = document.getElementById('entrada-tarea');
    const btnAgregar = document.getElementById('btn-agregar');
    const listaTareas = document.getElementById('lista-tareas');

    //funcion para agregar tarea
    async function cargarTarea() {
        try {
            const response = await fetch('backend/obtener.php');
            const tareas = await response.json();

            if (data.success && data.tareas) {
                listaTareas.innerHTML = '';
                data.tareas.forEach(tarea => {
                    
                }
            }
        }
    }
});