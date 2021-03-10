<?php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('http://coffezin.local/');
        $I->see('Coffezin');
    }
}
