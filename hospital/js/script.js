function validate()
{
 var error="";
 var name = document.getElementById( "fname" );
 if( name.value == "" )
 {
  error = " Vous devez écrire votre prenom. ";
  document.getElementById( "error_para1" ).innerHTML = error;
  return false;
 }else if (name.value) {
  document.getElementById( "error_para1" ).innerHTML = "";
 }
 var lname = document.getElementById( "lname" );
 if( lname.value == "" )
 {
  error = " Vous devez écrire votre nom. ";
  document.getElementById( "error_para2" ).innerHTML = error;
  return false;
 }else if (lname.value) {
  document.getElementById( "error_para2" ).innerHTML = "";
 }
 var uname = document.getElementById( "uname" );
 if( uname.value == "" )
 {
  error = " Vous devez entrer un nom d'utilisateur ";
  document.getElementById( "error_para3" ).innerHTML = error;
  return false;
 }else if (uname.value) {
  document.getElementById( "error_para3" ).innerHTML = "";
 }

 var email = document.getElementById( "email" );
 if( email.value == "" || email.value.indexOf( "@" ) == -1 )
 {
  error = " entrer un email valid ";
  document.getElementById( "error_para7" ).innerHTML = error;
  return false;
 }else if (email.value) {
  document.getElementById( "error_para7" ).innerHTML = "";
 }

 var password = document.getElementById( "pass" );
 if( password.value == "" || password.value >= 8 )
 {
  error = " Le mot de passe doit être supérieur ou égal à 8 chiffres. ";
  document.getElementById( "error_para5" ).innerHTML = error;
  return false;
 }else if (password.value) {
  document.getElementById( "error_para5" ).innerHTML = "";
 }
 var conf_pass = document.getElementById( "conf_pass" );
 if( conf_pass.value == "" || conf_pass.value >= 8)
 {
  error = " Le mot de passe doit être supérieur ou égal à 8 chiffres. ";
  document.getElementById( "error_para6" ).innerHTML = error;
  return false;
 }else if( password.value != conf_pass.value)
 {
  error = "confirmez le mot de passe !";
  document.getElementById( "error_para6" ).innerHTML = error;
  return false;
 }else if (conf_pass.value) {
  document.getElementById( "error_para6" ).innerHTML = "";
 }
 var phone = document.getElementById( "phone" );
 var phoneno = /^\d{10}$/;

 if( phone.value == "" || !phone.value.match(phoneno))
 {
  error = "entrez un numéro de téléphone valide";
  document.getElementById( "error_para4" ).innerHTML = error;
  return false;
 }else if (phone.value) {
  document.getElementById( "error_para4" ).innerHTML = "";
 }

 else
 {
  return true;
 }
}

function validate2()
{
 var err="";
 var n = document.getElementById( "f1" );
 if( n.value == "" )
 {
  err = " Vous devez écrire votre prenom. ";
  document.getElementById( "p1" ).innerHTML = err;
  return false;
 }else if (n.value) {
  document.getElementById( "p1" ).innerHTML = "";
 }
 var l = document.getElementById( "f2" );
 if( l.value == "" )
 {
  err = " Vous devez écrire votre nom. ";
  document.getElementById( "p2" ).innerHTML = err;
  return false;
 }else if (l.value) {
  document.getElementById( "p2" ).innerHTML = "";
 }
 var u = document.getElementById( "f3" );
 if( u.value == "" )
 {
  err = " Vous devez entrer un nom d'utilisateur ";
  document.getElementById( "p3" ).innerHTML = err;
  return false;
 }else if (u.value) {
  document.getElementById( "p3" ).innerHTML = "";
 }

 var e = document.getElementById( "f4" );
 if( e.value == "" || e.value.indexOf( "@" ) == -1 )
 {
  err = " entrer un email valid ";
  document.getElementById( "p4" ).innerHTML = err;
  return false;
 }else if (e.value) {
  document.getElementById( "p4" ).innerHTML = "";
 }

 var pa = document.getElementById( "f6" );
 if( pa.value == "" || pa.value >= 8 )
 {
  error = " Le mot de passe doit être supérieur ou égal à 8 chiffres. ";
  document.getElementById( "p6" ).innerHTML = err;
  return false;
 }else if (pa.value) {
  document.getElementById( "p6" ).innerHTML = "";
 }
 var conf_pa = document.getElementById( "f7" );
 if( conf_pa.value == "" || conf_pa.value >= 8)
 {
  err = " Le mot de passe doit être supérieur ou égal à 8 chiffres. ";
  document.getElementById( "p7" ).innerHTML = err;
  return false;
 }else if( pa.value != conf_pa.value)
 {
  err = "confirmez le mot de passe !";
  document.getElementById( "p7" ).innerHTML = err;
  return false;
 }else if (conf_pa.value) {
  document.getElementById( "p7" ).innerHTML = "";
 }
 var ph = document.getElementById( "f5" );
 var phoneno = /^\d{10}$/;

 if( ph.value == "" || !ph.value.match(phoneno))
 {
  err = "entrez un numéro de téléphone valide";
  document.getElementById( "p5" ).innerHTML = err;
  return false;
 }else if (ph.value) {
  document.getElementById( "p5" ).innerHTML = "";
 }
 
 else
 {
  return true;
 }
}