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

    public function testSecondPlayerWinFirstGame(){
        $this->game->wonPoint('John');
        $this->assertEquals($this->game->getScore(), 'Love-Fifteen');
    }

    public function testFirstPlayerWinFirstGameInARow(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Eric');
        $this->assertEquals($this->game->getScore(), 'Thirty-Love');
    }

    public function testSecondPlayerWinFirstGameInARow(){
        $this->game->wonPoint('John');
        $this->game->wonPoint('John');
        $this->assertEquals($this->game->getScore(), 'Love-Thirty');
    }

    public function testDrawInAFirstGame(){
        $this->assertEquals($this->game->getScore(), 'Love-All');
    }

    public function testFifteenDrawInAFirstGame(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->assertEquals($this->game->getScore(), 'Fifteen-All');
    }

    public function testThirtyDrawInAFirstGame(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->assertEquals($this->game->getScore(), 'Thirty-All');
    }

    public function testDeuceDrawInAFirstGame(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('John');
        $this->assertEquals($this->game->getScore(), 'Deuce');
    }

    public function testFirstPlayerAdvantage(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->assertEquals($this->game->getScore(), 'Advantage player1');
    }

    public function testSecondPlayerAdvantage(){
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Eric');
        $this->game->wonPoint('Jhon');
        $this->game->wonPoint('Jhon');
        $this->assertEquals($this->game->getScore(), 'Advantage player2');
    }
}