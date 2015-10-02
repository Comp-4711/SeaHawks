<?php
    class League extends CI_Model {
        protected $teams = array(
            array("name"=>"New England Patriots", "conference" => "AFC", "region"=>"east", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Buffalo Bills", "conference" => "AFC", "region"=>"east", "win"=>2, "loss"=>1, "tie"=>0),
            array("name"=>"New York Jets", "conference" => "AFC", "region"=>"east", "win"=>2, "loss"=>1, "tie"=>0),
            array("name"=>"Miami Dolphins", "conference" => "AFC", "region"=>"east", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Cincinnati Bengals", "conference" => "AFC", "region"=>"north", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Pittsburgh Steelers", "conference" => "AFC", "region"=>"north", "win"=>2, "loss"=>1, "tie"=>0),
            array("name"=>"Cleveland Browns", "conference" => "AFC", "region"=>"north", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Baltimore Ravens", "conference" => "AFC", "region"=>"north", "win"=>0, "loss"=>3, "tie"=>0),
            array("name"=>"Indianapolis Colts", "conference" => "AFC", "region"=>"south", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Tennessee Titans", "conference" => "AFC", "region"=>"south", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Houston Texans", "conference" => "AFC", "region"=>"south", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Jacksonville Jaguars", "conference" => "AFC", "region"=>"south", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Denver Broncos", "conference" => "AFC", "region"=>"west", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Oakland Raiders", "conference" => "AFC", "region"=>"west", "win"=>2, "loss"=>1, "tie"=>0),
            array("name"=>"Kansas City Chiefs", "conference" => "AFC", "region"=>"west", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"San Diego Chargers", "conference" => "AFC", "region"=>"west", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Dallas Cowboys", "conference" => "NFC", "region"=>"east", "win"=>2, "loss"=>1, "tie"=>0),
            array("name"=>"New York Giants", "conference" => "NFC", "region"=>"east", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Washington Redskins", "conference" => "NFC", "region"=>"east", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Philadelphia Eagles", "conference" => "NFC", "region"=>"east", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Green Bay Packers", "conference" => "NFC", "region"=>"north", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Minnesota Vikings", "conference" => "NFC", "region"=>"north", "win"=>2, "loss"=>0, "tie"=>0),
            array("name"=>"Detroit Lions", "conference" => "NFC", "region"=>"north", "win"=>0, "loss"=>3, "tie"=>0),
            array("name"=>"Chicago Bears", "conference" => "NFC", "region"=>"north", "win"=>0, "loss"=>3, "tie"=>0),
            array("name"=>"Carolina Panthers", "conference" => "NFC", "region"=>"south", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Atlanta Falcons", "conference" => "NFC", "region"=>"south", "win"=>3, "loss"=>0, "tie"=>0),
            array("name"=>"Tampa Bay Buccaneers", "conference" => "NFC", "region"=>"south", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"New Orleans Saints", "conference" => "NFC", "region"=>"south", "win"=>0, "loss"=>3, "tie"=>0),
            array("name"=>"Arizona Cardinals", "conference" => "NFC", "region"=>"west", "win"=>3, "loss"=>3, "tie"=>0),
            array("name"=>"St. Louis Rams", "conference" => "NFC", "region"=>"west", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"San Francisco 49ers", "conference" => "NFC", "region"=>"west", "win"=>1, "loss"=>2, "tie"=>0),
            array("name"=>"Seattle Seahawks", "conference" => "NFC", "region"=>"west", "win"=>1, "loss"=>2, "tie"=>0)
        );
        function __construct(){
            parent::__construct();
        }

        function all(){
            return $this->teams;
        }

        function getRegion($conference, $region){
            $teams = array();
            foreach($this->teams as $team){
                if($team['conference'] == $conference && $team['region'] == $region){
                    array_push($teams, $team);
                }
            }
            return $team;
        }

        function getTeam($name){
            foreach($this->teams as $team){
                if($team['name'] == $name){
                    return $team;
                }
            }
        }

    }

 ?>
