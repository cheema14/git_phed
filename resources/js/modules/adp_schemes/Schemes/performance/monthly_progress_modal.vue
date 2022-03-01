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
                      <th>Month Code</th>
                      <th>Year Code</th>
                      <th>Financial Progress</th>
                      <th>Remarks</th>
                      <th>SE ENT By</th>
                      <th>CE ENT By</th>
                      <th>Hist Flag</th>
                      <th>Insert Term</th>
                      <th>Add MP Details</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <template v-if="mp_values_edit">
                      <tr v-for="(item, i) in mp_values_edit" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ item.scheme.scheme_name ? item.scheme.scheme_name : 'N/A'}}</td>
                        <td>{{ item.mnth_prog_month_code }}</td>
                        <td>{{ item.mnth_prog_year_code }}</td>
                        <td>{{ item.mnth_prog_financial_progress }}</td>
                        <td>{{ item.mnth_prog_remarks }}</td>
                        <td>{{ item.mnth_prog_se_ent_by }}</td>
                        <td>{{ item.mnth_prog_ce_ent_by }}</td>
                        <td>{{ item.mnth_prog_hist_flag }}</td>
                        <td>{{ item.mnth_prog_insert_term }}</td>
                        <td><button @click="showDTLModal(item.id)" class="btn btn-sm btn-success">Add MP DTL</button></td>
                        <td style="display: inline-block;"><span @click="editForm(item.id)"><i class="fa fa-edit"></i></span><span @click="deleteEntry(item.id)"><i class="fa fa-minus-circle"></i></span></td>
                      </tr>
                    </template>
                    
                    <!-- <template v-if="mp_values">
                      <tr v-for="(entry, i) in mp_values" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ entry.scheme_name}}</td>
                        <td>{{ entry.MonthCode }}</td>
                        <td>{{ entry.YrCode }}</td>
                        <td>{{ entry.FinancialProgress }}</td>
                        <td>{{ entry.MPSubmit }}</td>
                        <td>{{ entry.CESubmit }}</td>
                        <td>{{ entry.Remarks }}</td>
                        <td>{{ entry.SEentBy }}</td>
                        <td>{{ entry.CEentBy }}</td>
                        <td>{{ entry.HistFlag }}</td>
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
                        <th>PC No</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <template v-if="mp_dtls_values">
                        <tr v-for="(item, index) in mp_dtls_values" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.main_head.infra_desc ? item.main_head.infra_desc : 'N/A' }}</td>
                          <td v-if="item.sub_head">{{ item.sub_head.sub_head_desc ? item.sub_head.sub_head_desc : 'N/A' }}</td>
                          <td v-if="item.detail_head">{{ item.detail_head.detail_head_desc ? item.detail_head.detail_head_desc : 'N/A' }}</td>
                          <td>{{ item.quantity ? item.quantity : 'N/A' }}</td>
                          <td>{{ item.unit ? item.unit: 'N/A' }}</td>
                          <td>{{ item.cost ? item.cost: 'N/A' }}</td>
                          <td>{{ item.mp_idFk }}</td>
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
      id="MonthlyProgressModal"
      tabindex="-1"
      aria-labelledby="MonthlyProgressModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="MonthlyProgressModalLabel">Add Monthly Progress Detail</h5>
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
                          <!-- <div class="col-md-4 mb-3">
                            <label>ADP No</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_month_code"
                            type="text"
                            class="form-control"
                            placeholder="Enter ADP No"
                            />
                          </div> -->
                          <div class="col-md-4 mb-3">
                            <label>Year Code</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_year_code"
                              type="text"
                              class="form-control"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Month Code</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_phhysical_progress"
                              type="text"
                              class="form-control"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label> Financial Progress Upto Month</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_financial_progress"
                              type="text"
                              class="form-control"
                              placeholder="Enter Financial Progress"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Physical Progress</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_remarks"
                              type="text"
                              class="form-control"
                              placeholder="Enter Physical Progress"
                            />
                          </div>
                          <!-- <div class="col-md-4 mb-3">
                            <label> SE Submit</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_last_updated_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter SE Submit"
                            />
                          </div> -->
                          <div class="col-md-4 mb-3">
                            <label>Fin Year</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_fin_year"
                              type="text"
                              class="form-control"
                              placeholder="Enter Fin Year"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Fin Prog</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_fin_prog"
                              type="text"
                              class="form-control"
                              placeholder="Enter Fin Prog"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Submit</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_submit"
                              type="text"
                              class="form-control"
                              placeholder="Enter Submit"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Financial Upto</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_financial_upto"
                              type="text"
                              class="form-control"
                              placeholder="Enter Financial Upto"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>SE Ent By</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_se_ent_by"
                              type="text"
                              class="form-control"
                              placeholder="Enter SE Ent By"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>SE Ent Date</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_se_ent_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter  SE Ent Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>SE Ent Term</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_se_ent_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter SE Ent Term"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>CE Ent By</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_ce_ent_by"
                              type="text"
                              class="form-control"
                              placeholder="Enter CE Ent By"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>CE Ent Date</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_ce_ent_date"
                              type="date"
                              class="form-control"
                              placeholder="Enter CE Ent Date"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>CE Ent Term</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_ce_ent_term"
                              type="text"
                              class="form-control"
                              placeholder="Enter CE Ent Term"
                            />
                          </div>
                          <!-- <div class="col-md-4 mb-3">
                            <label>CE Submit</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_ce_submit"
                              type="text"
                              class="form-control"
                              placeholder="Enter CE Submit"
                            />
                          </div> -->
                          <div class="col-md-4 mb-3">
                            <label>Hist Flag</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_hist_flag"
                              type="text"
                              class="form-control"
                              placeholder="Enter Hist Flag"
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Insert Term</label>
                            <input
                            v-model="formFieldsMPModal.mnth_prog_insert_term"
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
            <button type="button" @click="createMPRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


     <!-- Modal PC DTL -->

    <div
      class="modal fade"
      id="MPDTLModal"
      tabindex="-1"
      aria-labelledby="MPDTLModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="MPDTLModalLabel">Add MP DTL</h5>
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
                              v-model="this.formFieldsMPDTL.province_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Zone</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.zone_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Division</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.division_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>District</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.district_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Tehsil</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.tehsil_name"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>UC</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.uc"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Scheme No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.scheme_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>MP No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.mp_id"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>ADP No</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.mp_adp_no"
                              disabled
                            />
                          </div>
                          <div class="col-md-4 mb-3">
                            <label>Financial Progress</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="this.formFieldsMPDTL.mp_financial_progress"
                              disabled
                            />
                          </div>
                          
                        </div>

                        <div class="row">
                          <h5>Planning Commission Details</h5>
                          
                          <div class="col-md-3 mb-3">
                            <label>Main Head</label>
                            <select2
                              v-model="formFieldsMPDTL.main_head"
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
                              v-model="formFieldsMPDTL.sub_head"
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
                              v-model="formFieldsMPDTL.detail_head"
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
                              v-model="formFieldsMPDTL.quantity"
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
                              v-model="formFieldsMPDTL.unit"
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
                              v-model="formFieldsMPDTL.cost"
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
            <button type="button" @click="createMPDTLRecord" class="btn btn-primary">Save changes</button>
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
      mp_values:[],
      mp_dtls_values:[],
      mp_values_edit:{},
      mpdtlarr:{},
      MainHead: [],
      SubHead: [],
      DetailHead: [],
      listUnits:[],
      formFieldsMPDTL:{
        province_name:"",
        zone_name: "",
        division_name: "",
        district_name: "",
        tehsil_name: "",
        uc: "",
        scheme_id: "",
        mp_id: "",
        mp_adp_no: "",
        mp_doc_date: "",
        mp_financial_progress: "",
        main_head:"",
        sub_head:"",
        detail_head:"",
        quantity:"",
        unit:"",
        cost:"",
      },
      formFieldsMPModal: {
        mnth_month_code: "",
        mnth_year_code: "",
        mnth_phhysical_progress: "",
        mnth_financial_progress: "",
        mnth_remarks: "",
        mnth_last_updated_term: "",
        mnth_fin_year: "",
        mnth_fin_prog: "",
        mnth_submit: "",
        mnth_financial_upto: "",
        mnth_se_ent_by: "",
        mnth_se_ent_date: "",
        mnth_se_ent_term: "",
        mnth_ce_ent_by: "",
        mnth_ce_ent_date: "",
        mnth_ce_ent_term: "",
        mnth_ce_submit: "",
        mnth_hist_flag: "",
        mnth_insert_term: "",
      },
    };
  },
  mounted() {
    
      this.getProvince();    
      this.scheme_id = mixin.getSchemeId();
      this.loadSchemeDetails();
      this.loadMPDetails();
      this.formFieldsMPModal.mnth_prog_year_code = (new Date()).getFullYear();
      this.formFieldsMPModal.mnth_prog_phhysical_progress = ("0" + ((new Date()).getMonth() + 1)).slice(-2);
      this.formFieldsMPModal.mnth_prog_month_code = ("0" + ((new Date()).getMonth() + 1)).slice(-2);
      if(this.$route.params.id){
        this.editMode = true;
      }
      
      
  },
  methods: {

        customAppendFormData() {
        let formData = new FormData();
        //this.formFields is refering to the data object
        let aFields = Object.keys(this.formFieldsMPModal);
        aFields.forEach(function (field, index) {
            formData.append(
            field,
            this.formFieldsMPModal[field] ? this.formFieldsMPModal[field] : ""
            );
        }, this);
        return formData;
        },
        customAppendMPDTLFormData(){
          let formData = new FormData();
          //this.formFieldsMPDTL is refering to the data object
          let aFields = Object.keys(this.formFieldsMPDTL);
          // console.log("aa fields",aFields);
          aFields.forEach(function (field, index) {
            // console.log("field",this.formFieldsMPDTL[field]);
            formData.append(
              field,
              this.formFieldsMPDTL[field] ? this.formFieldsMPDTL[field] : ""
            );
          }, this);
          
          return formData;
        },
        createMPRecord() {
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
          .post("schemes-create-mp", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Monthly Progress data saved successfully",
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

          this.mp_values.push({ 
              scheme_name: mixin.sName,  
              MonthCode: this.formFieldsMPModal.mp_month_code, 
              YrCode: this.formFieldsMPModal.mp_year_code, 
              FinancialProgress: this.formFieldsMPModal.mp_financial_progress, 
              MPSubmit: this.formFieldsMPModal.mp_submit, 
              CESubmit: this.formFieldsMPModal.mp_ce_submit,
              Remarks: this.formFieldsMPModal.mp_remarks, 
              SEentBy: this.formFieldsMPModal.mp_se_ent_by, 
              CEentBy: this.formFieldsMPModal.mp_ce_ent_by, 
              HistFlag: this.formFieldsMPModal.mp_hist_flag, 
              InsertTerm: this.formFieldsMPModal.rfd_hist_flag,  
            });
            
            this.resetFormFields();
            this.hideModal();

        },
        createMPDTLRecord(){

          let formData = this.customAppendMPDTLFormData();

          axios
            .post("mp-dtl-create", formData)
            .then((response) => {
              Toast.fire({
                icon: "success",
                title: "MP DTL record saved successfully",
              });
              this.errors = {};
              this.loadMPDetails();
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
          this.formFieldsMPModal = {
            mnth_prog_month_code:"",
            mnth_prog_year_code:"",
            mnth_prog_phhysical_progress:"",
            mnth_prog_financial_progress:"",
            mnth_prog_remarks:"",
            mnth_prog_last_updated_term:"",
            mnth_prog_fin_year:"",
            mnth_prog_fin_prog:"",
            mnth_prog_submit:"",
            mnth_prog_financial_upto:"",
            mnth_prog_se_ent_by:"",
            mnth_prog_se_ent_date:"",
            mnth_prog_se_ent_term:"",
            mnth_prog_ce_ent_by:"",
            mnth_prog_ce_ent_date:"",
            mnth_prog_ce_ent_term:"",
            mnth_prog_ce_submit:"",
            mnth_prog_hist_flag:"",
            mnth_prog_insert_term:"",
          };
        },
        resetformFieldsMPDTL() {
          this.formFieldsMPDTL = {
            main_head:"",
            sub_head:"",
            detail_head:"",
            quantity:"",
            unit:"",
            cost:""
            
          };
        },
        hideModal(){
          $("#MonthlyProgressModal").modal("hide");
        },
        loadSchemeDetails(id=this.$route.params.id){
          axios.get("get-scheme-sub-details-mp/" + id).then((response) => {
            this.mp_values_edit = response.data;
          });
        },
        loadMPDetails(){
          axios.get("get-mp-dtls/").then((response) => {
            this.mp_dtls_values = response.data;
          });
        },
        editForm(id){
          axios.get("get-mp-details/" + id).then((response) => {
            console.log("the edit response",response);
            this.formFieldsMPModal = response.data;
          });

          $("#MonthlyProgressModal").modal("show");
        },
        deleteEntry(id){
          
          if(confirm("Do you want to delete this item?")){
                axios
                .get("delete-mp-details/" + id)
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
        showDTLModal(mp_id){

          axios.get("get-all-scheme-mp-data/" + mp_id).then((response) => {
            this.formFieldsMPDTL.province_name = response.data.province.province_name;
            this.formFieldsMPDTL.zone_name = response.data.zone.zone_name;
            this.formFieldsMPDTL.division_name = response.data.division.division_name;
            this.formFieldsMPDTL.district_name = response.data.district.district_name;
            this.formFieldsMPDTL.tehsil_name = response.data.tehsil.tehsil_name;
            this.formFieldsMPDTL.uc = response.data.uc_id;
            this.formFieldsMPDTL.scheme_id = response.data.id;
            this.formFieldsMPDTL.mp_id = mp_id;
            this.formFieldsMPDTL.mp_adp_no = response.data.mnth_prog_month_code;
            this.formFieldsMPDTL.mp_financial_progress = response.data.mnth_prog_financial_prog_upto;
          });
          this.getUnits();
          this.getMainHead();
          // this.resetformFieldsMPDTL();
          $("#MPDTLModal").modal("show");
        },
        hideDTLModal(){
          $("#MPDTLModal").modal("hide");
        },
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
            .get("get-sub-head/"+this.formFieldsMPDTL.main_head)
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
            .get("get-detail-head/"+this.formFieldsMPDTL.sub_head)
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
