define([
    "jquery",
    'Sacsi_Formulario/js/grupo2/mimodulo2'
], function($,mimodulo2){
        "use strict";
        debugger;

        return function(config, element) {
            //dentro del modulo 1
            console.log('carga mimodulo1 con dependencia del 2');
            $(element).text('carga mimodulo1 con dependencia del 2')
debugger;
            console.log(mimodulo2);
            //alert(config.message + ' div.id: ' + element.id);
        }
    }
)
