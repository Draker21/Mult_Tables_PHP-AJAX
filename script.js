var form = document.querySelector('#tables'); //Sélectionne l'id du form
var form1 = document.querySelector('#listeD'); //Sélectionne l'id du form
var form2 = document.querySelector('#jeu'); //Sélectionne l'id du form
var form3 = document.querySelector('#last'); //Sélectionne l'id du form

function getxhr(){ 
    try{xhr=new XMLHttpRequest();} 
    catch(e){ 
       try {xhr=new ActiveXObject("Microsoft.XMLHTTP");} 
       catch(e1){ 
          try{xhr=new ActiveXObject("Msxml2.XMLHTTP");} 
          catch(e2){ 
             alert("AJAX non supporté!"); 
          } 
       } 
    } 
    return xhr; 
}

form.addEventListener('click', function(e){ //Ajoute un listener sur la fonction submit de la form | Fonction qui fera le traitement
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){ 
        if(xhr.readyState === 4 && xhr.status === 200){ //Vérifie si les infos sont prêtes à être lancées (STADE 4)
            document.getElementById('repTable').innerHTML = this.xhr
        }
    xhr.open('GET', "index.php?tables=" + form, true) //Soumet les actions avec la même méthode en asynchrone
    xhr.send()

    e.preventDefault() //Annule l'envoie du form en cours
}})

