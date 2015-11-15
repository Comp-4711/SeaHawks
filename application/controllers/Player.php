<?php
/**
 * Created by PhpStorm.
 * User: Goadah
 * Date: 2015-11-12
 * Time: 2:00 PM
 */

class Player extends Application
{
    function __construct() {
        parent::__construct();
    }

    function add() {
        $player_num = $this->players->highest() + 1;
        $player = $this->players->create();
        $player->id  = $player_num;
        $this->players->add($player);

        redirect('/player/edit/' . $player_num);
    }

    function edit($player_num = null) {
        if($player_num == null)
            redirect('/player/add');

        $this->data['pagebody'] = 'player/edit';
        $this->render();
    }

    function confirm_edit($player_num = null) {
        redirect('/roster');
    }

    function delete($player_num = null) {
        redirect('/roster');
    }

    function cancel($player_num = null) {
        redirect('/roster');
    }

    function editmode(){
        if($this->session->editmode == 1){
            $this->session->editmode = 0;
        } else {
            $this->session->editmode = 1;

        }
        redirect('/roster');
    }

    function handleplayer($player_num) {
        if($this->session->editmode == 1){
            redirect('/player/edit/' . $player_num);
        } else {
            redirect('/player/view/' . $player_num);
        }
    }
}