<?php
class Home extends controller
{


    function  Get_data()
    {
        $this->view('Masterlayout', [
            'page' => 'Home_v',

        ]);
    }
}
