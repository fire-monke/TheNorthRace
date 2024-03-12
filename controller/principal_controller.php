<?php
try{
    if(empty($_GET['page'])){//quand l'utilisateur lance le site, on appelle le controller de la page d'accueil
        include_once(RACINE . '/controller/front/landing_controller.php');
    }else{
        $url = explode("/",$_GET['page']);//découpe l'url en petits bouts séparés par des '/'
        // echo "<pre>";
        // print_r($url);
        // echo "</pre>";

        switch($url[0]){
            case "accueil":
                include_once(RACINE . '/controller/front/landing_controller.php');
                break;
            case "pilotes":
                include_once(RACINE . '/controller/front/pilotes_controller.php');
                break;
            case "pilote":
                if(!isset($url[1]) || $url[1] == ''){
                     throw new Exception("L'id de du pilote est introuvable");
                    break;
                    }
                 $idPilote = $url[1];
                 include_once(RACINE . '/controller/front/pilote_controller.php');
                 break;
            case "ecuries":
                 include_once(RACINE . '/controller/front/ecuries_controller.php');
                 break;
            case "ecurie":
                if(!isset($url[1]) || $url[1] == ''){
                    throw new Exception("L'id de l'écurie est introuvable");
                    break;
                }
                $idEcurie = $url[1];
                include_once(RACINE . '/controller/front/ecurie_controller.php');
                break;
            case "connexion":
                include_once(RACINE . '/controller/back/login_controller.php');
                break;
            case "deconnexion":
                include_once(RACINE . '/controller/back/logout.php');
                break;
            case "inscription":
                echo "Page INSCRIPTION demandée";
                break;
            case "not_found":
                include_once(RACINE . '/view/front/path/page_not_found.php');
                break;
            // LISTER LES AUTRES PAGES DU SITE ET APPELER LEUR CONTROLLER

            case "appli":
                if(empty($url[1])){
                    include_once(RACINE . '/controller/back/app_controller.php');
                    exit();
                }

                # NE PAS PRINT SINON Y A ERREUR JSON
                $action = $url[1];
                switch($action){
                    ### ITEM CREATE
                    case "create":
                        //$url[2] is the choice of the entity that you wish to create
                        if(!empty($url[2]) && ($url[2] == "pilote" || $url[2] == "ecurie" || $url[2] == "courses" || $url[2] == "classement")){
                            include_once(RACINE . '/controller/back/controller.php');
                        }
                        else{
                            header('Location: ../not_found');
                        }
                        break;
                    case "update":
                        include_once(RACINE . '/controller/back/controller.php');
                        break;
                    case "delete":
                        include_once(RACINE . '/controller/back/app_controller.php');
                        break;
                    default:
                        header('Location: ../not_found');
                        break;
                }
                break;
            default:
                header('Location: ./not_found');
                break;
        }
    }
}
catch(Exception $ex){
    echo $ex->getMessage();
}