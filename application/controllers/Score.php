<?php
    class Score extends Application {
        function __construct() {
            parent::__construct();
        }

        function index() {
            $this->load->model('Scores');
            $this->Scores->getHistory();
            redirect('/');

        }
    }
