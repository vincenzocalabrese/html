# html
Create abstrat html code with php object. Based on w3c school and HTML5 definition<br />
<br />
Before print string HTML reprentation this library use dindent( https://github.com/gajus/dindent/ ) to format a code.<br />
<br />
Usage:<br />
- include the library: <br />
  change dir before require_once AHtmlObject.php<br />
  <br />
  chdir ( 'html' );<br />
  require_once( 'AHtmlObject.php' );<br />
  chdir( '..' );<br />
  
- make your object!<br />
  $_div = new Div();<br />
  $_div->setId('div-id');<br />
  $_div->addExtraAttribute('custom-attr', 'attribute1');<br />
  $_div->addExtraAttribute('custom-attr2', 'attribute2');<br />
  $_div->addExtraAttribute('style', 'float: left');<br />
  $_div->addStryle('color', 'red');<br />
  $_div->addHtmlContent('first');<br />
  <br />
  $_strong = new Strong('strong text');<br />
  $_div->addHtmlContent($_strong);<br />
  <br />
  $_div->printObject();<br />
  <br />
  Result:<br />
  <br />
  &lt;div id="div-id" custom-attr="attribute1" custom-attr="attribute2" style="float:left; color: red;"&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;first<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;strong text&lt;/strong&gt;<br />
  &lt;/div&gt;<br />
  <br />
  This is a little example, but is possible create more complex page with table and other html tag.<br />
  This library is not completed at this time, some tag is missing...<br />
  <br />
  Enjoy!
