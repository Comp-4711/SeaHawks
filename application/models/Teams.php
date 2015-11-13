<?php
    class Teams extends MY_Model {
        // Set up league teams info
        protected $teams = array(
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
        );
        function __construct(){
            parent::__construct();
        }

        // Returns all teams
        function all(){
            return $this->teams;
        }

        // Returns all teams associated with a passed in conference and region
        function getRegion($conference, $region){
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
        }

    }

 ?>
