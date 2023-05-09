<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $article = $single_artikel ?>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-5 text-center">
			<h1 class="display-4 text-white animated zoomIn"><?= $article['judul'] ?></h1>
			<a href="" class="h5 text-white">Home</a>
			<i class="far fa-circle text-white px-2"></i>
			<a href="" class="h5 text-white"><?= $article['kategori'] ?></a>
		</div>
	</div>
</div>

<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content" style="background: rgba(9, 30, 62, .7);">
			<div class="modal-header border-0">
				<button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body d-flex align-items-center justify-content-center">
				<div class="input-group" style="max-width: 600px;">
					<input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
					<button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Full Screen Search End -->

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-lg-8">
				<!-- Blog Detail Start -->
				<div class="mb-5">
					<?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) : ?>
						<img class="img-fluid w-100 rounded mb-5" src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>">
					<?php endif ?>
					<h1 class="mb-4"><?= $article['judul'] ?></h1>
					<div class="col-lg-12 text-center text-lg-start">
						<div class="d-inline-flex align-items-center">
							Penulis:&nbsp;<a href="#">
								<?= $article['owner'] ?>
							</a>&nbsp;&nbsp;Terbit:&nbsp;
							<a href="#"><?= tgl_indo($article['tgl_upload']) ?>
							</a>&nbsp;&nbsp;
							<?php if ($article['kategori']) : ?>
								Kategori:&nbsp;<a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>">
									<?= $article['kategori'] ?>
								</a>&nbsp;&nbsp;
							<?php endif ?>
							Dilihat:&nbsp;<a href="#">
								<?= hit($article['hit']) ?>
							</a>
						</div>
					</div>

				</div>
				<p><?= $article['isi'] ?>
					<?php for ($i = 1; $i <= 3; $i++) : ?>
						<?php if ($article['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar' . $i])) : ?>
							<img src="<?= AmbilFotoArtikel($article['gambar' . $i], 'sedang') ?>" alt="<?= $article['nama'] ?>" title="<?= $article['nama'] ?>" class="img-fluid" width="100%" style="padding:10px 10px 10px 10px">
						<?php endif ?>
					<?php endfor ?>
				</p>
				<p>
					<?php if ($article['dokumen']) : ?>
						Dokumen Lampiran</strong> <a href="<?= base_url(LOKASI_DOKUMEN . $article['dokumen']) ?>" class="content__attachment__link"> <i class="fa fa-cloud-download content__attachment__icon"></i> <span>
								<?= $article['link_dokumen'] ?>
							</span> </a>
					<?php endif ?>
				</p>
				<!-- Blog Detail End -->

				<!-- Comment List Start -->
				<!--<div class="mb-5">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">3 Comments</h3>
					</div>
					<div class="d-flex mb-4">
						<img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
						<div class="ps-3">
							<h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
							<p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
								accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
							<button class="btn btn-sm btn-light">Reply</button>
						</div>
					</div>
					<div class="d-flex mb-4">
						<img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
						<div class="ps-3">
							<h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
							<p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
								accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
							<button class="btn btn-sm btn-light">Reply</button>
						</div>
					</div>
					<div class="d-flex ms-5 mb-4">
						<img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
						<div class="ps-3">
							<h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
							<p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
								accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
							<button class="btn btn-sm btn-light">Reply</button>
						</div>
					</div>
				</div>
				<!-- Comment List End -->

				<!-- Comment Form Start -->
				<!--<div class="bg-light rounded p-5">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">Leave A Comment</h3>
					</div>
					<form>
						<div class="row g-3">
							<div class="col-12 col-sm-6">
								<input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
							</div>
							<div class="col-12 col-sm-6">
								<input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
							</div>
							<div class="col-12">
								<input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
							</div>
							<div class="col-12">
								<textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
							</div>
							<div class="col-12">
								<button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
							</div>
						</div>
					</form>
				</div>
				<!-- Comment Form End -->
			</div>

			<!-- Sidebar Start -->
			<!--<div class="col-lg-4">
				<!-- Search Form Start -->
				<!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<div class="input-group">
						<input type="text" class="form-control p-3" placeholder="Keyword">
						<button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
					</div>
				</div>
				<!-- Search Form End -->

				<!-- Category Start -->
				<!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">Categories</h3>
					</div>
					<div class="link-animated d-flex flex-column justify-content-start">
						<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Design</a>
						<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Development</a>
						<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Development</a>
						<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Keyword Research</a>
						<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Email Marketing</a>
					</div>
				</div>
				<!-- Category End -->

				<!-- Recent Post Start -->
				<!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">Recent Post</h3>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-3.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
					<div class="d-flex rounded overflow-hidden mb-3">
						<img class="img-fluid" src="img/blog-3.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
						<a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
						</a>
					</div>
				</div>
				<!-- Recent Post End -->

				<!-- Image Start -->
				<!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
				</div>
				<!-- Image End -->

				<!-- Tags Start -->
				<!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">Tag Cloud</h3>
					</div>
					<div class="d-flex flex-wrap m-n1">
						<a href="" class="btn btn-light m-1">Design</a>
						<a href="" class="btn btn-light m-1">Development</a>
						<a href="" class="btn btn-light m-1">Marketing</a>
						<a href="" class="btn btn-light m-1">SEO</a>
						<a href="" class="btn btn-light m-1">Writing</a>
						<a href="" class="btn btn-light m-1">Consulting</a>
						<a href="" class="btn btn-light m-1">Design</a>
						<a href="" class="btn btn-light m-1">Development</a>
						<a href="" class="btn btn-light m-1">Marketing</a>
						<a href="" class="btn btn-light m-1">SEO</a>
						<a href="" class="btn btn-light m-1">Writing</a>
						<a href="" class="btn btn-light m-1">Consulting</a>
					</div>
				</div>
				<!-- Tags End -->

				<!-- Plain Text Start -->
				<!--<div class="wow slideInUp" data-wow-delay="0.1s">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">Plain Text</h3>
					</div>
					<div class="bg-light text-center" style="padding: 30px;">
						<p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet diam</p>
						<a href="" class="btn btn-primary py-2 px-4">Read More</a>
					</div>
				</div>
				<!-- Plain Text End -->
			</div>
			<!-- Sidebar End -->
		</div>
	</div>
	<!-- Blog End -->
	<!--
