<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding " layout="row" layout-wrap>
    <md-card>
        <md-card-title flex="60" flex-offset="20">
            <p><img src="<?=base_url()?>app/images/logo.png" alt="Yoobee Logo"></p>
        </md-card-title>
        <md-card-content>
            <h4>{{ title | uppercase}}</h4>
            <?php if($errors) {?>
                <h3 style="color:red;"><b><?=$errors?></b></h3>
            <?php } ?>
        </md-card-content>
        <md-card-content>
            <md-content>
                <div layout="column" layout-padding ng-cloak>
                    <?php echo form_open(base_url().'auth/register');?>
                    <md-input-container class="md-block">

                        <?=form_label('Select username','username')?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_person_outline_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'username',
                            'id' => 'username',
                            'ng-model' =>"student.username"
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Password","password")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'ng-model' =>"student.password"
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Confirm Password","password_conform");?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'password',
                            'name' => 'password_confirm',
                            'id' => 'password_confirm'
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container class="md-block">
                        <?=form_label("Fullname","fullname")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_person_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'fullname',
                            'id' => 'fullname',
                            'ng-model' => 'student.fullname'
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container class="md-block">
                        <?=form_label("Address","addres");?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_location_city_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'address',
                            'id' => 'address',
                            'ng-model' => 'student.address'
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Phone Number","phone")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_phone_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'phone',
                            'id' => 'phone',
                            'ng-model' => 'student.phone'
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <md-input-container>
                        <?=form_label("Email","email")?>
                        <md-icon md-svg-src="<?=base_url()?>app/icons/ic_email_black_24px.svg" class="name"></md-icon>
                        <?php
                        $data_form=array(
                            'type'=> 'text',
                            'name' => 'email',
                            'id' => 'email',
                            'ng-model' => 'student.email'
                        );
                        echo form_input($data_form);
                        ?>
                    </md-input-container>

                    <!--                           <md-content>-->
                    <section layout="row" layout-align="center center">
                        <md-button class="md-raised">Cancel</md-button>
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
            <p>Already a member, Signin <?= anchor('auth', 'here') ?></p>
        </md-card-content>
    </md-card>
</md-content>

