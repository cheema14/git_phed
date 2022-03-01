<template>
  <div class="col-md-12">
    <div class="phed-tabs-box">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li
          class="nav-item"
          role="presentation"
          v-for="(permoformance_tab, index) in permoformance_tabs"
          :key="index"
        >
          <button
            :class="
              active_el === index ? 'nav-link active' : 'nav-link'
            "
            @click="permoformance_tabs_click(index)"
          >
            {{ permoformance_tab }}
          </button>
        </li>
      </ul>

  <pc_modal v-if="active_el==='PC'" />
  <aa_modal v-if="active_el==='AA'" />
  <ts_modal v-if="active_el==='TS'" />

  <allocation_modal v-if="active_el==='Allocation'" />
  <contract_modal v-if="active_el==='Contract'" />
  <releasepnd_modal v-if="active_el==='ReleasePND'" />
  <releasefd_modal v-if="active_el==='ReleaseFD'" />
  <monthly_progress_modal v-if="active_el==='MonthlyProgress'" />

  <visits_modal v-if="active_el==='Visits'" />
  <enhancement_modal v-if="active_el==='Enhancement'" />
  <cbo_modal v-if="active_el==='CBO'" />
  <assets_modal v-if="active_el==='Assets'" />
  <hhconnections_modal v-if="active_el==='HHConnections'" />
  <community_share_modal v-if="active_el==='CommunityShare'" />
  <village_served_modal v-if="active_el==='VillageServed'" />
  
  <!-- Add new and remove Performance button -->
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
            <!-- <button type="button" class="btn btn-danger">
              <span>Remove</span>
              <i class="fa fa-plus-circle ms-3"></i>
            </button> -->
          </div>
          <!-- Add new and remove Performance button -->
    </div>
  </div>
</template>
<script>
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
    console.log("tt",this.name);
  },
  methods: {
    permoformance_tabs_click(performance) {
      this.active_el = performance;
      console.log("active_el value:",this.active_el);
    },
    openRelevantModal() {
      $("#"+this.active_el+"Modal").modal("show");
      console.log("what is:",'#'+this.active_el+"Modal");
    },
  },
};
</script>
