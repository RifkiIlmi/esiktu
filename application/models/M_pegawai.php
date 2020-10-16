<?php

class M_pegawai extends CI_model 
{

    public function cekPns($id)
    {
        $checked = $this->db->get_where('pns', [
            'fk_NIP' => $id,
            // 'password' => $password
        ])->row_array();

        if ($checked) {
            return True;
        }else{
            return false;
        }

    }

    public function getHonorerByID($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP');
        $this->db->where(array('NIP' => $id));
        $query = $this->db->get();
        return $query;
    }

    public function getPnsByID($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP');
        $this->db->where(array('NIP' => $id));
        $query = $this->db->get();
        return $query;
    }

    public function aktivasiPegawaiAkun($id)
    {
        $status = array(
            'akun'  => 'aktif',
        );

        $this->db->where('NIP', $id);
        $query= $this->db->update('pegawai',$status);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}
    }

    public function nonaktifPegawaiAkun($id)
    {
        $status = array(
            'akun'  => 'nonaktif',
        );

        $this->db->where('NIP', $id);
        $query= $this->db->update('pegawai',$status);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}
    }


    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP');
        $this->db->join('pangkat', 'pangkat.id_pangkat=pns.fk_id_pangkat');
        $this->db->join('golongan', 'golongan.id_golongan=pns.fk_id_golongan');
        // $this->db->join('pengalaman_kerja', 'pengalaman_kerja.id_pengalaman_kerja=PNS.fk_id_pengalaman_kerja');
        // $this->db->join('pendidikan_formal', 'pendidikan_formal.PNS_id_PNS=PNS.id_PNS');
        // $this->db->join('pendidikan_j_t', 'pendidikan_j_t.PNS_id_PNS=PNS.id_PNS');
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
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

    public function input_pns($data)
    {
        $query= $this->db->insert('pns',$data);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}

    }
    public function input_pegawai($data)
    {
        $query= $this->db->insert('pegawai',$data);
        if($query){
			return true;
			return $query;
		}else{
			return false;
		}

    }
    public function get_golongan()
    {
        $this->db->select('*');
        $this->db->from('golongan');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_pangkat()
    {
        $this->db->select('*');
        $this->db->from('pangkat');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_ruang()
    {
        $this->db->select('*');
        $this->db->from('ruang');
        $query = $this->db->get();
        return $query->result();
    }

    

}
