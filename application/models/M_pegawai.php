<?php

class M_pegawai extends CI_model 
{
  
  public function data_pns()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('PNS', 'PNS.fk_NIP=pegawai.NIP');
        $this->db->join('pangkat', 'pangkat.id_pangkat=PNS.fk_id_pangkat');
        $this->db->join('golongan', 'golongan.id_golongan=PNS.fk_id_golongan'); 
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }

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
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_honorer()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP');
        $this->db->join('pns', 'pns.id_PNS=honorer.fk_id_PNS');
        // $this->db->join('pengalaman_kerja', 'pengalaman_kerja.id_pengalaman_kerja=PNS.fk_id_pengalaman_kerja');
        // $this->db->join('pendidikan_formal', 'pendidikan_formal.PNS_id_PNS=PNS.id_PNS');
        // $this->db->join('pendidikan_j_t', 'pendidikan_j_t.PNS_id_PNS=PNS.id_PNS');
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }
  
    public function pegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');

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
    public function input_honorer($data)
    {
        $query= $this->db->insert('honorer',$data);
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
    public function get_pns()
    {
        $this->db->select('*');
        $this->db->from('pns');
        $this->db->join('pegawai', 'pegawai.NIP=pns.fk_NIP');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_pns($id)
    {
        $this->db->where('NIP', $id);
        $this->db->delete('pegawai');

    }
    public function selengkapnya_pns($id)
    {
        $this->db->from('pegawai');
        $this->db->join('PNS', 'PNS.fk_NIP=pegawai.NIP');
        $this->db->join('pangkat', 'pangkat.id_pangkat=PNS.fk_id_pangkat');
        $this->db->join('golongan', 'golongan.id_golongan=PNS.fk_id_golongan');
        $this->db->join('ruang', 'ruang.id_ruang=PNS.fk_id_ruang');
        $this->db->order_by('pegawai.nama', 'ASC');
        $this->db->where('NIP', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function pengalaman_kerja($id)
    {
        $this->db->from('pengalaman_kerja');
        $this->db->join('PNS', 'PNS.id_PNS=pengalaman_kerja.PNS_id_PNS');
        $this->db->where('fk_NIP', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function pendidikan_formal($id)
    {
        $this->db->from('pendidikan_formal');
        $this->db->join('PNS', 'PNS.id_PNS=pendidikan_formal.PNS_id_PNS');
        $this->db->where('fk_NIP', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function pendidikan_j_t($id)
    {
        $this->db->from('pendidikan_j_t');
        $this->db->join('PNS', 'PNS.id_PNS=pendidikan_j_t.PNS_id_PNS');
        $this->db->where('fk_NIP', $id);
        $query = $this->db->get();
        return $query->result();
        
    }

}
