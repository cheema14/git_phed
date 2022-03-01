<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="infrastructure-tab"
            data-bs-toggle="tab"
            data-bs-target="#infrastructure"
            type="button"
            role="tab"
            ref="infrastructure_codes"
            aria-controls="infrastructure"
            aria-selected="true"
            @click="performance_tabs_click('infrastructure')"
          >
            Infrastructure Detail (Main Head)
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="shead-tab"
            data-bs-toggle="tab"
            data-bs-target="#shead"
            type="button"
            role="tab"
            aria-controls="shead"
            aria-selected="false"
            @click="performance_tabs_click('shead')"
          >
            Sub Head Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="dhead-tab"
            data-bs-toggle="tab"
            data-bs-target="#dhead"
            type="button"
            role="tab"
            aria-controls="dhead"
            aria-selected="false"
            @click="performance_tabs_click('dhead')"
          >
            Detail Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="material-tab"
            data-bs-toggle="tab"
            data-bs-target="#material"
            type="button"
            role="tab"
            aria-controls="material"
            aria-selected="true"
            @click="performance_tabs_click('material')"
          >
            Material Type Detail
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="infrastructure"
          role="tabpanel"
          aria-labelledby="infrastructure-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Infrastructure Code</th>
                      <th>Infrastructure Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfMainHead">
                        <tr v-for="(item, index) in ListOfMainHead" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.id ? item.id : 'N/A' }}</td>
                          <td>{{ item.text ? item.text : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editMainHead(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="shead"
          role="tabpanel"
          aria-labelledby="shead-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Main Head</th>
                      <!-- <th>Sub Head Code</th> -->
                      <th>Sub Head Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSubHead">
                        <tr v-for="(item, index) in ListOfSubHead" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.main_head.infra_desc ? item.main_head.infra_desc : 'N/A' }}</td>
                          <!-- <td>{{ item.id ? item.id : 'N/A' }}</td> -->
                          <!-- <td v-if="item.na">{{ item.na.short_description }}</td> -->
                          <!-- <td v-else>{{ 'N/A' }}</td> -->
                          <td>{{ item.sub_head_desc ? item.sub_head_desc : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editSubHead(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="dhead"
          role="tabpanel"
          aria-labelledby="dhead-tab"
        >
           <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Sub Head</th>
                      <th>Detail Head Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfDetailHead">
                        <tr v-for="(item, index) in ListOfDetailHead" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.sub_head.sub_head_desc ? item.sub_head.sub_head_desc : 'N/A' }}</td>
                          <td>{{ item.detail_head_desc ? item.detail_head_desc : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editDetailHead(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="material"
          role="tabpanel"
          aria-labelledby="material-tab"
        >
           <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Material Type Code</th>
                      <th>Material Type Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfMaterial">
                        <tr v-for="(item, index) in ListOfMaterial" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.id ? item.id : 'N/A' }}</td>
                          <td>{{ item.material_desc ? item.material_desc : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editMaterial(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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

    <!-- Modal for adding Main Head -->
      <div
        class="modal fade"
        id="infrastructureModal"
        tabindex="-1"
        aria-labelledby="infrastructureModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="infrastructureModalLabel">Add Infrastructure</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetMainHeadFormFields"
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
                              <label>Infrastructure Description</label>
                              <input
                              v-model="formFieldsMainHeadModal.infra_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Infrastructure Description"
                              />

                              <div
                                  v-if="errors && errors.infra_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.infra_desc[0] }}
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
              <button type="button" @click="createMainHeadRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Main Head -->

    <!-- Modal for adding Sub Head -->
      <div
        class="modal fade"
        id="sheadModal"
        tabindex="-1"
        aria-labelledby="sheadModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sheadModalLabel">Add Sub Head Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSubHeadFormFields"
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

                            <div class="col-md-3 mb-3">
                              <label>Infrastructure Code</label>
                              <select2
                                v-model="formFieldsSubHeadModal.infra_idFk"
                                placeholder="Select Infrastructure Code"
                                :options="DropdownMainHead"
                              />
                              <div
                                v-if="errors && errors.infra_idFk"
                                class="text-danger"
                              >
                                {{ errors.infra_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Sub Head Description</label>
                              <input
                              v-model="formFieldsSubHeadModal.sub_head_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Sub Head Description"
                              />

                              <div
                                  v-if="errors && errors.sub_head_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.sub_head_desc[0] }}
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
              <button type="button" @click="createSubHeadRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Sub Head -->
    
    <!-- Modal for adding Detail Head -->
       <div
        class="modal fade"
        id="dheadModal"
        tabindex="-1"
        aria-labelledby="dheadModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="dheadModalLabel">Add Detail Head Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetDetailHeadFormFields"
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

                            <div class="col-md-3 mb-3">
                              <label>Sub Head Code</label>
                              <select2
                                v-model="formFieldsDetailHeadModal.sub_head_idFk"
                                placeholder="Select Sub Head Code"
                                :options="DropdownSubHead"
                              />
                              <div
                                v-if="errors && errors.sub_head_idFk"
                                class="text-danger"
                              >
                                {{ errors.sub_head_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Detail Head Description</label>
                              <input
                              v-model="formFieldsDetailHeadModal.detail_head_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Detail Head Description"
                              />

                              <div
                                  v-if="errors && errors.detail_head_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.detail_head_desc[0] }}
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
              <button type="button" @click="createDetailHeadRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Detail Head -->
    
    <!-- Modal for adding Material Type -->
       <div
        class="modal fade"
        id="materialModal"
        tabindex="-1"
        aria-labelledby="materialModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="materialModalLabel">Add Material Type Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetMaterialFormFields"
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
                              <label>Material Type</label>
                              <input
                              v-model="formFieldsMaterialModal.material_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Material Description"
                              />

                              <div
                                  v-if="errors && errors.material_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.material_desc[0] }}
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
              <button type="button" @click="createMaterialRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Material Type -->
  </div>
</template>

<script>
import select2 from "v-select2-component";

export default {
  components: {
    select2,
  },
  created() {
    this.$root.$refs.infrastructure = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      ListOfMainHead:[],
      ListOfSubHead:[],
      ListOfDetailHead:[],
      ListOfMaterial:[],
      DropdownMainHead:[],
      DropdownSubHead:[],
      formFieldsMainHeadModal: {
        infra_desc:"",
      },
      formFieldsSubHeadModal: {
        sub_head_desc:"",
        infra_idFk:"",
      },
      formFieldsDetailHeadModal: {
        detail_head_desc:"",
        sub_head_idFk:"",
      },
      formFieldsMaterialModal: {
        material_desc:"",
      },
    };
  },
  mounted() {
    this.active_el = this.$refs.infrastructure_codes.getAttribute('data-bs-target');
    this.active_el = this.active_el.replace("#","");

    // this.getMainHead();
    // this.getDetailHead();
    this.loadMainHeadList();
    this.loadSubHeadList();
    this.loadDetailHeadList();
    this.loadMaterialList();
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;
    },

    // Reset Form Fields Methods
    resetMainHeadFormFields(){
      this.formFieldsMainHeadModal = {
        infra_desc:"",
      }
    },
    resetSubHeadFormFields(){
      this.formFieldsSubHeadModal = {
        sub_head_desc:"",
        infra_idFk:"",
      }
    },
    resetDetailHeadFormFields(){
      this.formFieldsDetailHeadModal = {
        detail_head_desc:"",
        sub_head_idFk:"",
      }
    },
    resetMaterialFormFields(){
      this.formFieldsMaterialModal = {
        material_desc:"",
      }
    },

    // Custom Append Form Data Methods
    customMainHeadFormData(){
      let formData = new FormData();
        //this.formFieldsMainHeadModal is refering to the data object
        let aFields = Object.keys(this.formFieldsMainHeadModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsMainHeadModal[field] ? this.formFieldsMainHeadModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customSubHeadFormData(){
      let formData = new FormData();
        //this.formFieldsSubHeadModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSubHeadModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSubHeadModal[field] ? this.formFieldsSubHeadModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customDetailHeadFormData(){
      let formData = new FormData();
        //this.formFieldsDetailHeadModal is refering to the data object
        let aFields = Object.keys(this.formFieldsDetailHeadModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsDetailHeadModal[field] ? this.formFieldsDetailHeadModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customMaterialFormData(){
      let formData = new FormData();
        //this.formFieldsMaterialModal is refering to the data object
        let aFields = Object.keys(this.formFieldsMaterialModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsMaterialModal[field] ? this.formFieldsMaterialModal[field] : ""
        );
        }, this);
        
        return formData;
    },

    // Main Head Methods
    createMainHeadRecord(){
      let formData = this.customMainHeadFormData();
        
        axios
          .post("create-main-head", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Main Head saved successfully",
            });
              this.loadMainHeadList();
              this.resetMainHeadFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadMainHeadList(){
      axios.get("get-main-head").then((response) => {
            this.ListOfMainHead = response.data;
        });
    },
    editMainHead(id){
      axios.get("get-main-head-details/" + id).then((response) => {
            this.formFieldsMainHeadModal = response.data;
          });

        $("#infrastructureModal").modal("show");
    },

    // Sub Head Methods
    createSubHeadRecord(){
      let formData = this.customSubHeadFormData();
        
        axios
          .post("create-sub-head", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Sub Head saved successfully",
            });
              this.loadSubHeadList();
              this.resetSubHeadFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    getMainHead(id){
      axios.get("get-main-head/",id).then((response) => {
            this.DropdownMainHead = response.data;
        });
    },
    loadSubHeadList(){
      axios.get("get-sub-head-list").then((response) => {
            this.ListOfSubHead = response.data;
        });
    },
    editSubHead(id){
      axios.get("get-sub-head-details/" + id).then((response) => {
        console.log("dtls",response.data);
            this.formFieldsSubHeadModal = response.data;
            this.getMainHead(response.data.infra_idFk);
          });

        $("#sheadModal").modal("show");
    },

    // Detail Head Methods
    createDetailHeadRecord(){
      let formData = this.customDetailHeadFormData();
        
        axios
          .post("create-detail-head", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Detail Head saved successfully",
            });
              this.loadDetailHeadList();
              this.resetDetailHeadFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    getDetailHead(id){
      axios.get("get-sub-head/", +id).then((response) => {
            this.DropdownSubHead = response.data;
        });
    },
    loadDetailHeadList(){
      axios.get("get-detail-head-list").then((response) => {
            this.ListOfDetailHead = response.data;
        });
    },
    editDetailHead(id){
      axios.get("get-detail-head-details/" + id).then((response) => {
            console.log("detail head dtls",response.data);
            this.formFieldsDetailHeadModal = response.data;
            this.getDetailHead(response.data.sub_head_idFk);
          });

        $("#dheadModal").modal("show");
    },

    // Material Methods
    createMaterialRecord(){
      let formData = this.customMaterialFormData();
        
        axios
          .post("create-material-type", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Material Type saved successfully",
            });
              this.loadMaterialList();
              this.resetMaterialFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadMaterialList(){
      axios.get("get-material-list").then((response) => {
            this.ListOfMaterial = response.data;
        });
    },
    editMaterial(id){
      axios.get("get-material-details/" + id).then((response) => {
            this.formFieldsMaterialModal = response.data;
          });

        $("#materialModal").modal("show");
    },
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'infrastructure'){
            this.resetMainHeadFormFields();
        }
        else if(this.active_el == 'shead'){
          this.resetSubHeadFormFields();
        }
        else if(this.active_el == 'dhead'){
          this.resetDetailHeadFormFields();
        }
        else if(this.active_el == 'material'){
          this.resetMaterialFormFields();
        }
        
    },
  },
};
</script>