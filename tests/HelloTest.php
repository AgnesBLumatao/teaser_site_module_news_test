<?php
namespace KLab\TeaserModule\News\Hello;

class HelloTest extends \PHPUnit_Framework_TestCase
{
    function testSay()
    {
        $hello = new Hello();
        $this->assertEquals('hello', $hello->say());
    }
}
