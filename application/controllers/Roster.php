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
		// Retrieve players from model
		$pix = $this->players->allByName();

		// Parse player properties into individual cells to render table
		foreach ($pix as $picture)
			$cells[] = $this->parser->parse('_cell', (array) $picture, true);

		// Set table parameters
		$this->load->library('table');
		$parms = array(
			'table_open' => '<table class="gallery">',
			'cell_start' => '<td class="oneimage">',

		);
		$this->table->set_template($parms);

		// Render the table
		$rows = $this->table->make_columns($cells, 1);
		$this->data['thetable'] = $this->table->generate($rows);
		$this->data['pagebody']= 'roster';
		$this->render();
	}
}
