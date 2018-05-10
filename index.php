

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

        <nav class="fixed-top pt-20">
            <ul class="Montserrat-bold fs-20 d-flex justify-content-around align-items-center">

                <a class="no-decoration list-style-none m-10" href="#sectionrandom"><li class="color-nav">L'échauffement</li></a>
                <a class="no-decoration list-style-none m-10" href="#sectionselect"><li class="color-nav">La sélection</li></a>
                <img class="logo" src="img/logo.png" alt="Logo">
                <a class="no-decoration list-style-none m-10" href="#sectioncheckbox"><li class="color-nav">La révision</li></a>
                <a class="no-decoration list-style-none m-10" href="#sectionquizz"><li class="color-nav">Le Quizz final</li></a>
            </ul>
        </nav>
    </header>
<!-- PART 1 RANDOM -->
        <section id="sectionrandom" class="bg-img h100 d-flex justify-content-around">

            
            <div class="w40 mt-20 d-flex align-self-center column text-justify h50">
                <h3 class="Montserrat-bold white fs-25 borderb-1 pb-10">L'échauffement</h3>
                <p class="Montserrat white fs-20 mt-20 line-height-30">Un petit échauffement avant de commencer à apprendre les tables de multiplication?
                   A chaque visite sur notre site, une table de multiplication, entre 1 et 10, sera automatiquement choisit aléatoirement.
                </p> 
                <p class="Montserrat white fs-20 mt-20 line-height-30"><span class="borderb-1">Le but est simple</span> : à chaque visite sur notre site, nommer la table apparente à votre interlocuteur,
                   demander lui de l'écrire entièrement sur un cahier (ou autres) pour mesurer ses acquis de la session précédente.
                </p>
            </div>
            <div class="w40 mt-20 d-flex align-self-center column h50">
                <h3 class="Montserrat-bold white fs-25 borderb-1 pb-10">Table du jour</h3>
                <ul class="Pangolin white fs-25 pt-20 m-auto">

<?php           $x = rand(1,10); //Random de 1 à 10
                        for($y=1;$y<=10;$y++)
                        { 
                            echo nl2br('<li class="mt-10">' . $x . ' x ' . $y ." = ". $x*$y . "</li>");
                        } 
?>
                </ul>
            </div>
           
        </section>

<!-- PART 2 SELECT -->
        <section id="sectionselect" class="bg-img h100 d-flex justify-content-center">
            <div class="w40 h50 d-flex column text-justify m-auto">
                <h3 class="Montserrat-bold white fs-25 borderb-1">La sélection</h3>
                <p class="Montserrat white fs-20 mt-20">Passons à un exercice un peu plus compliqué ! <br/>
                Afin de vérifier si les tables de multiplication ont bien été apprises, vous pouvez générer n'importe quelle table entre un et dix.
                </p>
                <p class="Montserrat white fs-20 mt-20">Pour cela, il vous suffit de choisir celle que vous souhaitez et de cliquer sur 'Afficher'. <br/> Prêt ? Calculez !</p>
            </div>

            <div class="Montserrat white fs-20 m-auto w40 d-flex column justify-content-center h50">
                <h3 class="Montserrat-bold white fs-25 borderb-1">Choissisez une table</h3>
                <form class="m-auto mt-20" method="GET" id="listeD" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
                    <select class="Montserrat fs-20" name="liste" id="listeDeroulante">
                        <option disabled selected value=""></option>
<?php                    for($i = 1; $i <= 10; $i++){ ?>
                        <option value="<?php echo $i ?>">Table de <?php echo $i ?></option>
<?php }                       ?>
                    </select>
                <button class="fs-20" type="submit" id="submitselect" name="submitselect">Afficher</button>
                </form>
                <div class="Pangolin fs-35 mt-20 white m-auto line-height-38" id="repTable"></div>
            </div>
              
        </section>

<!-- PART 3 CHECKBOX REVISION -->

<section id="sectioncheckbox" class="bg-img h100 d-flex justify-content-around">

    <div class="w40 mt-20 d-flex align-self-center column text-justify h50">
        <h3 class="Montserrat-bold white fs-25 borderb-1 pb-10">La révision</h3>
        
        <p class="Montserrat white fs-20 mt-20 line-height-30">Rien de mieux qu'une bonne révision pour être sur d'être au point, pas vrai?
        C'est la dernière ligne droite avant le quizz du jour ! Cliquer sur les tables que vous voulez réviser ou apprendre.
        </p>

        <p class="Montserrat white fs-20 mt-20 line-height-30"><span class="borderb-1">Le but de cet exercice</span> :
        Vous pouvez l'imaginer comme si vous faisiez une interrogation complète à votre interlocuteur, vous choisiriez les tables
        où il est en difficulté.</p>

        <form name="tables" id="tables" method="GET" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
            <div class="d-flex justify-content-around mt-20">
                <div class="Pangolin white fs-25 d-flex column">
<?php 
                for($i = 1; $i <= 10; $i++)
                    {
?> 
                            <label for="table<?php echo $i ?>">
                                Table de <?php echo $i ?>
                                <input class="checkbox" type="checkbox" id="table<?php echo $i ?>" value="<?php echo $i ?>">   
                            </label>               
<?php           }
?>              </div>
                        
                <button class="btn" type="submit" id="submitcheckbox" name="submitcheckbox">Afficher le(s) résultat(s)</button>
            </div>
        </form>
    </div>

    <section class="w40 mt-20 white d-flex justify-content-around align-self-center column h50">       
        <h3 class="Montserrat-bold white fs-25 borderb-1 pb-10">Mes tables sélectionnées</h3>
        <div id="repCheckbox" class="mt-20 white d-flex align-self-center justify-content-around wrap"></div>
    </section>  

</section>

<!-- PART 4 QUIZZ FINAL -->
        <section class="bg-img h100 d-flex justify-content-around align-items-center">
            <h3 class="Montserrat-bold white fs-25 borderb-1 pb-10">Le Quizz final</h3>
            <p class="Montserrat white fs-20 mt-20 line-height-30">
            C'est la dernière ligne droite avant le quizz du jour ! Cliquer sur les tables que vous voulez réviser ou apprendre.
            </p>

            <p class="Montserrat white fs-20 mt-20 line-height-30"><span class="borderb-1">Le but de cet exercice</span> :
            Vous pouvez l'imaginer comme si vous faisiez une interrogation complète à votre interlocuteur, vous choisiriez les tables
            où il est en difficulté.</p>
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