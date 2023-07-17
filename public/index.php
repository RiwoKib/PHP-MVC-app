<?php  
   function loadController($controller){
    switch ($controller) {
        case 'users':
            $strFileController = '../app/controllers/User.php';
            require_once $strFileController;
            $controllerObj = new UserController();
            break;
        default:
            $strFileController = '../app/controllers/User.php';
            require_once $strFileController;
            $controllerObj = new UserController();
            break;
    }
    return $controllerObj;
}

function launchAction($controllerObj){
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    } else {
        $controllerObj->run(DEFAULT_ACTION);
    }
}
?>  

