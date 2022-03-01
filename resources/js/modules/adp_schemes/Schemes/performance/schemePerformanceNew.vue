<template>
    <div class="tab-pane fade" id="pills-performance" role="tabpanel" aria-labelledby="pills-performance-tab">
        <div class="row">
            <div class="col-3">
            <div 
                class="nav flex-column nav-pills me-3 vertical-tabs bg-secondary bg-opacity-10 rounded-3" 
                id="v-pills-tab" 
                role="tablist" 
                aria-orientation="vertical"
                
                >
                
                <button class="nav-link text-start active" @click="permoformance_tabs_click('PC')" id="v-pills-pc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pc" type="button" role="tab" aria-controls="v-pills-pc" aria-selected="true">PC</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('AA')" id="v-pills-aa-tab" data-bs-toggle="pill" data-bs-target="#v-pills-aa" type="button" role="tab" aria-controls="v-pills-aa" aria-selected="false">AA</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('TS')" id="v-pills-ts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ts" type="button" role="tab" aria-controls="v-pills-ts" aria-selected="false">TS</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('Contract')" id="v-pills-contract-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contract" type="button" role="tab" aria-controls="v-pills-contract" aria-selected="false">Contract</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('Allocation')" id="v-pills-allocation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-allocation" type="button" role="tab" aria-controls="v-pills-allocation" aria-selected="false">Allocation</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('ReleasePND')" id="v-pills-release-pnd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-release-pnd" type="button" role="tab" aria-controls="v-pills-release-pnd" aria-selected="false">Release PnD</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('ReleaseFD')" id="v-pills-release-fd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-release-fd" type="button" role="tab" aria-controls="v-pills-release-fd" aria-selected="false">Release FD</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('MonthlyProgress')" id="v-pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#v-pills-monthly" type="button" role="tab" aria-controls="v-pills-monthly" aria-selected="false">Monthly Progress</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('Visits')" id="v-pills-visits-tab" data-bs-toggle="pill" data-bs-target="#v-pills-visits" type="button" role="tab" aria-controls="v-pills-visits" aria-selected="false">Visits</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('Enhancement')" id="v-pills-enhancement-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enhancement" type="button" role="tab" aria-controls="v-pills-enhancement" aria-selected="false">Enhancement</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('CBO')" id="v-pills-cbo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cbo" type="button" role="tab" aria-controls="v-pills-cbo" aria-selected="false">CBO</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('Assets')" id="v-pills-assets-tab" data-bs-toggle="pill" data-bs-target="#v-pills-assets" type="button" role="tab" aria-controls="v-pills-assets" aria-selected="false">Assets</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('HHConnections')" id="v-pills-hh-tab" data-bs-toggle="pill" data-bs-target="#v-pills-hh" type="button" role="tab" aria-controls="v-pills-hh" aria-selected="false">HH Connections</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('CommunityShare')" id="v-pills-community-tab" data-bs-toggle="pill" data-bs-target="#v-pills-community" type="button" role="tab" aria-controls="v-pills-community" aria-selected="false">Community Share</button>
                <button class="nav-link text-start" @click="permoformance_tabs_click('VillageServed')" id="v-pills-village-tab" data-bs-toggle="pill" data-bs-target="#v-pills-village" type="button" role="tab" aria-controls="v-pills-village" aria-selected="false">Village Served</button>
            </div>
            </div>
            <div class="col-9">
            <div class="tab-content p-0 w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-pc" role="tabpanel" aria-labelledby="v-pills-pc-tab">
                   <div class="row">
                        <div class="col-md-12 table-responsive phed-tabs-box">
                        
                            <pc_modal />
                        </div>
                    </div> 
                    
                </div>
                <div class="tab-pane fade" id="v-pills-aa" role="tabpanel" aria-labelledby="v-pills-aa-tab">
                    <aa_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-ts" role="tabpanel" aria-labelledby="v-pills-tc-tab">
                    <ts_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-contract" role="tabpanel" aria-labelledby="v-pills-contract-tab">
                    <contract_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-allocation" role="tabpanel" aria-labelledby="v-pills-allocation-tab">
                    <allocation_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-release-pnd" role="tabpanel" aria-labelledby="v-pills-release-pnd-tab">
                    <releasepnd_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-release-fd" role="tabpanel" aria-labelledby="v-pills-release-fd-tab">
                    <releasefd_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-monthly" role="tabpanel" aria-labelledby="v-pills-monthly-tab">
                    <monthly_progress_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-visits" role="tabpanel" aria-labelledby="v-pills-visits-tab">
                    <visits_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-enhancement" role="tabpanel" aria-labelledby="v-pills-enhancement-tab">
                    <enhancement_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-cbo" role="tabpanel" aria-labelledby="v-pills-cbo-tab">
                    <cbo_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-hh" role="tabpanel" aria-labelledby="v-pills-hh-tab">
                    <hhconnections_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-assets" role="tabpanel" aria-labelledby="v-pills-assets-tab">
                    <assets_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-community" role="tabpanel" aria-labelledby="v-pills-community-tab">
                    <community_share_modal />
                </div>
                <div class="tab-pane fade" id="v-pills-village" role="tabpanel" aria-labelledby="v-pills-community-tab">
                    <village_served_modal />
                </div>
                
                
                <div class="tab-pane fade" id="v-pills-village" role="tabpanel" aria-labelledby="v-pills-village-tab">village</div>
                    <div
                        class="
                        d-flex
                        align-items-center
                        justify-content-between
                        tab-btn-container
                        "
                    >
                        <button
                        type="button"
                        class="btn btn-success"
                        @click="openRelevantModal"
                        >
                        <i class="fa fa-plus-circle me-3"></i>
                        <span>Add More</span>
                        </button>
                    </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script>

