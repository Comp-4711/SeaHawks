<?php

class Scores extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    // Gets most recent date someone requested scores
    protected function recentDate() {
        $this->db->select_max('date');
        return str_replace('-','',$this->db->get('scorehistory')->result()[0]->date);
    }

    function getHistory() {
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        $this->xmlrpc->server('http://nfl.jlparry.com/rpc', 80);
        $this->xmlrpc->method('since');
        $this->xmlrpc->request(array($this->recentDate()));
        $this->db->insert('scorehistory', array('date'=> date('Y-m-d')));
        if(!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
            echo '<br/>' . var_dump($this->xmlrpc->response) . '<br/>';
        } else {
            $data = $this->findWinner($this->xmlrpc->display_response());
            if(!empty($data)){
                $this->db->insert_batch('scores', $data);
            }
        }
    }

    protected function findWinner($data) {
        $newHistory = array();
        foreach($data as $element) {
            $item = explode(':', $element['score']);
            if(intval($item[0]) > intval($item[1])){
                $element['winner'] = $element['away'];
            } else {
                $element['winner'] = $element['home'];
            }
            array_push($newHistory, $element);
        }
        return $newHistory;
    }
}
