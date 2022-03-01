<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="na-tab"
            data-bs-toggle="tab"
            data-bs-target="#na"
            type="button"
            role="tab"
            ref="constituency_tab"
            aria-controls="na"
            aria-selected="true"
            @click="performance_tabs_click('na')"
          > 
            National Assembly Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="pp-tab"
            data-bs-toggle="tab"
            data-bs-target="#pp"
            type="button"
            role="tab"
            aria-controls="pp"
            aria-selected="false"
            @click="performance_tabs_click('pp')"
          >
            Provincial Assembly Detail
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="na"
          role="tabpanel"
          aria-labelledby="na-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>NA Code</th>
                      <th>NA Name</th>
                      <th>MNA Name</th>
                      <th>Contact No</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="naListing">
                      <tr v-for="(item, index) in naListing" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.na_code ? item.na_code : 'N/A' }}</td>
                        <td>{{ item.na_name ? item.na_name : 'N/A' }}</td>
                        <td>{{ item.mna_name ? item.mna_name : 'N/A' }}</td>
                        <td>{{ item.contact_no ? item.contact_no : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editNA(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="pp"
          role="tabpanel"
          aria-labelledby="pp-tab"
        >
        
           <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>PP Code</th>
                      <th>PP Name</th>
                      <th>MPA Name</th>
                      <th>NA Code</th>
                      <th>Contact No</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ppListing">
                      <tr v-for="(item, index) in ppListing" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.pp_code ? item.pp_code : 'N/A' }}</td>
                        <td>{{ item.pp_name ? item.pp_name : 'N/A' }}</td>
                        <td>{{ item.mpa_name ? item.mpa_name : 'N/A' }}</td>
                        <td v-if="item.na">{{ item.na.short_description }}</td>
                        <td v-else>{{ 'N/A' }}</td>
                        <td>{{ item.contact_no ? item.contact_no : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editPP(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Tabs content -->
    </div>

    <!-- Modal for adding NA -->


    <div
      class="modal fade"
      id="naModal"
      tabindex="-1"
      aria-labelledby="naModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="naModalLabel">Add NA Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetNAFormFields"
            ></button>
          </div>
          <div class="modal-body">
            <section class="listing py-4">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mb-6">
                    <div class="form-container">
                      <div class="form-card">
                        <div class="row">

                          <div class="col-md-4 mb-3">
                            <label>NA Code</label>
                            <input
                            v-model="formFieldsNAModal.na_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter NA Code"
                            />

                            <div
                                v-if="errors && errors.na_code"
                                class="text-danger"
                                >
                                {{ errors.na_code[0] }}
                            </div>

                          </div>
                                                    
                          <div class="col-md-4 mb-3">
                            <label>NA Name</label>
                            <input
                            v-model="formFieldsNAModal.na_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter NA Name"
                            />

                            <div
                                v-if="errors && errors.na_name"
                                class="text-danger"
                                >
                                {{ errors.na_name[0] }}
                            </div>

                          </div> 

                          <div class="col-md-4 mb-3">
                            <label>MNA Name</label>
                            <input
                            v-model="formFieldsNAModal.mna_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter MNA Name"
                            />

                            <div
                                v-if="errors && errors.mna_name"
                                class="text-danger"
                                >
                                {{ errors.mna_name[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>Contact No</label>
                            <input
                            v-model="formFieldsNAModal.contact_no"
                              type="number"
                              class="form-control"
                              placeholder="Enter Contact No"
                            />

                            <div
                                v-if="errors && errors.contact_no"
                                class="text-danger"
                                >
                                {{ errors.contact_no[0] }}
                            </div>

                          </div>
                          
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </section>
          </div>
           
             
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              @click="hideModal"
            >
              Close
            </button>
            <button type="button" @click="createNARecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding NA -->


    <!-- Modal for adding PP -->

      <div
      class="modal fade"
      id="ppModal"
      tabindex="-1"
      aria-labelledby="ppModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ppModalLabel">Add PP Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetPPFormFields"
            ></button>
          </div>
          <div class="modal-body">
            <section class="listing py-4">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mb-6">
                    <div class="form-container">
                      <div class="form-card">
                        <div class="row">

                          <div class="col-md-4 mb-3">
                            <label>NA</label>
                            <select2
                              v-model="formFieldsPPModal.na_id"
                              placeholder="Select Relevant NA"
                              :options="listOfNa"
                            />
                            <div
                              v-if="errors && errors.na_id"
                              class="text-danger"
                            >
                              {{ errors.na_id[0] }}
                            </div>
                          </div>
                          
                          <div class="col-md-4 mb-3">
                            <label>Zone</label>
                            <select2
                              v-model="formFieldsPPModal.zone_id"
                              placeholder="Select Zone"
                              @change="zoneChanged($event)"
                              :options="listOfZone"
                            />
                            <div
                              v-if="errors && errors.zone_id"
                              class="text-danger"
                            >
                              {{ errors.zone_id[0] }}
                            </div>
                          </div>

                          <div class="col-md-4 mb-3">
                            <label>District</label>
                            <select2
                              v-model="formFieldsPPModal.district_id"
                              placeholder="Select District"
                              :options="listOfDistrict"
                            />
                            <div
                              v-if="errors && errors.district_id"
                              class="text-danger"
                            >
                              {{ errors.district_id[0] }}
                            </div>
                          </div>
                                                    
                          <div class="col-md-4 mb-3">
                            <label>PP Name</label>
                            <input
                            v-model="formFieldsPPModal.pp_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter PP Name"
                            />

                            <div
                                v-if="errors && errors.pp_name"
                                class="text-danger"
                                >
                                {{ errors.pp_name[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>PP Code</label>
                            <input
                            v-model="formFieldsPPModal.pp_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter PP Code"
                            />

                            <div
                                v-if="errors && errors.pp_code"
                                class="text-danger"
                                >
                                {{ errors.pp_code[0] }}
                            </div>

                          </div> 

                          <div class="col-md-4 mb-3">
                            <label>MPA Name</label>
                            <input
                            v-model="formFieldsPPModal.mpa_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter MPA Name"
                            />

                            <div
                                v-if="errors && errors.mpa_name"
                                class="text-danger"
                                >
                                {{ errors.mpa_name[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>Contact No</label>
                            <input
                            v-model="formFieldsPPModal.contact_no"
                              type="number"
                              class="form-control"
                              placeholder="Enter Contact No"
                            />

                            <div
                                v-if="errors && errors.contact_no"
                                class="text-danger"
                                >
                                {{ errors.contact_no[0] }}
                            </div>

                          </div>

                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </section>
          </div>
           
             
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              @click="hideModal"
            >
              Close
            </button>
            <button type="button" @click="createPPRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding PP -->


  </div>
</template>

<script>
import select2 from "v-select2-component";
import mixin from "./../../mixins/schemeIdMixin";

export default {
  components: {
    select2,
    //  SchemeForm
  },
  created() {
    this.$root.$refs.constituency = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      naListing:[],
      ppListing:[],
      listOfZone: [],
      listOfDistrict: [],
      listOfNa:[],
      formFieldsNAModal: {
        na_code:"",
        na_name:"",
        mna_name:"",
        contact_no:"",
      },
      formFieldsPPModal: {
        pp_name:"",
        pp_code:"",
        mpa_name:"",
        na_id:"",
        contact_no:"",
        zone_id:"",
        district_id:"",
      },
    };
  },
  mounted() {
    this.active_el = "";
      this.active_el = this.$refs.constituency_tab.getAttribute('data-bs-target');
      this.active_el = this.active_el.replace("#","");

      mixin.set_table_tab_val(this.active_el);

      this.loadNAList();
      this.loadPPList();
      this.getZone();
      this.getNADropdown();
      
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;

      if(performance){
        mixin.set_table_tab_val(performance);
      }
    },
    getZone() {
      let id = 1; // For Punjab
      axios
        .get("get-zone/" + id)
        .then((response) => {
          this.listOfZone = response.data;
        })
        .catch((err) => {
          console.log("zone-name-selects2", err);
        });
    },
    zoneChanged() {
      this.getDistrictByZone();
      this.listOfDistrict = [];
    },
    getDistrictByZone(){
      axios
        .get("get-district-by-zone/" + this.formFieldsPPModal.zone_id)
        .then((response) => {
          this.listOfDistrict = response.data;
        })
        .catch((err) => {
          console.log("district-name-selects2", err);
        });
    },
    getNADropdown(){
      axios
        .get("get-na-list/")
        .then((response) => {
          this.listOfNa = response.data;
        })
        .catch((err) => {
          console.log("zone-name-selects2", err);
        });
    },
    resetNAFormFields(){
      this.formFieldsNAModal = {
        na_code:"",
        na_name:"",
        mna_name:"",
        contact_no:"",
      }
    },
    resetPPFormFields(){
      this.formFieldsPPModal = {
        pp_name:"",
        pp_code:"",
        mpa_name:"",
        na_id:"",
        contact_no:"",
        zone_id:"",
        district_id:"",
      }
    },
    customAppendNAFormData(){

      let formData = new FormData();
        //this.formFieldsNAModal is refering to the data object
        let aFields = Object.keys(this.formFieldsNAModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsNAModal[field] ? this.formFieldsNAModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendPPFormData(){

      let formData = new FormData();
        //this.formFieldsPPModal is refering to the data object
        let aFields = Object.keys(this.formFieldsPPModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsPPModal[field] ? this.formFieldsPPModal[field] : ""
        );
        }, this);
        
        return formData;

    },

    // NA Methods
    createNARecord(){

      let formData = this.customAppendNAFormData();
        
        axios
            .post("create-na", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "NA Record saved successfully",
              });
                this.loadNAList();
                this.resetNAFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });

    },
    loadNAList(){
      axios.get("get-na-list").then((response) => {
            this.naListing = response.data;
        });
    },
    editNA(id){
        axios.get("get-na-details/" + id).then((response) => {
            this.formFieldsNAModal = response.data;
            this.getNADropdown(response.data.na_id);
          });


        $("#naModal").modal("show");
    },

    // PP Methods
    createPPRecord(){
      let formData = this.customAppendPPFormData();
        
        axios
            .post("create-pp", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "NA Record saved successfully",
              });
                this.loadPPList();
                this.resetPPFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });

    },
    loadPPList(){
      axios.get("get-pp-list").then((response) => {
            this.ppListing = response.data;
            //console.log("pp listing",this.ppListing);
        });
    },
    editPP(id){
      axios.get("get-pp-details/" + id).then((response) => {
            this.formFieldsPPModal = response.data;
          });

        $("#ppModal").modal("show");
    },
    // Hide Modals by their IDs
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'na'){
            this.resetNAFormFields();
        }
        else{
          this.resetPPFormFields();
        }
    },
  },
};
</script>