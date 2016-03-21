<?php
namespace lyco\handlers;

class Url_Handler
{
    public $scheme;
    public $host;
    public $user;
    public $pass;
    public $path;
    public $query;
    public $fragment;
    
    public $is_https;
    
    /**
     * @var Request_Handler
     */
    private $request;


    public function __construct(Request_Handler $request) 
    {
        $this->request = $request;
        $url = $this->build_url();
        foreach(parse_url($url) as $key => $val) {
            $this->$key = $val;
        }
        // get vars from GET parameters
        $params = [];
        foreach(parse_str($request->request_uri) as $key => $val) {
            $params[$key] = $val;
        }
        
        $this->request->set_module_controller_action_params($this->get_module_controller_action_part());
    }
    
    
    private function get_module_controller_action_part()
    {
        $parts = explode('/', $this->request->path_info);
        return [
            'module'     => $parts[0],
            'controller' => $parts[1],
            'action'     => $parts[2],
            'params'     => array_slice($parts, 3),
        ];
    }
    
    private function build_url()
    {
        $pageURL = 'http';
        if ($this->request->https == "on") { 
            $pageURL .= "s"; 
        }        
        $pageURL .= "://";
        
        if ($this->request->server_port != "80") {
            $pageURL .= $this->request->server_name.":".$this->request->server_port.$this->request->request_uri;
        } else {
            $pageURL .= $this->request->server_name.$this->request->request_uri;
        }
        
        return $pageURL;
    }
}