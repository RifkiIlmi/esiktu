<?php

class Jurusan_model extends CI_model 
{
    public function getAllJurusan()
    {
        return $this->db->get('jurusan')->result_array();
    }
}