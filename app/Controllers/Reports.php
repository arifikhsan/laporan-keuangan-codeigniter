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

    public function show($id)
    {
        $report = $this->report->where('id', $id)->get()->getRowObject();
        return view('reports/show', ['report' => $report]);
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
        $detail = $this->request->getPost('detail');
        $balance = $cash + $debit - $credit;

        $report = [
            'cash' => $cash,
            'debit' => $debit,
            'credit' => $credit,
            'detail' => $detail,
            'datetime' => date('Y-m-d H:i:s', now()),
            'balance' => $balance,
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

    public function edit($id)
    {
        $report = $this->report->where('id', $id)->get()->getRowObject();
        return view('reports/edit', ['report' => $report]);
    }

    public function update($id)
    {
        // dd($this->request->getRawInput());
        $debit = intval($this->request->getPost('debit'));
        $credit = intval($this->request->getPost('credit'));
        $datetime = $this->request->getPost('datetime');

        $report = [
            'debit' => $debit,
            'credit' => $credit,
            'detail' => $this->request->getPost('detail'),
            'datetime' => $datetime,
        ];

        $result = $this->report->update($id, $report);

        if ($result) {
            session()->setFlashdata('message', 'Laporan berhasil diubah!');
        } else {
            session()->setFlashdata('message', 'Laporan gagal diubah!');
        }
        return redirect()->to('reports');
    }
}
