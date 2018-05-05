<?php require ('traitement.php'); ?>
 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AJAX</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

<!-- PART 1 -->
        <section class="flex justify-content-center">
            <div>
                <h2>La joie du random #1</h2>
                <ul>
<?php                   $x = rand(1,10); //Random de 1 à 10
                        for($y=1;$y<=10;$y++)
                        { 
                            echo nl2br("<li>" . $x . 'x' . $y ." = ". $x*$y . "</li>");
                        } 
?>
                </ul>
            </div>
        </section>

<!-- PART 2 -->
        <section class="flex justify-content">
            <h2>Les données disponibles #2</h2>
            <form name="tables" id="tables" method="GET" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>"> 
                <label for="table1">Table de 1</label>
                <input class="checkbox" type="checkbox" id="table1" value="1">
                
                <label for="table2">Table de 2</label>
                <input class="checkbox" type="checkbox" id="table2" value="2">
                
                <label for="table3">Table de 3</label>
                <input class="checkbox" type="checkbox" id="table3" value="3">
                
                <label for="table4">Table de 4</label>
                <input class="checkbox" type="checkbox" id="table4" value="4">
                
                <label for="table5">Table de 5</label>
                <input class="checkbox" type="checkbox" id="table5" value="5">
                
                <label for="table6">Table de 6</label>
                <input class="checkbox" type="checkbox" id="table6" value="6">
                
                <label for="table7">Table de 7</label>
                <input class="checkbox" type="checkbox" id="table7" value="7">
                
                <label for="table8">Table de 8</label>
                <input class="checkbox" type="checkbox" id="table8" value="8">
                
                <label for="table9">Table de 9</label>
                <input class="checkbox" type="checkbox" id="table9" value="9">
                
                <label for="table10">Table de 10</label>
                <input class="checkbox" type="checkbox" id="table10" value="10">

                <button type="submit" id="submitcheckbox" name="submitcheckbox">Envoyer</button>
            </form>
            <div class="bg-red" id="repCheckbox"></div>
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
                <button type="submit" id="submitselect" name="submitselect">Envoyer</button>
            </form>
            <div class="bg-red" id="repTable"></div>                      
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
                <button type="submit" id="submitselecttable" name="submit4">Envoyer</button>
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
                <button type="submit" id="submitreponse" name="submit5">Envoyer</button>
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