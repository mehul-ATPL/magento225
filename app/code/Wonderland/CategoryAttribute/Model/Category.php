<?php

namespace Wonderland\CategoryAttribute\Model;

class Category extends \Magento\Catalog\Model\Category
{
    public function getSubmenuCategory()
    {            
        return $this->getCustomAttribute('submenu_category');            
    }
}