<?php

namespace Phansible\Roles;

class RedisTest extends \PHPUnit_Framework_TestCase
{
    private $role;

    public function setUp()
    {
        $app = $this->getMockBuilder('\Phansible\Application')
            ->disableOriginalConstructor()
            ->getMock();

        $this->role = new Redis($app);
    }

    public function tearDown()
    {
        unset($this->role);
    }

    /**
     * @covers Phansible\Roles\Redis
     */
    public function testShouldInstanceOf()
    {
        $this->assertInstanceOf('\Phansible\Role', $this->role);
    }

    /**
     * @covers Phansible\Roles\Redis::getName
     */
    public function testShouldGetName()
    {
        $this->assertEquals('Redis', $this->role->getName());
    }

    /**
     * @covers Phansible\Roles\Redis::getSlug
     */
    public function testShouldGetSlug()
    {
        $this->assertEquals('redis', $this->role->getSlug());
    }

    /**
     * @covers Phansible\Roles\Redis::getRole
     */
    public function testShouldGetRole()
    {
        $this->assertEquals('redis', $this->role->getRole());
    }

    /**
     * @covers Phansible\Roles\Redis::getInitialValues
     */
    public function testShouldGetInitialValues()
    {
        $expected = [
            'install' => 0,
            'conf_path' => "/etc/redis",
            'db_path'   => "/var/lib/redis",
            'pid_path'  => "/var/run/redis",
            'port'    => 6379,
        ];

        $this->assertEquals($expected, $this->role->getInitialValues());
    }
}
