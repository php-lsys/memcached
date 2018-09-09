<?php
namespace LSYS\Memcached;
/**
 * @method \LSYS\Memcached memcached($config=null)
 */
class DI extends \LSYS\DI{
    /**
     *
     * @var string default config
     */
    public static $config = 'memcached.default';
    /**
     * @return static
     */
    public static function get(){
        $di=parent::get();
        !isset($di->memcached)&&$di->memcached(new \LSYS\DI\ShareCallback(function($config=null){
            return $config?$config:self::$config;
        },function($config=null){
            $config=\LSYS\Config\DI::get()->config($config?$config:self::$config);
            return new \LSYS\Memcached($config);
        }));
        return $di;
    }
}