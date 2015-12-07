<?php
    class League extends Application {
        function __construct() {
            parent::__construct();
        }

        // Use the Teams model to retrieve league data and pass it to the league view
        function index(){
            //$this->teams->session_load();
            // Set the initial layout parameters
            // Load dependencies
            $this->load->library('table');
            
            // Set up the table
            $this->data['thetable'] = '';
            $this->layout($this->session->layout, $this->session->ordertype);
            
            // Render the display
            $this->data['layout'] = $this->session->layout;
            $this->data['ordertype'] = $this->session->ordertype;
            $this->data['pagebody'] = 'league';
            $this->render();
        }
        
        // Save the ordering selections in session variables
        function ordertype(){
            $this->session->ordertype = $this->input->post('ordertype');
            $this->session->layout = $this->input->post('layout');
            //$this->teams->session_save();
            redirect('/league');
        }
        
        // Set up the layout for the table based on the selected layout options
        private function layout($type, $order)
        {
            $cells = array();
            
            // Division view
            if($type == 3) {
                $divisions = $this->teams->divisions();
                foreach($divisions as $division) {
                    $cells = array();
                    if($order == 1) {
                        $teams = $this->teams->getDivision('code', $division->division);
                    } else if($order == 2) {
                        $teams = $this->teams->getDivision('name', $division->division);
                    } else {
                        $teams = $this->teams->getDivision('net_points', $division->division);
                    }
                    
                    // Parse team properties into individual cells to render table
                    foreach ($teams as $team) {
                        $cells[] = $this->parser->parse('_leaguecell', $team, true);
                    }
                    
                    // Set table parameters
                    $parms = array(
                        'table_open' => '<table class="table table-bordered table-hover">',
                        'heading_row_start' => '',
                        'heading_row_end' => '',
                        'heading_cell_start' => '<th class="nowrap">',
                        'heading_cell_end' => '</th>',
                        'cell_start' => '',
                        'cell_alt_start' => '',
                    );
                    $this->table->set_template($parms);
                    $this->table->set_heading('Code', 'Name', 'Conference', 'Division', 'Wins', 'Losses', 'Points For', 'Points Against', 'Net Points');
                    
                    $rows = $this->table->make_columns($cells, 1);
                    
                    // Map division code to full division name
                    $div = $division->division;
                    switch($div) {
                        case "ACN":
                            $div_full_name = "AFC North";
                            break;
                        case "ACS":
                            $div_full_name = "AFC South";
                            break;
                        case "ACW":
                            $div_full_name = "AFC West";
                            break;
                        case "ACE":
                            $div_full_name = "AFC East";
                            break;
                        case "NCN":
                            $div_full_name = "NFC North";
                            break;
                        case "NCS":
                            $div_full_name = "NFC South";
                            break;
                        case "NCW":
                            $div_full_name = "NFC West";
                            break;
                        case "NCE":
                            $div_full_name = "NFC East";
                            break;
                        default:
                            $div_full_name = "N/A";
                    }
                    $this->data['thetable'] .= "<div class=\"leagueheader\">$div_full_name</div>";
                    $this->data['thetable'] .= $this->table->generate($rows);
                }
            // Conference view
            } else if($type == 2) {
                $conferences = $this->teams->conferences();
                foreach($conferences as $conference) {
                    $cells = array();
                    if($order == 1) {
                        $teams = $this->teams->getConference('code', $conference->conference);
                    } else if($order == 2) {
                        $teams = $this->teams->getConference('name', $conference->conference);
                    } else {
                        $teams = $this->teams->getConference('net_points', $conference->conference);
                    }
                    
                    // Parse team properties into individual cells to render table
                    foreach ($teams as $team) {
                        $cells[] = $this->parser->parse('_leaguecell', $team, true);
                    }
                    
                    // Set table parameters
                    $parms = array(
                        'table_open' => '<table class="table table-bordered table-hover">',
                        'heading_row_start' => '',
                        'heading_row_end' => '',
                        'heading_cell_start' => '<th class="nowrap">',
                        'heading_cell_end' => '</th>',
                        'cell_start' => '',
                        'cell_alt_start' => '',
                    );
                    $this->table->set_template($parms);
                    $this->table->set_heading('Code', 'Name', 'Conference', 'Division', 'Wins', 'Losses', 'Points For', 'Points Against', 'Net Points');
                    
                    $rows = $this->table->make_columns($cells, 1);
                    
                    // Map conference code to full conference name
                    $conf = $conference->conference;
                    switch($conf) {
                        case "NFC":
                            $conf_full_name = "National Football Conference";
                            break;
                        case "AFC":
                            $conf_full_name = "American Football Conference";
                            break;
                        default:
                            $conf_full_name = "N/A";
                    }
                    $this->data['thetable'] .= "<div class=\"leagueheader\">$conf_full_name</div>";
                    $this->data['thetable'] .= $this->table->generate($rows);
                }
            } else {
                // Default league view
                if($order == 1) {
                    $teams = $this->teams->getLeague('code');
                } else if($order == 2) {
                    $teams = $this->teams->getLeague('name');
                } else {
                    $teams = $this->teams->getLeague('net_points');
                }
                // Parse team properties into individual cells to render table
                foreach ($teams as $team) {
                    $cells[] = $this->parser->parse('_leaguecell', $team, true);
                }

                // Set table parameters
                $parms = array(
                    'table_open' => '<table class="table table-bordered table-hover">',
                    'heading_row_start' => '',
                    'heading_row_end' => '',
                    'heading_cell_start' => '<th class="nowrap">',
                    'heading_cell_end' => '</th>',
                    'cell_start' => '',
                    'cell_alt_start' => '',
                );
                $this->table->set_template($parms);
                $this->table->set_heading('Code', 'Name', 'Conference', 'Division', 'Wins', 'Losses', 'Points For', 'Points Against', 'Net Points');

                $rows = $this->table->make_columns($cells, 1);
                $this->data['thetable'] = $this->table->generate($rows);
            }
        }
    }
 ?>
