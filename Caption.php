<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:49
 */

class Caption extends ASimpleHtmlObject {
	const tagName = "caption";

	/**
	 * @param string|AHtmlObject $htmlContent
	 */
	public function __construct($htmlContent = NULL) {
		parent::__construct(self::tagName);
		$this->addHtmlContent($htmlContent);
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString();
	}
}