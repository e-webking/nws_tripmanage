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

class CreateArrViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 *
	 * @param mixed $abflugort
	 *
	 * @return array
	 */
	public function render($abflugort) {
		$arr = array(''=> 'Bitte auswählen');
		foreach ($abflugort as $key => $value) {
			$arr[] = array('id' => $value->getUid(), 'value' =>$value->getTitle());
		}
		return $arr;
	}
}