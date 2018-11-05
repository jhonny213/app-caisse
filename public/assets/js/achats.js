$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})


$('#prix input[type = text]').on('input',function() {
    var nombre = $(this).val();
    var idInput = this.id.split('d');


    var numbers = /^\$?\d+(,\d*)*(\.\d*)?$/;

    if (nombre.match(numbers) || nombre.length == 0) {
        $('#alert').removeClass('alert');
        $('#alert').removeClass('alert-danger');
        $('#alert').html('');
    }
    else {
        $('#alert').removeClass('alert');
        $('#alert').removeClass('alert-danger');
        $('#alert').html('');

        $('#alert').addClass('alert');
        $('#alert').addClass('alert-danger');
        $('#alert').append("<p>La valeur n'est pas numérique</p>");
    }
});