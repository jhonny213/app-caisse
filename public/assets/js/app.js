var hrefTab = window.location.pathname
var idTab = hrefTab.split("/");
if(idTab[1] == ""){
    idTab[1] = 'caisses';
}
//alert(idTab[1]);

idDiv = "#"+idTab[1];

$("div").removeClass('active')
$("div").removeClass('show')
$(idDiv).addClass('active')
$(idDiv).addClass('show')


$("a").removeClass('active');

$("a[href$='']").addClass('active');
$("a[href$='"+idTab[1]+"']").addClass('active');


$(".nav-link").on("click", function() {
    //var hrefTab = this.href.split("#");
    //idTab = "#"+hrefTab[1]
    //alert(hrefTab[1])
});
