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

    function session_load() {
        // Selects most recent record
        $query ="select * from session order by id DESC limit 1";
        $session = $this->db->query($query);
        if($session->num_rows() > 0){
            $this->session->ordertype = $session->result()[0]->ordertype;
            $this->session->layout = $session->result()[0]->layout;
            $this->session->editmode = $session->result()[0]->editmode;
        }
        // }
    }

    function session_save() {
        $this->db->insert('session', ['ordertype' => $this->session->ordertype, 'layout' => $this->session->layout, 'editmode' => $this->session->editmode]);
    }

    function validate($player) {

        $error = array();
        if($player->first_name == null){
            $error = array_merge($error, ['first_name_error' => 'First name is required.']);
        }
        if($player->last_name == null){
            $error = array_merge($error, ['last_name_error' => 'Last name is required.']);
        }
        if(!in_array($player->position, ['Quarterback','Punter','Wide receiver','Running back','Cornerback','Free safety','Strong safety','Fullback','Outside Linebacker','Middle Linebacker','Defensive end','Guard Tackle','Tight end'])){
            $error = array_merge($error, ['position_error' => 'Position is invalid.']);
        }
        $jersey_query = "select jersey from players where jersey = " . $player->jersey;
        $jersey_data = $this->db->query($jersey_query);

        if($jersey_data->num_rows() > 0){
            $error = array_merge($error, ['jersey_error' => 'Jersey number is taken.']);
        }
        if(count($error)){
            return $error;
        }
        return true;
    }

}
