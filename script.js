var submitCheckbox = document.querySelector('#submitcheckbox'); //Sélectionne l'id du form
var submitSelect = document.getElementById('submitselect'); //Sélectionne l'id du form
var submitSelectTable = document.querySelector('#submitselecttable'); //Sélectionne l'id du form
var submitReponse = document.querySelector('#submitreponse'); //Sélectionne l'id du form

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

/* form.addEventListener('click', function(e){
    var xhr = getxhr();

}) */

submitSelect.addEventListener('click', function(e){ //Ajoute un listener sur la fonction submit de la form | Fonction qui fera le traitement
    var selectTable = document.getElementById("listeDeroulante");
    var selectValue = parseInt(selectTable.value);

    if(selectValue > 0)
    {
        var xhr = getxhr();
        xhr.onreadystatechange = function(){ 
            if(this.readyState == 4 && this.status == 200){ //Vérifie si les infos sont prêtes à être lancées (STADE 4)
                var BlockReponse = document.getElementById('repTable');
                BlockReponse.innerHTML = this.responseText;
            }
        };
    

        xhr.open('GET', "index.php?liste=" + selectValue, true) //Soumet les actions avec la même méthode en asynchrone
        xhr.send()
    }   else
        {
            document.getElementById('repTable').innerHTML = 'Erreur';
        }

    e.preventDefault(); //Annule l'envoie du form en cours
})

