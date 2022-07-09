define([
    "jquery"
], function($){
        "use strict";
        return function(config, element) {
            //debugger;
            //alert(config.message);
            element.innerText = 'carga modulo hello, en div.id -> ' + element.id ;
        }
    }
)
