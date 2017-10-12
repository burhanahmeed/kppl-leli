<?php
class GeneralModel extends CI_Model {

        public function create($table, $data){
                $result = $this->db->insert($table, $data);
                if ($result) {
                     return true;
                }
        }
        public function getItem($field, $table){
                $query = $this->db->select($field)
                        ->from($table)
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function update($table, $where, $data){
                $this->db->where($where)
                        ->update($table, $data);
        }
        public function destroy($table, $where){
                $this->db->where($where)
                        ->delete($table); 
        }
        public function getByParam($table, $where){
                $query = $this->db->select('*')
                        ->from($table)
                        ->where($where)
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function query($sql){
                $query = $this->db->query($sql);
                return ($query->num_rows()<=0)? false : $query->result_array();
        }
        public function getPenawaran($iduser){
                $query = $this->db->select('id_penawaran, penawaran_tabel.id_barang, tawaran, penawaran_tabel.timestamp, barang_tabel.nama, barang_tabel.detail, barang_tabel.harga_awal, barang_tabel.deadline, barang_tabel.gambar')
                        ->from('penawaran_tabel')
                        ->join('barang_tabel','barang_tabel.id_barang=penawaran_tabel.id_barang','inner')
                        ->where('penawaran_tabel.id_user', $iduser)
                        ->order_by('penawaran_tabel.timestamp', 'DESC')
                        ->get();
                return ($query->num_rows()<=0)? false : $query->result_array();
        }

}

?>