<?php

class Page_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="sitecontent";
        $this->field="id";
    }
    function save($vals, $ckey = '',$field='',$site_lang="") {

        $this->db->set($vals);
        $this->db->where('site_lang', $site_lang);
        if ($ckey != '') {

            $this->db->where($ckey, $field);
            
            $this->db->update($this->table_name);

            return $ckey;

        } else {

            $this->db->insert($this->table_name);

            //return $this->db->last_query(); 

            return $this->db->insert_id();

        }

    }


	function search_for_jobs($post)
	{
		$this->db->select('*');
		$this->db->from('jobs');

		if(isset($post['job_cat']) && !empty($post['job_cat']))
		{
            $this->db->where('job_cat', $post['job_cat']);
		}

		if(isset($post['practice_area_id']) && !empty($post['practice_area_id']))
		{
            $this->db->where('practice_area_id', $post['practice_area_id']);
		}

		if(isset($post['experience_level_id']) && !empty($post['experience_level_id']))
		{
            $this->db->where('experience_level_id', $post['experience_level_id']);
		}

		$this->db->where(['status'=> 1]);
        $this->db->order_by('id', 'desc');
		return $this->db->get()->result();
		// pr($this->db->last_query());
	}


}

?>