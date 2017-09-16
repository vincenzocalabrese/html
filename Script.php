<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.calabrese
 * Date: 04/08/2017
 * Time: 09:51
 */

class Script extends AHtmlObject {
	/**
	 * @var boolean
	 */
	private $async;
	/**
	 * @var string
	 */
	private $charset;
	/**
	 * @var string
	 */
	private $defer;
	/**
	 * @var string
	 */
	private $src;
	/**
	 * @var string
	 */
	private $type;

	/**
	 * @return bool
	 */
	public function isAsync() {
		return $this->async;
	}

	/**
	 * @param bool $async
	 * @return $this Modified object
	 */
	public function setAsync($async) {
		$this->async = $async;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCharset() {
		return $this->charset;
	}

	/**
	 * @param string $charset
	 * @return $this Modified object
	 */
	public function setCharset($charset) {
		$this->charset = $charset;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDefer() {
		return $this->defer;
	}

	/**
	 * @param string $defer
	 * @return $this Modified object
	 */
	public function setDefer($defer) {
		$this->defer = $defer;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @param string $src
	 * @return $this Modified object
	 */
	public function setSrc($src) {
		$this->src = $src;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return $this Modified object
	 */
	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * A String representation of HTML object
	 */
	public function getObjectToHtmlString() {
		$object = "<script " . $this->getExtraAttributeAndStyleString();
		if ($this->async != NULL && $this->async)
			$object .= " async=\"async\"";

		if ($this->charset != NULL)
			$object .= " charset=\".$this->charset.\"";

		if ($this->defer != NULL)
			$object .= " defer=\"" . $this->defer . "\"";

		if ($this->src != NULL)
			$object .= " src=\"" . $this->src . "\"";

		if ($this->type != NULL)
			$object .= " type=\"" . $this->type . "\"";

		$object .= ">";
		$object .= $this->getHtmlContent();
		$object .= "</script>\n";

		return $object;
	}
}