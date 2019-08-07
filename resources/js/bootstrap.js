
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
* Cargaremos jQuery y el complemento Bootstrap jQuery, que brinda soporte 
* para funciones de Bootstrap basadas en JavaScript, como modales y pestañas.
* Este código puede ser modificado para ajustarse a las necesidades específicas
* de su aplicación.
*/
// JQuery 
try {
    window.$ = window.jQuery = require('jquery');

    // omitiremos el uso completo de bootstrap temporalmente
    //require('bootstrap'); 
} catch (e) {}  

/**
* Vue es una biblioteca moderna de JavaScript para construir interfaces web 
* interactivas utilizando componentes de enlace reactivo de datos y reutilizables.
* La API de Vue está limpia y simple, dejándote enfocado en construir tu próximo
* gran proyecto.
*/
// Vue 
window.Vue = require('vue');

/**
* Cargaremos la biblioteca HTTP axios que nos permite emitir fácilmente solicitudes
* a nuestro back-end de Laravel. Esta biblioteca se encarga automáticamente de enviar 
* el CSRF token como un encabezado basado en el valor de la cookie token "XSRF".
*/
// Axios 
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * A continuación, registraremos el token CSRF como un encabezado común con 
 * Axios para que todas las solicitudes HTTP salientes lo tienen adjunto 
 * automáticamente. Esto es simplemente una comodidad simple para que no tengamos
 * que adjuntar todos los tokens de forma manual.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/*
* Cargaremos una biblioteca Javascript para notificaciones sin bloqueo. 
* jQuery es un requisito obligatorio. 
*/
window.toastr = require('toastr');

/*
* Cargaremos una biblioteca para analizar, validar, manipular y mostrar fechas y horas
* en JavaScript. 
*/
window.moment = require('moment');

/* Cargaremos un plugin para manejar eventos de calendario 'Fullcalendar' */
require('fullcalendar');

/**
* Echo expone una API expresiva para suscribirse a canales y escuchar para eventos
* transmitidos por Laravel. Transmisión de eco y eventos, permite a su equipo crear
* fácilmente aplicaciones web robustas en tiempo real.
*/

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });