<?php
declare(strict_types = 1);

namespace Apha\Saga;

/**
 * @group saga
 */
class AssociationValuesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function sizeReturnsTheNumberOfItems()
    {
        $values = new AssociationValues([]);
        self::assertEquals(0, $values->size());

        $values->add(new AssociationValue('foo', 'bar'));
        self::assertEquals(1, $values->size());
    }

    /**
     * @test
     */
    public function clearEmptiesAllItems()
    {
        $values = new AssociationValues([]);
        $values->add(new AssociationValue('foo', 'bar'));

        self::assertEquals(1, $values->size());

        $values->clear();
        self::assertEquals(0, $values->size());
    }

    /**
     * @test
     */
    public function containsReturnsTrueIfAssociationValueExists()
    {
        $values = new AssociationValues([]);
        $values->add(new AssociationValue('foo', 'bar'));

        self::assertTrue($values->contains(new AssociationValue('foo', 'bar')));
    }

    /**
     * @test
     */
    public function addOnlyAddsUniqueValues()
    {
        $values = new AssociationValues([]);
        $values->add(new AssociationValue('foo', 'bar'));
        $values->add(new AssociationValue('foo', 'bar'));

        self::assertEquals(1, $values->size());
    }
}