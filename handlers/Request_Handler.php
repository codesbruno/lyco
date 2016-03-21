<?php
namespace lyco\handlers;

class Request_Handler
{
    public $is_post;
    public $is_get;
    public $is_ajax;
    
    public $module;
    public $controller;
    public $action;
    public $params;

    private $server;
    private $post;
    private $get;
    
    public function __construct(array $server, array $post, array $get) 
    {
        $this->server = $server;
        $this->post   = $post;
        $this->get    = $get;
        
        $this->is_post = isset($server['REQUEST_METHOD']) && $server['REQUEST_METHOD'] == 'POST';
        $this->is_get  = isset($server['REQUEST_METHOD']) && $server['REQUEST_METHOD'] == 'GET';
        $this->is_ajax = isset($server['HTTP_X_REQUESTED_WITH']) && strtolower($server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        
        $this->set_server_vars();
    }    
    
    public function get_json($name=null, $default=null) 
    {
        return $this->get_array_var($this->get, $name, $default, true);
    }
    
    public function post_json($name=null, $default=null) 
    {
        return $this->get_array_var($this->post, $name, $default, true);
    }
    
    public function get($name=null, $default=null) 
    {
        return $this->get_array_var($this->get, $name, $default, false);
    }
    
    public function post($name=null, $default=null) 
    {
        return $this->get_array_var($this->post, $name, $default, false);
    }        

    private function get_array_var($array, $key, $default, $fromJson) 
    {
        if(null == $key) { return $array; }
      
        $data = \lyco\helpers\Array_Helper::get_array_var($array, $key, $default);

        if(!$fromJson) { return $data ? $data : $default; }        
        return $data ? json_decode($data) : $default;
    }

    public function set_module_controller_action_params(array $parts) 
    {
        $this->module     = $parts['module'];
        $this->controller = $parts['controller'];
        $this->action     = $parts['action'];
        $this->params     = $parts['params'];
        
        $this->get = array_merge($this->get, $this->params);
    }
    
    private function set_server_vars() 
    {
        foreach(get_class_vars(__CLASS__) as $var => $val) {
            if(isset($this->server[$var])) {
                $this->$var = $this->server[$var];
            }
        }
    }

    // $_SERVER vars
    public $php_self;
    public $argv;
    public $argc;
    public $gateway_interface;
    public $server_addr;
    public $server_name;
    public $server_software;
    public $server_protocol;
    public $request_method;
    public $request_time;
    public $request_time_float;
    public $query_string;
    public $document_root;
    public $http_accept;
    public $http_accept_charset;
    public $http_accept_encoding;
    public $http_accept_language;
    public $http_connection;
    public $http_host;
    public $http_referer;
    public $http_user_agent;
    public $https;
    public $remote_addr;
    public $remote_host;
    public $remote_port;
    public $remote_user;
    public $redirect_remote_user;
    public $script_filename;
    public $server_admin;
    public $server_port;
    public $server_signature;
    public $path_translated;
    public $script_name;
    public $request_uri;
    public $php_auth_digest;
    public $php_auth_user;
    public $php_auth_pw;
    public $auth_type;
    public $path_info;
    public $orig_path_info;
}