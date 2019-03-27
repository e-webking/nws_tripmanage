<?php
namespace Nwsnet\NwsTripmanage\Domain\Model;

/***
 *
 * This file is part of the "NetzWerkstatt Trip Management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * Price
 */
class Price extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * numberofbeds
     *
     * @var string
     */
    protected $numberofbeds = '';

    /**
     * price
     *
     * @var float
     */
    protected $price = 0.0;

    /**
     * age
     *
     * @var string
     */
    protected $age = '';

    /**
     * studentprice
     * 
     * @var int
     */
    protected $studentprice = 0;

    /**
     * Returns the numberofbeds
     *
     * @return string $numberofbeds
     */
    public function getNumberofbeds()
    {
        return $this->numberofbeds;
    }

    /**
     * Sets the numberofbeds
     *
     * @param string $numberofbeds
     * @return void
     */
    public function setNumberofbeds($numberofbeds)
    {
        $this->numberofbeds = $numberofbeds;
    }

    /**
     * Returns the price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param float $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns the age
     *
     * @return float $age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Sets the age
     *
     * @param float $age
     * @return void
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Returns the studentprice
     *
     * @return int $studentprice
     */
    public function getStudentprice()
    {
        return $this->studentprice;
    }

    /**
     * Sets the studentprice
     *
     * @param int $studentprice
     * @return void
     */
    public function setStudentprice($studentprice)
    {
        $this->studentprice = $studentprice;
    }
}
