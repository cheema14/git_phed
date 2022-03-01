<template>
    <div class="tab-pane fade active show" id="pills-general-forms" role="tabpanel" aria-labelledby="pills-general-forms-tab">
        <div class="row">
            <div class="col-3">
            <div 
                class="nav flex-column nav-pills vertical-tabs bg-secondary bg-opacity-10 rounded-3" 
                id="v-pills-tab" 
                role="tablist" 
                aria-orientation="vertical"
                
                >
                
                <button class="nav-link text-start active" @click="performance_tabs_click('Location')" id="v-pills-location-tab" data-bs-toggle="pill" data-bs-target="#v-pills-location" type="button" role="tab" aria-controls="v-pills-location" aria-selected="true">Location Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Constituency')" id="v-pills-constituency-tab" data-bs-toggle="pill" data-bs-target="#v-pills-constituency" type="button" role="tab" aria-controls="v-pills-constituency" aria-selected="false">Constituency</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Executing Office')" id="v-pills-executing-tab" data-bs-toggle="pill" data-bs-target="#v-pills-executing" type="button" role="tab" aria-controls="v-pills-executing" aria-selected="false">Executing Office</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Period')" id="v-pills-period-tab" data-bs-toggle="pill" data-bs-target="#v-pills-period" type="button" role="tab" aria-controls="v-pills-period" aria-selected="false">Period Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Status')" id="v-pills-status-tab" data-bs-toggle="pill" data-bs-target="#v-pills-status" type="button" role="tab" aria-controls="v-pills-status" aria-selected="false">Status</button>
                <button class="nav-link text-start" @click="performance_tabs_click('InfraStructure')" id="v-pills-infrastructure-tab" data-bs-toggle="pill" data-bs-target="#v-pills-infrastructure" type="button" role="tab" aria-controls="v-pills-infrastructure" aria-selected="false">Infrastructure Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('General')" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="false">General Codes</button>
            </div>
            </div>
            <div class="col-9">
            <div class="tab-content p-0 w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-location" role="tabpanel" aria-labelledby="v-pills-pc-tab">
                   <div class="row">
                        <div class="col-md-12 table-responsive phed-tabs-box">
                            <location />
                        </div>
                    </div>                     
                </div>
                <div class="tab-pane fade" id="v-pills-constituency" role="tabpanel" aria-labelledby="v-pills-constituency-tab">
                    <constituency />
                </div>
                <div class="tab-pane fade" id="v-pills-executing" role="tabpanel" aria-labelledby="v-pills-executing-tab">
                    <executing_office />
                </div>
                <div class="tab-pane fade" id="v-pills-period" role="tabpanel" aria-labelledby="v-pills-period-tab">
                    <period_codes />
                </div>
                <div class="tab-pane fade" id="v-pills-status" role="tabpanel" aria-labelledby="v-pills-status-tab">
                    <status />
                </div>
                <div class="tab-pane fade" id="v-pills-infrastructure" role="tabpanel" aria-labelledby="v-pills-infrastructure-tab">
                    <infrastructure />
                </div>
                <div class="tab-pane fade" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                    <general_codes />
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
import location from "./location_codes.vue";
import constituency from "./constituency.vue";
import executing_office from "./executing_office.vue";
import period_codes from "./period_codes.vue";
import status from "./status.vue";
import infrastructure from "./infrastructure_codes.vue";
import general_codes from "./general_codes.vue";


// import village_served_modal from './village_served_modal.vue';

export default {
  components: { 
      location,
      constituency,
      executing_office, 
      period_codes,
      status,
      infrastructure,
      general_codes, 
    },
  data() {
    return {
      active_el: "Location",
      tab:"location",
      performance_tabs: {
        Location:"Location",
        Constituency:"Constituency",
        Executing:"Executing",
        Period:"Period",
        Status:"Status",
        InfraStructure:"InfraStructure",
        General:"General",
        Province:"Province",
        // Visits:"Visits",
        // Enhancement:"Enhancement",
        // CBO:"CBO",
        // Assets:"Assets",
        // HHConnections:"HH Connections",
        // CommunityShare:"Community Share",
        // VillageServed:"Village Served",
      },
    };
  },
    
  mounted(){
    
    // console.log("tt",this.name);
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;
      this.tab = performance.toLowerCase();
    },
    openRelevantModal() {
      let open_modal = this.tab.toLowerCase();
      // console.log("open_model",open_modal);
      if(open_modal == 'location'){
        $("#"+this.$root.$refs.location.active_el+"Modal").modal("show");
      }
      else if(open_modal == 'constituency'){
        $("#"+this.$root.$refs.constituency.active_el+"Modal").modal("show");
      }
      else if(open_modal == 'executing office'){
        $("#"+this.$root.$refs.executing_office.active_el+"Modal").modal("show");
      }
      else if(open_modal == 'period'){
        $("#"+this.$root.$refs.period_codes.active_el+"Modal").modal("show");
      }
      else if(open_modal == 'status'){
        $("#"+this.$root.$refs.status.active_el+"Modal").modal("show"); 
      }
      else if(open_modal == 'infrastructure'){
        $("#"+this.$root.$refs.infrastructure.active_el+"Modal").modal("show"); 
      }
      else if(open_modal == 'general'){
        $("#"+this.$root.$refs.general_codes.active_el+"Modal").modal("show"); 
      }
      // console.log("open relevant modal",this.tab.toLowerCase());
      
    },
  },
};
</script>