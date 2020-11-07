<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $this->db->select()->from('teachers');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getTeacher($id = null) {
        $this->db->select('teachers.*,users.id as `user_tbl_id`,users.username,users.password as `user_tbl_password`,users.is_active as `user_tbl_active`');
        $this->db->from('teachers');
        $this->db->join('users', 'users.user_id = teachers.id', 'left');
        $this->db->where('users.role', 'teacher');
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getTeacherByEmail($email = null) {
        $this->db->select('teachers.*,users.id as `user_tbl_id`,users.username,users.password as `user_tbl_password`,users.is_active as `user_tbl_active`');
        $this->db->from('teachers');
        $this->db->join('users', 'users.user_id = teachers.id', 'left');
        $this->db->where('users.role', 'teacher');
        $this->db->where('teachers.email', $email);
        $query = $this->db->get();
        if ($email != null) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getLibraryTeacher() {
        $this->db->select('staff.*, IFNULL(libarary_members.id,0) as `libarary_member_id`, IFNULL(libarary_members.library_card_no,0) as `library_card_no`')->from('staff');

        $this->db->join('libarary_members', 'libarary_members.member_id = staff.id and libarary_members.member_type = "teacher"', 'left');

        $this->db->order_by('staff.id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('teachers');
    }

    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('teachers', $data);
        } else {
            $this->db->insert('teachers', $data);
            return $this->db->insert_id();
        }
    }

    public function getTotalTeacher() {
        $sql = "SELECT count(*) as `total_teacher` FROM `teachers`";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function searchNameLike($searchterm) {
        $this->db->select('teachers.*')->from('teachers');
        $this->db->group_start();
        $this->db->like('teachers.name', $searchterm);
        $this->db->group_end();
        $this->db->order_by('teachers.id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function rating($data){
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('staff_rating', $data);
        } else {
            $this->db->insert('staff_rating', $data);
            return $this->db->insert_id();
        }
    }
  
    public function get_teacherrestricted_mode($staff_id){
      
        $ides1="";
        $ides="";
        $class_ides="";
        $ides11="";
           $query=$this->db->query("select CONCAT_WS(',',GROUP_CONCAT(st.class_id)) as c from subject_timetable st where st.staff_id='".$staff_id."' group by st.staff_id");
           $query= $query->result_array();
           $query1=$this->db->query("select CONCAT_WS(',',GROUP_CONCAT(ct.class_id)) as c from class_teacher ct  where  ct.staff_id='".$staff_id."' group by ct.staff_id");
           $query1= $query1->result_array();
           if(!empty($query1) && !empty($query)){
            $class_ides=$query1[0]['c'].",".$query[0]['c'];
        }elseif(!empty($query)){
            $class_ides=$query[0]['c'];
        }elseif(!empty($query1)){
            $class_ides=$query1[0]['c'];
        }
        if(!empty($class_ides)){
        $ides=explode(',',$class_ides);
        foreach ($ides as $key => $value) {
          if($value!=''){
            $ides11[]=$value;
          }
        }
       $ides1=implode(',',$ides11);
        }
       
  
   
        if(!empty($ides1)){

            $class_ides= $ides1;
            $classlist=$this->db->query("select * from classes  where id in(".$class_ides.")");
            $data= $classlist->result_array();

            }else{

            $data=array();

            }

            return $data;

    } 
 
     public function get_teacherrestricted_modesections($staff_id,$classid){
        $ides1="";
        $ides="";
        $section_ides="";
        $ides11="";
        $query1=$this->db->query("select GROUP_CONCAT(st.section_id) as s from subject_timetable st where (st.staff_id='".$staff_id."' and st.class_id='".$classid."')");
        $section_id1= $query1->result_array();
        $query2=$this->db->query("select GROUP_CONCAT(st.section_id) as s from class_teacher st where (st.staff_id='".$staff_id."' and st.class_id='".$classid."')");
        $section_id2= $query2->result_array();
        if(!empty($section_id1) && !empty($section_id2)){
            $section_ides=$section_id1[0]['s'].",".$section_id2[0]['s'];
        }elseif(!empty($section_id1)){
            $section_ides=$section_id1[0]['s'];
        }elseif(!empty($section_id2)){
            $section_ides=$section_id2[0]['s'];
        }
        if(!empty($section_ides)){
        $ides=explode(',',$section_ides);
        foreach ($ides as $key => $value) {
          if($value!=''){
            $ides11[]=$value;
          }
        }
        if(!empty($ides11)){
        $ides1=implode(',',$ides11);
        }
        
        }
       
        if(!empty($ides1)){
     
         $section=$this->db->query("select id as section_id,section from sections  where id in(".$ides1.")");
      
          $data= $section->result_array();
         }else{
            $data=array();
         }

         return $data;
        
        

    }

    public function get_teacherrestricted_modeallsections($staff_id){
        $query1=$this->db->query("select GROUP_CONCAT(st.section_id) as s from subject_timetable st where (st.staff_id='".$staff_id."')");
        $section_id1= $query1->result_array();
        $query2=$this->db->query("select GROUP_CONCAT(st.section_id) as s from class_teacher st where (st.staff_id='".$staff_id."')");
        $section_id2= $query2->result_array();
        if(!empty($section_id1) && !empty($section_id2)){
            $section_ides=$section_id1[0]['s'].",".$section_id2[0]['s'];
        }elseif(!empty($section_id1)){
            $section_ides=$section_id1[0]['s'];
        }elseif(!empty($section_id2)){
            $section_ides=$section_id2[0]['s'];
        }
       $ides=explode(',',$section_ides);
        foreach ($ides as $key => $value) {
          if($value!=''){
            $ides11[]=$value;
          }
        }
        $ides1=implode(',',$ides11);
        
         if(!empty($ides1)){
         $section_ides= $ides1;
         $sectionlist=$this->db->query("select id as section_id,section from sections  where id in(".$section_ides.")");
          $data= $sectionlist->result_array();
         }else{
            $data=array();
         }
          return $data;
        
        

    } 

}
