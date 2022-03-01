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
                      <th>TS Date</th>
                      <th>Doc No</th>
                      <th>Province</th>
                      <th>Status</th>
                      <th>App Code</th>
                      <th>Amount</th>
                      <th>Auth</th>
                      <th>Remarks</th>
                      <th>Insert Term</th>
                      <th>Add TS Details</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <template v-if="ts_values_edit">
                      <tr v-for="(item, index) in ts_values_edit" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.ts_scheme_idFk ? item.ts_scheme_idFk : 'N/A' }}</td>
                        <td>{{ item.ts_date ? item.ts_date : 'N/A' }}</td>
                        <td>{{ item.ts_doc_no ? item.ts_doc_no : 'N/A' }}</td>
                        <td>{{ item.ts_status ? item.ts_status : 'N/A' }}</td>
                        <td>{{ item.ts_app_code ? item.ts_app_code: 'N/A' }}</td>
                        <td>{{ item.ts_amount ? item.ts_amount :'N/A' }}</td>
                        <td>{{ item.ts_auth ? item.ts_auth :'N/A' }}</td>
                        <td>{{ item.ts_remarks ? item.ts_remarks :'N/A' }}</td>
                        <td>{{ item.ts_insert_term ? item.ts_insert_term :'N/A' }}</td>
                        <td>{{ item.ts_forum_code ? item.ts_forum_code :'N/A' }}</td>
                        <td><button @click="showDTLModal(item.id)" class="btn btn-sm btn-success">Add TS DTL</button></td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>  
                    </template>

                    <!-- <template v-if="ts_values">
                      <tr v-for="(entry, i) in ts_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.TSDate }}</td>
                        <td>{{ entry.DocNo }}</td>
                        <td>{{ entry.Province }}</td>
                        <td>{{ entry.status }}</td>
                        <td>{{ entry.AppCode }}</td>
                        <td>{{ entry.Amount }}</td>
                        <td>{{ entry.Auth }}</td>
                        <td>{{ entry.Remarks }}</td>
                        <td>{{ entry.InsertTerm }}</td>
                      </tr>
                    </template> -->
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
                        <th>TS No</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <template v-if="ts_dtls_values">
                        <tr v-for="(item, index) in ts_dtls_values" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.main_head.infra_desc ? item.main_head.infra_desc : 'N/A' }}</td>
                          <td v-if="item.sub_head">{{ item.sub_head.sub_head_desc ? item.sub_head.sub_head_desc : 'N/A' }}</td>
                          <td v-if="item.detail_head">{{ item.detail_head.detail_head_desc ? item.detail_head.detail_head_desc : 'N/A' }}</td>
                          <td>{{ item.quantity ? item.quantity : 'N/A' }}</td>
                          <td>{{ item.unit ? item.unit: 'N/A' }}</td>
                          <td>{{ item.cost ? item.cost : 'N/A' }}</td>
                          <td>{{ item.ts_idFk ? item.ts_idFk : 'N/A' }}</td>
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
      id="TSModal"
      tabindex="-1"
      aria-labelledby="TSModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TSModalLabel">Add TS Detail</h5>
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
                          <div class="col-md-4 mb-3">
                            <label>Doc No</label>
                            <input
                            v-model="formFieldsTSModal.ts_doc_no"
                            type="text"
                            class="form-control"
                            placeholder="Enter Doc No"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Date</label>
                            <input
                            v-model="formFieldsTSModal.ts_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Amount</label>
                            <input
                            v-model="formFieldsTSModal.ts_amount"
                              type="number"
                              class="form-control"
                              placeholder="Enter Amount"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <select2
                              v-model="formFieldsTSModal.ts_status"
                              placeholder="Select Status"
                              :options="approvalStatus"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>App Code</label>
                            <input
                            v-model="formFieldsTSModal.ts_app_code"
                              type="text"
                              class="form-control"
                              placeholder="Enter App Code"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Auth</label>
                            <input
                            v-model="formFieldsTSModal.ts_auth"
                              type="text"
                              class="form-control"
                              placeholder="Enter Auth"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Remarks</label>
                            <input
                            v-model="formFieldsTSModal.ts_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Remarks"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsTSModal.ts_insert_term"
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
            <button type="button" @click="createTSRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal TS DTL -->

    <div
      class="modal fade"
      id="TSDTLModal"
      tabindex="-1"
      aria-labelledby="TSDTLModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TSDTLModalLabel">Add TS DTL</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetformFieldsTSDTL()"
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
                              v-model="this.formFieldsTSDTL.province_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Zone</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.zone_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Division</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.division_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>District</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.district_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Tehsil</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.tehsil_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>UC</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.uc"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Scheme No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.scheme_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>TS No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.ts_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>TS Doc No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.ts_doc_no"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>TS Amount</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsTSDTL.ts_amount"
                              disabled
                            />
                          </div>
                          
                        </div>

                        <div class="row">
                          <h5>Planning Commission Details</h5>
                          
                          <div class="col-md-3 mb-3">
                            <label>Main Head</label>
                            <select2
                              v-model="formFieldsTSDTL.main_head"
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
                              v-model="formFieldsTSDTL.sub_head"
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
                              v-model="formFieldsTSDTL.detail_head"
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
                              v-model="formFieldsTSDTL.quantity"
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
                              v-model="formFieldsTSDTL.unit"
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
                              v-model="formFieldsTSDTL.cost"
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
              @click="hideModal"
            >
              Close
            </button>
            <button type="button" @click="createTSDTLRecord" class="btn btn-primary">Save changes</button>
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
      ts_values:[],
      ts_dtls_values:[],
      ts_values_edit:{},
      tsdtlarr:{},
      approvalStatus:[],
      MainHead: [],
      SubHead: [],
      DetailHead: [],
      listUnits:[],
      formFieldsTSDTL:{
        province_name:"",
        zone_name: "",
        division_name: "",
        district_name: "",
        tehsil_name: "",
        uc: "",
        scheme_id: "",
        ts_id: "",
        ts_doc_no: "",
        ts_doc_date: "",
        ts_amount: "",
        main_head:"",
        sub_head:"",
        detail_head:"",
        quantity:"",
        unit:"",
        cost:"",
      },
      formFieldsTSModal: {
        province_idFk: "",
        ts_level: "",
        ts_date: "",
        ts_doc_no: "",
        ts_status: "",
        ts_app_code: "",
        ts_amount: "",
        ts_auth: "",
        ts_remarks: "",
        ts_insert_term: "",
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
      this.loadSchemeDetails();
      this.loadTSDetails();
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
        let aFields = Object.keys(this.formFieldsTSModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsTSModal[field] ? this.formFieldsTSModal[field] : ""
            );
        }, this);
        return formData;
        },
        customAppendPCDTLFormData(){
          let formData = new FormData();
          //this.formFieldsTSDTL is refering to the data object
          let aFields = Object.keys(this.formFieldsTSDTL);
          // console.log("aa fields",aFields);
          aFields.forEach(function (field, index) {
            // console.log("field",this.formFieldsTSDTL[field]);
            formData.append(
              field,
              this.formFieldsTSDTL[field] ? this.formFieldsTSDTL[field] : ""
            );
          }, this);
          
          return formData;
        },
        createTSRecord() {
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
          .post("schemes-create-ts", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "TS data saved successfully",
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

          this.ts_values.push({ 
              scheme_name: mixin.sName,  
              TSDate: this.formFieldsTSModal.ts_date, 
              DocNo: this.formFieldsTSModal.ts_doc_no, 
              status: this.formFieldsTSModal.ts_status, 
              Province: this.province_name,
              AppCode: this.formFieldsTSModal.ts_app_code, 
              Amount: this.formFieldsTSModal.ts_amount, 
              Auth: this.formFieldsTSModal.ts_auth, 
              Remarks: this.formFieldsTSModal.ts_remarks, 
              InsertTerm: this.formFieldsTSModal.ts_insert_term, 
              ForumCode: this.formFieldsTSModal.ts_forum_code, 
            });
            
            this.resetFormFields();
            this.hideModal();

        },
        createTSDTLRecord(){

          let formData = this.customAppendPCDTLFormData();

          axios
            .post("ts-dtl-create", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "TS DTL record saved successfully",
              });
              this.errors = {};
              this.loadTSDetails();
              this.hideDTLModal();
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });

            
         
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
          this.formFieldsTSModal = {
            ts_level:"",
            ts_date:"",
            ts_doc_no:"",
            ts_status:"",
            ts_app_code:"",
            ts_amount:"",
            ts_auth:"",
            ts_remarks:"",
            ts_insert_term:"",
          };
        },
        resetformFieldsTSDTL() {
          this.formFieldsTSDTL = {
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
          $("#TSModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-ts/" + id).then((response) => {
            this.ts_values_edit = response.data;
          });
        },
        loadTSDetails(){
          axios.get("get-ts-dtls/").then((response) => {
            this.ts_dtls_values = response.data;
          });
        },
        editForm(id){
          axios.get("get-ts-details/" + id).then((response) => {
            this.formFieldsTSModal = response.data;
          });

          $("#TSModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-ts-details/" + id)
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
        showDTLModal(ts_id){

          axios.get("get-all-scheme-ts-data/" + ts_id).then((response) => {
            this.formFieldsTSDTL.province_name = response.data.province.province_name;
            this.formFieldsTSDTL.zone_name = response.data.zone.zone_name;
            this.formFieldsTSDTL.division_name = response.data.division.division_name;
            this.formFieldsTSDTL.district_name = response.data.district.district_name;
            this.formFieldsTSDTL.tehsil_name = response.data.tehsil.tehsil_name;
            this.formFieldsTSDTL.uc = response.data.uc_id;
            this.formFieldsTSDTL.scheme_id = response.data.id;
            this.formFieldsTSDTL.ts_id = ts_id;
            this.formFieldsTSDTL.ts_doc_no = response.data.ts_doc_no;
            this.formFieldsTSDTL.ts_amount = response.data.ts_amount;
          });

          this.getUnits();
          this.getMainHead();
          this.resetformFieldsTSDTL();
          this.errors = {};
          $("#TSDTLModal").modal("show");
        },
        hideDTLModal(){
          $("#TSDTLModal").modal("hide");
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
            .get("get-sub-head/"+this.formFieldsTSDTL.main_head)
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
            .get("get-detail-head/"+this.formFieldsTSDTL.sub_head)
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
