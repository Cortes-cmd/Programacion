document.addEventListener("DOMContentLoaded", function () {
    const fechaNacimiento = document.getElementById("fecha_nacimiento");
    const plan = document.getElementById("plan");
    const paquete = document.getElementById("paquete");
    const duracion = document.getElementById("duracion");

    function calcularEdad(fecha) {
        const hoy = new Date();
        const nacimiento = new Date(fecha);
        let edad = hoy.getFullYear() - nacimiento.getFullYear();
        const mes = hoy.getMonth() - nacimiento.getMonth();
        if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }
        return edad;
    }

    function aplicarRestricciones() {
        const edad = calcularEdad(fechaNacimiento.value);

        // Restricción: Menores de 18 años solo pueden contratar el Pack Infantil
        if (edad < 18) {
            paquete.value = "Infantil";
            paquete.disabled = true;
        } else {
            paquete.disabled = false;
        }

        // Restricción: Plan Básico solo permite un paquete adicional
        if (plan.value === "Básico") {
            if (paquete.value === "Deporte" || paquete.value === "Cine") {
                paquete.value = "Infantil";
            }
        }

        // Restricción: Pack Deporte solo con suscripción anual
        if (paquete.value === "Deporte") {
            duracion.value = "Anual";
            duracion.disabled = true;
        } else {
            duracion.disabled = false;
        }
    }

    fechaNacimiento.addEventListener("change", aplicarRestricciones);
    plan.addEventListener("change", aplicarRestricciones);
    paquete.addEventListener("change", aplicarRestricciones);
    duracion.addEventListener("change", aplicarRestricciones);

    aplicarRestricciones(); // Aplicar restricciones al cargar la página
});