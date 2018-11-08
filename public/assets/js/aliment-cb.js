// calculé le nouvelle solde  en ecrit dans input
$('#fonds').on('input',function(){
    var old_fonds = $('#old_fonds').val();
    var fonds = $('#fonds').val();

    newSold = +fonds +  +old_fonds
    $('#new_fonds').val(newSold);

    if(fonds < 0){
        alert('valeur non valide')
        $('#fonds').val(0);
    }
});

//edit
$('#new_fonds-edit').val(+$('#fonds-edit').val() + +$('#old_fonds-edit').val());
$('#fonds-edit').on('input',function(){
    $('#alert').removeClass('alert');
    $('#alert').removeClass('alert-danger');
    $('#alert').html('');

    var old_fonds = $('#old_fonds-edit').val();
    var fonds = $('#fonds-edit').val();

    newSold = +fonds +  +old_fonds
    $('#new_fonds-edit').val(newSold);

    if(fonds < 0){
        $('#alert').addClass('alert');
        $('#alert').addClass('alert-danger');
        $('#alert').append('valeur non valide');
        $('#fonds-edits').val(0);
    }
});