
			<?php
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=data-pns.xls");
            ?>
			<style>
			table, th, td {
  							border: 1px solid black;
			}
			</style>
            <div class="card">
				<div class="card-header">
			
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped ">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>No.KTP</th>
								<th>NPWP</th>
								<th>Pangkat/golongan</th>
								<th>TMT pangkagt</th>
								<th>No SK Pangkat</th>
								<th>Tanggal Sk Pangkat</th>
								<th>Tempat/Tanggal Lahir</th>
								<th>Jabatan</th>
								<th>Profesi</th>
								<th>Pendidikan Formal</th>
								<th>Pendidikan Perjenjangan Teknis/Tahun</th>
								<th>Pengalaman Kerja</th>
								<th>No. KARPEG</th>

							</tr>
						</thead>
						<tbody>

							<?php  $no=0; foreach ($pns as  $value) : $no++; ?>
							<tr>

								<td><?= $no?></td>
								<td><?= $value->nama?></td>
								<td><?= $value->NIP?></td>
								<td><?= $value->No_KTP?></td>
								<td><?= $value->npwp?></td>
								<td><?= $value->pangkat?>/<?= $value->golongan?><?= $value->ruang?></td>
								<td><?= $value->tmt_pangkat?></td>
								<td><?= $value->no_sk_pangkat?></td>
								<td><?= $value->tgl_sk_pangkat?></td>
								<td><?= $value->tempat_lahir?>/<?= $value->tgl_lahir?></td>
								<td><?= $value->jabatan?></td>
								<td><?= $value->profesi?></td>
								<td>
									<?php   foreach ($pendidikan_formal as  $value1): ?>
									<?php if($value->id_PNS == $value1->PNS_id_PNS): ?>
									<?= $value1->pendidikan; ?>
									<?php endif;?>
									<?php endforeach ?>
									
									
								</td>
								<td>
								<?php   foreach ($pendidikan_j_t as  $value2) :  ?>
									<?php if($value->id_PNS == $value2->PNS_id_PNS):?>
										<?= $value2->pelatihan?><br>
										<?php endif;?>
									<?php endforeach ?>
								</td>
								<td>
								<?php   foreach ($pengalaman_kerja as  $value3) :  ?>
									<?php if($value->id_PNS == $value3->PNS_id_PNS):?>
										<?= $value3->pengalaman_kerja?><br>
										<?php endif;?>
									<?php endforeach ?>
								</td>
								<td><?= $value->no_kerpeg?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>