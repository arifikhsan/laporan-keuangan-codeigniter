<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reports extends BaseController
{
    public function index()
    {
        $reports = $this->report->get()->getResult();
        return view('reports/index', ['reports' => $reports]);
    }

    public function new()
    {
        $lastReport = $this->report->orderBy('datetime', 'DESC')->limit(1)->get()->getRowObject();
        return view('reports/new', ['report' => $lastReport]);
    }

    public function create()
    {
        $report = [
            'cash' => intval($this->request->getPost('cash')),
            'debit' => intval($this->request->getPost('debit')),
            'credit' => intval($this->request->getPost('credit')),
            'detail' => $this->request->getPost('detail'),
            'datetime' => date('Y-m-d H:i:s', now()),
        ];
        $result = $this->report->insert($report);
        if ($result) {
            session()->setFlashdata('message', 'Laporan berhasil ditambahkan!');
        } else {
            session()->setFlashdata('message', 'Laporan gagal dibuat!');
        }
        return redirect()->to('reports/new');
    }
}
