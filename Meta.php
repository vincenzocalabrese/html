<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:51
 */

class Meta extends AHtmlObject {
	private $content = NULL;

	private $charset = NULL;

	private $httpEquiv = NULL;

	/**
	 * Meta constructor.
	 * @param $name
	 * @param $content
	 */
	public function __construct() {
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 * @return $this Modified object
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getCharset() {
		return $this->charset;
	}

	/**
	 * @param null $charset
	 * @return $this Modified object
	 */
	public function setCharset($charset) {
		$this->charset = $charset;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getHttpEquiv() {
		return $this->httpEquiv;
	}

	/**
	 * @param null $httpEquiv
	 * @return $this Modified object
	 */
	public function setHttpEquiv($httpEquiv) {
		$this->httpEquiv = $httpEquiv;
		return $this;
	}

	/**
	 * @param AHtmlObject|string $nothing
	 * @return $this Modified object
	 */
	public function addHtmlContent($nothing) {
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$object = "";

		if ($this->getName() == NULL && $this->getContent() == NULL)
			return $object;

		$object = "<meta " . $this->getExtraAttributeAndStyleString();
		$object .= " content=\"" . $this->getContent() . "\"";

		if ($this->getCharset() != NULL)
			$object .= " charset=\"" . $this->getCharset() . "\"";

		if ($this->getHttpEquiv() != NULL)
			$object .= " http-equiv=\"" . $this->getHttpEquiv() . "\"";

		$object .= " />\n";

		return $object;
	}
}