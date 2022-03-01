<template>

  <div>

       <div class="tab-content">
        <div
          :class="'tab-pane fade show active'"
          role="tabpanel"
          aria-labelledby="home-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Scheme No</th>
                      <th>Block Code</th>
                      <th>ADP Year Code</th>
                      <th>ADP No</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Capital</th>
                      <th>Revenue</th>
                      <th>Foreign Aid</th>
                      <th>Hist Flag</th>
                      <th>Month Code</th>
                      <th>Prog Code</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="rfd_values_edit">
                      <tr v-for="(item, i) in rfd_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name :'N/A'}}</td>
                        <td>{{ item.rel_fd_block_code ? item.rel_fd_block_code: 'N/A' }}</td>
                        <td>{{ item.rel_fd_adp_year_code ? item.rel_fd_adp_year_code: 'N/A' }}</td>
                        <td>{{ item.rel_fd_adp_no ? item.rel_fd_adp_no: 'N/A' }}</td>
                        <td>{{ item.rel_fd_status ? item.rel_fd_status: 'N/A' }}</td>
                        <td>{{ item.rel_fd_amount ? item.rel_fd_amount: 'N/A' }}</td>
                        <td>{{ item.rel_fd_capital ? item.rel_fd_capital: 'N/A' }}</td>
                        <td>{{ item.rel_fd_revenue ? item.rel_fd_revenue: 'N/A' }}</td>
                        <td>{{ item.rel_fd_foreign_aid ? item.rel_fd_foreign_aid: 'N/A' }}</td>
                        <td>{{ item.rel_fd_hist_flag ? item.rel_fd_hist_flag: 'N/A' }}</td>
                        <td>{{ item.rel_fd_mnth_code ? item.rel_fd_mnth_code: 'N/A' }}</td>
                        <td>{{ item.rel_fd_prog_code ? item.rel_fd_prog_code: 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>  
                    </template>
                    
                    <!-- <template v-if="rfd_values">
                      <tr v-for="(entry, i) in rfd_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.BlockCode }}</td>
                        <td>{{ entry.YrCode }}</td>
                        <td>{{ entry.AdpNo }}</td>
                        <td>{{ entry.status }}</td>
                        <td>{{ entry.Amount }}</td>
                        <td>{{ entry.Capital }}</td>
                        <td>{{ entry.Revenue }}</td>
                        <td>{{ entry.ForeignAid }}</td>
                        <td>{{ entry.HistFlag }}</td>
                        <td>{{ entry.MonthCode }}</td>
                        <td>{{ entry.ProgCode }}</td>
                      </tr>
                    </template> -->
                    
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        
        </div>
      </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="ReleaseFDModal"
      tabindex="-1"
      aria-labelledby="ReleaseFDModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ReleaseFDModalLabel">Add Release FD Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetFormFields"
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
                            <label>Block Code</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_block_code"
                            type="text"
                            class="form-control"
                            placeholder="Enter Block Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Year Code</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_adp_yr_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Year Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>ADP No</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_adp_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter ADP No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsRFDModal.rfd_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Capital</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_capital"
                              type="number"
                              class="form-control"
                              placeholder="Enter Capital"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Revenue</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_revenue"
                              type="number"
                              class="form-control"
                              placeholder="Enter Revenue"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Foreign Aid</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_foreign_aid"
                              type="number"
                              class="form-control"
                              placeholder="Enter Foreign Aid"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_amount"
                              type="number"
                              class="form-control"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Last Updated Term</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_last_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Last Updated Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Prog Code</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_prog_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Prog Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Insert Item</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_insert_item"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Item"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Month Code</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_month_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Hist Flag"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Hist Flag</label>
                            <input
                            v-model="formFieldsRFDModal.rfd_hist_flag"
                              type="text"
                              class="form-control"
                              placeholder="Enter Hist Flag"
                            />
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
              @click="resetFormFields"
            >
              Close
            </button>
            <button type="button" @click="createRFDRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</template>

<script>

import select2 from "v-select2-component";
// import SchemeForm from "../scheme_form.vue";
import mixin from "../../mixins/schemeIdMixin";
export default {
  components:{
     select2,
    //  SchemeForm
  },
  data() {
    return {
      errors: {},
      editMode: false,
      edit_id: 0,
      listOfProvinces: [],
      // scheme_id:"",
      scheme_name:"",
      province_name:'',
      schemeId:"",
      provinceId:"",
      dummy_text:'',
      rfd_values:[],
      rfd_values_edit:{},
      approvalStatus:[],
      formFieldsRFDModal: {
        rfd_block_code: "",
        rfd_adp_yr_code: "",
        rfd_adp_no: "",
        rfd_status: "",
        rfd_date: "",
        rfd_amount: "",
        rfd_capital: "",
        rfd_revenue: "",
        rfd_foreign_aid: "",
        rfd_last_updated_term: "",
        rfd_prog_code: "",
        rfd_hist_flag: "",
        rfd_month_code: "",
        rfd_insert_item: "",
      },
    };
  },
  mounted() {
    
      this.getProvince();    
      this.scheme_id = mixin.getSchemeId();
      this.loadSchemeDetails();
      this.getApprovalStatus();
      if(this.$route.params.id){
        this.editMode = true;
      }
      
  },
  methods: {
        getApprovalStatus() {
          axios
            .get("get-approval-status")
            .then((response) => {
              this.approvalStatus = response.data;
            })
            .catch((err) => {
              console.log("identified-by-selects2", err);
            });
        },
        customAppendFormData() {
        let formData = new FormData();
        //this.formFields is refering to the data object
        let aFields = Object.keys(this.formFieldsRFDModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsRFDModal[field] ? this.formFieldsRFDModal[field] : ""
            );
        }, this);
        return formData;
        },
        createRFDRecord() {
          let formData = this.customAppendFormData();
          // if (this.editMode) {
          //   formData.append(
          //     'id',
          //     this.edit_id
          //   );
          // }

          if(this.editMode){
            formData.append('scheme_idFk',this.$route.params.id);
          }
          else{
            formData.append('scheme_idFk',mixin.getSchemeId());
          }
          formData.append('scheme_name',mixin.sName);


          axios
          .post("schemes-create-rfd", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Release FD data saved successfully",
            });
            
            this.loadSchemeDetails();

            
            if (!(this.editMode)) {
              this.$router.push("/scheme-form/" + response.data.id);
            }
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });

          this.rfd_values.push({ 
              scheme_name: mixin.sName,  
              BlockCode: this.formFieldsRFDModal.rfd_block_code, 
              YrCode: this.formFieldsRFDModal.rfd_adp_yr_code, 
              AdpNo: this.formFieldsRFDModal.rfd_adp_no, 
              status: this.formFieldsRFDModal.rfd_status, 
              Amount: this.formFieldsRFDModal.rfd_amount,
              Capital: this.formFieldsRFDModal.ts_app_code, 
              Revenue: this.formFieldsRFDModal.ts_amount, 
              ForeignAid: this.formFieldsRFDModal.rfd_foreign_aid, 
              ProgCode: this.formFieldsRFDModal.rfd_prog_code, 
              HistFlag: this.formFieldsRFDModal.rfd_hist_flag, 
              MonthCode: this.formFieldsRFDModal.rfd_month_code, 
            });
            
            this.resetFormFields();
            this.hideModal();

        },
        getProvince() {
          axios
          .get("get-province")
          .then((response) => {
            this.listOfProvinces = response.data;
            //console.log("is province",this.listOfProvinces);
          })
          .catch((err) => {
            //console.log("program-name-selects2", err);
          });
        },
        resetFormFields() {
          this.formFieldsRFDModal = {
            rfd_block_code:"",
            rfd_adp_yr_code:"",
            rfd_adp_no:"",
            rfd_status:"",
            rfd_date:"",
            rfd_amount:"",
            rfd_capital:"",
            rfd_revenue:"",
            rfd_foreign_aid:"",
            rfd_last_updated_term:"",
            rfd_prog_code:"",
            rfd_hist_flag:"",
            rfd_month_code:"",
            rfd_insert_item:"",
          };
        },
        hideModal(){
          $("#ReleaseFDModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-rfd/" + id).then((response) => {
            this.rfd_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-rfd-details/" + id).then((response) => {
            this.formFieldsRFDModal = response.data;
          });

          $("#ReleaseFDModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-rfd-details/" + id)
                .then((response) => {
                  if(response.data.code == 200){
                      Toast.fire({
                      icon: "success",
                      title: response.data.msg,
                    });
                    
                  }
                  else{
                    Toast.fire({
                      icon: "fail",
                      title: response.data.msg,
                    });
                  }
                  
                })
                .catch((err) => {
                    if (err.response.status === 422) {
                      this.errors = err.response.data.errors || {};
                    }
                });
          }
          this.loadSchemeDetails();
    
        }, // end delete entry
        sumAmounts($event){
          let sum = parseInt(this.formFieldsRFDModal.rfd_capital) + parseInt(this.formFieldsRFDModal.rfd_revenue) + parseInt(this.formFieldsRFDModal.rfd_foreign_aid);
          this.formFieldsRFDModal.rfd_amount = sum;
        }
        
        
  },
  

};
</script>
