<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Strong extends ASimpleHtmlObject {
	const tagName = "strong";

	/**
	 * Strong constructor.
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