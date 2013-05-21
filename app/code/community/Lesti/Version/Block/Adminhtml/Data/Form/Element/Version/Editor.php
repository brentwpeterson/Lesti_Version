<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 20.05.13
 * Time: 11:22
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Version_Block_Adminhtml_Data_Form_Element_Version_Editor extends Varien_Data_Form_Element_Abstract
{

    public function __construct($attributes=array())
    {
        parent::__construct($attributes);
        $this->setType('version_editor');
        $this->setTemplate('version/cms/page.phtml');
    }

    /**
     * Generates element html
     *
     * @return string
     */
    public function getElementHtml()
    {
        $html = $this->getBeforeElementHtml();
        $html .= '<table id="version_edit" style="width:100%;">';
        $html .= '<tr><td><b>Older Version</b></td><td><b>Newer Version</b></td></tr>';
        $diff = $this->getDiff();
        $html .= '<tr><td id="version_edit_old">'.$diff[0].'</td><td id="version_edit_new">'.$diff[1].'</td></tr>';
        $html .= '</table>';
        $html .= $this->getAfterElementHtml();
        return $html;
    }

}