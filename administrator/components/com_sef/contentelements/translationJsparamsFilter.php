<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 */

// Don't allow direct linking
defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_sef'.DS.'classes'.DS.'seftools.php');

class TranslateParams_sefexts extends TranslateParams_xml
{
	function TranslateParams_sefexts($original, $translation, $fieldname, $fields=null){

		$this->fieldname = $fieldname;
		global $mainframe;
		$content = null;
		foreach ($fields as $field) {
			if ($field->Type=="params"){
				$content = $field->originalValue;
				break;
			}
		}
		if (is_null($content)){
			echo JText::_("PROBLEMS WITH CONTENT ELEMENT FILE");
			exit();
		}
		$lang =& JFactory::getLanguage();
		$lang->load("com_sef", JPATH_SITE);

		$this->origparams = new  JParameter( $original, JPATH_ADMINISTRATOR.DS.'components'.DS.'com_sef'.DS.'extensions_params.xml');
		$this->transparams = new  JParameter( $translation, JPATH_ADMINISTRATOR.DS.'components'.DS.'com_sef'.DS.'extensions_params.xml');
		$this->defaultparams = new  JParameter( "", JPATH_ADMINISTRATOR.DS.'components'.DS.'com_sef'.DS.'extensions_params.xml');
		$this->fields = $fields;
	}

	function showOriginal(){
		parent::showOriginal();

		$output = "";
		if ($this->origparams->getNumParams('Common')) {
			$fieldname='orig_'.$this->fieldname;
			$output .= $this->origparams->render($fieldname, 'Common');
		}
		echo $output;
	}

	function showDefault(){
		parent::showDefault();

		$output = "<span style='display:none'>";
		if ($this->origparams->getNumParams('Common')) {
			$fieldname='defaultvalue_'.$this->fieldname;
			$output .= $this->defaultparams->render($fieldname, 'Common');
		}
		$output .= "</span>\n";
		echo $output;
	}

	function editTranslation(){
		parent::editTranslation();

		$output = "";
		if ($this->origparams->getNumParams('Common')) {
			$fieldname='refField_'.$this->fieldname;
			$output .= $this->transparams->render($fieldname, 'Common');
		}
		echo $output;
	}
}

// Just a helper class doing nothing
class translationJsparamsFilter extends translationFilter
{
    function translationJsparamsFilter ($contentElement){
        $this->filterNullValue = 'all';
        $this->filterType = 'jsparams';
        $this->filterField = $contentElement->getFilter('jsparams');
        parent::translationFilter($contentElement);
    }

    function _createFilter(){
        return '';
    }

    function _createfilterHTML(){
        return '';
    }

}

?>
