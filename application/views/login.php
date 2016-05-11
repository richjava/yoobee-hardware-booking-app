<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card class="wrapper">
        <md-card-title>
            <p><img src="<?=base_url()?>app/images/logo.png" alt="Yoobee Logo"></p>
        </md-card-title>
        <md-card-content>
            <?php if ($error == 1) { ?>
                <p style="color:red">Username or password did not match</p>
            <? } else { ?>
                <h3 class="title">{{ titleLogin }}</h3>
            <?php } ?>
        </md-card-content>
        <md-card-content>
            <md-content class="loginForm">
                <div layout="column" layout-padding ng-cloak>
                    <?php echo form_open(base_url() . 'auth', array('name' => 'form', 'novalidate' => '')); ?>
                    <md-input-container class="md-block">
                        <?= form_label('Enter your username', 'username') ?>
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_person_black_SOLID_24px.svg"
                                 class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'username',
                            'id' => 'username',
                            'ng-model' => "student.username",
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="form.$submitted || form.username.$touched">
                            <span ng-show="form.username.$error.required">Tell us your username</span>
                        </div>
                    </md-input-container>

                    <md-input-container class="md-block">
                        <?= form_label("Enter your password", "password") ?>
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_vpn_key_black_24px.svg"
                                 class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'ng-model' => "student.password",
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="form.$submitted || form.password.$touched">
                            <span ng-show="form.password.$error.required">We need your password</span>
                        </div>
                    </md-input-container>

                    <section layout="row" layout-align="center center">
                        <md-button class="md-raised" ng-click="reset()">Clear</md-button>
                        <?php echo form_submit(
                            array(
                                'id' => "submit",
                                'value' => 'Login',
                                'class' => 'md-button md-raised md-warn')
                        );
                        ?>
                    </section>

                    <?php echo form_close();?>
                </div>
            </md-content>

            <md-card-content>
                <p>Not a member, register <?=anchor('auth/register','here')?></p>
            </md-card-content>

        </md-card-content>
    </md-card>
</md-content>

