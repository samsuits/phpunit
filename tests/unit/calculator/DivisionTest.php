<?php

class DivisionTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function divides_given_operands(): void
    {

        $division = new \App\Calculator\Division;
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function removes_division_by_zero_operands(): void
    {
        $division = new \App\Calculator\Division;
        $division->setOperands([100, 0, 5, 0, 2]);

        $this->assertEquals(10, $division->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating(): void
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Division();

        $addition->calculate();
    }
}
