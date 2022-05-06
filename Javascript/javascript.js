function start() {
    var slideIndex = 1;
    currentSlide(1);
var x = document.getElementsByClassName("nascosta");
var i;
for (i = 0; i < x.length; i++) {
    x[i].style.display = "block";
}
showSlides(1);
}
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block"; 
    dots[slideIndex-1].className += " active";
}

function checkInput()
{
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;
    /*var datains = document.getElementById("datanascita").value;*/
    var username= document.getElementById("username").value;   
    var password=document.getElementById("password").value;
    var password2=document.getElementById("password2").value;
    var tel=document.getElementById("telefono").value;
    //Controlli sul nome :
    if ((nome === "") || (nome === "undefined"))
    {
            alert("campo nome illegale");
            document.campireg.nome.focus();
            return false;
    }
    //controlli sul cognome :
    if ((cognome === "")|| (cognome === "undefined"))
    {
            alert("campo cognome illegale");
            document.campireg.cognome.focus();
            return false;
    }
    //controlli sul telefono
    if((tel=="")||(tel=="undefined")){
            alert("campo telefono illegale");
            document.campireg.telefono.focus();
            return false;  
    }
    //controlli sullo username
    if ((username === "") || (username === "undefined"))
    {
            alert("campo username illegale");
            document.campireg.username.focus();
            return false;
    }
    //controlli sulla password
    if((password =="")||(password == "undefined")){
            alert("campo password illegale");
            document.campireg.password.focus();
            return false;	
    }
    if(password.length < 6){
      alert("password troppo corta, inserire password di lunghezza maggiore di 6");
      document.campireg.password.foucs();
      return false;
    }
    //AGGIUNGERE CONTROLLI SUI VINCOLI PASSWORD
    //controlli su conferma password
    if((password2 =="")||(password2 == "undefined")){
            alert("prego,confermare la password");
            document.campireg.password2.focus();
            return false;	
    }
    if(password2!=password){
	    alert("password non coincidenti");
            document.campireg.password2.focus();
            return false;	
    }
   /* //controlli sulla data di nascita inserita dall'utente
    if (document.campireg.datanascita.value.substring(2,3) != "/" ||
    document.campireg.datanascita.value.substring(5,6) != "/" ||
    isNaN(document.campireg.datanascita.value.substring(0,2)) ||
    isNaN(document.campireg.datanascita.value.substring(3,5)) ||
    isNaN(document.campireg.datanascita.value.substring(6,10))) 
    {
        alert("Inserire nascita in formato gg/mm/aaaa");
        document.campireg.datanascita.value = "";
        document.campireg.datanascita.focus();
        return false;
       
    } else if (document.campireg.datanascita.value.substring(0,2) > 31) 
    {
        alert("Impossibile utilizzare un valore superiore a 31 per i giorni");
        document.campireg.datanascita.select();
        return false;
    
    } else if (document.campireg.datanascita.value.substring(3,5) > 12) 
    {
        alert("Impossibile utilizzare un valore superiore a 12 per i mesi");
        document.campireg.datanascita.value = "";
        document.campireg.datanascita.focus();
        return false;
    
    } else if (document.campireg.datanascita.value.substring(6,10) < 1900) 
    {
        alert("Impossibile utilizzare un valore inferiore a 1900 per l'anno");
        document.campireg.datanascita.value = "";
        document.campireg.datanascita.focus();
        return false;
    }
    */
}
function confronta(){
	var pass=document.getElementById("password").value;
	var rpass=document.getElementById("ripetipassword").value;
	if(pass!=rpass)
		alert("Attenzione: le due password non coincidono");
}
