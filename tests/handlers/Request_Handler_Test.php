<?php
namespace lyco\test\handlers;

use lyco\handlers\Request_Handler as rh;

class Request_Handler_Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \lyco\handlers\Request_Handler
     */
    private $rhA;
    private $postA = [];
    private $getA  = [];
    
    public function setUp() 
    {
        $this->rhA = new rh($this->server, $this->postA, $this->getA);
    }
    
    public function test_get_json() 
    {
        $this->assertTrue($this->rhA->get_json('p1'));
    }
    
    public function test_post_json($name=null, $default=null) 
    {
    }
    
    public function test_get($name=null, $default=null) 
    {

    }
    
    public function test_post($name=null, $default=null) 
    {
    }        

    private function test_get_array_var($array, $key, $default, $fromJson) 
    {

    }

    public function test_set_module_controller_action_params(array $parts) 
    {

    }
    
    private function test_set_server_vars() 
    {

    }

    private $server = [
      'PHP_FCGI_CHILDREN' => "5",
      'PATH' => "/usr/local/bin:/usr/bin:/bin",
      'PWD' => "/home/bruno/www/.cgi-bin",
      'SHLVL' => "0",
      'ORIG_SCRIPT_NAME' => "/.cgi-bin/php546.fcgi",
      'ORIG_PATH_TRANSLATED' => "/home/bruno/www/mefane/avo/application/web/index.php",
      'ORIG_PATH_INFO' => "/index.php",
      'ORIG_SCRIPT_FILENAME' => "/home/bruno/www/.cgi-bin/php546.fcgi",
      'SCRIPT_NAME' => "/index.php",
      'REQUEST_URI' => "/avo/avo-actemedical/create?paramMenu=1&id=null&_t=1458592521547",
      'QUERY_STRING' => "paramMenu=1&id=null&_t=1458592521547",
      'REQUEST_METHOD' => "GET",
      'SERVER_PROTOCOL' => "HTTP/1.1",
      'GATEWAY_INTERFACE' => "CGI/1.1",
      'REDIRECT_URL' => "/index.php",
      'REDIRECT_QUERY_STRING' => "paramMenu=1&id=null&_t=1458592521547",
      'REMOTE_PORT' => "36226",
      'SCRIPT_FILENAME' => "/home/bruno/www/mefane/avo/application/web/index.php",
      'SERVER_ADMIN' => "no address given",
      'DOCUMENT_ROOT' => "/home/bruno/www/mefane/avo/application/web",
      'REMOTE_ADDR' => "127.0.0.1",
      'SERVER_PORT' => "80",
      'SERVER_ADDR' => "127.0.1.1",
      'SERVER_NAME' => "avo.local",
      'SERVER_SOFTWARE' => "Apache/2.2.22 (Ubuntu)",
      'SERVER_SIGNATURE' => "<address>Apache/2.2.22 (Ubuntu) Server at avo.local Port 80</address>",
      'HTTP_CHROME_PROXY' => "ps=1458592521-929759326-312721595-4247245, sid=0835f0d0a83559c1f5d739233907dd17, b=2564, p=116, c=win",
      'HTTP_COOKIE' => "_csrf=87540b853986451d0785f428f371153a04ea03c982449f609b39cc426586a923a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%223hF-cFQXc9o_xQyYI-Db0NZ48sfxflWe%22%3B%7D; PHPSESSID=gqpn484ce72k1lq7tvoj4gvkq7",
      'HTTP_ACCEPT_LANGUAGE' => "en-US,en;q=0.8,fr;q=0.6",
      'HTTP_ACCEPT_ENCODING' => "gzip, deflate, sdch",
      'HTTP_REFERER' => "http://avo.local/avo/avo-actemedical/index?paramMenu=1",
      'HTTP_USER_AGENT' => "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36",
      'HTTP_UPGRADE_INSECURE_REQUESTS' => "1",
      'HTTP_ACCEPT' => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
      'HTTP_CONNECTION' => "close",
      'HTTP_HOST' => "avo.local",
      'REDIRECT_STATUS' => "200",
      'REDIRECT_HANDLER' => "php5-fastcgi",
      'REDIRECT_REDIRECT_STATUS' => "200",
      'FCGI_ROLE' => "RESPONDER",
      'PHP_SELF' => "/index.php",
      'REQUEST_TIME_FLOAT' => '1458592521.5653',
      'REQUEST_TIME' => '1458592521',
    ];
}