<?php
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=data-honorer.xls");
            ?>
					<style>
			table, th, td {
  							border: 1px solid black;
			}
			</style>
<!-- Main content -->
<div class="content">
		<div class="container-fluid">


			<div class="card">
			
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<!-- <th>NIP</th> -->
								<th>Tempat/ tanggal Lahir</th>
								<th>No.KTP</th>
								<th>Pejabat yang menandatangani SK</th>
                                <th>Jenis Ketenagaan</th>
								<th>Pendidikan</th>
								<th>Profesi</th>
								<th>NO.SPK/TANGGAL</th>
							</tr>
						</thead>
						<tbody>

							
							<?php $nama_PNS=""; $no=0; foreach ($honorer as  $value) :$no++?>
							
							<?php foreach ($pns as  $value1) :?>
							<?php if($value->fk_id_PNS == $value1->id_PNS) $nama_PNS=$value1->nama?>
							<?php endforeach ?>
							<tr>
							<td><?= $no?></td>
							<td><?= $value->nama?></td>
							<td><?= $value->tempat_lahir?>/<?= $value->tgl_lahir?></td>
							<td><?= $value->No_KTP?></td>
							<td><?= $nama_PNS?></td>
                            <td><?= $value->jenis_ketenagaan?></td>
							<td></td>
							<td><?= $value->profesi?> </td>
							<td>
								<?php foreach ($skp as  $value2) :?>
								<?php if($value->id_honorer == $value2->fk_id_honorer) ?>
								<?= $value2->no_skp.'/'.$value2->tgl_skp.'<br>' ?>
								<?php endforeach ?>
							</td>
                           
						
							</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->