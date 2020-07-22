<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;
use App\Exports\NodeExport;
use App\Imports\NodeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$nodes = Node::all();
        return view('node',['node'=>$nodes]);
        // return Node::all();
    }

    public function export_excel()
	{
		return Excel::download(new NodeExport, 'node.xlsx');
    }

    public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);

        Node::truncate();


		// import data
		Excel::import(new NodeImport, public_path('/file_siswa/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/node');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
        $node = new Node;
        $node ["REGIONAL"] = $request->regional;
        $node ["IP"] = $request->ip;
        $node ["HOSTNAME"] = $request->hostname;
        $node ["JUMLAH HU"] = $request->jumlahHu;
        $node ["IDLE HU (100G)"] = $request->idleHu;
        $node ["JUMLAH TE"] = $request->jumlahTe;
        $node ["IDLE TE (10G)"] = $request->idleTe;
        $node ["JUMLAH GI"] = $request->jumlahGi;
        $node ["IDLE GI (1G)"] = $request->idleGi;
        $node ["JUMLAH INTERFACE"] = $request->jumlahInterface;
        $node ["IDLE INTERFACE"] = $request->idleInterface;
        $node -> save();

        return "Data MASUK";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function edit(Node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hostname)
    {
        //
        $regional = $request->regional;
        $ip = $request->ip;
        $hostname = $request->hostname;
        $jumlahHu = $request->jumlahHu;
        $idleHu = $request->idleHu;
        $jumlahTe = $request->jumlahTe;
        $idleTe = $request->idleTe;
        $jumlahGi = $request->jumlahGi;
        $idleGi = $request->idleGi;
        $jumlahInterface = $request->jumlahInterface;
        $idleInterface = $request->idleInterface;

        $node = Node::find($hostname);
        $node ["REGIONAL"] = $regional;
        $node ["IP"] = $ip;
        $node ["HOSTNAME"] = $hostname;
        $node ["JUMLAH HU"] = $jumlahHu;
        $node ["IDLE HU (100G)"] = $idleHu;
        $node ["JUMLAH TE"] = $jumlahTe;
        $node ["IDLE TE (10G)"] = $idleTe;
        $node ["JUMLAH GI"] = $jumlahGi;
        $node ["IDLE GI (1G)"] = $idleGi;
        $node ["JUMLAH INTERFACE"] = $jumlahInterface;
        $node ["IDLE INTERFACE"] = $idleInterface;

        $node->save();
        return "DATA DIUPDATE";


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function delete($hostname){
        $node = Node::find($hostname);
        $node -> delete();

        return "DATADIHAPS";
    }

    public function destroy(Node $node)
    {
        //
    }
}
