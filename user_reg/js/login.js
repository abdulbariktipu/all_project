// https://selimdoyranli.com
// https://www.RadKod.com

$(document).ready(function(){

//Kaydol - Sifre Unuttum Linkleri Arasi Ge�is
$(document).ready(function(){
$("#kayit-form").hide();
$("#sifre-hatirlat-form").hide();	
$(".hesap-olustur-link").click(function(e){
$("#login-form").slideUp(0);	
$("#kayit-form").fadeIn(300);	
});

$(".zaten-hesap-var-link").click(function(e){
$("#kayit-form").slideUp(0);
$("#sifre-hatirlat-form").slideUp(0);	
$("#login-form").fadeIn(300);	
});

$(".sifre-hatirlat-link").click(function(e){
$("#login-form").slideUp(0);	
$("#sifre-hatirlat-form").fadeIn(300);	
});
});

});