<?php
class Equipe_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all(){
        $query = $this->db->get('equipe');
            return $query->result();
    }
    
    function save_equipe(){
            $data = array(
            'nom' => $this->input->post('nom'),
            'entreneur'    => $this->input->post('entreneur'),
            'directeur'      => $this->input->post('directeur'),            
            'date_creation' => $this->input->post('date_creation'),
            'description' => $this->input->post('description'),
            'lieu_origin' => $this->input->post('lieu_origin')
        );

        $this->db->insert('equipe', $data);
    }
    
    
    function get_equipe($id){
        $this->db->select('*')
                ->from('equipe')
                ->where('id', $id)
                ->limit(1);
        $query = $this->db->get();
        if($query->num_rows()==1)
            return $query->result();
        else
            return false;
    }
}