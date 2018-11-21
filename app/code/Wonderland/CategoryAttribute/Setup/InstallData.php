<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Wonderland\CategoryAttribute\Setup;
 
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
 
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
 
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
         
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'submenu_category',
            [
                'type' => 'int',
                'label' => 'Submenu Category',
                'input' => 'select',
                'required' => true,
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'default' => 0,
                'visible' => true,
                'visible_on_front' => true,
                'sort_order' => 4,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'wysiwyg_enabled' => false,
                'is_html_allowed_on_front' => false,
                'group' => 'General Information',
            ]
        ); 
        $setup->endSetup();
    }
}