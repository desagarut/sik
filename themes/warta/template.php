<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($folder_themes . '/commons/head') ?>

<body>
    <?php //$this->load->view($folder_themes . '/commons/spinner.php') ?>
    <?php $this->load->view($folder_themes . '/commons/header.php') ?>
    <main>
        <?php $this->load->view($folder_themes . '/layouts/home.tpl.php') ?>
    </main>
    <?php $this->load->view($folder_themes . '/commons/footer') ?>
</body>

</html>