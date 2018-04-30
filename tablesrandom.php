<?php

if(isset($_GET['submit3'])){ //Si le submit a une valeur (quand cliqué)
    $submit = $_GET['submit3']; //On associe la variable au bouton
    
    if(empty($_GET['liste']) AND isset($submit)){ //Si le name liste est vide (par défaut) et le bouton submit appuyé
        echo ("Veuillez choisir une table");
    }

    if(!empty($_GET['liste']) AND isset($submit)){ //Si le name liste est différent de vide et le bouton submit appuyé
        $listes = $_GET['liste']; //On associe la variable listes aux valeurs du name liste
        for($b=1;$b<=10;$b++){ //Boucle 1 à 10
            $result = $listes * $b; //Le résultat = Valeur choisie multiplié jusqu'à 10
            echo ("<li>" . $listes . 'x' . $b ." = ". $result . "</li>");
        }
    }
}


/************ TRAITEMENT ************/

/* <?php

if(isset($_GET['tables']))
{
$value = intval($_GET['selectedValue']);
$retour = '<ul>';

for($i=1; $i<=10; $i++)
{
    $retour .= '<li>' . $i . ' x ' . $value . ' = ' . ($i*$value) . '</li>';
}

$retour .= '</ul>';

echo $retour;
} 
?> */

