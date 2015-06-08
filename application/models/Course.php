<?php
class Course extends CI_Model {
     function get_all_courses()
     {
         return $this->db->query("SELECT * FROM courses ORDER BY date_added DESC")->result_array();
     }
     function get_course_by_id($course_id)
     {   
         return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
     }

     function validate_course($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('c_name', "Course Name", 'required|trim|alpha_numeric|min_length[15]');

        if($this->form_validation->run()===FALSE){
            return FALSE;
        }
        else
            return TRUE;
     }

     function add_course($course,$description)
     {
         $query = "INSERT INTO Courses (name, description, date_added) VALUES (?,?,?)";
         $values = array($course, $description, date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }

     function delete_course($id){
        $query = "DELETE FROM courses WHERE id = $id";
        return $this->db->query($query);  
     }
}
?>