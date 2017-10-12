<?php
class UserModel extends CI_Model {

        public function create($table, $data){
                $result = $this->db->insert($table, $data);
                if ($result) {
                        return true;
                }
        }
        public function view($field, $table){
                $query = $this->db->select($field)
                        ->from($table)
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function authentication($table, $condition1){
                $query = $this->db->select('*')
                        ->from($table)
                        ->where($condition1)
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function getByParam($table, $where){
                $query = $this->db->select('*')
                        ->from($table)
                        ->where($where)
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function destroy($where, $table){
                $this->db->where($where)
                        ->delete($table);
        }

}

?>