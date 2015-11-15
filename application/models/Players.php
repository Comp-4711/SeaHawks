<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Players extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    // Retrieve all players in the roster, ordered by jersey number
    // Each player has a name, jersey, associated image, position and biography
    // Returns an array of all team members on the roster
    function allByJersey($limit, $start) {
        $this->db->limit($limit, $start);
        
        $this->db->order_by('jersey', 'asc');
        $members = $this->db->get('players');
        if($members->num_rows() > 0) {
            foreach($members->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    function allByName($limit, $start) {
        $this->db->limit($limit, $start);
        
        $this->db->order_by('last_name', 'asc');
        $members = $this->db->get('players');
        if($members->num_rows() > 0) {
            foreach($members->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    function allByPosition($limit, $start) {
        $this->db->limit($limit, $start);
        
        $this->db->order_by('position', 'asc');
        $members = $this->db->get('players');
        if($members->num_rows() > 0) {
            foreach($members->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    function playerCount() {
        return $this->db->get('players')->num_rows();
    }
    
}