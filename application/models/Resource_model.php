<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resource_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="resources";
        $this->field="id";
    }
}
?>



