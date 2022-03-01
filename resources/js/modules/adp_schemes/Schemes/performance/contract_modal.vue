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
                      <th>Scheme Name</th>
                      <th>Contract Code</th>
                      <th>Contract Name</th>
                      <th>Contract Date</th>
                      <th>Contract Accept No</th>
                      <th>Contract Accept Date</th>
                      <th>Contract Amount</th>
                      <th>Contract Commence Date</th>
                      <th>Contract Compl Date</th>
                      <th>Contract Status</th>
                      <th>Contract Remarks</th>
                      <th>Contract Act Compl Date</th>
                      <th>Contract Insert Term</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="cnt_values_edit">
                      <tr v-for="(item, index) in cnt_values_edit" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A' }}</td>
                        <td>{{ item.cnt_code ? item.cnt_code : 'N/A' }}</td>
                        <td>{{ item.cnt_name ? item.cnt_name : 'N/A' }}</td>
                        <td>{{ item.cnt_date ? item.cnt_date : 'N/A' }}</td>
                        <td>{{ item.cnt_accept_no ? item.cnt_accept_no: 'N/A' }}</td>
                        <td>{{ item.cnt_accept_date ? item.cnt_accept_date :'N/A' }}</td>
                        <td>{{ item.cnt_amount ? item.cnt_amount :'N/A' }}</td>
                        <td>{{ item.cnt_commence_date ? item.cnt_commence_date :'N/A' }}</td>
                        <td>{{ item.cnt_compl_date ? item.cnt_compl_date :'N/A' }}</td>
                        <td>{{ item.cnt_status ? item.cnt_status :'N/A' }}</td>
                        <td>{{ item.cnt_remarks ? item.cnt_remarks :'N/A' }}</td>
                        <td>{{ item.act_compl_date ? item.act_compl_date :'N/A' }}</td>
                        <td>{{ item.cnt_insert_term ? item.cnt_insert_term :'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>  
                    </template>

                    <!-- <template v-if="cnt_values">
                      <tr v-for="(entry, i) in cnt_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.CntCode }}</td>
                        <td>{{ entry.CntName }}</td>
                        <td>{{ entry.CntDate }}</td>
                        <td>{{ entry.CntAcceptNo }}</td>
                        <td>{{ entry.CntAcceptDate }}</td>
                        <td>{{ entry.CntAmount }}</td>
                        <td>{{ entry.CntCommenceDate }}</td>
                        <td>{{ entry.CntComplCode }}</td>
                        <td>{{ entry.CntStatus }}</td>
                        <td>{{ entry.CntRemarks }}</td>
                        <td>{{ entry.ActComplDate }}</td>
                        <td>{{ entry.CntInsertTerm }}</td>
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
      id="ContractModal"
      tabindex="-1"
      aria-labelledby="ContractModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ContractModalLabel">Add TS Detail</h5>
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
                            <label>Contract Code</label>
                            <input
                            v-model="formFieldsContractModal.cnt_code"
                            type="text"
                            class="form-control"
                            placeholder="Enter Contract Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Name</label>
                            <input
                            v-model="formFieldsContractModal.cnt_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contract Name"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Date</label>
                            <input
                            v-model="formFieldsContractModal.cnt_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Contract Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Accept No</label>
                            <input
                            v-model="formFieldsContractModal.cnt_accept_no"
                              type="number"
                              class="form-control"
                              placeholder="Enter Contract Accept No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Accept Date</label>
                            <input
                            v-model="formFieldsContractModal.cnt_accept_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Contract Accept Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label> Contract Amount</label>
                            <input
                            v-model="formFieldsContractModal.cnt_amount"
                              type="number"
                              class="form-control"
                              placeholder="Enter Contract Amount"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Commence Date</label>
                            <input
                            v-model="formFieldsContractModal.cnt_commence_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Contract Commence Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Completion Date</label>
                            <input
                            v-model="formFieldsContractModal.cnt_compl_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contract Completion Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsContractModal.cnt_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Remarks</label>
                            <input
                            v-model="formFieldsContractModal.cnt_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contract Remarks"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>ACL Completion Date</label>
                            <input
                            v-model="formFieldsContractModal.act_compl_date"
                              type="text"
                              class="form-control"
                              placeholder="Enter ACL Completion Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contract Insert Term</label>
                            <input
                            v-model="formFieldsContractModal.cnt_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contract Insert Term"
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
            <button type="button" @click="createContractRecord" class="btn btn-primary">Save changes</button>
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
      cnt_values:[],
      cnt_values_edit:{},
      approvalStatus:[],
      formFieldsContractModal: {
        //id: "",
        province_id:"",
        cnt_code: "",
        cnt_name: "",
        cnt_date: "",
        cnt_accept_no: "",
        cnt_accept_date: "",
        cnt_amount: "",
        cnt_commence_date: "",
        cnt_compl_code: "",
        cnt_status: "",
        cnt_remarks: "",
        act_compl_date: "",
        cnt_insert_term: "",
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
        getProvince() {
          axios
          .get("get-province")
          .then((response) => {
            this.listOfProvinces = response.data;
            //console.log("provinces",this.listOfProvinces);
          })
          .catch((err) => {
            //console.log("program-name-selects2", err);
          });
        },
        customAppendFormData() {
          let formData = new FormData();
          //this.formFieldsModal is refering to the data object
          let aFields = Object.keys(this.formFieldsContractModal);
          
          aFields.forEach(function (field, index) {
            formData.append(
              field,
              this.formFieldsContractModal[field] ? this.formFieldsContractModal[field] : ""
            );
          }, this);
          
          return formData;
        },
        resetFormFields() {
          this.formFieldsContractModal = {
            //id: "",
            province_id:"",
            cnt_code: "",
            cnt_name: "",
            cnt_date: "",
            cnt_accept_no: "",
            cnt_accept_date: "",
            cnt_amount: "",
            cnt_commence_date: "",
            cnt_compl_code: "",
            cnt_status: "",
            cnt_remarks: "",
            act_compl_date: "",
            cnt_insert_term: "",
          };
        },
        createContractRecord() {
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
          .post("schemes-create-cnt", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Contract data saved successfully",
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

          this.cnt_values.push({ 
              scheme_name: mixin.sName,  
              Province: this.province_name,
              CntCode: this.formFieldsContractModal.cnt_code, 
              CntName: this.formFieldsContractModal.cnt_name, 
              CntDate: this.formFieldsContractModal.cnt_date, 
              CntAcceptNo: this.formFieldsContractModal.cnt_accept_no, 
              CntAcceptDate: this.formFieldsContractModal.cnt_accept_date, 
              CntAmount: this.formFieldsContractModal.cnt_amount, 
              CntCommenceDate: this.formFieldsContractModal.cnt_commence_date, 
              CntComplCode: this.formFieldsContractModal.cnt_compl_code, 
              CntStatus: this.formFieldsContractModal.cnt_status, 
              CntRemarks: this.formFieldsContractModal.cnt_remarks, 
              ActComplDate: this.formFieldsContractModal.act_compl_date, 
              CntInsertTerm: this.formFieldsContractModal.cnt_insert_term, 
            });
            
            this.resetFormFields();
            this.hideModal();

        },
        hideModal() {
          $("#ContractModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-cnt/" + id).then((response) => {
            this.cnt_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-contract-details/" + id).then((response) => {
            this.formFieldsContractModal = response.data;
          });

          $("#ContractModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-contract-details/" + id)
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
    
        } // end delete entry
        
        
  },
  

};
</script>
