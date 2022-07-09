define([
    "jquery",
    'jquery/ui'
], function($){
        "use strict";
        //dentro del widget1
        console.log('carga widget1');
        $.widget( "custom.progressbar1", {
            options: {
                items:{
                    optionOne: '',
                    optionTwo: '',
                }
            },
            _create: function() {
debugger;
            console.log('widget created');
            console.log(this.element);
            console.log(this.options);
            $('#'+this.element[0].id).text( JSON.stringify(this.options.items));
            },

        });

        return $.custom.progressbar1;
        //return $.progressbar1;

    }
)
