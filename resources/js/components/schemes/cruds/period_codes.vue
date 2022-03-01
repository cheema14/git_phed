<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="year-tab"
            data-bs-toggle="tab"
            data-bs-target="#year"
            type="button"
            role="tab"
            ref="period"
            aria-controls="year"
            aria-selected="true"
            @click="performance_tabs_click('year')"
          > 
            Year Code
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="month-tab"
            data-bs-toggle="tab"
            data-bs-target="#month"
            type="button"
            role="tab"
            aria-controls="month"
            aria-selected="false"
            @click="performance_tabs_click('month')"
          >
            Month Code
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        
        <div
          class="tab-pane fade show active"
          id="year"
          role="tabpanel"
          aria-labelledby="year-tab"
        >
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table mb-2">
                    <thead>
                      <tr>
                        <th>Sr No</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <template v-if="ListOfYear">
                        <tr v-for="(item, index) in ListOfYear" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.code ? item.code : 'N/A' }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editYear(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
            id="month"
            role="tabpanel"
            aria-labelledby="month-tab"
          >
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table mb-2">
                    <thead>
                      <tr>
                        <th>Sr No</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Short Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <template v-if="ListOfMonth">
                        <tr v-for="(item, index) in ListOfMonth" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.code ? item.code : 'N/A' }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td>{{ item.short_description ? item.short_description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editMonth(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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

    <!-- Modal for adding Year Code -->

      <div
        class="modal fade"
        id="yearModal"
        tabindex="-1"
        aria-labelledby="yearModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="yearModalLabel">Add Year Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetYearFormFields"
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
                              <label>Year Code</label>
                              <input
                              v-model="formFieldsYearModal.code"
                                type="text"
                                class="form-control"
                                placeholder="Enter Year Code"
                                @change="addDescription()"
                              />

                              <div
                                  v-if="errors && errors.code"
                                  class="text-danger"
                                  >
                                  {{ errors.code[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Description</label>
                              <input
                              v-model="formFieldsYearModal.description"
                                type="text"
                                class="form-control"
                                disabled
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
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
              <button type="button" @click="createYearRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding Year Code -->

    <!-- Modal for adding Month Code -->

      <div
        class="modal fade"
        id="monthModal"
        tabindex="-1"
        aria-labelledby="monthModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="monthModalLabel">Add Month Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetMonthFormFields"
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
                              <label>Month Code</label>
                              <input
                              v-model="formFieldsMonthModal.code"
                                type="text"
                                class="form-control"
                                placeholder="Enter Month Code"
                              />

                              <div
                                  v-if="errors && errors.code"
                                  class="text-danger"
                                  >
                                  {{ errors.code[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Description</label>
                              <input
                              v-model="formFieldsMonthModal.description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Description"
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Short Description</label>
                              <input
                              v-model="formFieldsMonthModal.short_description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Short Description"
                              />

                              <div
                                  v-if="errors && errors.short_description"
                                  class="text-danger"
                                  >
                                  {{ errors.short_description[0] }}
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
              <button type="button" @click="createMonthRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding Year Code -->

  </div>
</template>

<script>
import select2 from "v-select2-component";

export default {
  components: {
    select2,
  },
  created() {
    this.$root.$refs.period_codes = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      ListOfYear:[],
      ListOfMonth:[],
      formFieldsYearModal: {
        code:"",
        description:"",
      },
      formFieldsMonthModal: {
        code:"",
        short_description:"",
        description:"",
      },
    };
  },
  mounted() {
    this.active_el = this.$refs.period.getAttribute('data-bs-target');
    this.active_el = this.active_el.replace("#","");
    
    this.loadYearList();
    this.loadMonthList();
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;
      // console.log("active el",this.active_el);
    },
    resetYearFormFields(){
      this.formFieldsYearModal = {
        code:"",
        description:"",
      }
    },
    resetMonthFormFields(){
      this.formFieldsMonthModal = {
        code:"",
        description:"",
        short_description:"",
      }
    },

    // Custom Append Form
    customAppendYearFormData(){

      let formData = new FormData();
        //this.formFieldsYearModal is refering to the data object
        let aFields = Object.keys(this.formFieldsYearModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsYearModal[field] ? this.formFieldsYearModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendMonthFormData(){

      let formData = new FormData();
        //this.formFieldsMonthModal is refering to the data object
        let aFields = Object.keys(this.formFieldsMonthModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsMonthModal[field] ? this.formFieldsMonthModal[field] : ""
        );
        }, this);
        
        return formData;

    },

    // Year Method
    createYearRecord(){
      let formData = this.customAppendYearFormData();
        
        axios
          .post("create-year", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Year saved successfully",
            });
              this.loadYearList();
              this.resetYearFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadYearList(){
      axios.get("get-year-list").then((response) => {
            this.ListOfYear = response.data;
        });
    },
    editYear(id){
      axios.get("get-year-details/" + id).then((response) => {
            this.formFieldsYearModal = response.data;
          });

        $("#yearModal").modal("show");
    },
    addDescription(){
      let c = this.formFieldsYearModal.code;
      let d = parseInt(c) + 1;
      this.formFieldsYearModal.description = c +'-'+ d;
    },

    // Month Methods
    createMonthRecord(){
      let formData = this.customAppendMonthFormData();
        
        axios
          .post("create-month", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Month saved successfully",
            });
              this.loadMonthList();
              this.resetMonthFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadMonthList(){
      axios.get("get-month-list").then((response) => {
            this.ListOfMonth = response.data;
        });
    },
    editMonth(id){
      axios.get("get-month-details/" + id).then((response) => {
            this.formFieldsMonthModal = response.data;
          });

        $("#monthModal").modal("show");
    },
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'year'){
            this.resetYearFormFields();
        }
        else if(this.active_el == 'month'){
          this.resetMonthFormFields();
        }
        
    },
  },
};
</script>