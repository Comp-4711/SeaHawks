<?php
    class League extends Application {
        function __construct() {
            parent::__construct();
        }

        // Use the Teams model to retrieve league data and pass it to the league view
        function index(){
            $this->data['pagebody'] = 'league';
            $this->data['afce'] = $this->teams->getRegion("AFC","East");
            $this->data['afcn'] = $this->teams->getRegion("AFC","North");
            $this->data['afcs'] = $this->teams->getRegion("AFC","South");
            $this->data['afcw'] = $this->teams->getRegion("AFC","west");
            $this->data['nfce'] = $this->teams->getRegion("NFC","East");
            $this->data['nfcn'] = $this->teams->getRegion("NFC","North");
            $this->data['nfcs'] = $this->teams->getRegion("NFC","South");
            $this->data['nfcw'] = $this->teams->getRegion("NFC","West");
            $this->render();
        }
        
        function ordertype(){
            $this->session->ordertype = $this->input->post('ordertype');
            $this->session->layout = $this->input->post('layout');
            $this->players->session_save();
            redirect('/league');
        }
    }
 ?>
