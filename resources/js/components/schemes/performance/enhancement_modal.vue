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
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Auth</th>
                      <th>Doc No</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>App Code</th>
                      <th>Insert Term</th>
                      <th>Updated Term</th>
                      <th v-if="en_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="en_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="en_values_edit">
                      <tr v-for="(item, i) in en_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A'}}</td>
                        <td>{{ item.enhancement_date ? item.enhancement_date : 'N/A' }}</td>
                        <td>{{ item.enhancement_amount ? item.enhancement_amount : 'N/A' }}</td>
                        <td>{{ item.enhancement_auth ? item.enhancement_auth : 'N/A' }}</td>
                        <td>{{ item.enhancement_doc_no ? item.enhancement_doc_no : 'N/A' }}</td>
                        <td>{{ item.enhancement_remarks ? item.enhancement_remarks : 'N/A' }}</td>
                        <td>{{ item.enhancement_status ? item.enhancement_status : 'N/A' }}</td>
                        <td>{{ item.enhancement_app_code ? item.enhancement_app_code : 'N/A' }}</td>
                        <td>{{ item.enhancement_insert_term ? item.enhancement_insert_term : 'N/A' }}</td>
                        <td>{{ item.enhancement_updated_term ? item.enhancement_updated_term : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="en_values">
                      <tr v-for="(entry, i) in en_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.Date }}</td>
                        <td>{{ entry.Amount }}</td>
                        <td>{{ entry.Auth }}</td>
                        <td>{{ entry.DocNo }}</td>
                        <td>{{ entry.Remarks }}</td>
                        <td>{{ entry.status }}</td>
                        <td>{{ entry.AppCode }}</td>
                        <td>{{ entry.InsertTerm }}</td>
                        <td>{{ entry.UpdatedTerm }}</td>
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
      id="EnhancementModal"
      tabindex="-1"
      aria-labelledby="EnhancementModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EnhancementModalLabel">Add Enhancement Detail</h5>
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
                          <div class="col-md-4  mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsEModal.enhancement_date"
                            type="date"
                            class="form-control"
                            placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsEModal.enhancement_amount"
                              type="number"
                              class="form-control"
                              placeholder="Enter Amount"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Auth</label>
                            <input
                            v-model="formFieldsEModal.enhancement_auth"
                              type="text"
                              class="form-control"
                              placeholder="Enter Auth"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label> Doc No</label>
                            <input
                            v-model="formFieldsEModal.enhancement_doc_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter Doc No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Remarks</label>
                            <input
                            v-model="formFieldsEModal.enhancement_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsEModal.enhancement_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>App Code</label>
                            <input
                            v-model="formFieldsEModal.enhancement_app_code"
                              type="number"
                              class="form-control"
                              placeholder="Enter App Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Inser Term</label>
                            <input
                            v-model="formFieldsEModal.enhancement_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Update Term</label>
                            <input
                            v-model="formFieldsEModal.enhancement_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Update Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>ENH SR No</label>
                            <input
                            v-model="formFieldsEModal.enhancement_enh_sr_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter ENH SR No"
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
            <button type="button" @click="createEnRecord" class="btn btn-primary">Save changes</button>
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
      en_values:[],
      en_values_edit:{},
      approvalStatus:[],
      formFieldsEModal: {
        
        enhancement_date: "",
        enhancement_amount: "",
        enhancement_auth: "",
        enhancement_doc_no: "",
        enhancement_remarks: "",
        enhancement_status: "",
        enhancement_app_code: "",
        enhancement_insert_term: "",
        enhancement_updated_term: "",
        enhancement_enh_sr_no: "",
      },
    };
  },
  mounted() {
    
      this.getProvince();    
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
        let aFields = Object.keys(this.formFieldsEModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsEModal[field] ? this.formFieldsEModal[field] : ""
            );
        }, this);
        return formData;
        },
        createEnRecord() {
          let formData = this.customAppendFormData();
          if (this.editMode) {
            formData.append(
              'id',
              this.edit_id
            );
          }

          if(this.editMode){
            formData.append('scheme_idFk',this.$route.params.id);
          }
          else{
            formData.append('scheme_idFk',mixin.getSchemeId());
          }
          formData.append('scheme_name',mixin.sName);


          axios
          .post("schemes-create-en", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Enhancement data saved successfully",
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

          this.en_values.push({ 
              scheme_name: mixin.sName,  
              Date: this.formFieldsEModal.enhancement_date, 
              Amount: this.formFieldsEModal.enhancement_amount, 
              Auth: this.formFieldsEModal.enhancement_auth, 
              DocNo: this.formFieldsEModal.enhancement_doc_no, 
              Remarks: this.formFieldsEModal.enhancement_remarks, 
              status: this.formFieldsEModal.enhancement_status, 
              AppCode: this.formFieldsEModal.enhancement_app_code, 
              InsertTerm: this.formFieldsEModal.enhancement_insert_term, 
              UpdatedTerm: this.formFieldsEModal.enhancement_updated_term, 
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
          this.formFieldsEModal = {
            enhancement_date:"",
            enhancement_amount:"",
            enhancement_auth:"",
            enhancement_doc_no:"",
            enhancement_remarks:"",
            enhancement_status:"",
            enhancement_app_code:"",
            enhancement_insert_term:"",
            enhancement_updated_term:"",
            enhancement_enh_sr_no:"",
          };
        },
        hideModal(){
          $("#EnhancementModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-en/" + id).then((response) => {
            this.en_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-en-details/" + id).then((response) => {
            this.formFieldsEModal = response.data;
          });

          $("#EnhancementModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-en-details/" + id)
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
