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
        $isLast = $this->report->orderBy('id', 'desc')->limit(1)->get()->getRowObject()->id;
        if (intval($report->id) >= intval($isLast)) {
            return view('reports/delete', ['report' => $report]);
        } else {
            session()->setFlashdata('error', 'Tidak bisa menghapus laporan yang ditengah :D');
            return redirect()->to('reports');
        }
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
        $isLast = $this->report->orderBy('id', 'desc')->limit(1)->get()->getRowObject()->id;
        if (intval($report->id) >= intval($isLast)) {
            return view('reports/edit', ['report' => $report]);
        } else {
            session()->setFlashdata('error', 'Tidak bisa mengubah laporan yang ditengah :D');
            return redirect()->to('reports');
        }
    }

    public function update($id)
    {
        $datetime = $this->request->getPost('datetime');
        $previousReport = $this->report->where('datetime <', $datetime)->orderBy('datetime', 'desc')->limit(1)->get()->getResultObject()[0];
        $cash = intval($previousReport->balance);
        $debit = intval($this->request->getPost('debit'));
        $credit = intval($this->request->getPost('credit'));
        $balance = $cash + $debit - $credit;

        $report = [
            'cash' => $cash,
            'debit' => $debit,
            'credit' => $credit,
            'balance' => $balance,
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
