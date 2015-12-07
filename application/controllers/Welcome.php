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

        $winPercent = 0;
        $opponent = $this->input->post('opponent');
        $opponentTeam = $this->input->post('opponentTeam');

        $all = $this->db->order_by('date', 'DESC')->get_where('scores', "(home = 'SEA') OR (away = 'SEA')");
        $vsOpponent = $this->db->order_by('date', 'DESC')->limit(5)->get_where('scores', "(home= 'SEA' OR home = '$opponent') AND (away = 'SEA' OR away = '$opponent')");

        $winAll = 0;
        $total = count($all->result());
        $fiveAvg = 0;
        $i = 0;
        foreach ($all->result() as $result)
        {
            if ($result->winner == "SEA") {
                $winAll += 1;
                if ($i < 5) {
                    $fiveAvg ++;
                }

            }
            $i++;
        }
        $winAvg = $winAll / $total;
        $fiveAvg = $fiveAvg/5;

        $winOpponent = 0;
        $totalOpponent = count($vsOpponent->result());
        $opponentAvg = 0;
        if (count($vsOpponent->result()) > 0) {
            foreach ($vsOpponent->result() as $result) {
                if ($result->winner == "SEA") {
                    $winOpponent += 1;
                }
            }
            $opponentAvg = $winOpponent / $totalOpponent;
        }

        $winPercent = ((0.7 * ($winAvg)) + (0.2 * $fiveAvg) + (0.1 * $opponentAvg)) * 100;
        $winPercent = number_format((float)$winPercent, 2, '.', '');

        $data = array(
            'opponent' => $opponentTeam,
            'prediction' => $winPercent,
            'totalAvg' =>number_format((float)$winAvg*100, 2, '.', ''),
            'recentAvg' =>number_format((float)$fiveAvg*100, 2, '.', ''),
            'vsOpponent' =>number_format((float)$opponentAvg*100, 2, '.', '')
        );



        $data = array(
            'opponent' => $opponentTeam,
            'prediction' => $winPercent,
            'totalAvg' =>number_format((float)$winAvg*100, 2, '.', ''),
            'recentAvg' =>number_format((float)$fiveAvg*100, 2, '.', ''),
            'vsOpponent' =>number_format((float)$opponentAvg*100, 2, '.', ''),
            'gamesOpponent' => $totalOpponent
        );

        $this->parser->parse('_prediction', $data);
    }
}
