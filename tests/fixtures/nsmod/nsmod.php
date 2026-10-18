<?php
class Nsmod extends Module
{
    public function __construct()
    {
        $this->name = 'nsmod';
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        parent::__construct();
    }
    public function install()
    {
        return parent::install() && $this->registerHook(array('displayCustomerAccountTop', 'actionAjaxDieBefore'));
    }
}
class FileUploader {}
function x() { return new FileUploader(); }