<div class="col-lg-8 entries">
	<article class="entry entry-single" data-aos="fade-up">
		<div class="entry-img">
			<?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) : ?>
				<img src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>" class="img-fluid">
			<?php endif ?>
		</div>
		<h2 class="entry-title"> <a href="#">
				<?= $article['judul'] ?>
			</a> </h2>
		<div class="entry-meta">
			<ul>
				<li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">
						<?= $article['owner'] ?>
					</a></li>
				<li class="d-flex align-items-center"> <i class="icofont-wall-clock"></i> <a href="#">
						<time datetime="2020-01-01">
							<?= tgl_indo($article['tgl_upload']) ?>
						</time>
					</a> </li>
				<?php if ($article['kategori']) : ?>
					<li class="d-flex align-items-center"> <i class="icofont-folder"></i> <a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>">
							<?= $article['kategori'] ?>
						</a> </li>
				<?php endif ?>
				<li class="d-flex align-items-center"><i class="icofont-eye"></i> <a href="#">
						<?= hit($article['hit']) ?>
					</a></li>
			</ul>
		</div>
		<div class="entry-content">
			<p>
				<?= $article['isi'] ?>
				<?php for ($i = 1; $i <= 3; $i++) : ?>
					<?php if ($article['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar' . $i])) : ?>
						<img src="<?= AmbilFotoArtikel($article['gambar' . $i], 'sedang') ?>" alt="<?= $article['nama'] ?>" title="<?= $article['nama'] ?>" class="img-fluid" width="100%" style="padding:10px 10px 10px 10px">
					<?php endif ?>
				<?php endfor ?>
				<?php if ($article['dokumen']) : ?>
			<div class="content__attachment --mt-4"> <strong>Dokumen Lampiran</strong> <a href="<?= base_url(LOKASI_DOKUMEN . $article['dokumen']) ?>" class="content__attachment__link"> <i class="fa fa-cloud-download content__attachment__icon"></i> <span>
						<?= $article['link_dokumen'] ?>
					</span> </a> </div>
		<?php endif ?>
		</p>
		</div>
		<div class="entry-footer clearfix">
			<div class="float-left"> <i class="icofont-folder"></i>
				<ul class="cats">
					<li><a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>">
							<?= $article['kategori'] ?>
						</a></li>
				</ul>
				<!--<i class="icofont-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>-->
