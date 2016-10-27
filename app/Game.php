<?php

interface Game
{
    /**
     * @param  $playerName
     * @return void
     */
    public function wonPoint($playerName);

    /**
     * @return string
     */
    public function getScore();
}
