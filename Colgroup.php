<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 11:12
 */

class Colgroup extends AHtmlObject {
	/**
	 * @param Col $col
	 * @return $this Modified object
	 */
	public function addCol($col) {
		$this->addHtmlContent($col);
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$colgroup = "<colgroup " . $this->getExtraAttributeAndStyleString() . "> " . $this->getHtmlContent() . " </colgroup>";

		return self::removeExcessWhitespaces($colgroup);
	}
}