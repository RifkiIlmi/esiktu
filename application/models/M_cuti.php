<?php

class M_cuti extends CI_model 
{
    
    public function createCuti($data)
    {
        $query= $this->db->insert('cuti',$data);
        if($query){
            return true;
            return $query;
        }else{
            return false;
        }
    }

    public function getCutiPnsFil($filter)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $this->db->where('YEAR(mulai_cuti)',$filter);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCutiPns()
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCutiPnsWhere($id)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('pns', 'pns.fk_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $this->db->where(array('id_cuti' => $id));
        $query = $this->db->get();
        return $query->result();
    }
    public function getCutiHonorerWhere($id)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $this->db->where(array('id_cuti' => $id));
        $query = $this->db->get();
        return $query->result();
    }


    public function getCutiHonorer()
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCutiHonorerFil($filter)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('pegawai', 'pegawai.NIP=cuti.pegawai_NIP');
        $this->db->join('honorer', 'honorer.pegawai_NIP=pegawai.NIP');
        $this->db->order_by('cuti.mulai_cuti', 'ASC');
        $this->db->where('YEAR(mulai_cuti)',$filter);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_cuti($data, $id)
    {
        $this->db->where('id_cuti', $id);
        $query= $this->db->update('cuti',$data);
    }
    

    public function delete_cuti($id)
    {
        $this->db->where('id_cuti', $id);
        $this->db->delete('cuti');
        redirect('DataCuti/cuti_kerja');
    }

}
