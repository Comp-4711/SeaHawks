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
    function allByJersey() {
        $this->db->order_by('jersey', 'asc');
        $members = $this->db->get('players');
        return $members->result_array();
    }
    
    function allByName() {
        $this->db->order_by('last_name', 'asc');
        $members = $this->db->get('players');
        return $members->result_array();
    }
    
    function allByPosition() {
        $this->db->order_by('position', 'asc');
        $members = $this->db->get('players');
        return $members->result_array();
    }
    
}