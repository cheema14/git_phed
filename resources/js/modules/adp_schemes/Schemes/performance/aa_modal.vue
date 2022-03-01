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
                      <th>Sr No.</th>
                      <th>Scheme No</th>
                      <th>Date</th>
                      <th>Doc No</th>
                      <th>Status</th>
                      <th>App Code</th>
                      <th>Amount</th>
                      <th>Auth</th>
                      <th>Remarks</th>
                      <th>Insert Term</th>
                      <th>Forum Code</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="aa_values_edit">
                      <tr v-for="(item, index) in aa_values_edit" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.aa_scheme_idFk ? item.aa_scheme_idFk : 'N/A' }}</td>
                        <td>{{ item.aa_date ? item.aa_date : 'N/A' }}</td>
                        <td>{{ item.aa_doc_no ? item.aa_doc_no : 'N/A' }}</td>
                        <td>{{ item.aa_status ? item.aa_status : 'N/A' }}</td>
                        <td>{{ item.aa_app_code ? item.aa_app_code: 'N/A' }}</td>
                        <td>{{ item.aa_amount ? item.aa_amount :'N/A' }}</td>
                        <td>{{ item.aa_auth ? item.aa_auth :'N/A' }}</td>
                        <td>{{ item.aa_remarks ? item.aa_remarks :'N/A' }}</td>
                        <td>{{ item.aa_insert_term ? item.aa_insert_term :'N/A' }}</td>
                        <td>{{ item.aa_forum_code ? item.aa_forum_code :'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>  
                    </template>

                    <!-- <template v-if="aa_values">
                      <tr v-for="(entry, i) in aa_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.AADate }}</td>
                        <td>{{ entry.DocNo }}</td>
                        <td>{{ entry.status }}</td>
                        <td>{{ entry.AppCode }}</td>
                        <td>{{ entry.Amount }}</td>
                        <td>{{ entry.Auth }}</td>
                        <td>{{ entry.Remarks }}</td>
                        <td>{{ entry.InsertTerm }}</td>
                        <td>{{ entry.ForumCode }}</td>
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
    <!-- <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#AAModal"
    >
      Launch demo modal
    </button> -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="AAModal"
      tabindex="-1"
      aria-labelledby="AAModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AAModalLabel">Add AA Detail</h5>
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
                            <label>Doc No</label>
                            <input
                            v-model="formFieldsAAModal.aa_doc_no"
                            type="number"
                            class="form-control"
                            placeholder="Enter Doc No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsAAModal.aa_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsAAModal.aa_amount"
                              type="number"
                              class="form-control"
                              placeholder="Enter Amount"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsAAModal.aa_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>App Code</label>
                            <input
                            v-model="formFieldsAAModal.aa_app_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter App Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Auth</label>
                            <input
                            v-model="formFieldsAAModal.aa_auth"
                              type="text"
                              class="form-control"
                              placeholder="Enter AA Auth"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Remarks</label>
                            <input
                            v-model="formFieldsAAModal.aa_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Forum Code</label>
                            <input
                            v-model="formFieldsAAModal.aa_forum_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Forum Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsAAModal.aa_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
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
            <button type="button" @click="createAARecord" class="btn btn-primary">Save changes</button>
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
      aa_values:[],
      approvalStatus:[],
      aa_values_edit:{},
      formFieldsAAModal: {
        //id: "",
        province_idFk: "",
        aa_level: "",
        aa_date: "",
        aa_doc_no: "",
        aa_status: "",
        aa_app_code: "",
        aa_amount: "",
        aa_auth: "",
        aa_remarks: "",
        aa_insert_term: "",
        aa_forum_code: "",
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
        let aFields = Object.keys(this.formFieldsAAModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsAAModal[field] ? this.formFieldsAAModal[field] : ""
            );
        }, this);
        return formData;
        },
        createAARecord() {
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
          .post("schemes-create-aa", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "AA data saved successfully",
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

          this.aa_values.push({ 
              scheme_name: mixin.sName,  
              AADate: this.formFieldsAAModal.aa_date, 
              DocNo: this.formFieldsAAModal.aa_doc_no, 
              status: this.aa_status, 
              AppCode: this.formFieldsAAModal.aa_app_code, 
              Amount: this.formFieldsAAModal.aa_amount, 
              Auth: this.formFieldsAAModal.aa_auth, 
              Remarks: this.formFieldsAAModal.aa_remarks, 
              InsertTerm: this.formFieldsAAModal.aa_insert_term, 
              ForumCode: this.formFieldsAAModal.aa_forum_code, 
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
          this.formFieldsAAModal = {
            aa_level:"",
            aa_date:"",
            aa_doc_no:"",
            aa_status:"",
            aa_app_code:"",
            aa_amount:"",
            aa_auth:"",
            aa_remarks:"",
            aa_insert_term:"",
            aa_forum_code:"",
          };
        },
        hideModal(){
          $("#AAModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-aa/" + id).then((response) => {
            this.aa_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-aa-details/" + id).then((response) => {
            this.formFieldsAAModal = response.data;
          });

          $("#AAModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-aa-details/" + id)
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
  }

};
</script>
