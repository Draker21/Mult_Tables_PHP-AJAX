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

// Recup l'id de chaque bouton des différents exercices.

var submitCheckbox = document.querySelector('#submitcheckbox');
var submitSelect = document.querySelector('#submitselect');
var submitSelectTable = document.querySelector('#submitselecttable');
var submitReponse = document.querySelector('#submitreponse');


//Ajoute un event click et une fonction qui fera le traitement en AJAX.
submitSelect.addEventListener('click', function(e){
    var selectTable = document.getElementById("listeDeroulante");
    var selectValue = parseInt(selectTable.value);
    
    if(selectValue > 0)
    {
        xhr = getxhr();
        xhr.onreadystatechange = function()
        { 
            if(this.readyState == 4 && this.status === 200) //Vérifie si les infos sont prêtes à être lancées (STADE 4 + Status à 200)
            { 
                var blockReponse = document.getElementById('repTable');
                blockReponse.innerHTML = this.responseText;             
            }
        }
    
        //Soumet les actions avec la méthode en asynchrone
        xhr.open('GET', "traitement.php?selectedValue=" + selectValue, true);
        xhr.send();
    }   else
        {
            document.getElementById('repTable').innerHTML = 'Erreur';   
        }

    e.preventDefault(); //Annule l'envoie du form en cours
});

