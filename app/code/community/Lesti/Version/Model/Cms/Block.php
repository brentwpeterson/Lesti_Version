<?php
/**
 * Lesti_Version
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * http://opensource.org/licenses/OSL-3.0
 *
 * @package      Lesti_Version
 * @copyright    Copyright (c) 2014 Gordon Lesti (http://www.gordonlesti.com)
 * @author       Gordon Lesti <info@gordonlesti.com>
 * @license      http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

/**
 * Class Lesti_Version_Model_Cms_Block
 */
class Lesti_Version_Model_Cms_Block extends Mage_Core_Model_Abstract
{

    const CACHE_TAG              = 'cms_block';
    protected $_cacheTag         = 'cms_block';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'version_cms_block';

    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('version/cms_block');
    }

    public function createVersion(Mage_Cms_Model_Block $block)
    {
        $data = $block->getData();
        $versionData = array();
        $versionData['content'] = $data['content'];
        $versionData['parent_id'] = $data['block_id'];
        $versionData['creation_time'] = $data['update_time'];
        $versionData['user_id'] = Mage::getSingleton('admin/session')->getUser()->getId();
        $this->setData($versionData);
        $this->save();
        return $this;
    }

}