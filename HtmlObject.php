<?php
abstract class HtmlObject {
	/**
	 * @var string $id
	 */
	private $id = NULL; //string
	/**
	 * @var string $name
	 */
	private $name = NULL; //string
	/**
	 * @var string $class
	 */
	private $class = NULL; //string.
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
	 */
	public function setStyle( $style ) {
		$this->style = $style;
	}

	/**
	 * @return $class
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @param $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @param $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @param $class
	 */
	public function setClass( $class ) {
		$this->class = $class;
	}
	
	
	private function setExtraAttributeList( $extra_attributes ) {
		$this->extra_attributes = $extra_attributes;
	}
	
	/**
	 *  @var Attribute[] $styles
	 **/
	private function setStyleList( $styles ) {
		$this->styles = $styles;
	}
	
	/**
	 * @var string $name name of attribute
	 * @var mixed $value value of attribute
	 *
	 **/
	public function addExtraAttribute( $name, $value ) {
		if( $this->extra_attributes == NULL )
			$this->extra_attributes = new ArrayObject();
			
		if( strcasecmp($name, "style") != 0 )
			$this->extra_attributes->offsetSet($name, new Attribute( $name, $value ) );
		else{
			$splittedStyles = explode(";", $value);
			foreach( $splittedStyles as $singleStyle ){
				$singleStyle = trim($singleStyle);
				$s = explode(":", $singleStyle);
				
				if( count($s) == 2 )
					$this->addStyle( trim($s[0]), trim($s[1]) );
			}
		}
	}
	
	/**
	 * @var string $name
	 * @var mixed $value
	 **/
	public function addStyle( $name, $value ) {
		if( $this->styles == NULL )
			$this->styles = new ArrayObject();
			
			$this->styles->offsetSet($name, new Attribute( $name, $value ) );
	}
	
	/**
	 * @return string
	 * String representation style HTML attribute
	 */
	public function getStylesAttribute(){
		$ret = "";
		if( $this->styles != NULL ){
			foreach ( $this->styles as $_attribute){
				/* @var Attribute $_attribute */
				if( strlen( $_attribute->getName() ) > 0 )
					$ret .= $_attribute->getName().": ".$_attribute->getValue()."; ";
			}
		}
		
		$ret = trim($ret);
		if( strlen($ret) > 0 )
			return "style=\"".$ret."\"";
		else
			return "";
	}
	
	/**
	 * @return string
	 * String representation of HTML Attribute whitout style attribute
	 */
	public function getAttributesString(){
		$ret = "";
		if( $this->extra_attributes != NULL ){
			foreach ( $this->extra_attributes as $_attribute){
				/* @var Attribute $_attribute */
				if( strlen( $_attribute->getName() ) > 0 )
					$ret .= $_attribute->getName()."=\"".$_attribute->getValue()."\" ";
			}
		}
		$ret = trim($ret);
		return $ret;
	}
	
	/**
	 * @return string
	 * String representation of all HTML Attributes
	 */
	protected function getStringObject(){
		$object = "";
		if( $this->id != NULL )
			$object .= "id=\"$this->id\" ";
		
		if( $this->name != NULL )
			$object .= "name=\"$this->name\" ";
		
		if( $this->class != NULL )
			$object .= "class=\"$this->class\" ";
		
		$object .= trim( $this->getAttributesString()." ".$this->getStylesAttribute() );
		
		return $object;
	}
}

//include (implode ( DIRECTORY_SEPARATOR, array ( 'class', 'html', 'Attribute.php' ) ));
//include (implode ( DIRECTORY_SEPARATOR, array ( 'class', 'html', 'IFrame.php' ) ));
?>