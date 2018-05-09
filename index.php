<?php require ('ajax/traitement.php'); ?>

    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700" rel="stylesheet">
            <link rel="stylesheet" href="css/style.css">
            <title>Révision mathématique</title>
        </head>

    <body>

<!-- HEADER -->
    <header>
        <nav class="fixed-top">
            <ul class="Montserrat-bold fs-20 d-flex justify-content-around align-items-center">
                <a class="no-decoration list-style-none m-10" href="#sectionrandom"><li class="white">L'aléatoire</li></a>
                <a class="no-decoration list-style-none m-10" href="#sectioncheckbox"><li class="white">Les particulières</li></a>
                <img class="logo" src="img/logo.png" alt="Logo">
                <a class="no-decoration list-style-none m-10" href="#sectionselect"><li class="white">La selection</li></a>
                <a class="no-decoration list-style-none m-10" href="#sectionquizz"><li class="white">Le Quizz final</li></a>
            </ul>
        </nav>
    </header>
<!-- PART 1 -->
        <section id="sectionrandom" class="bg-img h100 d-flex justify-content-center">
            <div class="align-self-center">
                <h3>Une petite révision?</h3>
                <p>Faites</p>
            </div>

            <ul class="align-self-center Pangolin white fs-40">
<?php           $x = rand(1,10); //Random de 1 à 10
                    for($y=1;$y<=10;$y++)
                    { 
                        echo nl2br('<li class="mt-20">' . $x . 'x' . $y ." = ". $x*$y . "</li>");
                    } 
?>
            </ul>
            
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
            <form method="GET" id="jeu" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
                <select name="listemental" id="listemental">
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
                <button type="submit" id="submitselecttable" name="submitselecttable">Envoyer</button>
            </form>

            <div class="bg-red" id="repMental"></div>

            <form method="GET" id="last" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">

                <input type="text" name="answer" id="answer" value="">
                <button type="submit" id="submitreponse" name="submitreponse">Envoyer</button>
            </form>
        
            <div class="bg-red" id="responseCalcul"></div>
        </section>

        <script src="js/script.js"></script>
    </body>
</html>