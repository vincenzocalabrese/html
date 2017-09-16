<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Div extends ASimpleHtmlObject {
	const tagName = "div";

	/**
	 * Div constructor.
	 * @param string|AHtmlObject $htmlHtmlContent
	 */
	public function __construct($htmlHtmlContent = NULL) {
		parent::__construct(self::tagName);
		$this->addHtmlContent($htmlHtmlContent);
	}

	public function getObjectToHtmlString() {
		return $this->getSimpleHtmlObjectString();
	}
}

?>