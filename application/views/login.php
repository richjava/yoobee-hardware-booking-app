<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card>
        <md-card-title flex="60" flex-offset="20">
            <p><img src="app/images/logo.png" alt="Yoobee Logo"></p>
        </md-card-title>
        <md-card-content>
            <h4>{{ singin}}</h4>
        </md-card-content>
        <md-card-content>
            <md-content>
                <div layout="column" layout-padding ng-cloak>
                    <?php echo form_open(base_url().'auth');?>
                    <md-input-container class="md-block">
                        <?php if($error==1){?>
                            <p>Username or password did not match</p>
                        <? } ?>

                        <?=form_label('Select username','username')?>
                        <md-icon md-svg-src="app/icons/ic_person_outline_black_24px.svg" class="name"></md-icon>
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
                        <md-icon md-svg-src="app/icons/ic_vpn_key_black_24px.svg" class="name"></md-icon>
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

                    <section layout="row" layout-align="center center">
                        <md-button class="md-raised">Cancel</md-button>
                        <?php echo form_submit(
                            array(
                                'id' => "submit",
                                'value' => 'Signin',
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

