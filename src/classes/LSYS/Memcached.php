<?php
/**
 * lsys service
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS;
class Memcached extends \Memcached{
    /**
     * @var Config
     */
    protected $_config;
    protected $_is_config=false;
    public function __construct(Config $config,$persistent_id = null, $callback = null){
        $this->_config=$config;
        parent::__construct($persistent_id, $callback);
    }
    public function configServers(){
        if ($this->_is_config)return $this;
        $servers =(array)$this->_config->get("servers",[]);
        if ( count($servers)==0 )
        {
            throw new Exception('No Memcached servers defined in configuration');
        }
        $this->addServers($servers);
        $this->_is_config=true;
        return $this;
    }
}