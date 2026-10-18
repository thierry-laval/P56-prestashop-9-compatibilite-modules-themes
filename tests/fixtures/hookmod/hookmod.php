<?php
class Hookmod extends Module
{
    public function install()
    {
        return parent::install() && $this->registerHook('displayCustomerAccountTop') && $this->registerHook('actionOrderHasBeenShipped');
    }
    public function hookDisplayCustomerAccountTop($params) { return 'x'; }
    public function hookActionOrderHasBeenShipped($params) { return true; }
}
