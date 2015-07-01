<?php
 

function Autoload($class) {
    
    $key = count(explode(DS,WWW_ROOT));
   
    $class = WWW_ROOT.DS. str_replace('\\', DS, $class) . '.php';
    
    $array =  explode(DS,$class);
           
    $baseroot = "vendor".DS."kandaframework".DS."Kanda";
       
    foreach ($array as $param){
   
        switch ($array[$key]){
            
            case 'app':
                $array[$key] = $baseroot.DS."app";
                break;
            case 'base':
                $array[$key] = $baseroot.DS."base";
                break;
            case 'helps':
                $array[$key] = $baseroot.DS."helps";
                break;  
            case 'widgets':
                $array[$key] = $baseroot.DS."widgets";
                break;                   
            
        }
  
    }
    $filename = implode(DS,$array);
      

    if(!file_exists($filename))
        throw new Exception("File path $class not found.");
    
    require $filename;
    
}
spl_autoload_register('Autoload');