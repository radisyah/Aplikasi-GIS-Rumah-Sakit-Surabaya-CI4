<?php 
namespace App\Models;
use CodeIgniter\Model;

class ModelUser extends Model
{
  public function all_data(){
    return $this->db->table('tbl_user')
    ->join('tbl_profil', 'tbl_profil.id_profil = tbl_user.id_profil', 'left')
    ->orderBy('id_user', 'DESC')
    ->get()
    ->getResultArray();
  }

  public function detail_data($id_user){
    return $this->db->table('tbl_user')
    ->join('tbl_profil', 'tbl_profil.id_profil = tbl_user.id_profil', 'left')
    ->where('id_user',$id_user)
    ->get()
    ->getRowArray();
  }

  public function update_data($data){
    $this->db->table('tbl_user')
    ->where('id_user',$data['id_user'])
    ->update($data);
  }
	
}
