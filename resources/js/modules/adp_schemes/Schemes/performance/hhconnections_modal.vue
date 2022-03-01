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
                      <th>HH SR No</th>
                      <th>HH Owner</th>
                      <th>HH Member</th>
                      <th>HH Cell No</th>
                      <th>HH Insert Term</th>
                      <th>HH Updated Term</th>
                      <th v-if="hh_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="hh_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="hh_values_edit">
                      <tr v-for="(item, i) in hh_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name}}</td>
                        <td>{{ item.hh_connections_sr_no}}</td>
                        <td>{{ item.hh_connections_owner }}</td>
                        <td>{{ item.hh_connections_member }}</td>
                        <td>{{ item.hh_connections_cell_no }}</td>
                        <td>{{ item.hh_connections_insert_term }}</td>
                        <td>{{ item.hh_connections_updated_term }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="hh_values">
                      <tr v-for="(entry, i) in hh_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.SrNo}}</td>
                        <td>{{ entry.Owner }}</td>
                        <td>{{ entry.Member }}</td>
                        <td>{{ entry.CellNo }}</td>
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
      id="HHConnectionsModal"
      tabindex="-1"
      aria-labelledby="HHConnectionsModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="HHConnectionsModalLabel">Add HH Connections Detail</h5>
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
                            <label>SR No</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_sr_no"
                            type="text"
                            class="form-control"
                            placeholder="Enter SR No"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Owner</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_owner"
                              type="text"
                              class="form-control"
                              placeholder="Enter Owner"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Member</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_member"
                              type="text"
                              class="form-control"
                              placeholder="Enter Member"
                            />
                          </div>
                          <div class="col-md-4 2 mb-3">
                            <label>Cell No</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_cell_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter Cell No"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Updated Term</label>
                            <input
                            v-model="formFieldsHHModal.hh_connections_updated_term"
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
            <button type="button" @click="createHHRecord" class="btn btn-primary">Save changes</button>
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
      hh_values:[],
      hh_values_edit:{},
      formFieldsHHModal: {
        hh_connections_sr_no: "",
        hh_connections_owner: "",
        hh_connections_member: "",
        hh_connections_cell_no: "",
        hh_connections_insert_term: "",
        hh_connections_updated_term: "",
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
        let aFields = Object.keys(this.formFieldsHHModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsHHModal[field] ? this.formFieldsHHModal[field] : ""
            );
        }, this);
        return formData;
        },
        createHHRecord() {
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
          .post("schemes-create-hh", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "HH Connections data saved successfully",
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

          this.hh_values.push({ 
              SrNo: this.formFieldsHHModal.hh_connections_sr_no, 
              Owner: this.formFieldsHHModal.hh_connections_owner, 
              Member: this.formFieldsHHModal.hh_connections_member, 
              CellNo: this.formFieldsHHModal.hh_connections_cell_no, 
              InsertTerm: this.formFieldsHHModal.hh_connections_insert_term, 
              UpdatedTerm: this.formFieldsHHModal.hh_connections_updated_term, 
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
          this.formFieldsHHModal = {
            hh_connections_sr_no:"",
            hh_connections_owner:"",
            hh_connections_member:"",
            hh_connections_cell_no:"",
            hh_connections_insert_term:"",
            hh_connections_updated_term:"",
            
          };
        },
        hideModal(){
          $("#HHConnectionsModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-hh/" + id).then((response) => {
            this.hh_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-hh-details/" + id).then((response) => {
            this.formFieldsHHModal = response.data;
          });

          $("#HHConnectionsModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-hh-details/" + id)
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
