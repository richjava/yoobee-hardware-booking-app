<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card>

        <md-card-title flex="60" flex-offset="20">
            <h4>Welcome <?= $this->session->userdata('username') ?>, </h4>
        </md-card-title>

        <md-card-content style="width: 400px">
            <v-accordion id="my-accordion" class="vAccordion--default" multiple control="accordion">

                <v-pane id="{{ category.id }}" ng-repeat="category in categories" expanded="pane.isExpanded">

                    <v-pane-header>
                        {{ category.header }}
                    </v-pane-header>

                    <v-pane-content>
                        {{ category.content }}
                        <v-accordion ng-if="category.devices">
                            <v-pane ng-repeat="device in category.devices" ng-disabled="device.isDisabled">
                                <v-pane-header>
                                    <md-checkbox class="md-warn"></md-checkbox>
                                    {{ device.header }}
                                </v-pane-header>
                                <v-pane-content>
                                    {{ device.content }}
                                </v-pane-content>
                            </v-pane>
                        </v-accordion>
                    </v-pane-content>

                </v-pane>

            </v-accordion>
        </md-card-content>
        <md-card-content>
            <div layout="row" layout-align="end end">
                    <div>
                        <md-button class="md-icon-button md-primary">
                            <md-icon md-svg-src="<?=base_url()?>app/icons/ic_arrow_forward_black_48px.svg" ng-click="function()"></md-icon>
                        </md-button>
                    </div>
            </div>
        </md-card-content>

    </md-card>
</md-content>
