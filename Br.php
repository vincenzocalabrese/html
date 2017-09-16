<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 10:06
 */

class Br extends AHtmlObject {
	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$br = "<br " . $this->getExtraAttributeAndStyleString() . " />";

		return self::removeExcessWhitespaces($br);
	}
}