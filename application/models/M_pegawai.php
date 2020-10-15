<?php

class M_pegawai extends CI_model 
{
    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('user', 'user.pegawai_NIP=pegawai.NIP');
        $this->db->join('PNS', 'PNS.fk_NIP=pegawai.NIP');
        $this->db->join('pangkat', 'pangkat.id_pangkat=PNS.fk_id_pangkat');
        $this->db->join('golongan', 'golongan.id_golongan=PNS.fk_id_golongan');
        $this->db->join('pengalaman_kerja', 'pengalaman_kerja.id_pengalaman_kerja=PNS.fk_id_pengalaman_kerja');
        // $this->db->join('pendidikan_formal', 'pendidikan_formal.PNS_id_PNS=PNS.id_PNS');
        // $this->db->join('pendidikan_j_t', 'pendidikan_j_t.PNS_id_PNS=PNS.id_PNS');
        $this->db->order_by('pegawai.nama', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }

    

}
