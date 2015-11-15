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
    public function index()
    {
        // Set the initial layout parameters
        $this->load->library('table');
        $this->load->library('pagination');
        // Render the display
        $rows = $this->layout($this->session->layout, $this->session->ordertype);
        $this->data['thetable'] = $this->table->generate($rows);
        if ($this->session->editmode) {
            $this->data['editmode'] = "Turn off Edit Mode";
            $this->data['addbutton'] = $this->load->view('_addplayer', '', TRUE);
        } else {
            $this->data['editmode'] = "Turn on Edit Mode";
            $this->data['addbutton'] = "";
        }
        $this->data['layout'] = $this->session->layout;
        $this->data['ordertype'] = $this->session->ordertype;
        $this->data['pagebody'] = 'roster';
        $this->render();
    }

    private function layout($type, $order)
    {
        $cells = array();

        // Set up pagination
        $config['base_url'] = '/player/index/';
        $config['total_rows'] = $this->players->playerCount();
        $config['per_page'] = 12;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);
        $this->data['links'] = $this->pagination->create_links();

        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * 12 : 0;


        // Retrieve players from model based on ordering
        if ($order == 2) {
            $roster = $this->players->allByPosition($config['per_page'], $page);
        } else if ($order == 3) {
            $roster = $this->players->allByJersey($config['per_page'], $page);
        } else {
            $roster = $this->players->allByName($config['per_page'], $page);
        }
        $handletype = ['handletype' => $this->session->editmode ? 'edit' : 'view'];
        if ($type == 2) {
            // Parse player properties into individual cells to render table
            foreach ($roster as $player) {
                $cells[] = $this->parser->parse('_tablecell', array_merge((array)$player,$handletype), true);

            }

            // Set table parameters
            $parms = array(
                'table_open' => '<table class="gallery">',
                'heading_row_start' => '<tr>',
                'heading_row_end' => '</tr>',
                'heading_cell_end' => '<th>',
                'heading_cell_end' => '</th>',
                'cell_start' => '<td class="oneimage">',

            );
            $this->table->set_template($parms);
            $this->table->set_heading('Jersey #', 'Name', 'Position', 'Description');

            $rows = $this->table->make_columns($cells, 1);
        } else {
            // Parse player properties into individual cells to render gallery
            foreach ($roster as $player) {
                $cells[] = $this->parser->parse('_gallerycell', array_merge((array)$player, $handletype), true);
            }

            $parms = array(
                'table_open' => '<table class="gallery">',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $rows = $this->table->make_columns($cells, 3);
        }
        return $rows;
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
        $this->session->player = $this->players->get($player_num);
        $this->data['player_num'] = $player_num;
        $this->data['pagebody'] = 'player/edit';
        $this->data = array_merge($this->data, (array)$this->session->player);
        $this->render();
    }


    function edit_confirm() {
        $player = $this->players->get($this->input->post('player_num'));
        $config['upload_path'] = './img/roster/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            if($player->image_name == null){
                $error = array('error' => $this->upload->display_errors());
                die("upload Error");
                // $this->load->view('upload_form', $error);
            }
        }
        else
        {
            $fileData = $this->upload->data();
            $player->image_name = $fileData['file_name'];
            if($this->session->player->image_name != $player->image_name){
                unlink("./img/roster/" . $this->session->player->image_name);
            }
        }
        $player->jersey = $this->input->post('jerseyNumber');
        $player->first_name = $this->input->post('firstname');
        $player->last_name = $this->input->post('lastname');
        $player->position = $this->input->post('position');
        $player->description = $this->input->post('description');
        $this->players->update($player);
        redirect('/player');
    }

    function delete($player_num = null) {
        $this->players->delete($player_num);
        redirect('/player');
    }

    function cancel($player_num = null) {
        redirect('/player');
    }

    function editmode(){
        if($this->session->editmode == 1){
            $this->session->editmode = 0;
        } else {
            $this->session->editmode = 1;
        }
        redirect('/player');
    }

    function changelayout(){

    }

    function ordertype(){
        $this->session->ordertype = $this->input->post('ordertype');
        $this->session->layout = $this->input->post('layout');
        redirect('/player');
    }

    function handleplayer($player_num) {
        if($this->session->editmode == 1){
            redirect('/player/edit/' . $player_num);
        } else {
            redirect('/player/view/' . $player_num);
        }
    }
}
