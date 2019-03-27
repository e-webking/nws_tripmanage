<?php
namespace Nwsnet\NwsTripmanage\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

class CreateRoomPriceArrViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

	/**
	 * 
	 * @param mixed $roomprice
	 *
	 *
	 * @return array
	 */
	public function render($roomprice) {
		$roompriceArr[] = array('key'=> 0, 'value'=> 'Please select bedroom');
		foreach ($roomprice as $key => $value) {
			if ($value->getNumberofbeds() == '5') {
				$roompriceArr[] = array('key'=> $value->getNumberofbeds(), 'value'=> '3-4 Bettzimmer');
			} elseif ($value->getNumberofbeds() == '4') {
				$roompriceArr[] = array('key'=> $value->getNumberofbeds(), 'value'=> '4 Bettzimmer');
			} elseif ($value->getNumberofbeds() == '3') {
				$roompriceArr[] = array('key'=> $value->getNumberofbeds(), 'value'=> '3 Bettzimmer');
			} elseif ($value->getNumberofbeds() == '2') {
				$roompriceArr[] = array('key'=> $value->getNumberofbeds(), 'value'=> '2 Bettzimmer');
			}
		}
		$arr = array_map("unserialize", array_unique(array_map("serialize", $roompriceArr)));	
		return $arr;
	}
}