<div class="blog_right_sidebar">
    <?php $this->load->view($folder_themes . '/widgets/side_artikel_list') ?>
    <?php $this->load->view($folder_themes . '/widgets/side_newsletter_widget') ?>
    <?php $this->load->view($folder_themes . '/widgets/side_search_widget') ?>
    <?php $this->load->view($folder_themes . '/widgets/category') ?>
    <?php $this->load->view($folder_themes . '/widgets/side_popular_post_widget') ?>

    <aside class="single_sidebar_widget tag_cloud_widget">
        <h4 class="widget_title">Tag Clouds</h4>
        <ul class="list">
            <li>
                <a href="#">project</a>
            </li>
            <li>
                <a href="#">love</a>
            </li>
            <li>
                <a href="#">technology</a>
            </li>
            <li>
                <a href="#">travel</a>
            </li>
            <li>
                <a href="#">restaurant</a>
            </li>
            <li>
                <a href="#">life style</a>
            </li>
            <li>
                <a href="#">design</a>
            </li>
            <li>
                <a href="#">illustration</a>
            </li>
        </ul>
    </aside>

    <!--
<div class="row shadow" style="padding: 10px 10px 10px 10px">
    <?php $nama = potong_teks($data['isi'], 10); ?>
    <div class="text-end py-3 mt-2">
        <a class="btn btn-info py-3 px-5 mt-2" style="border-radius: 30px 0 0 30px;" href="<?= site_url("first/gallery_youtube/{$data['id']}") ?>">Youtube</a>
    </div>
    <?php foreach ($gallery_youtube as $data) : ?>
        <?php if ($data['link']) : ?>

            <div class="row">
                <div class="product-img col-sm-6">
                    <iframe height="100px" width="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $data["link"]; ?>" title="<?= $data['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?= site_url("first/sub_gallery_youtube/{$data['id']}") ?>" style="font-size:11px">
                        <?= $data['nama'] ?>
                        <!-- <span class="label label-warning pull-right">$1800</span>-->
    <!--                   </a><br />
                    <span class="product-description">
                        <small><?= $data['tgl_upload'] ?></small>
                    </span>
                </div>
            </div>
            &nbsp;
        <?php endif; ?>
    <?php endforeach; ?>
</div>
                    -->

    <!--
    <aside class="single_sidebar_widget instagram_feeds">
        <h4 class="widget_title">Instagram Feeds</h4>
        <ul class="instagram_row flex-wrap">
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                </a>
            </li>
        </ul>
    </aside>-->
</div>