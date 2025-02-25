<!DOCTYPE html>
<html>
<head>
	<title>Import Excel Ke Database Dengan Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>Import Excel Ke Database Dengan Laravel</h4>
			<h5><a target="_blank" href="https://www.malasngoding.com/">www.malasngoding.com</a></h5>
		</center>

		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>

		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/node/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>



		<a href="/node/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

		<table class='table table-bordered'>
			<thead>
				<tr>
                    <th>NO</th>
                    <th>REGION</th>
                    <th>HOSTNAME</th>
                    <th>IP</th>
                    <th>JUMLAH HU</th>
                    <th>IDLE HU (100G)</th>
                    <th>JUMLAH TE</th>
                    <th>IDLE TE (10G)</th>
                    <th>JUMLAH GI</th>
                    <th>IDLE GI (1G)</th>
                    <th>JUMLAH INTERFACE</th>
                    <th>IDLE INTERFACE</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
                @foreach ($node as $nds)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$nds->REGIONAL}}</td>
                    <td>{{$nds->HOSTNAME}}</td>
                    <td>{{$nds->IP}}</td>
                    <td>{{$nds["JUMLAH HU"]}}</td>
                    <td>{{$nds["IDLE HU (100G)"]}}</td>
                    <td>{{$nds["JUMLAH TE"]}}</td>
                    <td>{{$nds["IDLE TE (10G)"]}}</td>
                    <td>{{$nds["JUMLAH GI"]}}</td>
                    <td>{{$nds["IDLE GI (1G)"]}}</td>
                    <td>{{$nds["JUMLAH INTERFACE"]}}</td>
                    <td>{{$nds["IDLE INTERFACE"]}}</td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
