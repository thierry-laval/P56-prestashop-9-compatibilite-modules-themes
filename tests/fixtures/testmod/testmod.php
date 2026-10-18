<?php
if (!defined('_PS_VERSION_')) { exit; }
use Tools as T;
class Testmod extends Module
{
    public function __construct()
    {
        $this->name = 'testmod';
        $this->ps_versions_compliancy = ['min' => '1.7.0', 'max' => '8.2.9'];
        parent::__construct();
    }
    public function install()
    {
        return parent::install()
            && $this->registerHook('displayCustomerAccountTop')
            && $this->registerHook(['actionOrderHasBeenShipped', 'displayHeader']);
    }
    public function hookDisplayCustomerAccountTop($p) { return Tools::displayPrice(10); }
    public function a()
    {
        $s = "Tools::displayPrice(1) dans une chaine";      // ne doit PAS sortir
        // Tools::displayPrice(1) dans un commentaire       // ne doit PAS sortir
        $x = tools::DISPLAYPRICE(1);                        // casse differente
        $y = \Tools::displayPrice(1);                       // FQ
        $z = T::displayPrice(1);                            // alias
        $j = Tools::jsonEncode([]);
        $c = Cart::ONLY_PRODUCTS_WITHOUT_SHIPPING;
        $e = each($arr);
        $f = create_function('', 'return 1;');
        $u = utf8_encode('x');                              // (deprecie 8.2)
        ini_set('mbstring.func_overload', 0);
        $o = new FileUploader();                            // classe propre du module (cf classes/)
        $q = Helper::displayPrice();
        $r = MyOwn::displayPrice(2);                        // classe propre, ne doit PAS sortir
        $l = $this->l('x');
        return $x . $y . $z;
    }
}
