<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Model{
    /*
     * get rows from the posts table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('job_posts')->where('action','1');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('job_title',$params['search']['keywords']);
         $this->db->order_by('j_id','DESC');
        }
        //sort data by city 
        if(!empty($params['search']['sortBy'])){
            $this->db->where('city',$params['search']['sortBy']);

            $this->db->order_by('j_id','DESC');
/*        }else{
            $this->db->order_by('j_id','desc');
*/        }
        if(!empty($params['search']['sortBy_ca'])){
            $this->db->where('job_role',$params['search']['sortBy_ca']);

            $this->db->order_by('j_id','DESC');
        }
        if(!empty($params['search']['quali_new'])){
            $this->db->like('qualification_required',$params['search']['quali_new']);
             $this->db->order_by('j_id','DESC');
        }
        if(!empty($params['search']['job_type_new'])){
            $this->db->where('job_type',$params['search']['job_type_new']);

            $this->db->order_by('j_id','DESC');
        }

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->order_by('j_id','DESC')->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

}