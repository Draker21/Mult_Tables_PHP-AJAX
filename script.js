
var form = document.querySelector('#tables'); //Sélectionne l'id du form
var form1 = document.querySelector('#listeD'); //Sélectionne l'id du form
var form2 = document.querySelector('#jeu'); //Sélectionne l'id du form
var form3 = document.querySelector('#last'); //Sélectionne l'id du form

form.addEventListener('click', function(e){ //Ajoute un listener sur la fonction submit de la form | Fonction qui fera le traitement
    
    var getHttpRequest = new XMLHttpRequest();
    getHttpRequest.onreadystatechange = function(){ 
        if(getHttpRequest.readyState === 4 && getHttpRequest.status === 200){ //Vérifie si les infos sont prêtes à être lancées (STADE 4)
            document.getElementById('repTable').innerHTML = this.xhr
            }
    xhr.open('GET', "index.php?tables=" + $form, true) //Soumet les actions avec la même méthode en asynchrone
    xhr.send()

    e.preventDefault() //Annule l'envoie du form en cours
}})