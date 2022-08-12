<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Case_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="case_studies";
        $this->field="id";
    }
}
?>



