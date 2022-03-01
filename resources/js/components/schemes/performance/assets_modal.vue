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
                      <th>Asset Type Code</th>
                      <th>Asset Description</th>
                      <th>Asset Capacity Unit</th>
                      <th>Asset Insert Term</th>
                      <th>Asset Updated Term</th>
                      <th v-if="asset_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="asset_values_edit == ''">
                      <tr>
                        <td>No data to display</td>
                      </tr>
                    </template>

                    <template v-if="asset_values_edit">
                      <tr v-for="(item, i) in asset_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A'}}</td>
                        <td>{{ item.assets_type_code}}</td>
                        <td>{{ item.assets_description }}</td>
                        <td>{{ item.assets_capacity_unit }}</td>
                        <td>{{ item.assets_insert_term }}</td>
                        <td>{{ item.assets_updated_term }}</td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>

                    <!-- <template v-if="asset_values">
                      <tr v-for="(entry, i) in asset_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.typeCode}}</td>
                        <td>{{ entry.Description }}</td>
                        <td>{{ entry.CapacityUnit }}</td>
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
      id="AssetsModal"
      tabindex="-1"
      aria-labelledby="AssetsModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AssetsModalLabel">Add Assets Detail</h5>
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
                            <label>Asset Type Code</label>
                            <input
                            v-model="formFieldsAssetModal.asset_type_code"
                            type="text"
                            class="form-control"
                            placeholder="Enter Asset Type Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Asset Description</label>
                            <input
                            v-model="formFieldsAssetModal.asset_description"
                              type="text"
                              class="form-control"
                              placeholder="Enter Asset Description"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Asset Capacity Unit</label>
                            <input
                            v-model="formFieldsAssetModal.asset_capacity_unit"
                              type="text"
                              class="form-control"
                              placeholder="Enter Asset Capacity Unit"
                            />
                          </div>
                          <div class="col-md-4  mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsAssetModal.asset_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter Insert Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Updated Term</label>
                            <input
                            v-model="formFieldsAssetModal.asset_updated_term"
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
            <button type="button"  @click="createAssetRecord" class="btn btn-primary">Save changes</button>
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
      asset_values:[],
      asset_values_edit:{},
      formFieldsAssetModal: {
        asset_type_code: "",
        asset_description: "",
        asset_capacity_unit: "",
        asset_insert_term: "",
        asset_updated_term: "",
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
        let aFields = Object.keys(this.formFieldsAssetModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsAssetModal[field] ? this.formFieldsAssetModal[field] : ""
            );
        }, this);
        return formData;
        },
        createAssetRecord() {
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
          .post("schemes-create-asset", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Assets data saved successfully",
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

          this.asset_values.push({ 
              typeCode: this.formFieldsAssetModal.asset_type_code, 
              Description: this.formFieldsAssetModal.asset_description, 
              CapacityUnit: this.formFieldsAssetModal.asset_capacity_unit, 
              InsertTerm: this.formFieldsAssetModal.asset_insert_term, 
              UpdatedTerm: this.formFieldsAssetModal.asset_updated_term, 
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
          this.formFieldsAssetModal = {
            asset_type_code:"",
            asset_description:"",
            asset_capacity_unit:"",
            asset_insert_term:"",
            asset_updated_term:"",
            
          };
        },
        hideModal(){
          $("#AssetsModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-asset/" + id).then((response) => {
            this.asset_values_edit = response.data;
          });
        },
        editForm(id){
          axios.get("get-assets-details/" + id).then((response) => {
            this.formFieldsAssetModal = response.data;
          });

          $("#AssetsModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-assets-details/" + id)
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
