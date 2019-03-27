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

class DayDiffViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

	/**
	 * 
	 *
	 * @param string $fromDate start date
	 * @param string $toDate end date
	 *
	 *
	 * @return string days difference
	 */
	public function render($fromDate, $toDate = NULL) {
		if(!$toDate)
			return 1;
		$date1 = new \DateTime($fromDate);
		$date2 = new \DateTime($toDate);
		$days  = $date2->diff($date1)->format('%a');

		return $days+1;
	}
}