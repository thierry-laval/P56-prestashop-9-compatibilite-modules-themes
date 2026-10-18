<?php
namespace Foo;
use Tools as T, Configuration;
use PrestaShop\PrestaShop\Adapter\{Product\ProductDataProvider, Pack\PackDataProvider as PDP};
class Variantsmod extends \Module
{
    const HOOKS = ['displayHeader', 'displayCustomerAccountTop'];
    private $hooksList = array('actionAjaxDieBefore');
    public function __construct()
    {
        $this->ps_versions_compliancy['max'] = '9.0';
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => '9.99.99'];
    }
    public function a()
    {
        $hooks = ['adaptImageLink'];
        T::encrypt('x');
        \each($a);
        $p = new PDP();
        return Tools::displayPrice(1); // Foo\Tools sans import : signale (oubli probable de use)
    }
}
