<?php
    class Teams extends MY_Model {
        
        function __construct() {
            parent::__construct();
        }
                
        // Set up league teams info
        /*protected $teams = array(
            array("teamcode" => "NE", "name"=>"New England Patriots", "conference" => "AFC", "region"=>"East", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "NYJ", "name"=>"Buffalo Bills", "conference" => "AFC", "region"=>"East", "win"=>2, "loss"=>1, "tie"=>0),
            array("teamcode" => "BUF", "name"=>"New York Jets", "conference" => "AFC", "region"=>"East", "win"=>2, "loss"=>1, "tie"=>0),
            array("teamcode" => "MIA", "name"=>"Miami Dolphins", "conference" => "AFC", "region"=>"East", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "CIN", "name"=>"Cincinnati Bengals", "conference" => "AFC", "region"=>"North", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "PIT", "name"=>"Pittsburgh Steelers", "conference" => "AFC", "region"=>"North", "win"=>2, "loss"=>1, "tie"=>0),
            array("teamcode" => "CLE", "name"=>"Cleveland Browns", "conference" => "AFC", "region"=>"North", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "BAL", "name"=>"Baltimore Ravens", "conference" => "AFC", "region"=>"North", "win"=>0, "loss"=>3, "tie"=>0),
            array("teamcode" => "IND", "name"=>"Indianapolis Colts", "conference" => "AFC", "region"=>"South", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "JAC", "name"=>"Tennessee Titans", "conference" => "AFC", "region"=>"South", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "TEN", "name"=>"Houston Texans", "conference" => "AFC", "region"=>"South", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "HOU", "name"=>"Jacksonville Jaguars", "conference" => "AFC", "region"=>"South", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "DEN", "name"=>"Denver Broncos", "conference" => "AFC", "region"=>"West", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "OAK", "name"=>"Oakland Raiders", "conference" => "AFC", "region"=>"West", "win"=>2, "loss"=>1, "tie"=>0),
            array("teamcode" => "SD", "name"=>"Kansas City Chiefs", "conference" => "AFC", "region"=>"West", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "KC", "name"=>"San Diego Chargers", "conference" => "AFC", "region"=>"West", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "DAL", "name"=>"Dallas Cowboys", "conference" => "NFC", "region"=>"East", "win"=>2, "loss"=>1, "tie"=>0),
            array("teamcode" => "NYG", "name"=>"New York Giants", "conference" => "NFC", "region"=>"East", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "WAS", "name"=>"Washington Redskins", "conference" => "NFC", "region"=>"East", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "PHI", "name"=>"Philadelphia Eagles", "conference" => "NFC", "region"=>"East", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "GB", "name"=>"Green Bay Packers", "conference" => "NFC", "region"=>"North", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "MIN", "name"=>"Minnesota Vikings", "conference" => "NFC", "region"=>"North", "win"=>2, "loss"=>0, "tie"=>0),
            array("teamcode" => "DET", "name"=>"Detroit Lions", "conference" => "NFC", "region"=>"North", "win"=>0, "loss"=>3, "tie"=>0),
            array("teamcode" => "CHI", "name"=>"Chicago Bears", "conference" => "NFC", "region"=>"North", "win"=>0, "loss"=>3, "tie"=>0),
            array("teamcode" => "CAR", "name"=>"Carolina Panthers", "conference" => "NFC", "region"=>"South", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "ATL", "name"=>"Atlanta Falcons", "conference" => "NFC", "region"=>"South", "win"=>3, "loss"=>0, "tie"=>0),
            array("teamcode" => "TB", "name"=>"Tampa Bay Buccaneers", "conference" => "NFC", "region"=>"South", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "NO", "name"=>"New Orleans Saints", "conference" => "NFC", "region"=>"South", "win"=>0, "loss"=>3, "tie"=>0),
            array("teamcode" => "ARI", "name"=>"Arizona Cardinals", "conference" => "NFC", "region"=>"West", "win"=>3, "loss"=>3, "tie"=>0),
            array("teamcode" => "STL", "name"=>"St. Louis Rams", "conference" => "NFC", "region"=>"West", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "SF", "name"=>"San Francisco 49ers", "conference" => "NFC", "region"=>"West", "win"=>1, "loss"=>2, "tie"=>0),
            array("teamcode" => "SEA", "name"=>"Seattle Seahawks", "conference" => "NFC", "region"=>"West", "win"=>1, "loss"=>2, "tie"=>0)
        );*/

        // Returns all teams sorted by the passed-in argument
        // Used in the league display
        function getLeague($sort) {
            if($sort == 'net_points') {
                $this->db->order_by($sort, 'desc');
            } else {
                $this->db->order_by($sort, 'asc');
            }
                
            $teams = $this->db->get('teams');
            if($teams->num_rows() > 0) {
                foreach($teams->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        
        // Get all teams for a specified conference
        function getConference($sort, $conference) {
            if($sort == 'net_points') {
                $this->db->order_by($sort, 'desc');
            } else {
                $this->db->order_by($sort, 'asc');
            }
                
            $teams = $this->db->get('teams');
            if($teams->num_rows() > 0) {
                foreach($teams->result() as $row) {
                    if($row->conference == $conference) {
                        $data[] = $row;
                    }
                }
                return $data;
            }
            return false;
        }
        
        // Get all teams for a specified division
        function getDivision($sort, $division) {
            if($sort == 'net_points') {
                $this->db->order_by($sort, 'desc');
            } else {
                $this->db->order_by($sort, 'asc');
            }
                
            $teams = $this->db->get('teams');
            if($teams->num_rows() > 0) {
                foreach($teams->result() as $row) {
                    if($row->division == $division) {
                        $data[] = $row;
                    }
                }
                return $data;
            }
            return false;
        }
        
        // Get all conferences to set up conference view
        function conferences() {
            $query = "SELECT DISTINCT conference FROM teams";
            $result = $this->db->query($query);
            return $result->result();
        }
        
        // Get all divisions to set up division view
        function divisions() {
            $query = "SELECT DISTINCT division FROM teams";
            $result = $this->db->query($query);
            return $result->result();
        }
        /*function session_save() {
            $this->db->insert('session', ['ordertype' => $this->session->ordertype, 'layout' => $this->session->layout, 'editmode' => $this->session->editmode]);
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
        }*/
        
        // Returns all teams associated with a passed in conference and division
        /*function getRegion($conference, $region){
            $teams = array();
            foreach($this->teams as $team){
                if($team['conference'] == $conference && $team['region'] == $region){

                    array_push($teams, $team);
                }
            }
            return $teams;
        }

        // Get team by name
        function getTeam($name){
            foreach($this->teams as $team){
                if($team['name'] == $name){
                    return $team;
                }
            }
        }*/

    }

 ?>