</div>
<div class="float-right share"> <a href="http://twitter.com/share?url=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Twitter"><i class="icofont-twitter"></i></a> <a href="http://www.facebook.com/sharer.php?u=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Facebook"><i class="icofont-facebook"></i></a> <a href="https://telegram.me/share/url?url=<?= site_url('artikel/' . buat_slug($article)) ?>&text=<?= $article["judul"]; ?>" title="Share on Telegram"><i class="icofont-telegram"></i></a> <a href="https://api.whatsapp.com/send?text=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Whatsapp"><i class="icofont-whatsapp"></i></a> </div>
</div>
</article>
</div>
<!-- End blog entry -->





<!--
<?php $article = $single_artikel ?>
<h2 class="content__heading"><?= $article['judul'] ?></h2>
<div class="content__meta">
	<span class="content__meta__item"><i class="fa fa-calendar content__meta__icon"></i> <?= tgl_indo($article['tgl_upload']) ?></span>
	<span class="content__meta__item"><i class="fa fa-user content__meta__icon"></i> <?= $article['owner'] ?></span>
	<?php if ($article['kategori']) : ?>
		<span class="content__meta__item"><i class="fa fa-tag content__meta__icon"></i> <a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>" class="content__link"><?= $article['kategori'] ?></a></span>
	<?php endif ?>
	<span class="content__meta__item"><i class="fa fa-bookmark content__meta__icon"></i> Dibaca <?= hit($article['hit']) ?></span>
</div>
<hr class="--mt-2 --mb-2">
<?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) : ?>
	<img src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>" class="content__image --mb-4">
<?php endif ?>
<article class="content__article">
	<?= $article['isi'] ?>
	<?php for ($i = 1; $i <= 3; $i++) : ?>
		<?php if ($article['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar' . $i])) : ?>
			<img src="<?= AmbilFotoArtikel($article['gambar' . $i], 'sedang') ?>" alt="<?= $article['nama'] ?>" title="<?= $article['nama'] ?>" class="content__image">
		<?php endif ?>
	<?php endfor ?>
	<?php if ($article['dokumen']) : ?>
		<div class="content__attachment --mt-4">
			<strong>Dokumen Lampiran</strong>
			<a href="<?= base_url(LOKASI_DOKUMEN . $article['dokumen']) ?>" class="content__attachment__link">
				<i class="fa fa-cloud-download content__attachment__icon"></i>
				<span><?= $article['link_dokumen'] ?></span>
			</a>
		</div>
	<?php endif ?>
</article>
<div class="--mb-10 --mt-10">
	<span>Bagikan artikel ini:</span>
	<ul class="social-media">
		<li class="social-media__item social-media--facebook">
			<a href="http://www.facebook.com/sharer.php?u=<?= site_url('artikel/' . buat_slug($article)) ?>" target="_blank" class="social-media__link"><i class="fa fa-facebook"></i></a>
		</li>
		<li class="social-media__item social-media--twitter">
			<a href="http://twitter.com/share?url=<?= site_url('artikel/' . buat_slug($article)) ?>" target="_blank" class="social-media__link"><i class="fa fa-twitter"></i></a>
		</li>
		<li class="social-media__item social-media--telegram">
			<a href="https://telegram.me/share/url?url=<?= site_url('artikel/' . buat_slug($article)) ?>&text=<?= $article["judul"]; ?>" target="_blank" class="social-media__link"><i class="fa fa-telegram"></i></a>
		</li>
		<li class="social-media__item social-media--whatsapp">
			<a href="https://api.whatsapp.com/send?text=<?= site_url('artikel/' . buat_slug($article)) ?>" target="_blank" class="social-media__link"><i class="fa fa-whatsapp"></i></a>
		</li>
	</ul>
</div>
<h5 class="content__title">Komentar</h5>
<ul class="--mt-4 content__list">
	<?php foreach ($komentar as $comment) : ?>
		<li class="--mt-2 --mb-2">
			<span><i class="fa fa-user --mx-2"></i> <?= $comment['owner'] ?></span>
			<p><i class="fa fa-comment-o --mx-2"></i> <?= $comment['komentar'] ?></p>
			<span><i class="fa fa-calendar --mx-2"></i> <?= $comment['tgl_upload'] ?></span>
		</li>
		<hr/>
	<?php endforeach ?>
</ul>