import {eventBus} from "vue";


import pc_modal from './pc_modal.vue';
import aa_modal from './aa_modal.vue';
import ts_modal from './ts_modal.vue';

import contract_modal from './contract_modal.vue';
import allocation_modal from './allocation_modal.vue';
import releasepnd_modal from './releasepnd_modal.vue';

import releasefd_modal from './releasefd_modal.vue';
import monthly_progress_modal from './monthly_progress_modal.vue';
import visits_modal from './visits_modal.vue';
import enhancement_modal from './enhancement_modal.vue';
import cbo_modal from './cbo_modal.vue';
import assets_modal from './assets_modal.vue';
import hhconnections_modal from './hhconnections_modal.vue';
import community_share_modal from './community_share_modal.vue';
import village_served_modal from './village_served_modal.vue';

export default {
  // name:'schemePerformance',
  components: { 
      pc_modal,
      aa_modal,
      ts_modal, 
      contract_modal,
      allocation_modal,
      releasepnd_modal,
      releasefd_modal,
      monthly_progress_modal,
      visits_modal,
      enhancement_modal,
      cbo_modal,
      assets_modal,
      hhconnections_modal,
      community_share_modal,
      village_served_modal 
    },
  data() {
    return {
      active_el: "PC",
      permoformance_tabs: {
        PC:"PC",
        AA:"AA",
        TS:"TS",
        Contract:"Contract",
        Allocation:"Allocation",
        ReleasePND:"Release PnD",
        ReleaseFD:"Release FD",
        MonthlyProgress:"Monthly Progress",
        Visits:"Visits",
        Enhancement:"Enhancement",
        CBO:"CBO",
        Assets:"Assets",
        HHConnections:"HH Connections",
        CommunityShare:"Community Share",
        VillageServed:"Village Served",
      },
    };
  },
    
  mounted(){
    // console.log("tt",this.name);
  },
  methods: {
    permoformance_tabs_click(performance) {
      this.active_el = performance;
    //   console.log("active_el value:",this.active_el);
    },
    openRelevantModal() {
        // this.$refs.componentOne.c1method();
        // this.$refs.pc_modal.resetFormFields();
        // this.$refs.ts_modal.resetFormFields();

      $("#"+this.active_el+"Modal").modal("show");
    //   console.log("what is:",'#'+this.active_el+"Modal");
    },
  },
};
</script>
