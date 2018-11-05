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