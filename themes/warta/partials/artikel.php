<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $article = $single_artikel ?>
<!--
<div class="container-xxl py-5">
	<div class="container">

		<div class="col-md-12 col-12">
			<div class="product-images">
				<main id="gallery">
					<div class="main-img text-center">
						<?php if ($article['gambar']) : ?>
							<img src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>" id="current">
						<?php else : ?>
							<img class="img-fluid" src="<?= base_url() ?>themes/kampus/assets/img/noimage.png" alt="Belum Ada Gambar">
						<?php endif ?>
					</div>
				</main>
			</div>
			<div class="product-details-info">
				<div class="single-block">
					<div class="row">
						<div class="col-md-12">
							<div class="info-body custom-responsive-margin">
								<h4> <a href="#">
										<?= $article['judul'] ?>
									</a> </h4>
							</div>
							<div class="row align-items-center">
								<div class="nav-social">
									<a href="#">
										Penulis: <?= $article['owner'] ?>
									</a> - <a href="#">
										Terbit: <?= tgl_indo($article['tgl_upload']) ?>
									</a> -
									<?php if ($article['kategori']) : ?>
										<a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>">
											Kategori: <?= $article['kategori'] ?>
										</a> -
									<?php endif ?>
									<a href="#">
										dilihat: <?= hit($article['hit']) ?>
									</a>
								</div>
							</div>
							<div class="entry-content">
								<p>
									<?= $article['isi'] ?>
									<?php for ($i = 1; $i <= 3; $i++) : ?>
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
								</div>
								<div class="float-right share"> <a href="http://twitter.com/share?url=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Twitter"><i class="icofont-twitter"></i></a> <a href="http://www.facebook.com/sharer.php?u=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Facebook"><i class="icofont-facebook"></i></a> <a href="https://telegram.me/share/url?url=<?= site_url('artikel/' . buat_slug($article)) ?>&text=<?= $article["judul"]; ?>" title="Share on Telegram"><i class="icofont-telegram"></i></a> <a href="https://api.whatsapp.com/send?text=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Whatsapp"><i class="icofont-whatsapp"></i></a> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
									-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 posts-list">
            <div class="single-post">
               <div class="feature-img">
                  <?php if ($article['gambar']) : ?>
                     <img class="img-fluid" src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>">
                  <?php else : ?>
                     <img class="img-fluid" src="<?= base_url("$this->theme_folder/$this->theme/assets/img/blog/single_blog_1.png") ?>" alt="<?= $article['judul'] ?>">
                  <?php endif ?>
               </div>
               <div class="blog_details">
                  <h2><?= $article['judul'] ?></h2>
                  <ul class="blog-info-link mt-3 mb-4">
                     <li><a href="#"><i class="fa fa-user"></i> <?= $article['owner'] ?></a></li>
                     <li><a href="#"><i class="fa fa-comments"></i> <?= $article['hit'] ?></a></li>
                  </ul>
                  <p class="excert">
                     <?= $article['isi'] ?>
                     <?php for ($i = 1; $i <= 3; $i++) : ?>
                     <?php endfor ?>
                  </p>
                  <div class="quote-wrapper">
                     <div class="quotes">
                        <?= $article['judul'] ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="navigation-top">
               <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                     people like this</p>
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                     <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                  </div>
                  <ul class="social-icons">
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                     <li><a href="#"><i class="fab fa-behance"></i></a></li>
                  </ul>
               </div>
               <div class="navigation-area">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                        <div class="thumb">
                           <a href="#">
                              <!--<img class="img-fluid" src="<?= base_url("$this->theme_folder/$this->theme/assets/img/post/preview.png") ?>" alt="">-->
                           </a>
                        </div>
                        <div class="arrow">
                           <a href="#">
                              <span class="lnr text-white ti-arrow-left"></span>
                           </a>
                        </div>
                        <div class="detials">
                           <p>Prev Post</p>
                           <a href="#">
                              <h4>Space The Final Frontier</h4>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                        <div class="detials">
                           <p>Next Post</p>
                           <a href="#">
                              <h4>Telescopes 101</h4>
                           </a>
                        </div>
                        <div class="arrow">
                           <a href="#">
                              <span class="lnr text-white ti-arrow-right"></span>
                           </a>
                        </div>
                        <div class="thumb">
                           <a href="#">
                              <!--<img class="img-fluid" src="<?= base_url("$this->theme_folder/$this->theme/assets/img/post/next.png") ?>" alt="">-->
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--
            <div class="blog-author">
               <div class="media align-items-center">
                  <img src="assets/img/blog/author.png" alt="">
                  <div class="media-body">
                     <a href="#">
                        <h4>Harvard milan</h4>
                     </a>
                     <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                        our dominion twon Second divided from</p>
                  </div>
               </div>
            </div>
            <div class="comments-area">
               <h4>05 Comments</h4>
               <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                        <div class="thumb">
                           <img src="assets/img/comment/comment_1.png" alt="">
                        </div>
                        <div class="desc">
                           <p class="comment">
                              Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                              Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                           </p>
                           <div class="d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                 <h5>
                                    <a href="#">Emilly Blunt</a>
                                 </h5>
                                 <p class="date">December 4, 2017 at 3:12 pm </p>
                              </div>
                              <div class="reply-btn">
                                 <a href="#" class="btn-reply text-uppercase">reply</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                        <div class="thumb">
                           <img src="assets/img/comment/comment_2.png" alt="">
                        </div>
                        <div class="desc">
                           <p class="comment">
                              Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                              Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                           </p>
                           <div class="d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                 <h5>
                                    <a href="#">Emilly Blunt</a>
                                 </h5>
                                 <p class="date">December 4, 2017 at 3:12 pm </p>
                              </div>
                              <div class="reply-btn">
                                 <a href="#" class="btn-reply text-uppercase">reply</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                        <div class="thumb">
                           <img src="assets/img/comment/comment_3.png" alt="">
                        </div>
                        <div class="desc">
                           <p class="comment">
                              Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                              Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                           </p>
                           <div class="d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                 <h5>
                                    <a href="#">Emilly Blunt</a>
                                 </h5>
                                 <p class="date">December 4, 2017 at 3:12 pm </p>
                              </div>
                              <div class="reply-btn">
                                 <a href="#" class="btn-reply text-uppercase">reply</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="comment-form">
               <h4>Leave a Reply</h4>
               <form class="form-contact comment_form" action="#" id="commentForm">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                  </div>
               </form>
            </div>-->
         </div>
         <div class="col-lg-4">
            <?php $this->load->view($folder_themes . '/partials/artikel-side') ?>
         </div>
      </div>
   </div>
</section>
<!--================ Blog Area end =================-->