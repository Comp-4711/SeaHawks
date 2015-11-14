<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roster extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            // Set the initial layout parameters
            $this->load->library('table');
                
            // Render the display
            $rows = $this->layout("gallery", "name");
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagebody']= 'roster';
            $this->render();
	}
        
        private function layout($type, $order) {
            $cells = array();
            // Retrieve players from model based on ordering
            if($order == "name") {
                $roster = $this->players->allByName();
            } else if($order == "jersey") {
                $roster = $this->players->allByJersey();
            } else if($order == "position") {
                $roster = $this->players->allByPosition();
            }
            
            if($type == 'table') {
                // Parse player properties into individual cells to render table
                foreach ($roster as $player) {
                    $cells[] = $this->parser->parse('_tablecell', (array) $player, true);
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
            } else if($type == 'gallery') {
                // Parse player properties into individual cells to render gallery
                foreach ($roster as $player) {
                    $cells[] = $this->parser->parse('_gallerycell', (array) $player, true);
                }
                
                $parms = array(
                    'table_open' => '<table class="gallery">',
                    'cell_start' => '<td class="oneimage">',
                    'cell_alt_start' => '<td class="oneimage">'
                );
                $this->table->set_template($parms);

<<<<<<< HEAD
		// Render the table
		$rows = $this->table->make_columns($cells, 1);
		$this->data['thetable'] = $this->table->generate($rows);
		if($this->session->editmode){
			$this->data['editmode'] = "Turn off Edit Mode";
			$this->data['addbutton'] = $this->load->view('_addplayer', '', TRUE);
		} else {
			$this->data['editmode'] = "Turn on Edit Mode";
			$this->data['addbutton'] = "";
		}
		$this->data['pagebody']= 'roster';
		$this->render();
	}
=======
                $rows = $this->table->make_columns($cells, 3);
            }
            return $rows;
        }
>>>>>>> 810492b67fcea95f54f776f73d2933b8ebb12bed
}
