<?php
    try{
        if(empty($_GET['page'])){//quand l'utilisateur lance le site, on appelle le controller de la page d'accueil
            include_once(RACINE . '/controller/front/ctrl_accueil.php');
        }else{
            $url = explode("/",$_GET['page']);//découpe l'url en petits bouts séparés par '/'
            // echo "<pre>";
            // print_r($url);
            // echo "</pre>";

            switch($url[0]){
                case "accueil":
                    include_once(RACINE . '/controller/front/ctrl_accueil.php');
                    break;
                case "connexion":
                    // echo "Page CONNEXION demandée";
                    include_once(RACINE . '/controller/back/login_controller.php');
                    break;
                case "inscription":
                    echo "Page INSCRIPTION demandée";
                    break;
                //Cas modification d'une table dans la BDD
                case "appli":
                    // echo "Page delete/update/add demandée";
                    include_once(RACINE . '/controller/back/app_controller.php');
                    break;

                // case "update":
                //     if(empty($url[1]))
                //     {
                //         throw new Exception("Le type de modification n'a pas été renseigné");
                //     }
                //     switch($url[1]){
                //         case "pilote":
                //             echo "Page update pilote demandée";
                //             break;
                //         case "ecurie":
                //             echo "Page update ecurie demandée";
                //             break;
                //         // et cetera
                //         // case "blabla":
                //         //
                //         //     break;
                //         default:
                //             throw new Exception("La page demandée n'existe pas :'(");
                //     }
                //     break;
                
                case "pilotes":
                    // include_once("$racine/view/back/path/pilote.php");
                    break;
                
                    //LISTER LES AUTRES PAGES DU SITE ET APPELER LEUR CONTROLLER




                default:
                    throw new Exception("La page demandée n'existe pas :'(");
            }
        }
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        echo $message;
    }