<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function empty_initiated_collection_returns_no_items(): void
    {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_item_passed_in(): void
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in(): void
    {
        $collection = new \App\Support\Collection(['one', 'two']);

        $this->assertCount(2, $collection->get());
        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate(): void
    {
        $collection = new \App\Support\Collection;

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated(): void
    {
        $collection = new \App\Support\Collection(['one', 'two', 'three']);

        $items = [];

        foreach ($collection as $item) {
            $items [] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection(): void
    {
        $collection1 = new \App\Support\Collection(['one', 'two']);
        $collection2 = new \App\Support\Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    /** @test */
    public function can_add_to_existing_collection(): void
    {
        $collection = new \App\Support\Collection(['one', 'two']);
        $collection->add(['three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
        $this->assertEquals('three', $collection->get()[2]);

    }

    /** @test */
    public function returns_json_encoded_items(): void
    {
        $collection = new \App\Support\Collection([
            ['username' => 'steve'],
            ['username' => 'bob']
        ]);

        $this->assertIsString($collection->toJson());
        $this->assertEquals('[{"username":"steve"},{"username":"bob"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json(): void
    {
        $collection = new \App\Support\Collection([
            ['username' => 'steve'],
            ['username' => 'bob']
        ]);

        $encoded = json_encode($collection);

        $this->assertIsString($encoded);
        $this->assertEquals('[{"username":"steve"},{"username":"bob"}]', $encoded);

    }


}