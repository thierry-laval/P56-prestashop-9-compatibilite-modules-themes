<?php
namespace Vendor\Nsmod;

use Tools;
use Configuration;
use PrestaShop\PrestaShop\Adapter\Product\ProductDataProvider;

class Service
{
    public function a()
    {
        $a = \Tools::displayPrice(1);
        $b = Tools::displayPrice(2);
        $c = \Tools::jsonEncode([]);
        $d = new \FileUploader();
        $p = new ProductDataProvider();
        return \Cart::ONLY_PRODUCTS_WITHOUT_SHIPPING;
    }
}
