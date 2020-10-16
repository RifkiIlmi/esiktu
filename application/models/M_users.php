<?php

class M_users extends CI_model 
{
    public function createUser($data)
    {
        $query= $this->db->insert('user',$data);
        if($query){
            return true;
            return $query;
        }else{
            return false;
        }
    }

    public function nonaktif($id)
    {
        $status = array(
            'status'  => 0,
        );

        $this->db->where('pegawai_NIP', $id);
        $query= $this->db->update('user',$status);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}
    }

    public function aktifkan($id)
    {
        $status = array(
            'status'  => 1,
        );

        $this->db->where('pegawai_NIP', $id);
        $query= $this->db->update('user',$status);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}
    }

    

    public function deleteUser($id)
    {
        $this->db->where('pegawai_NIP', $id);
        $this->db->delete('user');
    }

}
