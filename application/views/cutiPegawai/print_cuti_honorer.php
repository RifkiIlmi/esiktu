<?php
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=data-cuti-honorer.xls");
            ?>
					<style>
			table, th, td {
  							border: 1px solid black;
			}
			</style>
            <table id="cutihnr" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Mulai Cuti</th>
										<th>Akhir Cuti</th>
										<th>Jumlah Hari</th>
										<th>Jenis Cuti</th>
									
									</tr>
								</thead>
								<tbody>

									<?php  $no=0; foreach ($cutiHonorer as  $value) : $no++; ?>
									<tr>

										<td><?= $no?></td>
										<td><?= $value->nama?></td>
										<td><?= $value->NIP?></td>
										<td><?= formaldate_indo($value->mulai_cuti) ?></td>
										<td><?= formaldate_indo($value->akhir_cuti) ?></td>
										<td><?= count_days($value->mulai_cuti,$value->akhir_cuti) ?></td>
										<td><?= $value->jenis_cuti?></td>
										
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>