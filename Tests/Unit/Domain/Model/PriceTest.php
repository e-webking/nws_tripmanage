<?php
namespace Nwsnet\NwsTripmanage\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class PriceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Nwsnet\NwsTripmanage\Domain\Model\Price
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Nwsnet\NwsTripmanage\Domain\Model\Price();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNumberofbedsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNumberofbeds()
        );

    }

    /**
     * @test
     */
    public function setNumberofbedsForStringSetsNumberofbeds()
    {
        $this->subject->setNumberofbeds('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'numberofbeds',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPriceReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPrice()
        );

    }

    /**
     * @test
     */
    public function setPriceForFloatSetsPrice()
    {
        $this->subject->setPrice(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'price',
            $this->subject,
            '',
            0.000000001
        );

    }
}
