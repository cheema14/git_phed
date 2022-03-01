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
                      <th>Prog Code</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="rpnd_values_edit">
                      <tr v-for="(item, i) in rpnd_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A'}}</td>
                        <td>{{ item.rel_block_code ? item.rel_block_code : 'N/A' }}</td>
                        <td>{{ item.rel_adp_year_code ? item.rel_adp_year_code : 'N/A' }}</td>
                        <td>{{ item.adp_no ? item.adp_no : 'N/A' }}</td>
                        <td>{{ item.rel_status ? item.rel_status : 'N/A' }}</td>
                        <td>{{ item.rel_amount ? item.rel_amount : 'N/A' }}</td>
                        <td>{{ item.rel_capital ? item.rel_capital : 'N/A' }}</td>
                        <td>{{ item.rel_revenue ? item.rel_revenue : 'N/A' }}</td>
                        <td>{{ item.rel_foreign_aid ? item.rel_foreign_aid : 'N/A' }}</td>
                        <td>{{ item.rel_hist_flag ? item.rel_hist_flag : 'N/A' }}</td>
                        <td>{{ item.rel_prog_code ? item.rel_prog_code : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="rpnd_values">
                      <tr v-for="(entry, i) in rpnd_values" :key="i">
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
      id="ReleasePNDModal"
      tabindex="-1"
      aria-labelledby="ReleasePNDModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ReleasePNDModalLabel">Add Release PND Detail</h5>
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
                            v-model="formFieldsRPModal.rpnd_block_code"
                            type="text"
                            class="form-control"
                            placeholder="Enter Block Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Year Code</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_adp_yr_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Year Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>ADP No</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_adp_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter ADP No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsRPModal.rpnd_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Capital</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_capital"
                              type="number"
                              class="form-control"
                              placeholder="Enter Capital"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Revenue</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_revenue"
                              type="number"
                              class="form-control"
                              placeholder="Enter Revenue"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Foreign Aid</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_foreign_aid"
                              type="number"
                              class="form-control"
                              placeholder="Enter Foreign Aid"
                              @change="sumAmounts($event)"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_amount"
                              type="number"
                              class="form-control"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Ongoing Code</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_ongoing_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Ongoing Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Prog Code</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_prog_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Prog Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Insert Item</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_insert_item"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Item"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Hist Flag</label>
                            <input
                            v-model="formFieldsRPModal.rpnd_hist_flag"
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
            <button type="button" @click="createRPRecord" class="btn btn-primary">Save changes</button>
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
      rpnd_values:[],
      rpnd_values_edit:{},
      approvalStatus:[],
      formFieldsRPModal: {
        rpnd_block_code: "",
        rpnd_adp_yr_code: "",
        rpnd_adp_no: "",
        rpnd_status: "",
        rpnd_date: "",
        rpnd_amount: "",
        rpnd_capital: "",
        rpnd_revenue: "",
        rpnd_foreign_aid: "",
        rpnd_ongoing_code: "",
        rpnd_prog_code: "",
        rpnd_hist_flag: "",
        rpnd_insert_item: "",
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
        let aFields = Object.keys(this.formFieldsRPModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsRPModal[field] ? this.formFieldsRPModal[field] : ""
            );
        }, this);
        return formData;
        },
        createRPRecord() {
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
          .post("schemes-create-rpnd", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Release PND data saved successfully",
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

          this.rpnd_values.push({ 
              scheme_name: mixin.sName,  
              BlockCode: this.formFieldsRPModal.alo_block_code, 
              YrCode: this.formFieldsRPModal.alo_adp_yr_code, 
              AdpNo: this.formFieldsRPModal.alo_adp_no, 
              status: this.formFieldsRPModal.alo_status, 
              Amount: this.formFieldsRPModal.alo_amount,
              Capital: this.formFieldsRPModal.ts_app_code, 
              Revenue: this.formFieldsRPModal.ts_amount, 
              ForeignAid: this.formFieldsRPModal.alo_foreign_aid, 
              ProgCode: this.formFieldsRPModal.alo_prog_code, 
              HistFlag: this.formFieldsRPModal.alo_hist_flag, 
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
          this.formFieldsRPModal = {
            rpnd_block_code:"",
            rpnd_adp_yr_code:"",
            rpnd_adp_no:"",
            rpnd_status:"",
            rpnd_date:"",
            rpnd_amount:"",
            rpnd_capital:"",
            rpnd_revenue:"",
            rpnd_foreign_aid:"",
            rpnd_ongoing_code:"",
            rpnd_prog_code:"",
            rpnd_hist_flag:"",
            rpnd_insert_item:"",
          };
        },
        hideModal(){
          $("#ReleasePNDModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-rpnd/" + id).then((response) => {
            this.rpnd_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-rpnd-details/" + id).then((response) => {
            this.formFieldsRPModal = response.data;
          });

          $("#ReleasePNDModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-rpnd-details/" + id)
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
          let sum = parseInt(this.formFieldsRPModal.rpnd_capital) + parseInt(this.formFieldsRPModal.rpnd_revenue) + parseInt(this.formFieldsRPModal.rpnd_foreign_aid);
          this.formFieldsRPModal.rpnd_amount = sum;
        }
        
  },
  

};
</script>
