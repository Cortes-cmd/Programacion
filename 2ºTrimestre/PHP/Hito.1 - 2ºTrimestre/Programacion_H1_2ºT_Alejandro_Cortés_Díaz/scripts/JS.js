// Busco los elementos del archivo HTML ya sea alta o editar para poder manipularlos
// Se busca el elemento por su id y se guarda en una variable que se usará más adelante
const edad_ = document.getElementById('edad');
const paquetes = document.querySelectorAll('select[name="Paquetes"] option');
const paquetesExtra = document.getElementById('PaquetesExtra');
const lable = document.getElementById('PaquetesExtraL');
const planBase = document.getElementById('PlanBase');

// Agrego un evento a edad, para que cuando se escriba algo en el input proceda la función que se encuentra dentro del addEventListener
edad_.addEventListener('input', () => {
  const edad = parseInt(edad_.value, 10);

  // Se recorre el array de paquetes para ver si la edad es menor a 18 años
  if (edad < 18) {
    paquetes.forEach(paquete => {
      // Si la edad es menor a 18 años entonces únicamente se mostrará el Infantil
      if (paquete.value === 'Infantil') {
        paquete.hidden = false;
        paquetesExtra.hidden = true;
        paquetesExtra.value = 'paqueteExtra';
        lable.hidden = true;
        //Sino
      } else {
        paquete.hidden = true;
      }
    });
  } else {
    // Si la edad es mayor o igual a 18 años mostramos todos los paquetes
    paquetes.forEach(paquete => paquete.hidden = false);
    mostrarPaquetesExtra(); // Llamo a la función para mostrar los paquetes extra
  }
});

// En esta función se verifica que si el Plan Base es Estandar o Premium, y así, se muestren los paquetes extra
function mostrarPaquetesExtra() {
  const seleccion = planBase.options[planBase.selectedIndex].value;
  const edad = parseInt(edad_.value, 10);

  // Si la edad es mayor o igual a 18 años y el plan base es Estandar o Premium, entonces se mostrarán los paquetes extra
  if (edad >= 18 && (seleccion === 'Estandar' || seleccion === 'Premium')) {
    paquetesExtra.hidden = false;
    paquetesExtra.disabled = false;
    lable.hidden = false;
    // Si no se cumple la condición anterior, se ocultan los paquetes extra.
  } else {
    paquetesExtra.hidden = true;
    paquetesExtra.disabled = true;
    lable.hidden = true;
    paquetesExtra.value = 'paqueteExtra'; // Cambio el valor si se oculta
  }
}

// Creo una función para desactivar Mensual si seleccionamos un paquete que ya se haya seleccionado en los paquetes normales
// o, en aquellos extra que sea deporte.
function desactivarOpciones() {
  const select = document.getElementById('Paquetes');
  const selectExtra = document.getElementById('PaquetesExtra');
  const Duraciones = document.getElementById('Duracion').options;

  for (let i = 0; i < Duraciones.length; i++) {
    const Duracion = Duraciones[i];
    // Si se selecciona como paquete, Deporte, se desactivará la opción de Mensual
    if ((select.value && select.value.includes('Deporte')) || 
        (selectExtra.value && selectExtra.value.includes('Deporte'))) {
      if (Duracion.value === 'Mensual') {
        Duracion.hidden = true;
        Duracion.disabled = true;
        Duracion.selected = false;
        // Si la duración se mantiene commo Anual, entonces así se mantendrá
      } else if (Duracion.value === 'Anual') {
        Duracion.selected = true;
      }
    } else {
      Duracion.hidden = false;
      Duracion.disabled = false;
    }
  }

  // Establecer el valor de Duración a 'Anual' si se selecciona un paquete que contiene 'Deporte'
  if ((select.value && select.value.includes('Deporte')) || 
      (selectExtra.value && selectExtra.value.includes('Deporte'))) {
    document.getElementById('Duracion').value = 'Anual';
  }
}

// Esta función desactiva los paquetes duplicados teniendo en cuenta los ya marcados en los paquetes normales
function desactivarDuplicados() {
  const selectExtra = document.getElementById('PaquetesExtra').options;
  const select = document.getElementById('Paquetes').value;

  // Si el paquete seleccionado  es Deporte, Cine o Infantil, se oculta la misma opción en dentro de los extras
  for (let i = 0; i < selectExtra.length; i++) {
    const paquete = selectExtra[i];
    if (select === 'Deporte' && (paquete.value === 'Deporte' || paquete.value.includes('Deporte'))) {
      paquete.disabled = true;
      paquete.hidden = true;
    } else if (select === 'Cine' && (paquete.value === 'Cine' || paquete.value.includes('Cine'))) {
      paquete.disabled = true;
      paquete.hidden = true;
    } else if (select === 'Infantil' && (paquete.value === 'Infantil' || paquete.value.includes('Infantil'))) {
      paquete.disabled = true;
      paquete.hidden = true;
    } else {
      paquete.disabled = false;
      paquete.hidden = false;
    }
  }
}

//Esta funcion calcula el total de la suscripción teniendo en cuenta el valor individual de cada plan y paquete
function calcularTotal() {
  const planBase = document.getElementById('PlanBase').value;
  const paqueteAdicional = document.getElementById('Paquetes').value;
  const paqueteAdicionalExtra = document.getElementById('PaquetesExtra').value;
  const Duracion = document.getElementById('Duracion').value;

  //Precios de los planes y paquetes.
  const precios = {
    //Planes Bases:
    'Basico': 9.99,
    'Estandar': 13.99,
    'Premium': 17.99,
    //Paquetes Adicionales:
    'Deporte': 6.99,
    'Cine': 7.99,
    'Infantil': 4.99,
    //Paquetes Adicionales Extras:
    'Deporte,Cine': 14.98,
    'Cine,Infantil': 12.98,
    'Infantil,Deporte': 11.98,
    //Aquí, si no se selecciona nada, entonces se asigna el valor 0
    'paqueteExtra': 0 
  };
//Se calcula el total de la suscripción
  let total = (precios[planBase] || 0) + (precios[paqueteAdicional] || 0) + (precios[paqueteAdicionalExtra] || 0);
//Si la suscripción es Anual se multiplica por 12
  if (Duracion === 'Anual') {
    total *= 12;
  }
//Se muestra el total en el html
  document.getElementById('total').innerText = `Total: €${total.toFixed(2)}`;
}
//Se agrega un evento via id, a los elementos, para que cuando se seleccione algo se ejecute la función
document.getElementById('PlanBase').addEventListener('change', calcularTotal);
document.getElementById('Paquetes').addEventListener('change', calcularTotal);
document.getElementById('PaquetesExtra').addEventListener('change', calcularTotal);
document.getElementById('Duracion').addEventListener('change', calcularTotal);


//Esta función acciona las funciones de desactivarOpciones y desactivarDuplicados que se encuentran más arriba del código
function globalOpciones(){
  desactivarOpciones();
  desactivarDuplicados();
}

