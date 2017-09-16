<?php

/**
 * @author Vincenzo Calabrese
 *
 */
class IFrame extends AHtmlObject {
	/** @var string * */
	private $sandbox = NULL;

	/** @var float * */
	private $height = NULL;

	/** @var float * */
	private $width = NULL;

	/** @var string * */
	private $src = NULL;

	/** @var string * */
	private $srcdoc = NULL;

	public function __construct($sandbox = NULL, $height = NULL, $width = NULL, $src = NULL, $srcdoc = NULL) {
		$this->sandbox = $sandbox;
		$this->height  = $height;
		$this->width   = $width;
		$this->src     = $src;
		$this->srcdoc  = $srcdoc;
	}

	/**
	 * @return $sandbox
	 */
	public function getSandbox() {
		return $this->sandbox;
	}

	/**
	 * @return $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @return $srcdoc
	 */
	public function getSrcdoc() {
		return $this->srcdoc;
	}

	/**
	 * @param $sandbox
	 * @return $this Modified object
	 */
	public function setSandbox($sandbox) {
		$this->sandbox = $sandbox;
		return $this;
	}

	/**
	 * @param $src
	 * @return $this Modified object
	 */
	public function setSrc( $src ) {
		$this->src = htmlentities( $src );
		return $this;
	}

	/**
	 * @param $srcdoc
	 * @return $this Modified object
	 */
	public function setSrcdoc($srcdoc) {
		$this->srcdoc = $srcdoc;
		return $this;
	}

	/**
	 * @return $height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @return $width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * @param $height
	 * @return $this Modified object
	 */
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}

	/**
	 * @param $width
	 * @return $this Modified object
	 */
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}

	/**
	 * String representation of IFrame. This method return HTML whit all setted attribute
	 * @see AHtmlObject::getExtraAttributeAndStyleString()
	 */
	public function getObjectToHtmlString() {
		$iFrame = "<iframe ";

		if ($this->sandbox != NULL)
			$iFrame .= "sandbox=\"$this->sandbox\" ";

		if ($this->height != NULL)
			$iFrame .= "height=\"$this->height\" ";

		if ($this->width != NULL)
			$iFrame .= "width=\"$this->width\" ";

		if ($this->src != NULL)
			$iFrame .= "src=\"$this->src\" ";

		if ($this->srcdoc != NULL)
			$iFrame .= "srcdoc=\"$this->srcdoc\" ";

		$iFrame .= $this->getExtraAttributeAndStyleString() . " >" . $this->getHtmlContent() . "</iframe>";

		return $iFrame;
	}
}

?>