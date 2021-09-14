<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $user;

    protected function setUp(): void
    {
        $this->user = new \App\Models\User;

    }
    public function testThatWeCnGetTheFirstName(): void
    {
        $this->user->setFirstName("Sam");

        $this->assertEquals($this->user->getFirstName(),'Sam');
    }

    public function testThatWeCnGetTheLastName(): void
    {
        $this->user->setLastName("Work");

        $this->assertEquals($this->user->getLastName(),'Work');
    }

    public function testFullNameIsReturned(): void
    {

        $this->user->setFirstName('Sam');
        $this->user->setLastName('Work');

        $this->assertEquals($this->user->getFullName(),'Sam Work');

    }

    public function testFirstAndLastNameAreTrimmed(): void
    {
        $this->user->setFirstName('  Sam  ');
        $this->user->setLastName('      Work ');

        $this->assertEquals($this->user->getFirstName(),'Sam');
        $this->assertEquals($this->user->getLastName(),'Work');

    }

    public function testEmailAddressCanBeSet(): void
    {
        $this->user->setEmail('sam@samwork.co.nz');

        $this->assertEquals($this->user->getEmail(),'sam@samwork.co.nz');

    }

    public function testEmailVariablesContainCorrectValues(): void
    {
        $this->user->setFirstName('Sam');
        $this->user->setLastName('Work');
        $this->user->setEmail('sam@samwork.co.nz');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        $this->assertEquals($emailVariables['full_name'],'Sam Work');
        $this->assertEquals($emailVariables['email'],'sam@samwork.co.nz');


    }
}