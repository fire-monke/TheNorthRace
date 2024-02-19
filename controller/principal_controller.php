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
            case "ecuries":
                include_once(RACINE . '/controller/front/ecuries_controller.php');
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
            // LISTER LES AUTRES PAGES DU SITE ET APPELER LEUR CONTROLLER

            case "appli":
                if(empty($url[1])){
                    echo "cacacaca";
                    include_once(RACINE . '/controller/back/app_controller.php');
                    exit();
                }

                # NE PAS PRINT SINON Y A ERREUR JSON
                $action = $url[1];
                switch($action){
                    ### ITEM CREATE
                    case "create":
                        if(empty($url[2])){
                            throw new Exception("L'ajout est impossible :'(");
                        }
                        $choice = $url[2];
                        if($choice == "pilote" || $choice == "ecurie"){
                            include_once(RACINE . '/controller/back/controller.php');
                        }
                        else{
                            throw new Exception("AJOUT impossible");
                        }
                        break;
                    case "update":
                        include_once(RACINE . '/controller/back/controller.php');
                        break;
                    case "delete":
                        include_once(RACINE . '/controller/back/app_controller.php');
                        break;
                    default:
                        throw new Exception("L'affichage des données est impossible :'(");
                        break;
                }
                break;
            default:
                throw new Exception("La page demandée n'existe pas :'(");
        }
    }
}
catch(Exception $ex){
    echo $ex->getMessage();
}

// <?php
// try{
//     if(empty($_GET['page'])){//quand l'utilisateur lance le site, on appelle le controller de la page d'accueil
//         include_once(RACINE . '/controller/front/landing_controller.php');
//     }else{
//         $url = explode("/",$_GET['page']);//découpe l'url en petits bouts séparés par des '/'
//         // echo "<pre>";
//         // print_r($url);
//         // echo "</pre>";

//         switch($url[0]){
//             case "accueil":
//                 include_once(RACINE . '/controller/front/landing_controller.php');
//                 break;
//             case "connexion":
//                 include_once(RACINE . '/controller/back/login_controller.php');
//                 break;
//             case "deconnexion":
//                 include_once(RACINE . '/controller/back/logout.php');
//                 break;
//             case "inscription":
//                 echo "Page INSCRIPTION demandée";
//                 break;
//             // LISTER LES AUTRES PAGES DU SITE ET APPELER LEUR CONTROLLER

//             case "appli":
//                 if(empty($url[1])){
//                     include_once(RACINE . '/controller/back/app_controller.php');
//                     exit();
//                 }

//                 # NE PAS PRINT SINON Y A ERREUR JSON
//                 $action = $url[1];# == 'pilote' || == 'ecurie' etc..
                
//                 ### ITEM CREATE
//                 if($action == "create"){
//                     if(empty($url[2])){
//                         throw new Exception("L'ajout est impossible :'(");
//                     }
//                     $choice = $url[2];
//                     if($choice == "pilote" || $choice == "ecurie"){
//                         include_once(RACINE . '/controller/back/controller.php');
//                     }
//                     else{
//                         throw new Exception("L'affichage des données est impossible :'(");
//                     }
//                 }
//                 else if($action == "delete"){
//                     include_once(RACINE . '/controller/back/controller.php');
//                 }
//                 ### ITEM LIST
//                 else if($action == "pilote"){
//                         include_once(RACINE . '/view/back/path/pilote.php');
//                 }
//                 else if($action == "ecurie"){
//                     include_once(RACINE . '/view/back/path/ecurie.php');
//                 }
//                 else{
//                     throw new Exception("L'affichage des données est impossible :'(");
//                 }
//             default:
//                 throw new Exception("La page demandée n'existe pas :'(");
//         }
//     }
// }
// catch(Exception $ex){
//     echo $ex->getMessage();
// }