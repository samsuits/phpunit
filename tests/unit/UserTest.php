<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testThatWeCnGetTheFirstName()
    {
        $user = new \App\Models\User;

        $user->setFirstName("Billy");

        $this->assertEquals($user->getFirstName(),'Billy');
    }

    public function testThatWeCnGetTheLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName("Garrett");

        $this->assertEquals($user->getLastName(),'Garrett');
    }
}