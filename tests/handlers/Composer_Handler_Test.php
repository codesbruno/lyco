<?php
namespace lyco\handlers;

use Composer\Script\Event;

class Composer_Handler
{
//    public static function postInstall(Event $event)
    public static function postInstall()
    {
        $dir  = __DIR__ .'/../../../web/';
        $file = $dir.'/index.php';
        
        if(!is_dir ($dir)) { mkdir($dir, 0755); }

        if(is_file($file)) { return; }
        die('here');
        $content = <<<EOF
new \lyco\Lyco(
    require_once __DIR__ . '/../vendor/autoload.php', // autoloader
    \$_SERVER['SERVER_ADDR'] == '127.0.0.1' // if true enable debug mode / otherwise disable debug mode
);
EOF;
        
        file_put_contents($file, $content);
    }
}
