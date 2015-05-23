<?php

namespace MS\PHPMD\Tests\Functional\Symfony2;

use MS\PHPMD\Tests\Functional\AbstractProcessTest;

/**
 * Class ControllerMethodNameTest
 *
 * @package PHPMD\Tests\Symfony2
 */
class ControllerMethodNameTest extends AbstractProcessTest
{
    /**
     * @covers MS\PHPMD\Rule\Symfony2\ControllerMethodName
     */
    public function testRule()
    {
        $output = $this
            ->runPhpmd('FooController.php', 'symfony2.xml')
            ->getOutput();

        $this->assertContains('FooController.php:10	The method name have to end with Action in this controller.', $output);
    }

    /**
     * @covers MS\PHPMD\Rule\Symfony2\ControllerMethodName
     */
    public function testRuleWIthAbstract()
    {
        $output = $this
            ->runPhpmd('AbstractFooController.php', 'symfony2.xml')
            ->getOutput();

        $this->assertEmpty(trim($output));
    }
}