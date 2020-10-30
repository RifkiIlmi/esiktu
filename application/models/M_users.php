<?php

class M_users extends CI_model 
{

    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('pegawai', 'pegawai.NIP=user.pegawai_NIP');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP','left');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP','left');
        // $this->db->join('pangkat', 'pangkat.id_pangkat=pns.fk_id_pangkat');
        // $this->db->join('golongan', 'golongan.id_golongan=pns.fk_id_golongan');
        // $this->db->join('pengalaman_kerja', 'pengalaman_kerja.id_pengalaman_kerja=PNS.fk_id_pengalaman_kerja');
        // $this->db->join('pendidikan_formal', 'pendidikan_formal.PNS_id_PNS=PNS.id_PNS');
        // $this->db->join('pendidikan_j_t', 'pendidikan_j_t.PNS_id_PNS=PNS.id_PNS');
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
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

    public function update_user($data,$id)
    {
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $akses = $this->input->post('hak_akses');
        
        $this->db->set('username',$username);
        $this->db->set('password',$password);
        $this->db->set('hak_akses',$akses);
        
        $this->db->where('pegawai_NIP', $id);
        $query= $this->db->update('user');
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
