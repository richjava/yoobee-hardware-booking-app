<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<md-content class="md-padding container" layout="row" layout-wrap>
    <md-card>

        <md-card-title flex="60" flex-offset="20">
            <h4>Welcome <?=$this->session->userdata('username')?>, </h4>
        </md-card-title>

        <md-card-content>
            <v-accordion class="vAccordion--default" multiple>

                <!-- add expanded attribute to open the section -->
                <v-pane>
                    <v-pane-header>
                        Pane header #1
                    </v-pane-header>

                    <v-pane-content>
                        Pane content #1
                    </v-pane-content>

                    <v-pane-content>
                        Pane content #2
                    </v-pane-content>

                    <v-pane-content>
                        Pane content #3
                    </v-pane-content>
                </v-pane>

                <v-pane>
                    <v-pane-header>
                        Pane header #2
                    </v-pane-header>

                    <v-pane-content>
                        Pane content #2
                    </v-pane-content>
                </v-pane>

            </v-accordion>
        </md-card-content>

    </md-card>
</md-content>
