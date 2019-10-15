$('#region').on('change', onSelectRegion);
function onSelectRegion(){

    valueDefault = "todas";
    var region_id = $(this).val();

    if ($(this).val() == "todas") {
        $.get('/region/delegaciones', function(data){
            
            $('#delegacion').empty();
            var no = 1;
            for (var i = 0; i < data.length; ++i)
            
                $('#delegacion').append( '<tr>'+[
                    
                    "<td>" + no++ + "</td>",
                    "<td>" + data[i].nomenclatura + data[i].numero + "</td>",
                    "<td>" + data[i].delegacion + "</td>",
                    "<td>" + data[i].nivel_educativo + "</td>",
                    "<td>" + data[i].region + " " + data[i].sede +"</td>",
                    '<td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$key+1}}" data-whatever="@getbootstrap"><i class="fa fa-edit fa-1x"></i></button></td>'
                ]+'</tr>');
                
        return;
        });
    } else if ($(this).val() != "todas") {
        var region_id = $(this).val();
        
        $.get('/region/'+region_id+'/delegaciones', function(data){
            $('#delegacion').empty();
            var no = 1;
            for (var i = 0; i < data.length; ++i)
                $('#delegacion').append( '<tr>'+[
                    
                    "<td>" + no++ + "</td>",
                    "<td>" + data[i].nomenclatura + data[i].numero + "</td>",
                    "<td>" + data[i].delegacion + "</td>",
                    "<td>" + data[i].nivel_educativo + "</td>",
                    "<td>" + data[i].region + " " + data[i].sede +"</td>",
                    "<td>" +
                        '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$key+1}}" data-whatever="@getbootstrap">' +
                            '<i class="fa fa-edit fa-1x"></i>' +
                        '</button>' +
                    "</td>",


                    "<td>" ,
                        '<form method="post" action="{{route("borrar.delegacion,[])}}">' ,
                            '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$key+1}}" data-whatever="@getbootstrap">' +
                                '<i class="fa fa-edit fa-1x"></i>' +
                            '</button>' +
                        '</form>' +
                    "</td>"                    


                    ]+'</tr>');
            return;
        });
    }
};
