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
        $cash = intval($this->request->getPost('cash'));
        $debit = intval($this->request->getPost('debit'));
        $credit = intval($this->request->getPost('credit'));

        // dd($cash);

        $report = [
            'cash' => $cash,
            'debit' => $debit,
            'credit' => $credit,
            'detail' => $this->request->getPost('detail'),
            'datetime' => date('Y-m-d H:i:s', now()),
            'balance' => $cash + $debit - $credit,
        ];
        $result = $this->report->insert($report);
        if ($result) {
            session()->setFlashdata('message', 'Laporan berhasil ditambahkan!');
        } else {
            session()->setFlashdata('message', 'Laporan gagal dibuat!');
        }
        return redirect()->to('reports/new');
    }

    public function delete($id)
    {
        $report = $this->report->where('id', $id)->get()->getRowObject();
        return view('reports/delete', ['report' => $report]);
    }

    public function destroy($id)
    {
        $result = $this->report->delete($id);
        if ($result) {
            session()->setFlashdata('message', 'Laporan berhasil dihapus!');
        } else {
            session()->setFlashdata('message', 'Laporan gagal dihapus!');
        }
        return redirect()->to('reports');
    }
}
