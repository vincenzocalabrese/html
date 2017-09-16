<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Ol extends ASimpleHtmlObject {
	const tagName = "ol";

	/**
	 * Ol constructor.
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

?>