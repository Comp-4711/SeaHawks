<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

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
		$this->data['pagebody']= 'welcome';
        $teams = $this->teams->getLeague('name');
		// die(var_dump($teams));
        for($i = 0; $i < count($teams); $i++){
            if($teams[$i]->code == 'SEA'){
                unset($teams[$i]);
            }
        }
        $this->data['teamList'] = $teams;
		$this->render();
    }

    public function predict()
    {
        $data = array(
            'opponent' => $this->input->post('opponent')
        );
        $this->parser->parse('_prediction', $data);
    }
}
