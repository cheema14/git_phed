<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="approval-tab"
            data-bs-toggle="tab"
            data-bs-target="#approval"
            type="button"
            role="tab"
            ref="status_codes"
            aria-controls="approval"
            aria-selected="true"
            @click="performance_tabs_click('approval')"
          >
            Approval Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="funding-tab"
            data-bs-toggle="tab"
            data-bs-target="#funding"
            type="button"
            role="tab"
            aria-controls="funding"
            aria-selected="false"
            @click="performance_tabs_click('funding')"
          >
            Funding Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="completion-tab"
            data-bs-toggle="tab"
            data-bs-target="#completion"
            type="button"
            role="tab"
            aria-controls="completion"
            aria-selected="false"
            @click="performance_tabs_click('completion')"
          >
            Completion Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="functional-tab"
            data-bs-toggle="tab"
            data-bs-target="#functional"
            type="button"
            role="tab"
            aria-controls="functional"
            aria-selected="true"
            @click="performance_tabs_click('functional')"
          >
            Functional Detail
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="approval"
          role="tabpanel"
          aria-labelledby="approval-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Approval Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfApproval">
                        <tr v-for="(item, index) in ListOfApproval" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.approval_status_title ? item.approval_status_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editApproval(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="funding"
          role="tabpanel"
          aria-labelledby="funding-tab"
        >
           <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Funding Code</th>
                      <th>Funding Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfFunding">
                        <tr v-for="(item, index) in ListOfFunding" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.id ? item.id : 'N/A' }}</td>
                          <td>{{ item.funding_status ? item.funding_status : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editFunding(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="completion"
          role="tabpanel"
          aria-labelledby="completion-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Completion Code</th>
                      <th>Completion Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfCompletion">
                        <tr v-for="(item, index) in ListOfCompletion" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.id ? item.id : 'N/A' }}</td>
                          <td>{{ item.completion_status ? item.completion_status : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editCompletion(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="functional"
          role="tabpanel"
          aria-labelledby="functional-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Functional Code</th>
                      <th>Functional Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfFunctional">
                        <tr v-for="(item, index) in ListOfFunctional" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.id ? item.id : 'N/A' }}</td>
                          <td>{{ item.function_status_title ? item.function_status_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editFunctional(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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

    <!-- Modal for adding Approval Status -->

      <div
        class="modal fade"
        id="approvalModal"
        tabindex="-1"
        aria-labelledby="approvalModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="approvalModalLabel">Add Approval Status</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetApprovalFormFields"
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
                              <label>Approval Status</label>
                              <input
                              v-model="formFieldsApprovalModal.approval_status_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter approval status"
                              />

                              <div
                                  v-if="errors && errors.approval_status_title"
                                  class="text-danger"
                                  >
                                  {{ errors.approval_status_title[0] }}
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
              <button type="button" @click="createApprovalRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding Approval Status -->

    <!-- Modal for adding Funding Status -->
      <div
        class="modal fade"
        id="fundingModal"
        tabindex="-1"
        aria-labelledby="fundingModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="fundingModalLabel">Add Funding Status</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetFundingFormFields"
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
                              <label>Funding Status</label>
                              <input
                              v-model="formFieldsFundingModal.funding_status"
                                type="text"
                                class="form-control"
                                placeholder="Enter funding status"
                              />

                              <div
                                  v-if="errors && errors.funding_status"
                                  class="text-danger"
                                  >
                                  {{ errors.funding_status[0] }}
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
              <button type="button" @click="createFundingRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Funding Status -->

    <!-- Modal for adding Completion Status -->
      <div
        class="modal fade"
        id="completionModal"
        tabindex="-1"
        aria-labelledby="completionModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="completionModalLabel">Add Completion Status</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetCompletionFormFields"
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
                              <label>Funding Status</label>
                              <input
                              v-model="formFieldsCompletionModal.completion_status"
                                type="text"
                                class="form-control"
                                placeholder="Enter funding status"
                              />

                              <div
                                  v-if="errors && errors.completion_status"
                                  class="text-danger"
                                  >
                                  {{ errors.completion_status[0] }}
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
              <button type="button" @click="createCompletionRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Completion Status -->

    <!-- Modal for adding Functional Status -->
      <div
        class="modal fade"
        id="functionalModal"
        tabindex="-1"
        aria-labelledby="functionalModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="functionalModalLabel">Add Functional Status</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetFunctionalFormFields"
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
                              <label>Functional Status</label>
                              <input
                              v-model="formFieldsFunctionalModal.function_status_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter funding status"
                              />

                              <div
                                  v-if="errors && errors.function_status_title"
                                  class="text-danger"
                                  >
                                  {{ errors.function_status_title[0] }}
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
              <button type="button" @click="createFunctionalRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Functional Status -->

  </div>
</template>

<script>
import select2 from "v-select2-component";
import mixin from "./../../mixins/schemeIdMixin";

export default {
  components: {
    select2
  },
  created() {
    this.$root.$refs.status = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      ListOfApproval:[],
      ListOfFunding:[],
      ListOfCompletion:[],
      ListOfFunctional:[],
      formFieldsApprovalModal: {
        approval_status_title:"",
      },
      formFieldsFundingModal: {
        funding_status:"",
      },
      formFieldsCompletionModal: {
        completion_status:"",
      },
      formFieldsFunctionalModal: {
        function_status_title:"",
      },
    };
  },
  mounted() {
    this.active_el = this.$refs.status_codes.getAttribute('data-bs-target');
    this.active_el = this.active_el.replace("#","");

    mixin.set_table_tab_val(this.active_el);

    this.loadApprovalList();
    this.loadFundingList();
    this.loadCompletionList();
    this.loadFunctionalList();
  },
  methods: {
    
    performance_tabs_click(performance) {
      this.active_el = performance;

      if(performance){
        mixin.set_table_tab_val(performance);
      }
    },

    // Reset methods
    resetApprovalFormFields(){
      this.formFieldsApprovalModal = {
        approval_status_title:""
      }
    },
    resetFundingFormFields(){
      this.formFieldsFundingModal = {
        funding_status:""
      }
    },
    resetCompletionFormFields(){
      this.formFieldsCompletionModal = {
        completion_status:""
      }
    },
    resetFunctionalFormFields(){
      this.formFieldsFunctionalModal = {
        function_status_title:""
      }
    },

    // Form Data Append Methods
    customAppendApprovalFormData(){
      let formData = new FormData();
        //this.formFieldsApprovalModal is refering to the data object
        let aFields = Object.keys(this.formFieldsApprovalModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsApprovalModal[field] ? this.formFieldsApprovalModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customAppendFundingFormData(){
      let formData = new FormData();
        //this.formFieldsFundingModal is refering to the data object
        let aFields = Object.keys(this.formFieldsFundingModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsFundingModal[field] ? this.formFieldsFundingModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customAppendCompletionFormData(){
      let formData = new FormData();
        //this.formFieldsCompletionModal is refering to the data object
        let aFields = Object.keys(this.formFieldsCompletionModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsCompletionModal[field] ? this.formFieldsCompletionModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customAppendFunctionalFormData(){
      let formData = new FormData();
        //this.formFieldsFunctionalModal is refering to the data object
        let aFields = Object.keys(this.formFieldsFunctionalModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsFunctionalModal[field] ? this.formFieldsFunctionalModal[field] : ""
        );
        }, this);
        
        return formData;
    },

    // Approval Status Methods
    createApprovalRecord(){
      let formData = this.customAppendApprovalFormData();
        
        axios
          .post("create-approval", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Approval Status saved successfully",
            });
              this.loadApprovalList();
              this.resetApprovalFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadApprovalList(){
      axios.get("get-approval-list").then((response) => {
            this.ListOfApproval = response.data;
        });
    },
    editApproval(id){
      axios.get("get-approval-details/" + id).then((response) => {
            this.formFieldsApprovalModal = response.data;
          });

        $("#approvalModal").modal("show");
    },

    // Funding Status Methods
    createFundingRecord(){
      let formData = this.customAppendFundingFormData();
        
        axios
          .post("create-funding", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Funding Status saved successfully",
            });
              this.loadFundingList();
              this.resetFundingFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadFundingList(){
      axios.get("get-funding-list").then((response) => {
            this.ListOfFunding = response.data;
        });
    },
    editFunding(id){
      axios.get("get-funding-details/" + id).then((response) => {
            this.formFieldsFundingModal = response.data;
          });

        $("#fundingModal").modal("show");
    },

    // Completion Status Methods
    createCompletionRecord(){
      let formData = this.customAppendCompletionFormData();
        
        axios
          .post("create-completion", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Completion Status saved successfully",
            });
              this.loadCompletionList();
              this.resetCompletionFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadCompletionList(){
      axios.get("get-completion-list").then((response) => {
            this.ListOfCompletion = response.data;
        });
    },
    editCompletion(id){
      axios.get("get-completion-details/" + id).then((response) => {
            this.formFieldsCompletionModal = response.data;
          });

        $("#completionModal").modal("show");
    },

    // Functional Status Methods
    createFunctionalRecord(){
      let formData = this.customAppendFunctionalFormData();
        
        axios
          .post("create-functional", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Functional Status saved successfully",
            });
              this.loadFunctionalList();
              this.resetFunctionalFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadFunctionalList(){
      axios.get("get-functional-list").then((response) => {
            this.ListOfFunctional = response.data;
        });
    },
    editFunctional(id){
      axios.get("get-functional-details/" + id).then((response) => {
            this.formFieldsFunctionalModal = response.data;
          });

        $("#functionalModal").modal("show");
    },
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'approval'){
            this.resetApprovalFormFields();
        }
        else if(this.active_el == 'funding'){
          this.resetFundingFormFields();
        }
        else if(this.active_el == 'completion'){
          this.resetCompletionFormFields();
        }
        else if(this.active_el == 'functional'){
          this.resetFundingFormFields();
        }
        
    },
  },
};
</script>