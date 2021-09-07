<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reports extends BaseController
{
    public function index()
    {
        return view('reports/index');
    }

    public function new()
    {
        return view('reports/new');
    }

    public function create()
    {
        $this->load->helper('form');
        $report = [
            'cash' => $this->input->post('cash'),
            'debit' => $this->input->post('debit'),
            'credit' => $this->input->post('credit'),
            'detail' => $this->input->post('detail'),
            'date' => date('Y-m-d H:i:s'),
        ];
        var_dump($report);
        return redirect('reports/new');
    }
}
