<?php


    $retour = "";

        if(isset($_GET['selectCheckbox']) && $_GET['selectCheckbox'] != "")
            {

                $tables = explode("," , $_GET['selectCheckbox']);

                foreach($tables as $checkbox)
                { 
                    $retour .= '<ul>';

                    for($a=1;$a<=10;$a++)   //boucle de 1 à 10
                    { 
                        $resultat = $checkbox * $a;
                        $retour .= "<li>" . $checkbox . 'x' . $a ." = ". $resultat . "</li>";
                    }

                    $retour .= '</ul>';
                }
                echo $retour;
            }

        else if(isset($_GET['selectedValue']) && $_GET['selectedValue'] != "")    //Si le select a une valeur (quand cliqué)
        { 
            $valueSelected = $_GET['selectedValue'];                 
            $retour .= '<ul>';

                for($b = 1 ; $b <= 10 ; $b++)   //Boucle 1 à 10
                { 

                    $result = $valueSelected * $b; //Le résultat = Valeur choisie multiplié jusqu'à 10
                    $retour .= "<li>" . $valueSelected . 'x' . $b ." = ". $result . "</li>";
                }
                
            $retour .= '</ul>';
            echo $retour;
        }

        else if(isset($_GET['selectListeValue']))
        {
            $selectListeValue = $_GET['selectListeValue'];
            $random = rand(1, 10);
            $retour .= '<p id="answer-calcul" data-value="' . $selectListeValue . '" data-random="' . $random . '">' . $selectListeValue . ' x ' . $random . ' = ' . '</p>';

            echo $retour;
        }

        else if(isset($_GET['reponseCalcul']) && isset($_GET['goodreponseCalcul']))
        { 
            $reponseCalcul = intval($_GET['reponseCalcul']);
            $goodreponseCalcul = intval($_GET['goodreponseCalcul']);

            if($reponseCalcul == $goodreponseCalcul)
            {
                $retour .= '<p>Vous avez gagné !</p>';
            } else
                {
                    $retour .= '<p>Vous ne savez pas compter, ré-essayez</p>';
                }
            echo $retour;
        }          