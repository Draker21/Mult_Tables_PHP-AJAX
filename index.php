    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AJAX</title>
    </head>
    <body>

<!-- PART 1 -->
        <section class="flex justify-content-center">
            <div>
                <h2>La joie du random #1</h2>
                <ul>
<?php                  $x = rand(1,10); //Random de 1 à 10
                        for($y=1;$y<=10;$y++){ 
                        echo nl2br("<li>" . $x . 'x' . $y ." = ". $x*$y . "</li>");
} ?>
                </ul>
            </div>
        </section>

<!-- PART 2 -->
        <section class="flex justify-content">
            <h2>Les données disponibles #2</h2>
            <form name="tables" id="tables" method="GET"> 
                <label for="table1">Table de 1</label>
                <input type="checkbox" name="table[]" id="table1" value="1">
                
                <label for="table2">Table de 2</label>
                <input type="checkbox" name="table[]" id="table2" value="2">
                
                <label for="table3">Table de 3</label>
                <input type="checkbox" name="table[]" id="table3" value="3">
                
                <label for="table4">Table de 4</label>
                <input type="checkbox" name="table[]" id="table4" value="4">
                
                <label for="table5">Table de 5</label>
                <input type="checkbox" name="table[]" id="table5" value="5">
                
                <label for="table6">Table de 6</label>
                <input type="checkbox" name="table[]" id="table6" value="6">
                
                <label for="table7">Table de 7</label>
                <input type="checkbox" name="table[]" id="table7" value="7">
                
                <label for="table8">Table de 8</label>
                <input type="checkbox" name="table[]" id="table8" value="8">
                
                <label for="table9">Table de 9</label>
                <input type="checkbox" name="table[]" id="table9" value="9">
                
                <label for="table10">Table de 10</label>
                <input type="checkbox" name="table[]" id="table10" value="10">

                <button type="submit" name="submit">Envoyer</button>
            </form>
<?php           if(isset($_GET['submit'])){ //Si le submit différent de NULL
                $submit = $_GET['submit']; //On associe la variable au bouton
                if(empty($_GET['table']) AND isset($submit)){ //Si les input checkbox table[] est vide et le bouton submit appuyé
?>
                <p>Veuillez retourner une valeur</p> 
<?php           }
                if(!empty($_GET['table']) AND isset($submit)){ //Si input checkbox table[] est différent de vide et le bouton submit appuyé
                    $tables = $_GET['table']; //On associe la variable table aux valeurs de la form
                    foreach($tables as $key =>$value){ //Boucle dans le form en tant que key(index soit) / value = élément en cours
                        for($a=1;$a<=10;$a++){ //boucle de 1 à 10
                            $result = $value * $a; //resultat = sa valeur (de l'HTML) * la boucle
                            echo("<li>" . $value . 'x' . $a ." = ". $result . "</li>");
                        }
                    }
                }
            }
?>
        </section>

<!-- PART 3 -->
        <section class="container">
        <h2>La liste presque infinie #3</h2>
            <form method="GET" id="listeD" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
                <select name="liste" id="listeDeroulante">
                    <option disabled selected value=""></option>
                    <option value="1">Table de 1</option>
                    <option value="2">Table de 2</option>
                    <option value="3">Table de 3</option>
                    <option value="4">Table de 4</option>
                    <option value="5">Table de 5</option>
                    <option value="6">Table de 6</option>
                    <option value="7">Table de 7</option>
                    <option value="8">Table de 8</option>
                    <option value="9">Table de 9</option>
                    <option value="10">Table de 10</option>
                </select>
                <button type="submit" name="submit3">Envoyer</button>
            </form>
<?php
            if(isset($_GET['submit3'])){ //Si le submit a une valeur (quand cliqué)
            $submit = $_GET['submit3']; //On associe la variable au bouton
    
            if(empty($_GET['liste']) AND isset($submit)){ //Si le name liste est vide (par défaut) et le bouton submit appuyé
?>
                <p>Veuillez choisir une table</p>
<?php       }
            if(!empty($_GET['liste']) AND isset($submit)){ //Si le name liste est différent de vide et le bouton submit appuyé
                $listes = $_GET['liste']; //On associe la variable listes aux valeurs du name liste
?>                  <div class="repTable"> 
<?php                    
                    for($b=1;$b<=10;$b++){ //Boucle 1 à 10
                        $result = $listes * $b; //Le résultat = Valeur choisie multiplié jusqu'à 10
?>
                        <?php echo ("<li>" . $listes . 'x' . $b ." = ". $result . "</li>"); ?>
<?php
                    }
                }
            }
?>
            </div> 
        </section>

<!-- PART 4 -->
        <section class="container">
            <h2>Le jeu du calcul mental édition débile #4</h2>
            <form method="GET" id="jeu" action="index.php">
                <select name="liste" id="listeDeroulante">
                    <option disabled selected value=""></option>
                    <option value="1">Table de 1</option>
                    <option value="2">Table de 2</option>
                    <option value="3">Table de 3</option>
                    <option value="4">Table de 4</option>
                    <option value="5">Table de 5</option>
                    <option value="6">Table de 6</option>
                    <option value="7">Table de 7</option>
                    <option value="8">Table de 8</option>
                    <option value="9">Table de 9</option>
                    <option value="10">Table de 10</option>
                </select>
                <button type="submit" name="submit4">Envoyer</button>
            </form>
                    
            <form method="GET" id="last" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
<?php           if(isset($_GET['submit4']) && !empty($_GET['liste'])){
                    $random = rand(1, 10);
                    $listes = $_GET['liste'];
                    $result = $listes * $random;
                    echo '<p>' . $random . ' x ' . $listes . ' = '; ?>
                    <input type="hidden" name="result" value="<?php echo $result ?>">
<?php           } ?>
                <input type="number" name="answer" id="answer">
                <button type="submit" name="submit5">Envoyer</button>
            </form>
            
<?php       if(isset($_GET['submit5']) && isset($_GET['result'])){ //Si le submit a une valeur (quand cliqué)
                $answer = intval($_GET['answer']); //On associe la variable au bouton
                $result = intval($_GET['result']);
                if($answer == $result){ ?>
                    <p>Bravo, vous avez gagné !</p>    
<?php           } else {
                    echo '<p>Vous ne savez pas compter, ré-essayez</p>';
                }
            } elseif(isset($_GET['submit5']) && !isset($_GET['result'])) {
                echo 'La tortue dépasse le lièvre.. Générez au moins une opération !';
            } ?>            
        </section>
                <script src="script.js"></script>
        </body>
        </html>