var hrefTab = window.location.pathname
var idTab = hrefTab.split("/");
if(idTab[1] == ""){
    idTab[1] = 'alimentecaisse';
}

//alert(idTab[1]);
if(idTab[1] == 'alimentecaisse' || idTab[1] == 'arretecaisse'){

    idTab[1] = 'caisse';
}
if(idTab[1] == 'alimentebanque' || idTab[1] == 'arretebanque'){

    idTab[1] = 'banque';
}
idDiv = "#"+idTab[1];

$("div").removeClass('active')
$("div").removeClass('show')

$(idDiv).addClass('active')
$(idDiv).addClass('show')


$("a").removeClass('active');

$("a[href$='']").addClass('active');
if(idTab.length == 2){
    $("a[href$='"+idTab[1]+"']").addClass('active');
}
if(idTab.length == 3){
    $("a[href$='"+idTab[1]+"/"+idTab[2]+"']").addClass('active');
}
if(idTab.length == 4){
    $("a[href$='"+idTab[1]+"/"+idTab[2]+"/"+idTab[3]+"']").addClass('active');
}

