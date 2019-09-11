<?php
namespace TestEvent;
use PHPUnit\Framework\TestCase;
final class MemcachedTest extends TestCase
{
    public function testBase()
    {
        $redis=\LSYS\Memcached\DI::get()->memcached()->configServers();
        $redis->set("a","b");
        $this->assertEquals($redis->get("a"), "b");
    }
}