<?php
namespace App\Models;
use CodeIgniter\Model;


class ModelRumkit extends Model
{
 
  public function all_data(){
    return $this->db->table('tbl_rumkit')
    ->orderBy('id_rumkit', 'DESC')
    ->get()
    ->getResultArray();
  }

  public function detail_data($id_rumkit)
  {
    return $this->db->table('tbl_rumkit')
    ->where('id_rumkit', $id_rumkit)
    ->get()
    ->getRowArray();
  }

  public function add($data)
  {
    $this->db->table('tbl_rumkit')->insert($data);
  }

  public function delete_data($data){
    $this->db->table('tbl_rumkit')
    ->where('id_rumkit',$data['id_rumkit'])
    ->delete($data);
  }

  public function update_data($data){
    $this->db->table('tbl_rumkit')
    ->where('id_rumkit',$data['id_rumkit'])
    ->update($data);
  }


}
