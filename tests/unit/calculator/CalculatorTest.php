<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function can_set_single_operation(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operations(): void
    {
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([79, 75]);

        $addition2 = new \App\Calculator\Addition;
        $addition2->setOperands([15, 78]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_operation_interface(): void
    {
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([79, 75]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, 'dogs', 'cats']);

        $this->assertCount(1, $calculator->getOperations());

    }

    /** @test */
    public function can_calculate_result(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([10, 25]); //35

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(35, $calculator->calculate());

    }

    /** @test */
    public function calculate_method_returns_multiple_results(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([10, 25]); //35

        $division = new \App\Calculator\Division();
        $division->setOperands([25, 5]); //5

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(35, $calculator->calculate()[0]);
        $this->assertEquals(5, $calculator->calculate()[1]);

    }

}