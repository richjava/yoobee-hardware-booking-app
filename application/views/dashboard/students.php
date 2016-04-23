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
        <md-card-content style="width: auto">
            <?php echo $output; ?>
        </md-card-content>
    </md-card>
</md-content>