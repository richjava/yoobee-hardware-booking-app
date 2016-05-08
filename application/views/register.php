<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card class="wrapper">
        <md-card-title>
            <p><img src="<?=base_url()?>app/images/logo.png" alt="Yoobee Logo"></p>
        </md-card-title>
        <md-card-content>
            <?php if($errors) {?>
                <h3 style="color:red;"><b><?=$errors?></b></h3>
            <?php } else { ?>
                <p class="title">{{ titleRegistration | uppercase}}</p>
                <p>registrationForm.$pristine =</p> {{registrationForm.$pristine}}
                <p>registrationForm.$valid =</p> {{registrationForm.$valid}}

            <?php } ?>
        </md-card-content>
        <md-card-content>
            <md-content class="registrationForm">
                <div layout="column" layout-padding ng-cloak>
                    <?php echo form_open(base_url() . 'auth/register', array('name' => 'registrationForm', 'novalidate' => '')); ?>
                    <md-input-container class="md-block">

                        <?=form_label('Select username','username')?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_person_outline_black_24px.svg" class="name"></md-icon>
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

                        <div ng-show="registrationForm.$submitted || registrationForm.username.$touched">
                            <span ng-show="registrationForm.username.$error.required">Choose a unique username</span>
                        </div>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Password","password")?>
                        <md-icon md-svg-src="<?= base_url() ?>app/icons/ic_vpn_key_black_24px.svg"></md-icon>
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

                        <div ng-show="registrationForm.$submitted || registrationForm.password.$touched">
                            <span ng-show="registrationForm.password.$error.required">Select a password</span>
                        </div>
                    </md-input-container>

                    <md-input-container>
                        <?= form_label("Confirm Password", "password_confirm"); ?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'password',
                            'name' => 'password_confirm',
                            'id' => 'password_confirm',
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="registrationForm.$submitted || registrationForm.password_confirm.$touched">
                            <span
                                ng-show="registrationForm.password_confirm.$error.required">Your password must match</span>
                        </div>
                    </md-input-container>

                    <md-input-container class="md-block">
                        <?=form_label("Fullname","fullname")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_person_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'fullname',
                            'id' => 'fullname',
                            'ng-model' => 'student.fullname',
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="registrationForm.$submitted || registrationForm.fullname.$touched">
                            <span ng-show="registrationForm.fullname.$error.required">Tell us your fullname</span>
                        </div>
                    </md-input-container>

                    <md-input-container class="md-block">
                        <?=form_label("Address","addres");?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_location_city_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'address',
                            'id' => 'address',
                            'ng-model' => 'student.address',
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="registrationForm.$submitted || registrationForm.address.$touched">
                            <span ng-show="registrationForm.address.$error.required">Tell us your address</span>
                        </div>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Phone Number","phone")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_phone_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'phone',
                            'id' => 'phone',
                            'ng-model' => 'student.phone',
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="registrationForm.$submitted || registrationForm.phone.$touched">
                            <span ng-show="registrationForm.phone.$error.required">Tell us your telephone number</span>
                        </div>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Email","email")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_email_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'email',
                            'id' => 'email',
                            'ng-model' => 'student.email',
                            'required' => ""
                        );
                        echo form_input($data_form);
                        ?>
                        <br/>

                        <div ng-show="registrationForm.$submitted || registrationForm.email.$touched">
                            <span ng-show="registrationForm.email.$error.required">Tell us your email address</span>
                        </div>
                    </md-input-container>

                    <!--                           <md-content>-->
                    <section layout="row" layout-align="center center">
                        <md-button class="md-raised" ng-click="reset()">RESET</md-button>
                        <?php echo form_submit(
                            array(
                                'id' => "submit",
                                'value' => 'Register',
                                'class' => 'md-button md-raised md-warn')
                        );
                        ?>
                    </section>
                    <!--                           </md-content>-->
                    <?php echo form_close();?>
                </div>
            </md-content>
        </md-card-content>
        <md-card-content>
            <p>Already a member, Login <?= anchor('auth', 'here') ?></p>
        </md-card-content>
    </md-card>
</md-content>

