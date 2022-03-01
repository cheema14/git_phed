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
                      <th>Deposit Date</th>
                      <th>DD No</th>
                      <th>Amount</th>
                      <th>Remarks</th>
                      <th>Insert Term</th>
                      <th>Updated Term</th>
                      <th v-if="cs_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                     <template v-if="cs_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="cs_values_edit">
                      <tr v-for="(item, i) in cs_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name :'N/A'}}</td>
                        <td>{{ item.community_shares_deposit_date ? item.community_shares_deposit_date: 'N/A'}}</td>
                        <td>{{ item.community_shares_dd_no ? item.community_shares_dd_no: 'N/A' }}</td>
                        <td>{{ item.community_shares_amount ? item.community_shares_amount: 'N/A' }}</td>
                        <td>{{ item.community_shares_remarks ? item.community_shares_remarks: 'N/A' }}</td>
                        <td>{{ item.community_shares_insert_term ? item.community_shares_insert_term: 'N/A' }}</td>
                        <td>{{ item.community_shares_updated_term ? item.community_shares_updated_term: 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="cs_values">
                      <tr v-for="(entry, i) in cs_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.DepositDate}}</td>
                        <td>{{ entry.DDNo }}</td>
                        <td>{{ entry.Amount }}</td>
                        <td>{{ entry.Remarks }}</td>
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
      id="CommunityShareModal"
      tabindex="-1"
      aria-labelledby="CommunityShareModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CommunityShareModalLabel">Add Community Share Detail</h5>
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
                          <div class="col-md-4 2 mb-3">
                            <label>Deposit Date</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_deposit_date"
                            type="date"
                            class="form-control"
                            placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>DD No</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_dd_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter DD No"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_amount"
                              type="text"
                              class="form-control"
                              placeholder="Enter Amount"
                            />
                          </div>
                          <div class="col-md-4 2 mb-3">
                            <label>Remarks</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Updated Term</label>
                            <input
                            v-model="formFieldsCSModal.community_shares_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Updated Term"
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
            <button type="button" @click="createCSRecord" class="btn btn-primary">Save changes</button>
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
      cs_values:[],
      cs_values_edit:{},
      formFieldsCSModal: {
        community_shares_deposit_date: "",
        community_shares_dd_no: "",
        community_shares_amount: "",
        community_shares_remarks: "",
        community_shares_insert_term: "",
        community_shares_updated_term: "",
      },
    };
  },
  mounted() {
    
      this.getProvince();    
      this.loadSchemeDetails();
      if(this.$route.params.id){
        this.editMode = true;
      }
  },
  methods: {

        customAppendFormData() {
        let formData = new FormData();
        //this.formFields is refering to the data object
        let aFields = Object.keys(this.formFieldsCSModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsCSModal[field] ? this.formFieldsCSModal[field] : ""
            );
        }, this);
        return formData;
        },
        createCSRecord() {
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
          .post("schemes-create-cs", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Community Share data saved successfully",
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

          this.cs_values.push({ 
              DepositDate: this.formFieldsCSModal.community_shares_deposit_date, 
              DDNo: this.formFieldsCSModal.community_shares_dd_no, 
              Amount: this.formFieldsCSModal.community_shares_amount, 
              Remarks: this.formFieldsCSModal.community_shares_remarks, 
              InsertTerm: this.formFieldsCSModal.community_shares_insert_term, 
              UpdatedTerm: this.formFieldsCSModal.community_shares_updated_term, 
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
          this.formFieldsCSModal = {
            community_shares_deposit_date:"",
            community_shares_dd_no:"",
            community_shares_amount:"",
            community_shares_remarks:"",
            community_shares_insert_term:"",
            community_shares_updated_term:"",
            
          };
        },
        hideModal(){
          $("#CommunityShareModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-cs/" + id).then((response) => {
            this.cs_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-cs-details/" + id).then((response) => {
            this.formFieldsCSModal = response.data;
          });

          $("#CommunityShareModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-cs-details/" + id)
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
