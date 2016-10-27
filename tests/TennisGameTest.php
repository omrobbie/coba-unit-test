<?php

use TennisGame;

class TennisGameTest extends PHPUnit_Framework_TestCase
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->game = new TennisGame('Eric', 'John');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->game = null;
        parent::tearDown();
    }

    public function testFirstPlayerWinFirstGame(){
        $this->game->wonPoint('Eric');
        $this->assertEquals($this->game->getScore(), 'Fifteen-Love');
    }
}

