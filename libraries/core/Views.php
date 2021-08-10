<?php
    class Views {
        public function getView($controller, $view, $data){
            $controller = get_class($controller);
            if($controller == "Home"){
                $view = "View/".$view.".php";
            }else{
                $view = "View/".$controller."/".$view.".php";
            }

            require_once($view);
        }
    }
?>