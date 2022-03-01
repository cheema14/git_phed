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
                      <th>Village Code</th>
                      <th>Village Name</th>
                      <th>Village Population(1998)</th>
                      <th>Village Population(2008)</th>
                      <th>No of Houses</th>
                      <th>Water Source</th>
                      <th>Barani Area</th>
                      <th>Remarks</th>
                      <th v-if="vs_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="vs_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="vs_values_edit">
                      <tr v-for="(item, i) in vs_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name}}</td>
                        <td>{{ item.village_served_vcode}}</td>
                        <td>{{ item.village_served_vname }}</td>
                        <td>{{ item.village_served_population_nintyeigth }}</td>
                        <td>{{ item.village_served_population_twoeight }}</td>
                        <td>{{ item.village_served_no_of_houses }}</td>
                        <td>{{ item.village_served_water_source }}</td>
                        <td>{{ item.village_served_barani_area }}</td>
                        <td>{{ item.village_served_remarks }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="vs_values">
                      <tr v-for="(entry, i) in vs_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.VCode}}</td>
                        <td>{{ entry.VName }}</td>
                        <td>{{ entry.VPopulationNinty }}</td>
                        <td>{{ entry.VPopulationTwenty }}</td>
                        <td>{{ entry.NoHouses }}</td>
                        <td>{{ entry.WaterSource }}</td>
                        <td>{{ entry.BaraniArea }}</td>
                        <td>{{ entry.Remarks }}</td>
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
      id="VillageServedModal"
      tabindex="-1"
      aria-labelledby="VillageServedModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="VillageServedModalLabel">Add Village Served Detail</h5>
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
                            <label>Village Code</label>
                            <input
                            v-model="formFieldsVSModal.village_served_vcode"
                            type="text"
                            class="form-control"
                            placeholder="Enter Village Code"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Village Name</label>
                            <input
                            v-model="formFieldsVSModal.village_served_vname"
                              type="text"
                              class="form-control"
                              placeholder="Enter Village Name"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Population in (1998)</label>
                            <input
                            v-model="formFieldsVSModal.village_served_population_nintyeigth"
                              type="text"
                              class="form-control"
                              placeholder="Enter Population in (1998)"
                            />
                          </div>
                          <div class="col-md-4 2 mb-3">
                            <label>Population in (2008)</label>
                            <input
                            v-model="formFieldsVSModal.village_served_population_twoeight"
                              type="text"
                              class="form-control"
                              placeholder="Enter Population in (2008)"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>No of Houses</label>
                            <input
                            v-model="formFieldsVSModal.village_served_no_of_houses"
                              type="text"
                              class="form-control"
                              placeholder="Enter No of Houses"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Water Source</label>
                            <input
                            v-model="formFieldsVSModal.village_served_water_source"
                              type="text"
                              class="form-control"
                              placeholder="Enter Water Source"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Water Zone</label>
                            <input
                            v-model="formFieldsVSModal.village_served_water_zone"
                              type="text"
                              class="form-control"
                              placeholder="Enter Water Zone"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Barani Area</label>
                            <input
                            v-model="formFieldsVSModal.village_served_barani_area"
                              type="text"
                              class="form-control"
                              placeholder="Enter Barani Area"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Contamination</label>
                            <input
                            v-model="formFieldsVSModal.village_served_contamination"
                              type="text"
                              class="form-control"
                              placeholder="Enter Contamination"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Remarks</label>
                            <input
                            v-model="formFieldsVSModal.village_served_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsVSModal.village_served_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Updated Term</label>
                            <input
                            v-model="formFieldsVSModal.village_served_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Updated Term"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Village Loc Type</label>
                            <input
                            v-model="formFieldsVSModal.village_served_loc_type"
                              type="text"
                              class="form-control"
                              placeholder="Enter Village Loc Type"
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
            <button type="button" @click="createVSRecord" class="btn btn-primary">Save changes</button>
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
      vs_values:[],
      vs_values_edit:{},
      formFieldsVSModal: {
        village_served_vcode: "",
        village_served_vname: "",
        village_served_population_nintyeigth: "",
        village_served_population_twoeight: "",
        village_served_no_of_houses: "",
        village_served_water_source: "",
        village_served_water_zone: "",
        village_served_barani_area: "",
        village_served_contamination: "",
        village_served_remarks: "",
        village_served_insert_term: "",
        village_served_updated_term: "",
        village_served_loc_type: "",
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
        let aFields = Object.keys(this.formFieldsVSModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsVSModal[field] ? this.formFieldsVSModal[field] : ""
            );
        }, this);
        return formData;
        },
        createVSRecord() {
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
          .post("schemes-create-vs", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Village Served data saved successfully",
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

          this.vs_values.push({ 
              VCode: this.formFieldsVSModal.village_served_vcode, 
              VName: this.formFieldsVSModal.village_served_vname, 
              VPopulationNinty: this.formFieldsVSModal.village_served_population_nintyeigth, 
              VPopulationTwenty: this.formFieldsVSModal.village_served_population_twoeight, 
              NoHouses: this.formFieldsVSModal.village_served_no_of_houses, 
              WaterSource: this.formFieldsVSModal.village_served_water_source, 
              BaraniArea: this.formFieldsVSModal.village_served_barani_area, 
              Remarks: this.formFieldsVSModal.village_served_remarks, 
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
          this.formFieldsVSModal = {
            village_served_vcode:"",
            village_served_vname:"",
            village_served_population_nintyeigth:"",
            village_served_population_twoeight:"",
            village_served_no_of_houses:"",
            village_served_water_source:"",
            village_served_water_zone:"",
            village_served_barani_area:"",
            village_served_contamination:"",
            village_served_remarks:"",
            village_served_insert_term:"",
            village_served_updated_term:"",
            village_served_loc_type:"",
            
          };
        },
        hideModal(){
          $("#VillageServedModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-vs/" + id).then((response) => {
            this.vs_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-vs-details/" + id).then((response) => {
            this.formFieldsVSModal = response.data;
          });

          $("#VillageServedModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-vs-details/" + id)
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
