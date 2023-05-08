<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes .'/partials/weekly') ?>
<?php $this->load->view($folder_themes .'/partials/carousel') ?>
<!-- List Konten -->
<?php $title = ( ! empty($judul_kategori)) ? $judul_kategori['kategori'] : "Artikel Terkini"; ?>
<?php $this->load->view($folder_themes .'/partials/trending') ?>

<?php if ($headline): ?>
<?php $this->load->view($folder_themes .'/partials/whatnew') ?>
<?php endif; ?>

<?php $this->load->view($folder_themes .'/partials/most-popular') ?>
<?php $this->load->view($folder_themes .'/partials/video') ?>
<?php $this->load->view($folder_themes .'/widgets/banner-one') ?>
