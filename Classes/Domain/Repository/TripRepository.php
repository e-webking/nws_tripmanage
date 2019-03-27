<?php
namespace Nwsnet\NwsTripmanage\Domain\Repository;

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
 * The repository for Trips
 */
class TripRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	public function getCurrentTrips()
	{
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
		$query->getQuerySettings()->setIgnoreEnableFields(true);

		$query->matching(
            $query->logicalAnd(
            	$query->equals('currenttrip', 1),
		        $query->equals('deleted', 0),
		        $query->equals('hidden', 0)
		    )
        );

		return $query->execute();
	}

	/**
	 * Get All Guesthouse in Region
	 * @param string $region
	 * @param int $target
	 * @param int $guide
	 * @param \DateTime $arrivedate
	 * @param string $keyword
	 * 
	 */
	public function findMatchedRecord($type=NULL,$gesonderteReisen=NULL,$arrivedate=NULL,$keyword='') {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
		
		if($type)
			$constraints[] = $query->equals('triptype', $type);
		if($gesonderteReisen)
			$constraints[] = $query->equals('gesonderte_reisen', $gesonderteReisen);
		/*if($target)
			$constraints[] = $query->equals('ziel.uid', $target);
		if($guide)
			$constraints[] = $query->equals('tourguide.uid', $guide);*/
		if($keyword)
			$constraints[] = $query->like('title', '%'.$keyword.'%');
		if($arrivedate){

			$arrivedate = new \DateTime($arrivedate.' 0:0');
			$arrivedate = $arrivedate->getTimestamp();
			
			$constraints[] = $query->logicalAnd(
				[$query->lessThanOrEqual('travelperiodstart', $arrivedate),
				$query->greaterThanOrEqual('travelperiodend', $arrivedate)]
			);
    		
		}
		
		if(!$constraints)
			return [];
		$object = $query->matching($query->logicalOr($constraints))->execute();	
		return $object;
	}
}
