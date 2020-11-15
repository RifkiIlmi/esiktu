<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Kenaikan Pangkat PNS</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('Home') ?>">Home</a></li>
						<li class="breadcrumb-item active">Kenaikan Pangkat</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<?php echo form_open_multipart('DataPegawai/pangkat', 'role="form" class="form" id="filter" '); ?>
			<div class="row mx-auto">
				<div class="col-lg-2">
					<input type="date" name="filter" id="filter" class="form-control">
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" type="submit">Filter Tahun</button>
				</div>
			</div>
			</form>
			<hr>
            <?= $this->session->flashdata('message'); ?>
			
            <div class="card">
				<div class="card-header p-2">
					<h3>DaftarPegawai Yang Naik Pangkat tahun <?= $filter ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<!-- user aktfi list -->
						<div class="active tab-pane" id="useraktif">
                        <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>NO.SK</th>
								<th>Tanggal SK</th>
								<th>Pangkat/Golongan Awal</th>
								<th>Pangkat/Golongan Selanjutnya</th>
							</tr>
						</thead>
						<tbody>

                            <?php  $no=0; foreach ($pns as  $value) : $no++; ?>
                            <?php
                                    $now = date('Y');
                                    $year = date('Y', strtotime($value->tgl_sk_pangkat));
                                    $lastTglPangkat = date('Y', strtotime($value->last_update_pangkat));
                                    $selisih = $filter - $year;
                                    if($selisih%4 == 0 && $year != $filter)
                            : ?>
							<tr>
								<td><?= $no?></td>
								<td><?= $value->nama?></td>
								<td><?= $value->NIP?></td>
								<td><?= $value->no_sk_pangkat?></td>
								<td><?= formaldate_indo($value->tgl_sk_pangkat)?></td>
                                <td><?= $value->pangkat?>/<?= $value->golongan?><?= $value->ruang?></td>
                            <?php if($value->pangkat=='Juru Muda'): ?>
                                <td>Juru Muda Tk 1/Ib
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/ib/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Juru Muda Tingkat 1'): ?>
                                <td>Juru/Ic
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/ic/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Juru'): ?>
                                <td>Juru Tingkat 1/Id
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/id/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Juru Tingkat 1'): ?>
                                <td>Pengatur Muda/IIa
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iia/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pengatur Muda'): ?>
                                <td>Pengatur Muda Tingkat 1/IIb
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iib/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pengatur Muda Tingkat 1'): ?>
                                <td>Pengatur/IIc
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iic/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pengatur'): ?>
                                <td>Pengatur Tingkat 1/IId
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iid/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pengatur Tingkat 1'): ?>
                                <td>Penata Muda/IIIa
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iiia/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Penata Muda'): ?>
                                <td>Penata Muda Tingkat 1/IIIb
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iiib/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Penata Muda Tingkat 1'): ?>
                                <td>Penata/IIIc
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iiic/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Penata'): ?>
                                <td>Penata Tingkat 1/IIId
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iiid/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Penata Tingkat 1'): ?>
                                <td>Pembina/IVa
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/iva/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pembina'): ?>
                                <td>Pembina Tingkat 1/IVb
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/ivb/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php elseif($value->pangkat=='Pembina Tingkat 1'): ?>
                                <td>Pembina Utama Muda/IVc
                                <?php if($now === $filter && $lastTglPangkat != $filter):?>    
                                    <a href="<?php echo base_url('DataPegawai/updatePangkat/ivc/'). $value->id_PNS ?>"> Raise up</a>
                                <?php endif;?>
                                <?php if($lastTglPangkat == $filter):?>
                                    <i class="text-danger ml-5" >Baru Naik Pangkat!!!</i>
                                <?php endif;?>
                                </td>
                            <?php endif;?>
                            </tr>
                            <?php endif;?>
							<?php endforeach ?>
						</tbody>
					</table>
						</div>

					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>

		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
