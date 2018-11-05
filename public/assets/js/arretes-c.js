$('#arrete input[type = text]').on('input',function(){
    var nombre = $(this).val();
    var idInput = this.id.split('d');


    var numbers = /^[0-9]+$/;

    if (nombre.match(numbers) || nombre.length == 0){
            $('#alert').removeClass('alert');
            $('#alert').removeClass('alert-danger');
            $('#alert').html('');
            $("input").not('.montant').removeAttr('disabled');
            var montant = nombre * idInput[0];
            $('#m_'+idInput).val(montant);
    }
    else {
            $('#m_' + idInput).val(0);
            $('#alert').removeClass('alert');
            $('#alert').removeClass('alert-danger');
            $('#alert').html('');

            $('#alert').addClass('alert');
            $('#alert').addClass('alert-danger');
            $('#alert').append("<p>La valeur n'est pas numérique</p>");
            $("input").attr('disabled', 'disabled');
            $(this).removeAttr('disabled');
    }

    var pieceBillet = {'m_1': 1, 'm_2': 2, 'm_5' :5, 'm_10' :10, 'm_20' :20, 'm_50' :50, 'm_100' :100,
        'm_200' :200, 'm_500' :500, 'm_1000' :1000, 'm_2000' :2000};
    Physique = 0;
    $.each(pieceBillet, function(key, val){
        if(nombre.match(numbers) || nombre.length == 0){
            Physique = Physique + + $('#'+key).val();
           // alert($('#'+key).val())
        }

    })
    
   $('#sold_Physique').val(Physique);
    var Brouillard = $('#sold_Brouillard').val();
    var posetif = Physique - Brouillard;
    $("#sold_posetif").val(posetif)
});
