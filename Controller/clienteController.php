<?php
        if (isset($_POST["submit"])){
            $q1 = $_POST["q1"];
            $q2 = $_POST["q2"];
            $q3 = $_POST["q3"];
            $q4 = $_POST["q4"];
            $q5 = $_POST["q5"];
            $q6 = $_POST["q6"];
            $q7 = $_POST["q7"];
        }
        
        $pesos  = array ($q1, $q2, $q3, $q4, $q5, $q6, $q7);

        $moda = array_count_values($pesos);
        arsort($moda);
        $str = key($moda);
        
        if ($str == 1){
            echo "PLANO LITE";
            $contato = "LITE";
            session_start();
            $_contato['contatos'] = $contato;
            header("Location:../Views/contato/contato.php?plano=$contato");
        }
        elseif($str == 2){
            echo "PLANO STANDART";
            $contato = "STANDART" ;
            //session_start();
            //$_contato['contatos'] = $contato;
            header("Location:../Views/contato/contato.php?plano=$contato");
        }
        elseif ($str == 3) {
            echo "PLANO PREMIUM";
            $contato = "PREMIUM";
            //session_start();
            //$_contato['contatos'] = $contato;
            header("Location:../Views/contato/contato.php?plano=$contato");
        }
        else{
            echo "ERRO";
        }