<?php if (is_array($komentar)) : ?>
	<?php
	$k = array();
	foreach ($komentar as $data) {
		if ($data['is_archived'] != 1) {
			array_push($k, $data);
		}
	}
	?>
	<?php if (count($k) > 0) : ?>
		<div class="py-2 pl-4 bg-light align-middle d-flex align-items-center" style="border-left: 3px solid orange">
			<h4 class="h5 font-weight-bold m-0"><?= count($k) ?> Komentar atas artikel <?= $single_artikel["judul"] ?></h4>
		</div>
		<ul class="comment-section">
			<?php foreach ($k as $data) : ?>
					<li class="comment user-comment">
						<div class="info">
								<a href="#!" title="<?= $data['owner'] ?>"><?= $data['owner'] ?></a>
								<span><?= tgl_indo($data['tgl_upload']); ?></span>
						</div>
						<span class="avatar">
								<i class="fa fa-user fa-lg p-2 rounded-circle bg-light"></i>
						</span>
						<p><?= $data['komentar'] ?></p>
					</li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
<?php endif ?>

<div class="form-group group-komentar" id="kolom-komentar">
	<?php if ($single_artikel['boleh_komentar']) : ?>
		<div class="mb-3 font-weight-bold h6">Silakan tulis komentar dalam formulir berikut ini (Gunakan bahasa yang santun)</div>
		<div class="box box-default shadow-sm border border-info">
			<div class="box-header bg-info text-light py-2 px-3 mb-2">
				<div class="h6 font-weight-bold m-0 py-2"><i class="fa fa-comments"></i>	Formulir Komentar <span class="font-weight-normal">(Komentar baru terbit setelah disetujui Admin)</span></div>
			</div>

			<!-- Tampilkan hanya jika 'flash_message' ada -->
<!--			<?php $label = !empty($_SESSION['validation_error']) ? 'alert-danger' : 'alert-success'; ?>
			<?php if ($flash_message) : ?>
				<div class="box-header alert <?= $label ?> mx-2 rounded-0"><?= $flash_message ?></div>
				<?php unset($_SESSION['validation_error']); ?>
			<?php endif; ?>
			<div class="box-body py-3 px-3">
				<form id="form-komentar" name="form" action="<?= site_url('first/add_comment/' . $single_artikel['id']) ?>" method="POST" onSubmit="return validasi(this);">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Nama<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input class="form-control input-sm" type="text" required name="owner" maxlength="30" value="<?= !empty($_SESSION['post']['owner']) ? $_SESSION['post']['owner'] : $_SESSION['nama'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">No. HP<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input class="form-control input-sm" type="text" required placeholder="" name="no_hp" maxlength="30" value="<?= $_SESSION['post']['no_hp']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Alamat email</label>
						<div class="col-lg-9">
							<input class="form-control input-sm" type="text" placeholder="" name="email" maxlength="30" value="<?= $_SESSION['post']['email']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Komentar<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<textarea class="form-control input-sm" required name="komentar"><?= $_SESSION['post']['komentar'] ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="offset-lg-3 col-lg-9">
							<img id="captcha" src="<?= base_url('securimage/securimage_show.php') ?>" alt="CAPTCHA Image"/ class="img-fluid border border-black">
						</div>
					</div>
					<div class="row mb-2">
						<div class="offset-lg-3 col-lg-9">
							<a href="#!" onclick="document.getElementById('captcha').src = '<?= base_url("securimage/securimage_show.php?") ?>'+Math.random(); return false"><small>[ Ganti Gambar ]</small></a>
						</div>
					</div>
					<div class="row">
						<div class="offset-lg-3 col-lg-9">
							<input class="form-control input-sm" type="text" required name="captcha_code" maxlength="6" value="<?= $_SESSION['post']['captcha_code'] ?>"/>
							<span class="d-block">
								Isikan kode di gambar
							</span>
						</div>
					</div>
					<div class="row">
						<div class="offset-lg-3 mt-3 col-lg-10">
							<button class="btn btn-info btn-md" type="submit"><i class="fa fa-paper-plane"></i> KIRIM KOMENTAR</button>
						</div>
					</div> 
				</form>
			</div>
		</div>
	<?php else : ?>
		<span class="d-block alert alert-warning px-2 py-3"><i class="fa fa-exclamation-triangle pl-1 pr-2"></i> Komentar untuk artikel ini telah ditutup.</span>
	<?php endif; ?>
</div>-->