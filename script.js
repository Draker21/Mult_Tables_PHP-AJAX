//fonction pour adapter ajax à tout les navigateurs.

function getxhr(){ 
    try{xhr=new XMLHttpRequest();} 
    catch(e){ 
       try {xhr=new ActiveXObject("Microsoft.XMLHTTP");} 
       catch(e1){ 
          try{xhr=new ActiveXObject("Msxml2.XMLHTTP");} 
          catch(e2){ 
             alert("AJAX non supporté sur votre navigateur!"); 
          } 
       } 
    } 
    return xhr; 
}

// Recup l'id de chaque bouton type submit des différents exercices.

var submitCheckbox = document.querySelector('#submitcheckbox');
var submitSelect = document.querySelector('#submitselect');
var submitSelectTable = document.querySelector('#submitselecttable');
var submitReponse = document.querySelector('#submitreponse');

// Ajax pour les checkbox
submitCheckbox.addEventListener('click', function(e){
    var checkboxTable = document.getElementsByClassName('checkbox'); // On stock dans une variable les checkbox par leur classe.
    var tableau = new Array(); // On crée un tableau.

    for(var i = 0; i < checkboxTable.length; i++) // On boucle les checkbox.  
    {
        if(checkboxTable[i].checked)    // Si le une checkbox a été selectionné.
        {
            tableau.push(checkboxTable[i].value); // Rentre la valeur de son index dans le tableau en utilisant push.
        }
    }
    
    if(tableau.length > 0)   // Si le tableau n'est pas vide et à push des checkbox précédemment.
    {
        xhr = getxhr();
        xhr.onreadystatechange = function()
        { 
            if(this.readyState == 4 && this.status === 200) //Vérifie si les infos sont prêtes à être lancées (STADE 4 + Status à 200)
            { 
                var blockReponse = document.getElementById('repCheckbox');
                blockReponse.innerHTML = this.responseText; // Affiche les réponses que tu as reçu (les tables).             
            }
        }
    
        //Soumet les actions avec la méthode en asynchrone
        xhr.open('GET', "traitement.php?selectCheckbox=" + tableau, true);
        xhr.send();
    }   else
        {
            document.getElementById('repCheckbox').innerHTML = 'Erreur'; // Affiche un message d'erreur.   
        }

    e.preventDefault(); //Annule l'envoie du form en cours
});

// Ajax pour le select
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

submitselecttable.addEventListener('click', function(e){
    var selectListeMental = document.getElementById("listemental");
    var selectValueMental = parseInt(selectListeMental.value);
    
    if(selectValueMental > 0)
    {
        xhr = getxhr();
        xhr.onreadystatechange = function()
        { 
            if(this.readyState == 4 && this.status === 200) //Vérifie si les infos sont prêtes à être lancées (STADE 4 + Status à 200)
            { 
                var randomReponse = document.getElementById('repMental');
                randomReponse.innerHTML = this.responseText;             
            }
        }
    
        //Soumet les actions avec la méthode en asynchrone
        xhr.open('GET', "traitement.php?selectListeValue=" + selectValueMental, true);
        xhr.send();
    }   else
        {
            document.getElementById('repMental').innerHTML = 'Erreur';   
        }

    e.preventDefault(); //Annule l'envoie du form en cours
});

submitReponse.addEventListener('click', function(e){
    var inputAnswer = document.getElementById("answer");
    var valueAnswer = inputAnswer.value;
    var generateCalcul = document.getElementById('answer-calcul');
    
    if(generateCalcul != null && valueAnswer != "")
    {
        var value1 = generateCalcul.getAttribute('data-value');
        var value2 = generateCalcul.getAttribute('data-random');

        var goodresponse = value1 * value2;

        xhr = getxhr();
        xhr.onreadystatechange = function()
        { 
            if(this.readyState == 4 && this.status === 200) //Vérifie si les infos sont prêtes à être lancées (STADE 4 + Status à 200)
            { 
                var randomReponse = document.getElementById('responseCalcul');
                randomReponse.innerHTML = this.responseText;             
            }
        }
    
        //Soumet les actions avec la méthode en asynchrone
        xhr.open('GET', "traitement.php?reponseCalcul=" + valueAnswer + "&goodreponseCalcul=" + goodresponse , true);
        xhr.send();
    }   else
        {
            if(generateCalcul == null)
            {
                document.getElementById('responseCalcul').innerHTML = '<p>Aucun calcul demandé !</p>';
            }   else if(valueAnswer == "")
                        {
                            document.getElementById('responseCalcul').innerHTML = "<p>Vous n'avez rien saisie !</p>";
                        } 
        }
    
    e.preventDefault(); //Annule l'envoie du form en cours
});

