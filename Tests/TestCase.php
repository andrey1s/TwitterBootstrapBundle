<?php
/**
 * @author Andrey <asamusev@archer-soft.com>
 * @copyright andrey 3/16/13
 *
 * @version 1.0.0
 */
namespace Twitter\BootstrapBundle\Tests;

abstract class TestCase  extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!class_exists('Twig_Environment')) {
            $this->markTestSkipped('Twig is not available.');
        }
    }
}
