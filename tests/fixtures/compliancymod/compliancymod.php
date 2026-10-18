<?php
class Compliancymod extends Module {
 public function __construct() {
  $this->name = "compliancymod";
  $this->ps_versions_compliancy = ["min" => "1.7.0", "max" => "8.99.99"];
  parent::__construct();
 }
}
