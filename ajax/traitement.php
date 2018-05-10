<?php


    $retour = "";

        if(isset($_GET['selectCheckbox']) && $_GET['selectCheckbox'] != "")
            {

                $tables = explode("," , $_GET['selectCheckbox']);

                foreach($tables as $checkbox)
                { 
                    $retour .= '<ul class="m-10">';

                    for($a=1;$a<=10;$a++)   //boucle de 1 à 10
                    { 
                        $resultat = $checkbox * $a;
                        $retour .= '<li class="Pangolin fs-20">' . $checkbox . ' x ' . $a ." = ". $resultat . "</li>";
                    }

                    $retour .= '</ul>';
                }
                echo $retour;
            }

        else if(isset($_GET['selectedValue']) && $_GET['selectedValue'] != "")    //Si le select a une valeur (quand cliqué)
        { 
            $valueSelected = $_GET['selectedValue'];                 
            $retour .= '<ul class="m-10">';

                for($b = 1 ; $b <= 10 ; $b++)   //Boucle 1 à 10
                { 

                    $result = $valueSelected * $b; //Le résultat = Valeur choisie multiplié jusqu'à 10
                    $retour .= '<li class="Pangolin fs-20">' . $valueSelected . ' x ' . $b ." = ". $result . "</li>";
                }
                
            $retour .= '</ul>';
            echo $retour;
        }

        else if(isset($_GET['selectListeValue']))
        {
            $selectListeValue = $_GET['selectListeValue'];
            $random = rand(1, 10);
            $retour .= '<p class="Pangolin fs-20 align-self-center" id="answer-calcul" data-value="' . $selectListeValue . '" data-random="' . $random . '">' . 'Combien font ' . $selectListeValue . ' x ' . $random . '</p>';

            echo $retour;
        }

        else if(isset($_GET['reponseCalcul']) && isset($_GET['goodreponseCalcul']))
        { 
            $reponseCalcul = intval($_GET['reponseCalcul']);
            $goodreponseCalcul = intval($_GET['goodreponseCalcul']);

            if($reponseCalcul == $goodreponseCalcul)
            {
                $retour .= '<p class="Pangolin fs-30 color-2">Félicitation, vous avez trouvé la bonne réponse !</p>';
            } else
                {
                    $retour .= '<p class="Pangolin fs-20 color-1">Ce n\'est pas la bonne réponse, ré-essayez</p>';
                }
            echo $retour;
        }          