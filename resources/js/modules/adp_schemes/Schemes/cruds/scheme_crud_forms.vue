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
                
                <button class="nav-link text-start active" @click="performance_tabs_click('Location')"  id="v-pills-location-tab" data-bs-toggle="pill" data-bs-target="#v-pills-location" type="button" role="tab" aria-controls="v-pills-location" aria-selected="true">Location Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Constituency')"  id="v-pills-constituency-tab" data-bs-toggle="pill" data-bs-target="#v-pills-constituency" type="button" role="tab" aria-controls="v-pills-constituency" aria-selected="false">Constituency</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Executing Office')"  id="v-pills-executing-tab" data-bs-toggle="pill" data-bs-target="#v-pills-executing" type="button" role="tab" aria-controls="v-pills-executing" aria-selected="false">Executing Office</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Period')"  id="v-pills-period-tab" data-bs-toggle="pill" data-bs-target="#v-pills-period" type="button" role="tab" aria-controls="v-pills-period" aria-selected="false">Period Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('Status')"  id="v-pills-status-tab" data-bs-toggle="pill" data-bs-target="#v-pills-status" type="button" role="tab" aria-controls="v-pills-status" aria-selected="false">Status</button>
                <button class="nav-link text-start" @click="performance_tabs_click('InfraStructure')"  id="v-pills-infrastructure-tab" data-bs-toggle="pill" data-bs-target="#v-pills-infrastructure" type="button" role="tab" aria-controls="v-pills-infrastructure" aria-selected="false">Infrastructure Codes</button>
                <button class="nav-link text-start" @click="performance_tabs_click('General')"  id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="false">General Codes</button>
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
                          <button
                          type="button"
                          class="btn btn-success"
                          @click="downloadRelevantData"
                          >
                          <i class="fa fa-download me-3"></i>
                          <span>Download</span>
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
import mixin from "./../../mixins/schemeIdMixin";

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
      active_tab:"",
      BACKEND_URL:"",
    };
  },
    
  mounted(){
    this.performance_tabs_mounted();
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;
      this.tab = performance.toLowerCase();
      
     
      let active_table = "v-pills-"+this.active_el.split(" ")[0].toLowerCase();
      let id = document.getElementById(active_table);
     
      console.log("active table",active_table);

      if(active_table == 'v-pills-location'){
        mixin.set_table_tab_val('province');
      }
      else if(active_table == 'v-pills-constituency'){
        mixin.set_table_tab_val('na');
      }
      else if(active_table == 'v-pills-executing'){
        mixin.set_table_tab_val('ce');
      }
      else if(active_table == 'v-pills-period'){
        mixin.set_table_tab_val('year');
      }
      else if(active_table == 'v-pills-status'){
        mixin.set_table_tab_val('approval');
      }
      else if(active_table == 'v-pills-infrastructure'){
        mixin.set_table_tab_val('infrastructure');
      }
      else if(active_table == 'v-pills-general'){
        mixin.set_table_tab_val('unit');
      }

    },
    performance_tabs_mounted(){
      this.active_el = 'Location';
      
      let active_table = "v-pills-"+this.active_el.split(" ")[0].toLowerCase();
      let id = document.getElementById(active_table);
     
      console.log("active table",active_table);

      if(active_table == 'v-pills-location'){
        mixin.set_table_tab_val('province');
      }
      else if(active_table == 'v-pills-constituency'){
        mixin.set_table_tab_val('na');
      }
      else if(active_table == 'v-pills-executing'){
        mixin.set_table_tab_val('ce');
      }
      else if(active_table == 'v-pills-period'){
        mixin.set_table_tab_val('year');
      }
      else if(active_table == 'v-pills-status'){
        mixin.set_table_tab_val('approval');
      }
      else if(active_table == 'v-pills-infrastructure'){
        mixin.set_table_tab_val('infrastructure');
      }
      else if(active_table == 'v-pills-general'){
        mixin.set_table_tab_val('unit');
      }
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
    downloadRelevantData(){
      
      let t_value = mixin.get_table_tab_val();
      console.log("t_value",t_value);
      let stringFunction = "this.download"+t_value+"Data()";
      
      eval(stringFunction);
      
    },

    // Location Code Downloads Methods
    downloadprovinceData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-province-data','_blank');
    },
    downloadzoneData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-zone-data','_blank');
    },
    downloaddivisionData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-division-data','_blank');
    },
    downloaddistrictData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-district-data','_blank');
    },
    downloadtehsilData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-tehsil-data','_blank');
    },
    downloadunionData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-union-data','_blank');
    },

    // Constituency Downloads Methods
    downloadnaData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-na-data','_blank');
    },
    downloadppData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-pp-data','_blank');
    },

    // Executing Office Downloads Methods
    downloadceData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-ce-data','_blank');
    },
    downloadseData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-se-data','_blank');
    },
    downloadeeData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-ee-data','_blank');
    },
    downloadsdoData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-sdo-data','_blank');
    },
    downloadsubData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-sub-data','_blank');
    },

    // Period Code Downloads Methods
    downloadyearData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-year-data','_blank');
    },
    downloadmonthData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-month-data','_blank');
    },

    // Status Downloads Methods
    downloadapprovalData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-approved-data','_blank');
    },
    downloadfundingData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-funding-data','_blank');
    },
    downloadcompletionData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-completion-data','_blank');
    },
    downloadfunctionalData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-functional-data','_blank');
    },

    // Infrastructure Codes Download Methods
    downloadinfrastructureData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-infra-data','_blank');
    },
    downloadsheadData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-shead-data','_blank');
    },
    downloaddheadData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-dhead-data','_blank');
    },
    downloadmaterialData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-material-data','_blank');
    },

    // General Codes Download Methods
    downloadunitData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-unit-data','_blank');
    },
    downloadsagencyData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-sagency-data','_blank');
    },
    downloadeagencyData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-eagency-data','_blank');
    },
    downloadwqualityData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-wquality-data','_blank');
    },
    downloadtechnicalData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-ttype-data','_blank');
    },
    downloadsnatureData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-snature-data','_blank');
    },
    downloadomData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-om-data','_blank');
    },
    downloadwsourceData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-wsource-data','_blank');
    },
    downloadareaData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-area-data','_blank');
    },
    downloadstypeData(){
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-stype-data','_blank');
    },

  },
};

</script>