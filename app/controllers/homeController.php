<?php
class homeController
{
    function __construct()
    {
        //
    }
    function index()
    {
        //
        $data =
            [
                'tittle' => 'Home',
                'bg' => 'dark'
            ];
        View::render('bee', $data);
    }
}
