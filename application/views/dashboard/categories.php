<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
<?php endforeach; ?>
<?php foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card>
        <md-card-title><h3>Categories</h3></md-card-title>
        <md-card-content style="width: auto">
            <ul class="nav nav-tabs">
                <li><a href="<?= base_url() . 'dashboard/bookings' ?>">Bookings</a></li>
                <li><a href="<?= base_url() . 'dashboard/Students' ?>">Students</a></li>
                <li><a href="<?= base_url() . 'dashboard/devices' ?>">Devices</a></li>
                <li><a href="<?= base_url() . 'dashboard/Categories' ?>">Categories</a></li>
                <li><a href="<?= base_url() . 'dashboard/programmes' ?>">programmes</a></li>
            </ul>
            <md-card-content style="width: auto">
            <?php echo $output; ?>
        </md-card-content>
    </md-card>
</md-content>