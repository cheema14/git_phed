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
                      <th>Level</th>
                      <th>PC Date</th>
                      <th>Doc No</th>
                      <th>Province</th>
                      <th>Status</th>
                      <th>App Code</th>
                      <th>Amount</th>
                      <th>Auth</th>
                      <th>Remarks</th>
                      <th>Add PC Details</th>
                      <th v-if="this.pc_values_edit">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    <template v-if="pc_values_edit">
                      <tr v-for="(item, index) in pc_values_edit" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.pc_level ? item.pc_level : 'N/A' }}</td>
                        <td>{{ item.pc_level }}</td>
                        <td>{{ item.pc_date }}</td>
                        <td>{{ item.pc_doc_no }}</td>
                        <td>{{ item.pc_province_idFk ? item.pc_province_idFk: 'N/A' }}</td>
                        <td>{{ item.pc_status }}</td>
                        <td>{{ item.pc_app_code }}</td>
                        <td>{{ item.pc_amount }}</td>
                        <td>{{ item.pc_auth }}</td>
                        <td>{{ item.pc_remarks }}</td>
                        <td><button @click="showDTLModal(item.id)" class="btn btn-sm btn-success">Add PC DTL</button></td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></span></td>
                      </tr>  
                    </template>


                    
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        
        </div>

          

      </div>

      
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
                        <th>Main Head</th>
                        <th>Sub Head</th>
                        <th>Detail Head</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Cost</th>
                        <th>PC No</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <template v-if="pc_dtls_values">
                        <tr v-for="(item, index) in pc_dtls_values" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.main_head.infra_desc ? item.main_head.infra_desc : 'N/A' }}</td>
                          <td v-if="item.sub_head">{{ item.sub_head.sub_head_desc ? item.sub_head.sub_head_desc : 'N/A' }}</td>
                          <td v-if="item.detail_head">{{ item.detail_head.detail_head_desc ? item.detail_head.detail_head_desc :'N/A' }}</td>
                          <td>{{ item.quantity ? item.quantity : 'N/A' }}</td>
                          <td>{{ item.unit ? item.unit: 'N/A' }}</td>
                          <td>{{ item.cost ? item.cost: 'N/A' }}</td>
                          <td>{{ item.pc_idFk ? item.pc_idFk : 'N/A' }}</td>
                          <td style="display: inline-block;"><span><i class="fa fa-eye text-danger" aria-hidden="true"></i></span></td>
                        </tr>  
                      </template>


                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>

          </div>
          
      </div>

    <!-- Modal -->
    
    <div
      class="modal fade"
      id="PCModal"
      tabindex="-1"
      aria-labelledby="PCModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="PCModalLabel">Add PC Detail</h5>
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
                            <label>PC Level</label>
                            <select class="form-control" v-model="formFieldsModal.pc_level">
                              <option selected disabled>Select PC Level</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsModal.pc_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Date"
                            />
                            <!-- <b-form-datepicker id="example-datepicker" v-model="formFieldsModal.pc_date" class="mb-2"></b-form-datepicker> -->
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Doc No</label>
                            <input
                            v-model="formFieldsModal.pc_doc_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter Doc No"
                            />
                          </div>
                         
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsModal.pc_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>App Code</label>
                            <input
                            v-model="formFieldsModal.pc_app_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter PC App Code"
                            />
                          </div> 
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsModal.pc_amount"
                              type="number"
                              class="form-control"
                              placeholder="Enter Amount"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Auth</label>
                            <input
                            v-model="formFieldsModal.pc_auth"
                              type="text"
                              class="form-control"
                              placeholder="Enter PC Auth"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Remarks</label>
                            <input
                            v-model="formFieldsModal.pc_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter PC Remarks"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Insert Term</label>
                            <input
                            v-model="formFieldsModal.pc_insert_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter PC Insert Term"
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
              @click="hideModal"
            >
              Close
            </button>
            <button type="button" @click="createPCRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Modal PC DTL -->

    <div
      class="modal fade"
      id="PCDTLModal"
      tabindex="-1"
      aria-labelledby="PCDTLModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="PCDTLModalLabel">Add PC DTL</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
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
                          <h5>Planning Commission</h5>
                          <div class="col-md-4 mb-3">
                            <label>Province</label>
                            <input 
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.province_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Zone</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.zone_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Division</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.division_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>District</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.district_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Tehsil</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.tehsil_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>UC</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.uc"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Scheme No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.scheme_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.pc_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Doc No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.pc_doc_no"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Doc Date</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.pc_doc_date"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>PC Amount</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsPCDTL.pc_amount"
                              disabled
                            />
                          </div>
                          
                        </div>

                        <div class="row">
                          <h5>Planning Commission Details</h5>
                          
                          <div class="col-md-3 mb-3">
                            <label>Main Head</label>
                            <select2
                              v-model="formFieldsPCDTL.main_head"
                              placeholder="Select Main Head"
                              :options="MainHead"
                              @change="MainHeadChanged($event)"
                            />

                            <div
                              v-if="errors && errors.main_head"
                              class="text-danger"
                            >
                              {{ errors.main_head[0] }}
                            </div>
                          </div>
                          

                          <div class="col-md-3 mb-3">
                            <label>Sub Head</label>
                            <select2
                              v-model="formFieldsPCDTL.sub_head"
                              placeholder="Select Main Head"
                              :options="SubHead"
                              @change="SubHeadChanged($event)"
                            />
                            <div
                              v-if="errors && errors.sub_head"
                              class="text-danger"
                            >
                              {{ errors.sub_head[0] }}
                            </div>
                          </div>

                          <div class="col-md-3 mb-3">
                            <label>Detail Head</label>
                            <select2
                              v-model="formFieldsPCDTL.detail_head"
                              placeholder="Select Detail Head"
                              :options="DetailHead"
                            />
                            <div
                              v-if="errors && errors.detail_head"
                              class="text-danger"
                            >
                              {{ errors.detail_head[0] }}
                            </div>
                          </div>

                          <div class="col-md-3 mb-3">
                            <label>Quantity</label>
                            <input
                              v-model="formFieldsPCDTL.quantity"
                              type="number"
                              class="form-control"
                              placeholder="Enter Quantity"
                            />
                            <div
                              v-if="errors && errors.quantity"
                              class="text-danger"
                            >
                              {{ errors.quantity[0] }}
                            </div>
                          </div>

                          <div class="col-md-3 mb-3">
                            <label>Unit</label>
                            <select2
                              v-model="formFieldsPCDTL.unit"
                              placeholder="Select Unit"
                              :options="listUnits"
                            />
                            <div
                              v-if="errors && errors.unit"
                              class="text-danger"
                            >
                              {{ errors.unit[0] }}
                            </div>
                          </div>

                          <div class="col-md-3 mb-3">
                            <label>Cost</label>
                            <input
                              v-model="formFieldsPCDTL.cost"
                              type="number"
                              class="form-control"
                              placeholder="Enter Cost"
                            />
                            <div
                              v-if="errors && errors.cost"
                              class="text-danger"
                            >
                              {{ errors.cost[0] }}
                            </div>
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
              @click="hideDTLModal"
            >
              Close
            </button>
            <button type="button" @click="createPCDTLRecord" class="btn btn-primary">Save changes</button>
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
      listOfProvince: [],
      listOfZone: [],
      listOfDivision: [],
      listOfDistrict: [],
      listOfTehsil: [],
      MainHead: [],
      SubHead: [],
      DetailHead: [],
      listUnits:[],
      approvalStatus:[],
      scheme_name:"",
      province_name:'',
      schemeId:"",
      provinceId:"",
      dummy_text:'',
      pc_values:[],
      pc_dtls_values:[],
      pc_values_edit:{},
      formFields:{},
      pcdtlarr:{},
      formFieldsModal: {
        //id: "",
        pc_level: "",
        pc_date: "",
        pc_doc_no: "",
        province_idFk: "",
        pc_status: "",
        pc_app_code: "",
        pc_amount: "",
        pc_auth: "",
        pc_remarks: "",
        pc_insert_term: "",
      },
      formFieldsPCDTL:{
        province_name:"",
        zone_name: "",
        division_name: "",
        district_name: "",
        tehsil_name: "",
        uc: "",
        scheme_id: "",
        pc_id: "",
        pc_doc_no: "",
        pc_doc_date: "",
        pc_amount: "",
        main_head:"",
        sub_head:"",
        detail_head:"",
        quantity:"",
        unit:"",
        cost:"",
      },
    };
  },
  mounted() {
    
      this.getProvince();    
      this.scheme_id = mixin.getSchemeId();
      this.loadSchemeDetails();
      this.loadPCDetails();
      this.getApprovalStatus();
      if(this.$route.params.id){
        this.editMode = true;
      }

      // console.log("route parameter",this.$route.params.id);
      
  },
  methods: {

        provinceChanged() {
          this.getZone();
        },
        getZone() {
          axios
            .get("get-zone/"+this.formFieldsPCDTL.province_idFk)
            .then((response) => {
              this.listOfZone = response.data;
            })
            .catch((err) => {
              // console.log("zone-name-selects2", err);
            });
        },
        getProvince() {
          axios
          .get("get-province")
          .then((response) => {
            this.listOfProvince = response.data;
            //console.log("is province",this.listOfProvinces);
          })
          .catch((err) => {
            //console.log("program-name-selects2", err);
          });
        },
        getDivision() {
          axios
            .get("get-division/" + this.formFieldsPCDTL.zone_id)
            .then((response) => {
              this.listOfDivision = response.data;
            })
            .catch((err) => {
              console.log("division-name-selects2", err);
            });
        },
        getDistrict() {
          axios
            .get("get-district/" + this.formFieldsPCDTL.division_id)
            .then((response) => {
              this.listOfDistrict = response.data;
            })
            .catch((err) => {
              console.log("district-name-selects2", err);
            });
        },
        getTehsil() {
          axios
            .get("get-tehsil/" + this.formFieldsPCDTL.district_id)
            .then((response) => {
              this.listOfTehsil = response.data;
            })
            .catch((err) => {
              console.log("tehsil-name-selects2", err);
            });
        },
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
          //this.formFieldsModal is refering to the data object
          let aFields = Object.keys(this.formFieldsModal);
          // console.log("aa fields",aFields);
          aFields.forEach(function (field, index) {
            // console.log("field",this.formFieldsModal[field]);
            formData.append(
              field,
              this.formFieldsModal[field] ? this.formFieldsModal[field] : ""
            );
          }, this);
          
          return formData;
        },
        customAppendPCDTLFormData(){
          let formData = new FormData();
          //this.formFieldsPCDTL is refering to the data object
          let aFields = Object.keys(this.formFieldsPCDTL);
          // console.log("aa fields",aFields);
          aFields.forEach(function (field, index) {
            // console.log("field",this.formFieldsPCDTL[field]);
            formData.append(
              field,
              this.formFieldsPCDTL[field] ? this.formFieldsPCDTL[field] : ""
            );
          }, this);
          
          return formData;
        },
        createPCRecord() {
          
          if(!this.scheme_id && !this.editMode){
            Toast.fire({
                icon: "fail",
                title: "A Scheme should be saved before saving this data",
              });
              return false;
          }

          let formData = this.customAppendFormData();
          //this.scheme_name = mixin.getSchemeName();
          
          this.getProvinceName(mixin.province_id);
          

          if(this.editMode){
            formData.append('scheme_idFk',this.$route.params.id);
          }
          else{
            formData.append('scheme_idFk',this.scheme_id);
          }
          formData.append('scheme_name',mixin.sName);
          
          
          
          axios
            .post("schemes-create-pc", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Scheme data saved successfully",
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

            if(this.editMode){
            //   console.log("response",this.pc_values_edit);
            //   this.pc_values.push({ 
            //   scheme_name: mixin.sName, 
            //   level: this.formFieldsModal.pc_level, 
            //   PCDate: this.formFieldsModal.pc_date, 
            //   DocNo: this.formFieldsModal.pc_doc_no, 
            //   Province: this.province_name, 
            //   Status: this.formFieldsModal.pc_status, 
            //   AppCode: this.formFieldsModal.pc_app_code, 
            //   Amount: this.formFieldsModal.pc_amount, 
            //   Auth: this.formFieldsModal.pc_auth, 
            //   Remarks: this.formFieldsModal.pc_remarks, 
            // });
              //this.loadSchemeDetails();

            }

            // if(!this.editMode){

            // }
            // this.pc_values.push({ 
            //   scheme_name: mixin.sName, 
            //   level: this.formFieldsModal.pc_level, 
            //   PCDate: this.formFieldsModal.pc_date, 
            //   DocNo: this.formFieldsModal.pc_doc_no, 
            //   Province: this.province_name, 
            //   Status: this.formFieldsModal.pc_status, 
            //   AppCode: this.formFieldsModal.pc_app_code, 
            //   Amount: this.formFieldsModal.pc_amount, 
            //   Auth: this.formFieldsModal.pc_auth, 
            //   Remarks: this.formFieldsModal.pc_remarks, 
            // });
            
            this.resetFormFields();
            this.hideModal();

        },
        createPCDTLRecord(){

          let formData = this.customAppendPCDTLFormData();

          axios
            .post("pc-dtl-create", formData)
            .then((response) => {
              Toast.fire({
                icon: "success",
                title: "PC DTL record saved successfully",
              });
              this.errors = {};
              this.loadPCDetails();
              this.hideDTLModal();
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });


            
          
          
        },
        getSchemeId(){
          return sform.getSchemeId();
        },
        openModal(id){
          // this.dat
        },
        getProvinceName(province_id) {
          axios
          .get("get-province-name/" + province_id)
          .then((response) => {
            let self = this;
            self.province_name = response.data[0].name;
            self.dummy_text =  "hello";
            console.log("the province name after api", this.province_name);
          })
          .catch((err) => {
            //console.log("program-name-selects2", err);
          });

          
        },
        resetFormFields() {
          this.formFieldsModal = {
            //id: "",
            pc_level: "",
            pc_date: "",
            pc_doc_no: "",
            province_idFk: "",
            pc_status: "",
            pc_app_code: "",
            pc_amount: "",
            pc_auth: "",
            pc_remarks: "",
            pc_insert_term: "",
          };
        },
        resetformFieldsPCDTL() {
          this.formFieldsPCDTL = {
            main_head:"",
            sub_head:"",
            detail_head:"",
            quantity:"",
            unit:"",
            cost:""
            
          };
        },
        hideModal(){
          this.resetFormFields();
          $("#PCModal").modal("hide");
        },
        hideDTLModal(){
          $("#PCDTLModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details/" + id).then((response) => {
            this.pc_values_edit = response.data;
          });
        },
        loadPCDetails(){
          axios.get("get-pc-dtls/").then((response) => {
            this.pc_dtls_values = response.data;
          });
        },
        editForm(id){
          axios.get("get-pc-details/" + id).then((response) => {
            this.formFieldsModal = response.data;
          });

          $("#PCModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-pc-details/" + id)
                .then((response) => {
                  if(response.data.code == 200){
                      Toast.fire({
                      icon: "success",
                      title: response.data.msg,
                    });
                    console.log("here");
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
        getUnits(){
          axios
            .get("get-units")
            .then((response) => {
              this.listUnits = response.data;
            })
            .catch((err) => {
              console.log("identified-by-selects2", err);
          });
        },
        showDTLModal(pc_id){

          axios.get("get-all-scheme-pc-data/" + pc_id).then((response) => {
            console.log("add-pc-dtl", response);
            this.formFieldsPCDTL.province_name = response.data.province.province_name;
            this.formFieldsPCDTL.zone_name = response.data.zone.zone_name;
            this.formFieldsPCDTL.division_name = response.data.division.division_name;
            this.formFieldsPCDTL.district_name = response.data.district.district_name;
            this.formFieldsPCDTL.tehsil_name = response.data.tehsil.tehsil_name;
            this.formFieldsPCDTL.uc = response.data.uc_id;
            this.formFieldsPCDTL.scheme_id = response.data.id;
            this.formFieldsPCDTL.pc_id = pc_id;
            this.formFieldsPCDTL.pc_doc_no = response.data.pc_doc_no;
            this.formFieldsPCDTL.pc_doc_date = response.data.pc_date;
            this.formFieldsPCDTL.pc_amount = response.data.pc_amount;
          });
          this.getUnits();
          this.getMainHead();
          this.resetformFieldsPCDTL();
          this.errors = {};
          $("#PCDTLModal").modal("show");
        },
        getMainHead(){
          axios
          .get("get-main-head")
          .then((response) => {
            this.MainHead = response.data;
            //console.log("is province",this.listOfProvinces);
          })
          .catch((err) => {
            //console.log("program-name-selects2", err);
          });
        },
        MainHeadChanged(){
          this.getSubHead();
        },
        getSubHead(){

          axios
            .get("get-sub-head/"+this.formFieldsPCDTL.main_head)
            .then((response) => {
              this.SubHead = response.data;
            })
            .catch((err) => {
              // console.log("zone-name-selects2", err);
            });

        },
        SubHeadChanged(){
          this.getDetailHead();
        },
        getDetailHead(){
             axios
            .get("get-detail-head/"+this.formFieldsPCDTL.sub_head)
            .then((response) => {
              this.DetailHead = response.data;
            })
            .catch((err) => {
              // console.log("zone-name-selects2", err);
            });
        }
        
  },
  

};
</script>
