<?php
    class League extends Application {
        function __construct() {
            parent::__construct();
        }

        function index(){
            $this->data['pagebody'] = 'league';
            $this->data['afce'] = $this->teams->getRegion("AFC","east");
            $this->data['afcn'] = $this->teams->getRegion("AFC","north");
            $this->data['afcs'] = $this->teams->getRegion("AFC","south");
            $this->data['afcw'] = $this->teams->getRegion("AFC","west");
            $this->data['nfce'] = $this->teams->getRegion("NFC","east");
            $this->data['nfcn'] = $this->teams->getRegion("NFC","north");
            $this->data['nfcs'] = $this->teams->getRegion("NFC","south");
            $this->data['nfcw'] = $this->teams->getRegion("NFC","west");
            $this->render();
        }
    }
 ?>
