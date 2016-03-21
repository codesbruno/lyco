<?php
namespace lyco;

class Lyco
{
    /**
     * @var handlers\RequestHandler
     */
    public static $request;
    
    /**
     * @var handlers\Response_Handler 
     */
    public static $response;
    
    /**
     * @var handlers\Url_Handler
     */
    public static $url;
       
 
    public function __construct($autoloader) {
        //$loader->add('Acme\\Test\\', __DIR__);
        // exception handler

        static::$request = new handlers\Request_Handler($_SERVER, $_POST, $_GET);
        static::$uri     = new handlers\Url_Handler(static::$request);



        // security handler checks           
        
    }
    
    private function call_module_controller_action($module, $controller, $action) {
        $ctrlStr = '\app\\'.$module.'\\'.$controller(); 
echo $ctrlStr; die;
        // if not found      => 404
        // if non authorized => 403

        $ctrller = new $ctrlStr();
        static::$response = new handlers\Response_Handler($ctrller->$action(), static::$request);

        static::$response->send($data_or_file_path, $isJson, $asText, $force_download);
        die;
    }
}
