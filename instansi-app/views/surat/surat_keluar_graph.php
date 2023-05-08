<script type="text/javascript">
	$(function ()
	{
		var chart;
		$(document).ready(function ()
		{
			// Build the chart
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title:
				{
					text: 'Surat Keluar'
				},
				tooltip:
				{
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br />Total: <b>{point.y}</b>',
					percentageDecimals: 1
				},
				plotOptions:
				{
					pie:
					{
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Persentase',
					data: [
						<?php foreach ($stat as $data): ?>
							<?php if ($data['jumlah'] != "-"): ?>
								['<?= $data['nama']?>',<?= $data['jumlah']?>],
							<?php endif; ?>
						<?php endforeach; ?>
					]
				}]
			});
		});
	});
</script>
<!-- Highcharts -->
<script src="<?= base_url()?>assets/js/highcharts/highcharts.js"></script>
<script src="<?= base_url()?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url()?>assets/js/highcharts/highcharts-more.js"></script>
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Grafik Surat Keluar</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('keluar')?>"> Daftar Surat Keluar</a></li>
						<li class="breadcrumb-item active">Grafik Surat Keluar</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<div class="row">
			<div class="col-md-12">
				
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div id="container"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
