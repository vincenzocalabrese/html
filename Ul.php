<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Ul extends ASimpleHtmlObject {
	const tagName = "ul";

	/**
	 * Ul constructor.
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