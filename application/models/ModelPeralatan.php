<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 
 
class ModelPeralatan extends CI_Model 
{ 
    //manajemen buku 
    public function getperalatan() 
    { 
        return $this->db->get('peralatan'); 
    } 
 
    public function peralatanWhere($where) 
    { 
        return $this->db->get_where('peralatan', $where); 
    } 
 
    public function simpanperalatan($data = null) 
    { 
        $this->db->insert('peralatan',$data); 
    } 
 
    public function updateperalatan($data = null, $where = null) 
    { 
        $this->db->update('peralatan', $data, $where); 
    } 
 
    public function hapusperalatan($where = null) 
    { 
        $this->db->delete('peralatan', $where); 
    } 
 
    public function total($field, $where) 
    { 
        $this->db->select_sum($field); 
        if(!empty($where) && count($where) > 0){ 
            $this->db->where($where); 
        }
        $this->db->from('peralatan'); 
        return $this->db->get()->row($field); 
    } 
     
    //manajemen kategori 
    public function getKategori() 
    { 
        return $this->db->get('kategori'); 
    } 
 
    public function kategoriWhere($where) 
    { 
        return $this->db->get_where('kategori', $where); 
    } 
 
    public function simpanKategori($data = null) 
    { 
        $this->db->insert('kategori', $data); 
    } 
 
    public function hapusKategori($where = null) 
    { 
        $this->db->delete('kategori', $where); 
    } 
 
    public function updateKategori($where = null, $data = null) 
    { 
        $this->db->update('kategori', $data, $where); 
    }
     
    //join 
    public function joinKategoriperalatan($where) 
    { 
        $this->db->select('peralatan.id_kategori,kategori.kategori'); 
        $this->db->from('peralatan'); 
        $this->db->join('kategori','kategori.id = peralatan.id_kategori'); 
        $this->db->where($where); 
        return $this->db->get(); 
    } 
}