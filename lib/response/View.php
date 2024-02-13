<?php 

namespace Lib\Response;


trait View{

    public function view($view, $data = []){
        
        $fileView = str_replace('.', '/', $view);
        extract($data);

        if( !file_exists("../resources/views/{$fileView}.php") ){
            return "The view does not exist";
        }


        ob_start();
        include "../resources/views/{$fileView}.php";
        $content = ob_get_clean();


        return $content;

    }

}