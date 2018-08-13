<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class Html extends AHtmlObject {
	/**
	 * @var string $xmlns
	 */
	private $xmlns = "http://www.w3.org/1999/xhtml";

	/**
	 * @var Head
	 */
	private $head = NULL;

	/**
	 * @var Body
	 */
	private $body = NULL;

	/**
	 * @return Body
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * @param Body $body
	 * @return $this Modified object
	 */
	public function setBody($body) {
		$this->body = $body;
		return $this;
	}

	/**
	 * @return Footer
	 */
	public function getFooter() {
		return $this->footer;
	}

	/**
	 * @param Footer $footer
	 * @return $this Modified object
	 */
	public function setFooter($footer) {
		$this->footer = $footer;
		return $this;
	}

	/**
	 * @var Footer
	 */
	private $footer = NULL;


	/**
	 * @return $xmlns
	 */
	public function getXmlns() {
		return $this->xmlns;
	}

	/**
	 * @param $xmlns
	 * @return $this Modified object
	 */
	public function setXmlns($xmlns) {
		$this->xmlns = $xmlns;
		return $this;
	}

	/**
	 * @return Head
	 */
	public function getHead() {
		return $this->head;
	}

	/**
	 * @param Head $head
	 * @return $this Modified object
	 */
	public function setHead($head) {
		$this->head = $head;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getObjectToHtmlString() {
		$object = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">\n";
		$object .= "<html";

		if ($this->xmlns != NULL)
			$object .= " xmlns=\"" . $this->xmlns . "\"";

		$object .= ">\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
		if ($this->head != NULL)
			$object .= $this->head->getObjectToHtmlString();

		if ($this->body != NULL)
			$object .= $this->body->getObjectToHtmlString();

		if ($this->footer != NULL)
			$object .= $this->footer->getObjectToHtmlString();

		$object .= "</html>\n";

		return $object;
	}
}

?>