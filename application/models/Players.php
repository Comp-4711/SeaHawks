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

    // Retrieve specified number of players in the roster, ordered by jersey number
    // Each player has a name, jersey, associated image, position and biography
    // Takes starting index and limit of records to return as parameters
    // Returns an array of all team members on the roster
    function allByJersey($limit, $start) {
        if($start >= 0) {
            $this->db->limit($limit, $start);

            $this->db->order_by('jersey', 'asc');
            $members = $this->db->get('players');
            if($members->num_rows() > 0) {
                foreach($members->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        return false;
    }
    
    // Retrieve specified number of players in the roster, ordered by last name
    // Each player has a name, jersey, associated image, position and biography
    // Takes starting index and limit of records to return as parameters
    // Returns an array of all team members on the roster
    function allByName($limit, $start) {
        if($start >= 0) {
            $this->db->limit($limit, $start);

            $this->db->order_by('last_name', 'asc');
            $members = $this->db->get('players');
            if($members->num_rows() > 0) {
                foreach($members->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        return false;
    }
    
    // Retrieve specified number of players in the roster, ordered by position
    // Each player has a name, jersey, associated image, position and biography
    // Takes starting index and limit of records to return as parameters
    // Returns an array of all team members on the roster
    function allByPosition($limit, $start) {
        if($start >= 0) {
            $this->db->limit($limit, $start);

            $this->db->order_by('position', 'asc');
            $members = $this->db->get('players');
            if($members->num_rows() > 0) {
                foreach($members->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        return false;
    }
    
    // Get total number of players stored in the database
    function playerCount() {
        return $this->db->get('players')->num_rows();
    }
    
}