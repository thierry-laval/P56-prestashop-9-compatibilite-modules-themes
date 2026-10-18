<?php
namespace Vendor\Nsmod;

use PrestaShopBundle\Controller\Admin\CommonController;

class MyController extends CommonController
{
    public function test()
    {
        $this->renderFieldAction();
    }
}
