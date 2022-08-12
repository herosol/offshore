<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hocl_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="hocl";
        $this->field="id";
    }
}
?>



