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
                      <th>Visit Date</th>
                      <th>Visit Name</th>
                      <th>Visit Designation</th>
                      <th>Visit Inspection Code</th>
                      <th>Visit Lat</th>
                      <th>Visit Long</th>
                      <th>Visit Status</th>
                      <th>Visit Inspection Title</th>
                      <th>Visit Remarks SE</th>
                      <th>Visit Remarks CE</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="visit_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>
                    
                    <template v-if="visit_values_edit">
                      <tr v-for="(item, i) in visit_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name}}</td>
                        <td>{{ item.visit_date }}</td>
                        <td>{{ item.visit_name }}</td>
                        <td>{{ item.visit_designation }}</td>
                        <td>{{ item.visit_inspection_code }}</td>
                        <td>{{ item.visit_lat }}</td>
                        <td>{{ item.visit_long }}</td>
                        <td>{{ item.visit_status }}</td>
                        <td>{{ item.visit_inspection_title }}</td>
                        <td>{{ item.visit_remarks_se }}</td>
                        <td>{{ item.visit_remarks_ce }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="v_values">
                      <tr v-for="(entry, i) in v_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.Date }}</td>
                        <td>{{ entry.Name }}</td>
                        <td>{{ entry.Designation }}</td>
                        <td>{{ entry.InspectionCode }}</td>
                        <td>{{ entry.Lat }}</td>
                        <td>{{ entry.Long }}</td>
                        <td>{{ entry.status }}</td>
                        <td>{{ entry.InspectionTitle }}</td>
                        <td>{{ entry.RemarksSE }}</td>
                        <td>{{ entry.RemarksCE }}</td>
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
      id="VisitsModal"
      tabindex="-1"
      aria-labelledby="VisitsModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="VisitsModalLabel">Add Visits Detail</h5>
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
                            <label>Visit Date</label>
                            <input
                            v-model="formFieldsVModal.visit_date"
                            type="date"
                            class="form-control"
                            placeholder="Enter Visit Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Name</label>
                            <input
                            v-model="formFieldsVModal.visit_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Name"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Designation</label>
                            <input
                            v-model="formFieldsVModal.visit_designation"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Designation"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Inspection Code</label>
                            <input
                            v-model="formFieldsVModal.visit_inspection_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Inspection Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Lat</label>
                            <input
                            v-model="formFieldsVModal.visit_lat"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Lat"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Long</label>
                            <input
                            v-model="formFieldsVModal.visit_long"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Long"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsVModal.visit_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visist Inspection Title</label>
                            <input
                            v-model="formFieldsVModal.visit_inspection_title"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visist Inspection Title"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>VSF ID</label>
                            <input
                            v-model="formFieldsVModal.visit_vsf_id"
                              type="number"
                              class="form-control"
                              placeholder="Enter VSF ID"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit SCH Visit Location</label>
                            <input
                            v-model="formFieldsVModal.visit_sch_visit_loc"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit SCH Visit Location"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Insert Term</label>
                            <input
                            v-model="formFieldsVModal.visit_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Insert Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Updated Term</label>
                            <input
                            v-model="formFieldsVModal.visit_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter  Visit Updated Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>IMEI No</label>
                            <input
                            v-model="formFieldsVModal.visit_imei_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter IMEI No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Result</label>
                            <input
                            v-model="formFieldsVModal.visit_result"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Result"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Vil Identity</label>
                            <input
                            v-model="formFieldsVModal.visit_vil_ident"
                              type="text"
                              class="form-control"
                              placeholder="Enter Vil Identity"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Visit Off</label>
                            <input
                            v-model="formFieldsVModal.visit_vis_off"
                              type="text"
                              class="form-control"
                              placeholder="Enter Visit Off"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>HP SR No</label>
                            <input
                            v-model="formFieldsVModal.visit_hp_sr_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter HP SR No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Remarks SE</label>
                            <input
                            v-model="formFieldsVModal.visit_remarks_se"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks SE"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Remarks CE</label>
                            <input
                            v-model="formFieldsVModal.visit_remarks_ce"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks CE"
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
            <button type="button" @click="createVisitRecord" class="btn btn-primary">Save changes</button>
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
      v_values:[],
      visit_values_edit:{},
      approvalStatus:[],
      formFieldsVModal: {
        visit_date: "",
        visit_name: "",
        visit_designation: "",
        visit_inspection_code: "",
        visit_lat: "",
        visit_long: "",
        visit_status: "",
        visit_inspection_title: "",
        visit_vsf_id: "",
        visit_sch_visit_loc: "",
        visit_insert_term: "",
        visit_updated_term: "",
        visit_imei_no: "",
        visit_result: "",
        visit_vil_ident: "",
        visit_vis_off: "",
        visit_hp_sr_no: "",
        visit_remarks_se: "",
        visit_remarks_ce: "",
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
        let aFields = Object.keys(this.formFieldsVModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsVModal[field] ? this.formFieldsVModal[field] : ""
            );
        }, this);
        return formData;
        },
        createVisitRecord() {
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
          .post("schemes-create-visit", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Visits data saved successfully",
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

          this.v_values.push({ 
              scheme_name: mixin.sName,  
              Date: this.formFieldsVModal.visit_date, 
              Name: this.formFieldsVModal.visit_name, 
              Designation: this.formFieldsVModal.visit_designation, 
              InspectionCode: this.formFieldsVModal.visit_inspection_code, 
              Lat: this.formFieldsVModal.visit_lat,
              Long: this.formFieldsVModal.visit_long, 
              status: this.formFieldsVModal.visit_status, 
              InspectionTitle: this.formFieldsVModal.visit_inspection_title, 
              RemarksSE: this.formFieldsVModal.visit_remarks_se, 
              RemarksCE: this.formFieldsVModal.visit_remarks_ce,  
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
          this.formFieldsVModal = {
            visit_date:"",
            visit_name:"",
            visit_designation:"",
            visit_inspection_code:"",
            visit_lat:"",
            visit_long:"",
            visit_status:"",
            visit_inspection_title:"",
            visit_vsf_id:"",
            visit_sch_visit_loc:"",
            visit_insert_term:"",
            visit_updated_term:"",
            visit_imei_no:"",
            visit_result:"",
            visit_vil_ident:"",
            visit_vis_off:"",
            visit_hp_sr_no:"",
            visit_remarks_se:"",
            visit_remarks_ce:"",
          };
        },
        hideModal(){
          $("#VisitsModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-visit/" + id).then((response) => {
            this.visit_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-visits-details/" + id).then((response) => {
            this.formFieldsVModal = response.data;
          });

          $("#VisitsModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-visits-details/" + id)
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
