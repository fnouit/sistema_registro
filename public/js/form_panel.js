$(document).ready(function(){
    $('#btn_delegacion').click(function(){
        var error_delegacion = '';
        var error_nivel = '';
        var error_sede = '';

        if ($.trim($('#delegacion').val()).length == 0) {
            error_delegacion = 'Es necesario registrar una delegación';
            $('#error_delegacion').text(error_delegacion);
            $('#delegacion').addClass('has-error');
        } else {
            error_delegacion = '';
            $('#error_delegacion').text(error_delegacion);
            $('#delegacion').removeClass('has-error');
        }
        
        /* error nivel */
        if ($.trim($('#nivel').val()).length == 0) {
            error_nivel = 'A que nivel educativo pertenece';
            $('#error_nivel').text(error_nivel);
            $('#nivel').addClass('has-error');
        } else {
            error_nivel = '';
            $('#error_nivel').text(error_nivel);
            $('#nivel').removeClass('has-error');
        }

        /* error sede */
        if ($.trim($('#sede').val()).length == 0) {
            error_sede = '¿Cúal es su sede?';
            $('#error_sede').text(error_sede);
            $('#sede').addClass('has-error');
        } else {
            error_sede = '';
            $('#error_sede').text(error_sede);
            $('#sede').removeClass('has-error');
        }


        if (error_delegacion != '' || error_nivel != '' || error_sede != ''){
            return false
        } else {
            $('#list_detalle_delegacion').removeClass('active active_tab1');
            $('#list_detalle_delegacion').removeAttr('href data-toggle');
            
            $('#detalle_delegacion').removeClass('active');
            $('#detalle_delegacion').addClass('fade');
            $('#list_detalle_delegacion').addClass('inactive_tab1');

            $('#list_detalle_representante').removeClass('inactive_tab1');
            $('#list_detalle_representante').addClass('active active_tab1');

            $('#list_detalle_representante').attr('href','#detalle_representante');
            $('#list_detalle_representante').attr('data-toggle', 'tab');

            $('#detalle_representante').removeClass('fade');
            $('#detalle_representante').addClass('active in');            
        }



    });

    $('#anterior_btn_delegacion').click(function(){
        $('#list_detalle_representante').removeClass('active active_tab1');
        $('#list_detalle_representante').removeAttr('href data-toggle');
        
        $('#detalle_representante').removeClass('active');
        $('#detalle_representante').addClass('fade');
        $('#list_detalle_representante').addClass('inactive_tab1');

        $('#list_detalle_delegacion').removeClass('inactive_tab1');
        $('#list_detalle_delegacion').addClass('active active_tab1');

        $('#list_detalle_delegacion').attr('href','#detalle_delegacion');
        $('#list_detalle_delegacion').attr('data-toggle', 'tab');

        $('#detalle_delegacion').removeClass('fade');
        $('#detalle_delegacion').addClass('active in');            

    });

    $('#btn_representante').click(function(){
        var error_rp_n = '';
        var error_rp_ap = '';


        if ($.trim($('#rp_n').val()).length == 0) {
            error_rp_n = 'Es necesario un nombre';
            $('#error_rp_n').text(error_rp_n);
            $('#rp_n').addClass('has-error');
        } else {
            error_rp_n = '';
            $('#error_rp_n').text(error_rp_n);
            $('#rp_n').removeClass('has-error');
        }
        
        /* error rp_ap */
        if ($.trim($('#rp_ap').val()).length == 0) {
            error_rp_ap = 'El apellido es requerido';
            $('#error_rp_ap').text(error_rp_ap);
            $('#rp_ap').addClass('has-error');
        } else {
            error_rp_ap = '';
            $('#error_rp_ap').text(error_rp_ap);
            $('#rp_ap').removeClass('has-error');
        }

        if (error_rp_n != '' || error_rp_ap != ''){
            return false
        } else {
            $('#list_detalle_representante').removeClass('active active_tab1');
            $('#list_detalle_representante').removeAttr('href data-toggle');
            
            $('#detalle_representante').removeClass('active');
            $('#detalle_representante').addClass('fade');
            $('#list_detalle_representante').addClass('inactive_tab1');

            $('#list_detalle_suplente').removeClass('inactive_tab1');
            $('#list_detalle_suplente').addClass('active active_tab1');

            $('#list_detalle_suplente').attr('href','#detalle_suplente');
            $('#list_detalle_suplente').attr('data-toggle', 'tab');

            $('#detalle_suplente').removeClass('fade');
            $('#detalle_suplente').addClass('active in');      
        }      
    });

    $('#anterior_btn_representante').click(function(){
        $('#list_detalle_suplente').removeClass('active active_tab1');
        $('#list_detalle_suplente').removeAttr('href data-toggle');
        
        $('#detalle_suplente').removeClass('active');
        $('#detalle_suplente').addClass('fade');
        $('#list_detalle_suplente').addClass('inactive_tab1');

        $('#list_detalle_representante').removeClass('inactive_tab1');
        $('#list_detalle_representante').addClass('active active_tab1');

        $('#list_detalle_representante').attr('href','#detalle_representante');
        $('#list_detalle_representante').attr('data-toggle', 'tab');

        $('#detalle_representante').removeClass('fade');
        $('#detalle_representante').addClass('active in');            

    });

    $('#btn_suplente').click(function(){
        var error_sp_n = '';
        var error_sp_ap = '';

        if ($.trim($('#sp_n').val()).length == 0) {
            error_sp_n = 'Es necesario un nombre';
            $('#error_sp_n').text(error_sp_n);
            $('#sp_n').addClass('has-error');
        } else {
            error_sp_n = '';
            $('#error_sp_n').text(error_sp_n);
            $('#sp_n').removeClass('has-error');
        }
        
        /* error sp_ap */
        if ($.trim($('#sp_ap').val()).length == 0) {
            error_sp_ap = 'El apellido es requerido';
            $('#error_sp_ap').text(error_sp_ap);
            $('#sp_ap').addClass('has-error');
        } else {
            error_sp_ap = '';
            $('#error_sp_ap').text(error_sp_ap);
            $('#sp_ap').removeClass('has-error');
        }


        if (error_sp_n != '' || error_sp_ap != ''){
            return false
        } else {            
            $('#list_detalle_suplente').removeClass('active active_tab1');
            $('#list_detalle_suplente').removeAttr('href data-toggle');
            
            $('#detalle_suplente').removeClass('active');
            $('#detalle_suplente').addClass('fade');
            $('#list_detalle_suplente').addClass('inactive_tab1');

            $('#list_detalle_integrantes01').removeClass('inactive_tab1');
            $('#list_detalle_integrantes01').addClass('active active_tab1');

            $('#list_detalle_integrantes01').attr('href','#detalle_integrantes01');
            $('#list_detalle_integrantes01').attr('data-toggle', 'tab');

            $('#detalle_integrantes01').removeClass('fade');
            $('#detalle_integrantes01').addClass('active in');  
        }          
    });

    $('#anterior_btn_suplente').click(function(){
        $('#list_detalle_integrantes01').removeClass('active active_tab1');
        $('#list_detalle_integrantes01').removeAttr('href data-toggle');
        
        $('#detalle_integrantes01').removeClass('active');
        $('#detalle_integrantes01').addClass('fade');
        $('#list_detalle_integrantes01').addClass('inactive_tab1');

        $('#list_detalle_suplente').removeClass('inactive_tab1');
        $('#list_detalle_suplente').addClass('active active_tab1');

        $('#list_detalle_suplente').attr('href','#detalle_suplente');
        $('#list_detalle_suplente').attr('data-toggle', 'tab');

        $('#detalle_suplente').removeClass('fade');
        $('#detalle_suplente').addClass('active in');            

    });

    $('#btn_integrantes01').click(function(){
        var error_in1_n = '';
        var error_in1_ap = '';

        var error_in2_n = '';
        var error_in2_ap = '';

        var error_in3_n = '';
        var error_in3_ap = '';


        /* error integrante 1 */
        if ($.trim($('#in1_n').val()).length == 0) {
            error_in1_n = 'Ingresa un nombre';
            $('#error_in1_n').text(error_in1_n);
            $('#in1_n').addClass('has-error');
        } else {
            error_in1_n = '';
            $('#error_in1_n').text(error_in1_n);
            $('#in1_n').removeClass('has-error');
        }
        
        if ($.trim($('#in1_ap').val()).length == 0) {
            error_in1_ap = 'El apellido es requerido';
            $('#error_in1_ap').text(error_in1_ap);
            $('#in1_ap').addClass('has-error');
        } else {
            error_in1_ap = '';
            $('#error_in1_ap').text(error_in1_ap);
            $('#in1_ap').removeClass('has-error');
        }


        /* error integrante 2 */
        if ($.trim($('#in2_n').val()).length == 0) {
            error_in2_n = 'Ingresa un nombre';
            $('#error_in2_n').text(error_in2_n);
            $('#in2_n').addClass('has-error');
        } else {
            error_in2_n = '';
            $('#error_in2_n').text(error_in2_n);
            $('#in2_n').removeClass('has-error');
        }
        
        if ($.trim($('#in2_ap').val()).length == 0) {
            error_in2_ap = 'El apellido es requerido';
            $('#error_in2_ap').text(error_in2_ap);
            $('#in2_ap').addClass('has-error');
        } else {
            error_in2_ap = '';
            $('#error_in2_ap').text(error_in2_ap);
            $('#in2_ap').removeClass('has-error');
        }


        /* error integrante 3 */
        if ($.trim($('#in3_n').val()).length == 0) {
            error_in3_n = 'Ingresa un nombre';
            $('#error_in3_n').text(error_in3_n);
            $('#in3_n').addClass('has-error');
        } else {
            error_in3_n = '';
            $('#error_in3_n').text(error_in3_n);
            $('#in3_n').removeClass('has-error');
        }
        
        if ($.trim($('#in3_ap').val()).length == 0) {
            error_in3_ap = 'El apellido es requerido';
            $('#error_in3_ap').text(error_in3_ap);
            $('#in3_ap').addClass('has-error');
        } else {
            error_in3_ap = '';
            $('#error_in3_ap').text(error_in3_ap);
            $('#in3_ap').removeClass('has-error');
        }





        if (error_in1_n != '' || error_in1_ap != '' || error_in2_n != '' || error_in2_ap != '' || error_in3_n != '' || error_in3_ap != '' ){
            return false
        } else {            
            $('#list_detalle_integrantes01').removeClass('active active_tab1');
            $('#list_detalle_integrantes01').removeAttr('href data-toggle');
            
            $('#detalle_integrantes01').removeClass('active');
            $('#detalle_integrantes01').addClass('fade');
            $('#list_detalle_integrantes01').addClass('inactive_tab1');

            $('#list_detalle_integrantes02').removeClass('inactive_tab1');
            $('#list_detalle_integrantes02').addClass('active active_tab1');

            $('#list_detalle_integrantes02').attr('href','#detalle_integrantes02');
            $('#list_detalle_integrantes02').attr('data-toggle', 'tab');

            $('#detalle_integrantes02').removeClass('fade');
            $('#detalle_integrantes02').addClass('active in');    
        }        
    });

    $('#anterior_btn_integrantes01').click(function(){
        $('#list_detalle_integrantes02').removeClass('active active_tab1');
        $('#list_detalle_integrantes02').removeAttr('href data-toggle');
        
        $('#detalle_integrantes02').removeClass('active');
        $('#detalle_integrantes02').addClass('fade');
        $('#list_detalle_integrantes02').addClass('inactive_tab1');

        $('#list_detalle_integrantes01').removeClass('inactive_tab1');
        $('#list_detalle_integrantes01').addClass('active active_tab1');

        $('#list_detalle_integrantes01').attr('href','#detalle_integrantes01');
        $('#list_detalle_integrantes01').attr('data-toggle', 'tab');

        $('#detalle_integrantes01').removeClass('fade');
        $('#detalle_integrantes01').addClass('active in');            

    });

    $('#btn_guardar').click(function(){
        var error_in4_n = '';
        var error_in4_ap = '';

        var error_in5_n = '';
        var error_in5_ap = '';

        var error_in6_n = '';
        var error_in6_ap = '';


        /* error integrante 4 */
        if ($.trim($('#in4_n').val()).length == 0) {
            error_in4_n = 'Ingresa un nombre';
            $('#error_in4_n').text(error_in4_n);
            $('#in4_n').addClass('has-error');
        } else {
            error_in4_n = '';
            $('#error_in4_n').text(error_in4_n);
            $('#in4_n').removeClass('has-error');
        }
        
        if ($.trim($('#in4_ap').val()).length == 0) {
            error_in4_ap = 'El apellido es requerido';
            $('#error_in4_ap').text(error_in4_ap);
            $('#in4_ap').addClass('has-error');
        } else {
            error_in4_ap = '';
            $('#error_in4_ap').text(error_in4_ap);
            $('#in4_ap').removeClass('has-error');
        }


        /* error integrante 5 */
        if ($.trim($('#in5_n').val()).length == 0) {
            error_in5_n = 'Ingresa un nombre';
            $('#error_in5_n').text(error_in5_n);
            $('#in5_n').addClass('has-error');
        } else {
            error_in5_n = '';
            $('#error_in5_n').text(error_in5_n);
            $('#in5_n').removeClass('has-error');
        }
        
        if ($.trim($('#in5_ap').val()).length == 0) {
            error_in5_ap = 'El apellido es requerido';
            $('#error_in5_ap').text(error_in5_ap);
            $('#in5_ap').addClass('has-error');
        } else {
            error_in5_ap = '';
            $('#error_in5_ap').text(error_in5_ap);
            $('#in5_ap').removeClass('has-error');
        }


        /* error integrante 6 */
        if ($.trim($('#in6_n').val()).length == 0) {
            error_in6_n = 'Ingresa un nombre';
            $('#error_in6_n').text(error_in6_n);
            $('#in6_n').addClass('has-error');
        } else {
            error_in6_n = '';
            $('#error_in6_n').text(error_in6_n);
            $('#in6_n').removeClass('has-error');
        }
        
        if ($.trim($('#in6_ap').val()).length == 0) {
            error_in6_ap = 'El apellido es requerido';
            $('#error_in6_ap').text(error_in6_ap);
            $('#in6_ap').addClass('has-error');
        } else {
            error_in6_ap = '';
            $('#error_in6_ap').text(error_in6_ap);
            $('#in6_ap').removeClass('has-error');
        }





        if (error_in4_n != '' || error_in4_ap != '' || error_in5_n != '' || error_in5_ap != '' || error_in6_n != '' || error_in6_ap != '' ){
            return false
        } else {            
            $('#registro_form').submit();
        }        
    });

});