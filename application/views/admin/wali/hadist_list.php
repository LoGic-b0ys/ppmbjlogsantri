<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i>List Hadist</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								List Hadist <a class="btn btn-primary pull-right btn-xs" data-target="#modal-add" data-toggle="modal"><i class="fa fa-plus"></i> Add Hadist</a>
							</div>


							<div class="inner-item">
								<?php if (isset($inputError)): ?>
									<div class="alert alert-danger"><?php echo $inputError; ?></div>
								<?php endif ?>
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>
											<th scope="col">Nama</th>

											<th scope="col">Halaman</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($dataHadist as $hadist): ?>

										<tr>
											<td data-label="Nama"><?php echo $hadist->nama ?>
											</td>

											<td data-label="Halaman" data-order="<?php echo $hadist->offset ?>"><?php echo $hadist->offset." Hal" ?>
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="modal fade" id="modal-add" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<?php echo form_open() ?>

					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal" type="button">&times;</button>

							<h4 class="modal-title">Tambah Hadist</h4>
						</div>


						<div class="modal-body">
							<input class="form-control" name="nama" placeholder="Masukkan Nama" style="margin-bottom:24px" type="text"> <input class="form-control" name="offset" placeholder="Masukkan Halaman" type="text">
						</div>


						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>