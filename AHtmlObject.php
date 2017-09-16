<?php
/**
 * @author Vincenzo Calabrese
 * @version 0.1.0
 */
require_once 'dindent/Indenter.php';
$files = scandir(".");
foreach ($files as $file) {
	if (!is_dir($file) && $file != "HtmlObject.php")
		require_once $file;
}

abstract class AHtmlObject {
	/**
	 * @var ArrayObject $htmlContent
	 */
	private $htmlContent = NULL;
	/**
	 * @var string $id
	 */
	private $id = NULL;
	/**
	 * @var string $name
	 */
	private $name = NULL;
	/**
	 * @var ArrayObject $class
	 */
	private $class = NULL;
	/**
	 * @var ArrayObject $extra_attributes
	 * @internal Attribute
	 **/
	private $extra_attributes = NULL;

	/**
	 * @var ArrayObject $styles
	 * @internal Attribute
	 **/
	private $styles = NULL;

	/**
	 * A String representation of HTML object
	 */
	abstract public function getObjectToHtmlString();

	/**
	 * A String representation of HTML object
	 */
	public function printObject() {
		echo self::beautifyHtml($this->getObjectToHtmlString());
		//echo $this->getObjectToHtmlString();

	}

	/**
	 * @return $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return $style
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * @param $style
	 * @return $this Modified object
	 */
	public function setStyle($style) {
		$this->style = $style;
		return $this;
	}

	/**
	 * @return $class
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @param string $id
	 * @return $this Modified object
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @param $name
	 * @return $this Modified object
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * @param $class
	 * @return $this Modified object
	 */
	private function setClass($class) {
		$this->class = $class;
		return $this;
	}

	/**
	 * @param $class
	 * @return $this Modified object
	 */
	public function addClass($class) {
		if ($this->class == NULL)
			$this->class = new ArrayObject();

		$this->class->append($class);
		return $this;
	}

	/**
	 * @param $extra_attributes
	 * @return $this Modified object
	 */
	private function setExtraAttributeList($extra_attributes) {
		$this->extra_attributes = $extra_attributes;
		return $this;
	}

	/**
	 * @var Attribute[] $styles
	 * @return $this Modified object
	 **/
	private function setStyleList($styles) {
		$this->styles = $styles;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHtmlContent() {
		$object = NULL;
		if ($this->htmlContent != NULL) {
			$object = "";
			foreach ($this->htmlContent as $htmlContent) {
				if (is_subclass_of($htmlContent, get_class()) || is_subclass_of($htmlContent, "ASimpleHtmlObject"))
					$object .= $htmlContent->getObjectToHtmlString() . "";
				else
					$object .= $htmlContent . "";
			}
		}

		return $object;
	}

	/**
	 * @return ArrayObject
	 */
	public function getHtmlContentList() {
		return $this->htmlContent;
	}

	/**
	 * @param ArrayObject $htmlContent
	 * @return $this Modified object
	 */
	private function setHtmlContent($htmlContent) {
		$this->htmlContent = $htmlContent;
		return $this;
	}

	/**
	 * @param string|AHtmlObject $htmlContent
	 * @return $this Modified object
	 */
	public function addHtmlContent($htmlContent) {
		if ($htmlContent !== NULL) {
			if ($this->htmlContent === NULL)
				$this->htmlContent = new ArrayObject();

			$this->htmlContent->append($htmlContent);
		}
		return $this;
	}

	/**
	 * @var string $name name of attribute
	 * @var mixed $value value of attribute
	 * @return $this Modified object
	 *
	 **/
	public function addExtraAttribute($name, $value) {
		if ($this->extra_attributes == NULL)
			$this->extra_attributes = new ArrayObject();

		if (strcasecmp($name, "style") != 0)
			$this->extra_attributes->offsetSet($name, new Attribute($name, $value));
		else {
			$splittedStyles = explode(";", $value);
			foreach ($splittedStyles as $singleStyle) {
				$singleStyle = trim($singleStyle);
				$s           = explode(":", $singleStyle);

				if (count($s) == 2)
					$this->addStyle(trim($s[0]), trim($s[1]));
			}
		}
		return $this;
	}

	/**
	 * @var string $name
	 * @var mixed $value
	 * @return $this Modified object
	 **/
	public function addStyle($name, $value) {
		if ($this->styles == NULL)
			$this->styles = new ArrayObject();

		$this->styles->offsetSet($name, new Attribute($name, $value));
		return $this;
	}

	/**
	 * @return string
	 * String representation style HTML attribute
	 */
	protected function getStylesAttributeString() {
		$object = "";
		if ($this->styles != NULL) {
			foreach ($this->styles as $_attribute) {
				/* @var Attribute $_attribute */
				if (strlen($_attribute->getName()) > 0)
					$object .= $_attribute->getName() . ": " . $_attribute->getValue() . "; ";
			}
		}

		if (strlen($object) > 0)
			$object = "style=\"" . $object . "\"";
		else
			$object = "";

		return self::removeExcessWhitespaces($object);
	}

	/**
	 * @return string
	 * String representation of HTML Attribute whitout style attribute
	 */
	protected function getExtraAttributesString() {
		$object = "";
		if ($this->extra_attributes != NULL) {
			foreach ($this->extra_attributes as $_attribute) {
				/* @var Attribute $_attribute */
				if (strlen($_attribute->getName()) > 0)
					$object .= $_attribute->getName() . "=\"" . $_attribute->getValue() . "\" ";
			}
		}

		return self::removeExcessWhitespaces($object);
	}

	/**
	 * @return string
	 * String representation of all HTML Attributes
	 */
	protected function getExtraAttributeAndStyleString() {
		$object = "";
		if ($this->id != NULL)
			$object .= " id=\"$this->id\" ";

		if ($this->name != NULL)
			$object .= " name=\"$this->name\" ";

		if ($this->class != NULL) {
			$object .= " class=\"";
			foreach ($this->class as $class)
				$object .= $class . " ";

			$object = rtrim($object) . "\" ";
		}

		$object .= $this->getExtraAttributesString() . " " . $this->getStylesAttributeString();

		return self::removeExcessWhitespaces($object);
	}

	/**
	 * @param $str
	 * @return string String without extra spaces.
	 */
	public static function removeExcessWhitespaces($str) {
		return preg_replace('/\h+/', ' ', $str);
	}

	private static function beautifyHtml($buffer) {
		$indenter = new \Gajus\Dindent\Indenter();
		// load our document into a DOM object
		$dom = new DOMDocument();
		// we want nice output
		$dom->preserveWhiteSpace = FALSE;
		$dom->loadHTML($buffer);
		$dom->formatOutput = TRUE;

		return $indenter->indent( $dom->saveHTML() );
	}
}
?>