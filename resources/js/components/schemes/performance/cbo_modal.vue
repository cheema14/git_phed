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
                      <th>CBO SR No</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Contact No</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="cbo_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="cbo_values_edit">
                      <tr v-for="(item, i) in cbo_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A'}}</td>
                        <td>{{ item.cbo_sr_no}}</td>
                        <td>{{ item.cbo_name }}</td>
                        <td>{{ item.cbo_designation }}</td>
                        <td>{{ item.cbo_contact_no }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="cbo_values">
                      <tr v-for="(entry, i) in cbo_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.SrNo}}</td>
                        <td>{{ entry.Name }}</td>
                        <td>{{ entry.Designation }}</td>
                        <td>{{ entry.ContactNo }}</td>
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
      id="CBOModal"
      tabindex="-1"
      aria-labelledby="CBOModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CBOModalLabel">Add CBO Detail</h5>
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
                            <label>CBO Sr No</label>
                            <input
                            v-model="formFieldsCBOModal.cbo_sr_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter CBO Sr No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>CBO Name</label>
                            <input
                            v-model="formFieldsCBOModal.cbo_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter CBO Name"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Designation</label>
                            <input
                            v-model="formFieldsCBOModal.cbo_designation"
                              type="text"
                              class="form-control"
                              placeholder="Enter Designation"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Contact No</label>
                            <input
                            v-model="formFieldsCBOModal.cbo_contact_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contact No"
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
            <button type="button" @click="createCboRecord" class="btn btn-primary">Save changes</button>
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
      cbo_values:[],
      cbo_values_edit:{},
      formFieldsCBOModal: {
        cbo_sr_no: "",
        cbo_name: "",
        cbo_designation: "",
        cbo_contact_no: "",
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
        let aFields = Object.keys(this.formFieldsCBOModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsCBOModal[field] ? this.formFieldsCBOModal[field] : ""
            );
        }, this);
        return formData;
        },
        createCboRecord() {
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
          .post("schemes-create-cbo", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "CBO data saved successfully",
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

          this.cbo_values.push({ 
              SrNo: this.formFieldsCBOModal.cbo_sr_no, 
              Name: this.formFieldsCBOModal.cbo_name, 
              Designation: this.formFieldsCBOModal.cbo_designation, 
              ContactNo: this.formFieldsCBOModal.cbo_contact_no, 
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
          this.formFieldsCBOModal = {
            cbo_sr_no:"",
            cbo_name:"",
            cbo_designation:"",
            cbo_contact_no:"",
            
          };
        },
        hideModal(){
          $("#CBOModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-cbo/" + id).then((response) => {
            this.cbo_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-cbo-details/" + id).then((response) => {
            this.formFieldsCBOModal = response.data;
          });

          $("#CBOModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-cbo-details/" + id)
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
