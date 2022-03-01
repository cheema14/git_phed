<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="ce-tab"
            data-bs-toggle="tab"
            data-bs-target="#ce"
            type="button"
            role="tab"
            ref="executing_tab"
            aria-controls="ce"
            aria-selected="true"
            @click="performance_tabs_click('ce')"
          >
            Chief Engineer
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="se-tab"
            data-bs-toggle="tab"
            data-bs-target="#se"
            type="button"
            role="tab"
            aria-controls="se"
            aria-selected="false"
            @click="performance_tabs_click('se')"
          >
            Superintendent Engineer
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="ee-tab"
            data-bs-toggle="tab"
            data-bs-target="#ee"
            type="button"
            role="tab"
            aria-controls="ee"
            aria-selected="false"
            @click="performance_tabs_click('ee')"
          >
            Executive Engineer
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="sdo-tab"
            data-bs-toggle="tab"
            data-bs-target="#sdo"
            type="button"
            role="tab"
            aria-controls="sdo"
            aria-selected="true"
            @click="performance_tabs_click('sdo')"
          >
            SDO Engineer
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="sub-tab"
            data-bs-toggle="tab"
            data-bs-target="#sub"
            type="button"
            role="tab"
            aria-controls="sub"
            aria-selected="false"
            @click="performance_tabs_click('sub')"
          >
            Sub Engineer
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <!-- CE Listing -->
        <div
          class="tab-pane fade show active"
          id="ce"
          role="tabpanel"
          aria-labelledby="ce-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfCE">
                      <tr v-for="(item, index) in ListOfCE" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.name ? item.name : 'N/A' }}</td>
                        <td>{{ item.designation ? item.designation : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editCE(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- CE Listing -->

        <!-- SE Listing -->
        <div
          class="tab-pane fade"
          id="se"
          role="tabpanel"
          aria-labelledby="se-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Chief Engineer</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSE">
                      <tr v-for="(item, index) in ListOfSE" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.chief_engineer ? item.chief_engineer.name : 'N/A' }}</td>
                        <td>{{ item.name ? item.name : 'N/A' }}</td>
                        <td>{{ item.designation ? item.designation : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editSE(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- SE Listing -->

        <!-- EE Listing -->
        <div
          class="tab-pane fade"
          id="ee"
          role="tabpanel"
          aria-labelledby="ee-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Chief Engineer</th>
                      <th>Supr Engineer</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfEE">
                      <tr v-for="(item, index) in ListOfEE" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.chief_engineer ? item.chief_engineer.name : 'N/A' }}</td>
                        <td>{{ item.supr_engineer ? item.supr_engineer.name : 'N/A' }}</td>
                        <td>{{ item.name ? item.name : 'N/A' }}</td>
                        <td>{{ item.designation ? item.designation : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editEE(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- EE Listing -->

        <!-- SDO Listing -->
        <div
          class="tab-pane fade"
          id="sdo"
          role="tabpanel"
          aria-labelledby="sdo-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Chief Engineer</th>
                      <th>Supr Engineer</th>
                      <th>Exe Engineer</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSDO">
                      <tr v-for="(item, index) in ListOfSDO" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.chief_engineer ? item.chief_engineer.name : 'N/A' }}</td>
                        <td>{{ item.supr_engineer ? item.supr_engineer.name : 'N/A' }}</td>
                        <td>{{ item.exe_engineer ? item.exe_engineer.name : 'N/A' }}</td>
                        <td>{{ item.name ? item.name : 'N/A' }}</td>
                        <td>{{ item.designation ? item.designation : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editSDO(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- SDO Listing -->

        <!-- Sub Engineer Listing -->
        <div
          class="tab-pane fade"
          id="sub"
          role="tabpanel"
          aria-labelledby="sub-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Chief Engineer</th>
                      <th>Supr Engineer</th>
                      <th>Exe Engineer</th>
                      <th>SDO</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="listofSub">
                      <tr v-for="(item, index) in listofSub" :key="index">
                        <td>{{ ++index }}</td>
                         <td>{{ item.chief_engineer ? item.chief_engineer.name : 'N/A' }}</td>
                        <td>{{ item.supr_engineer ? item.supr_engineer.name : 'N/A' }}</td>
                        <td>{{ item.exe_engineer ? item.exe_engineer.name : 'N/A' }}</td>
                        <td>{{ item.sdo_engineer ? item.sdo_engineer.name : 'N/A' }}</td>
                        <td>{{ item.name ? item.name : 'N/A' }}</td>
                        <td>{{ item.designation ? item.designation : 'N/A' }}</td>
                        <td style="display: inline-block;"><span @click="editSub(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Sub Engineer Listing -->
      </div>
      <!-- Tabs content -->
    </div>


    <!-- Modal for adding CE -->

      <div
        class="modal fade"
        id="ceModal"
        tabindex="-1"
        aria-labelledby="ceModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ceModalLabel">Add CE Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetCEFormFields"
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
                              <label>Province</label>
                              <select2
                              v-model="formFieldsCEModal.province_idFk"
                              placeholder="Select Province"
                              @change="provinceChanged($event)"
                              :options="listOfProvince"
                              />
                              <div
                              v-if="errors && errors.province_idFk"
                              class="text-danger"
                              >
                              {{ errors.province_idFk[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Zone</label>
                              <select2
                                v-model="formFieldsCEModal.zone_idFk"
                                placeholder="Select Zone"
                                :options="listOfZone"
                              />
                              <div
                                v-if="errors && errors.zone_idFk"
                                class="text-danger"
                              >
                                {{ errors.zone_idFk[0] }}
                              </div>
                            </div> 

                            <div class="col-md-4 mb-3">
                              <label>CE Name</label>
                              <input
                              v-model="formFieldsCEModal.name"
                                type="text"
                                class="form-control"
                                placeholder="Enter CE Name"
                              />

                              <div
                                  v-if="errors && errors.name"
                                  class="text-danger"
                                  >
                                  {{ errors.name[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>CE Designation</label>
                              <input
                              v-model="formFieldsCEModal.designation"
                                type="text"
                                class="form-control"
                                placeholder="Enter CE Name"
                              />

                              <div
                                  v-if="errors && errors.designation"
                                  class="text-danger"
                                  >
                                  {{ errors.designation[0] }}
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
              <button type="button" @click="createCERecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding CE -->

    <!-- Modal for adding SE -->
    
      <div
        class="modal fade"
        id="seModal"
        tabindex="-1"
        aria-labelledby="seModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="seModalLabel">Add SE Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSEFormFields"
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
                              <label>Province</label>
                              <select2
                              v-model="formFieldsSEModal.province_idFk"
                              placeholder="Select Province"
                              @change="provinceChanged($event)"
                              :options="listOfProvince"
                              />
                              <div
                              v-if="errors && errors.province_idFk"
                              class="text-danger"
                              >
                              {{ errors.province_idFk[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Zone</label>
                              <select2
                                v-model="formFieldsSEModal.zone_idFk"
                                placeholder="Select Zone"
                                @change="zoneChanged($event)"
                                :options="listOfZone"
                              />
                              <div
                                v-if="errors && errors.zone_idFk"
                                class="text-danger"
                              >
                                {{ errors.zone_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Division</label>
                                <select2
                                  v-model="formFieldsSEModal.division_idFk"
                                  placeholder="Select Division"
                                  :options="listOfDivision"
                                />
                                <div
                                  v-if="errors && errors.division_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.division_idFk[0] }}
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label>Chief Engineers</label>
                                <select2
                                  v-model="formFieldsSEModal.ce_idFk"
                                  placeholder="Select Chief Engineer"
                                  :options="listOfCEngineers"
                                />
                                <div
                                  v-if="errors && errors.ce_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.ce_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label>SE Name</label>
                              <input
                              v-model="formFieldsSEModal.name"
                                type="text"
                                class="form-control"
                                placeholder="Enter CE Name"
                              />

                              <div
                                  v-if="errors && errors.name"
                                  class="text-danger"
                                  >
                                  {{ errors.name[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Designation</label>
                              <input
                              v-model="formFieldsSEModal.designation"
                                type="text"
                                class="form-control"
                                placeholder="Enter SE Designation"
                              />

                              <div
                                  v-if="errors && errors.designation"
                                  class="text-danger"
                                  >
                                  {{ errors.designation[0] }}
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
              <button type="button" @click="createSERecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding SE -->
    
    <!-- Modal for adding EE -->

      <div
        class="modal fade"
        id="eeModal"
        tabindex="-1"
        aria-labelledby="eeModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eeModalLabel">Add EE Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetEEFormFields"
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
                              <label>Province</label>
                              <select2
                              v-model="formFieldsEEModal.province_idFk"
                              placeholder="Select Province"
                              @change="provinceChanged($event)"
                              :options="listOfProvince"
                              />
                              <div
                              v-if="errors && errors.province_idFk"
                              class="text-danger"
                              >
                              {{ errors.province_idFk[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Zone</label>
                              <select2
                                v-model="formFieldsEEModal.zone_idFk"
                                placeholder="Select Zone"
                                @change="zoneChanged($event)"
                                :options="listOfZone"
                              />
                              <div
                                v-if="errors && errors.zone_idFk"
                                class="text-danger"
                              >
                                {{ errors.zone_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Division</label>
                                <select2
                                  v-model="formFieldsEEModal.division_idFk"
                                  placeholder="Select Division"
                                  @change="divisionChanged($event)"
                                  :options="listOfDivision"
                                />
                                <div
                                  v-if="errors && errors.division_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.division_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>District</label>
                                <select2
                                v-model="formFieldsEEModal.district_idFk"
                                placeholder="Select District"
                                :options="listOfDistrict"
                                />
                                <div
                                v-if="errors && errors.district_idFk"
                                class="text-danger"
                                >
                                {{ errors.district_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Chief Engineers</label>
                                <select2
                                  v-model="formFieldsEEModal.chief_engineer_idFk"
                                  placeholder="Select Chief Engineer"
                                  :options="listOfCEngineers"
                                />
                                <div
                                  v-if="errors && errors.chief_engineer_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.chief_engineer_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Supr Engineers</label>
                                <select2
                                  v-model="formFieldsEEModal.supr_engineer_idFk"
                                  placeholder="Select Supr Engineer"
                                  :options="listOfSEngineers"
                                />
                                <div
                                  v-if="errors && errors.supr_engineer_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.supr_engineer_idFk[0] }}
                                </div>
                            </div>
                    

                            <div class="col-md-4 mb-3">
                              <label>SE Name</label>
                              <input
                              v-model="formFieldsEEModal.name"
                                type="text"
                                class="form-control"
                                placeholder="Enter CE Name"
                              />

                              <div
                                  v-if="errors && errors.name"
                                  class="text-danger"
                                  >
                                  {{ errors.name[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Designation</label>
                              <input
                              v-model="formFieldsEEModal.designation"
                                type="text"
                                class="form-control"
                                placeholder="Enter SE Designation"
                              />

                              <div
                                  v-if="errors && errors.designation"
                                  class="text-danger"
                                  >
                                  {{ errors.designation[0] }}
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
              <button type="button" @click="createEERecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
        
    <!-- Modal for adding EE -->
    
    <!-- Modal for adding SDO -->

      <div
        class="modal fade"
        id="sdoModal"
        tabindex="-1"
        aria-labelledby="sdoModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sdoModalLabel">Add SDO Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSDOFormFields"
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
                              <label>Province</label>
                              <select2
                              v-model="formFieldsSDOModal.province_idFk"
                              placeholder="Select Province"
                              @change="provinceChanged($event)"
                              :options="listOfProvince"
                              />
                              <div
                              v-if="errors && errors.province_idFk"
                              class="text-danger"
                              >
                              {{ errors.province_idFk[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Zone</label>
                              <select2
                                v-model="formFieldsSDOModal.zone_idFk"
                                placeholder="Select Zone"
                                @change="zoneChanged($event)"
                                :options="listOfZone"
                              />
                              <div
                                v-if="errors && errors.zone_idFk"
                                class="text-danger"
                              >
                                {{ errors.zone_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Division</label>
                                <select2
                                  v-model="formFieldsSDOModal.division_idFk"
                                  placeholder="Select Division"
                                  @change="divisionChanged($event)"
                                  :options="listOfDivision"
                                />
                                <div
                                  v-if="errors && errors.division_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.division_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>District</label>
                                <select2
                                v-model="formFieldsSDOModal.district_idFk"
                                placeholder="Select District"
                                :options="listOfDistrict"
                                @change="districtChanged($event)"
                                />
                                <div
                                v-if="errors && errors.district_idFk"
                                class="text-danger"
                                >
                                {{ errors.district_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Tehsil</label>
                                <select2
                                v-model="formFieldsSDOModal.tehsil_idFk"
                                placeholder="Select Tehsil"
                                :options="listOfTehsil"
                                />
                                <div
                                v-if="errors && errors.tehsil_idFk"
                                class="text-danger"
                                >
                                {{ errors.tehsil_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Chief Engineers</label>
                                <select2
                                  v-model="formFieldsSDOModal.ce_idFk"
                                  placeholder="Select Chief Engineer"
                                  :options="listOfCEngineers"
                                />
                                <div
                                  v-if="errors && errors.ce_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.ce_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Supr Engineers</label>
                                <select2
                                  v-model="formFieldsSDOModal.se_idFk"
                                  placeholder="Select Supr Engineer"
                                  :options="listOfSEngineers"
                                />
                                <div
                                  v-if="errors && errors.se_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.se_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>EE Engineers</label>
                                <select2
                                  v-model="formFieldsSDOModal.ee_idFk"
                                  placeholder="Select EE Engineer"
                                  :options="listOfEEngineers"
                                />
                                <div
                                  v-if="errors && errors.ee_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.ee_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label>SE Name</label>
                              <input
                              v-model="formFieldsSDOModal.name"
                                type="text"
                                class="form-control"
                                placeholder="Enter CE Name"
                              />

                              <div
                                  v-if="errors && errors.name"
                                  class="text-danger"
                                  >
                                  {{ errors.name[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Designation</label>
                              <input
                              v-model="formFieldsSDOModal.designation"
                                type="text"
                                class="form-control"
                                placeholder="Enter SE Designation"
                              />

                              <div
                                  v-if="errors && errors.designation"
                                  class="text-danger"
                                  >
                                  {{ errors.designation[0] }}
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
              <button type="button" @click="createSDORecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding SDO -->
    
    <!-- Modal for adding Sub -->

       <div
        class="modal fade"
        id="subModal"
        tabindex="-1"
        aria-labelledby="subModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subModalLabel">Add Sub Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSubFormFields"
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
                              <label>Province</label>
                              <select2
                              v-model="formFieldsSubModal.province_idFk"
                              placeholder="Select Province"
                              @change="provinceChanged($event)"
                              :options="listOfProvince"
                              />
                              <div
                              v-if="errors && errors.province_idFk"
                              class="text-danger"
                              >
                              {{ errors.province_idFk[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Zone</label>
                              <select2
                                v-model="formFieldsSubModal.zone_idFk"
                                placeholder="Select Zone"
                                @change="zoneChanged($event)"
                                :options="listOfZone"
                              />
                              <div
                                v-if="errors && errors.zone_idFk"
                                class="text-danger"
                              >
                                {{ errors.zone_idFk[0] }}
                              </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Division</label>
                                <select2
                                  v-model="formFieldsSubModal.division_idFk"
                                  placeholder="Select Division"
                                  @change="divisionChanged($event)"
                                  :options="listOfDivision"
                                />
                                <div
                                  v-if="errors && errors.division_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.division_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>District</label>
                                <select2
                                v-model="formFieldsSubModal.district_idFk"
                                placeholder="Select District"
                                :options="listOfDistrict"
                                @change="districtChanged($event)"
                                />
                                <div
                                v-if="errors && errors.district_idFk"
                                class="text-danger"
                                >
                                {{ errors.district_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Tehsil</label>
                                <select2
                                v-model="formFieldsSubModal.tehsil_idFk"
                                placeholder="Select Tehsil"
                                :options="listOfTehsil"
                                @change="tehsilChanged($event)"
                                />
                                <div
                                v-if="errors && errors.tehsil_idFk"
                                class="text-danger"
                                >
                                {{ errors.tehsil_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Chief Engineers</label>
                                <select2
                                  v-model="formFieldsSubModal.ce_idFk"
                                  placeholder="Select Chief Engineer"
                                  :options="listOfCEngineers"
                                />
                                <div
                                  v-if="errors && errors.ce_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.ce_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Supr Engineers</label>
                                <select2
                                  v-model="formFieldsSubModal.se_idFk"
                                  placeholder="Select Supr Engineer"
                                  :options="listOfSEngineers"
                                />
                                <div
                                  v-if="errors && errors.se_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.se_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>EE Engineers</label>
                                <select2
                                  v-model="formFieldsSubModal.ee_idFk"
                                  placeholder="Select EE Engineer"
                                  :options="listOfEEngineers"
                                />
                                <div
                                  v-if="errors && errors.ee_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.ee_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>SDO</label>
                                <select2
                                  v-model="formFieldsSubModal.sdo_idFk"
                                  placeholder="Select SDO"
                                  :options="listOfSdoEngineers"
                                />
                                <div
                                  v-if="errors && errors.sdo_idFk"
                                  class="text-danger"
                                >
                                  {{ errors.sdo_idFk[0] }}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                              <label>SE Name</label>
                              <input
                              v-model="formFieldsSubModal.name"
                                type="text"
                                class="form-control"
                                placeholder="Enter Sub Engineer Name"
                              />

                              <div
                                  v-if="errors && errors.name"
                                  class="text-danger"
                                  >
                                  {{ errors.name[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>CE Designation</label>
                              <input
                              v-model="formFieldsSubModal.designation"
                                type="text"
                                class="form-control"
                                placeholder="Enter Sub Designation"
                              />

                              <div
                                  v-if="errors && errors.designation"
                                  class="text-danger"
                                  >
                                  {{ errors.designation[0] }}
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
              <button type="button" @click="createSubRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal for adding Sub -->
  </div>
</template>

<script>
import select2 from "v-select2-component";
import mixin from "./../../mixins/schemeIdMixin";

export default {
  components: {
    select2,
    //  SchemeForm
  },
  created() {
    this.$root.$refs.executing_office = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      listOfProvince:[],
      listOfZone:[],
      listOfDivision:[],
      listOfDistrict:[],
      listOfTehsil:[],
      ListOfCE:[],
      ListOfSE:[],
      ListOfEE: [],
      ListOfSDO: [],
      listofSub: [],
      listOfDivision:[],
      listOfCEngineers:[],
      listOfSEngineers:[],
      listOfEEngineers:[],
      listOfSdoEngineers:[],
      formFieldsCEModal: {
        province_idFk:"",
        zone_idFk:"",
        name:"",
        designation:"",
      },
      formFieldsSEModal: {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        ce_idFk:"",
        name:"",
        designation:"",
      },
      formFieldsEEModal: {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        chief_engineer_idFk:"",
        supr_engineer_idFk:"",
        name:"",
        designation:"",
      },
      formFieldsSubModal: {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        tehsil_idFk:"",
        ce_idFk:"",
        se_idFk:"",
        ee_idFk:"",
        sdo_idFk:"",
        name:"",
        designation:"",
      },
      formFieldsSDOModal: {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        tehsil_idFk:"",
        ce_idFk:"",
        se_idFk:"",
        ee_idFk:"",
        name:"",
        designation:"",
      },
    };
  },
  mounted() {
    this.active_el = this.$refs.executing_tab.getAttribute('data-bs-target');
    this.active_el = this.active_el.replace("#","");
    
    mixin.set_table_tab_val(this.active_el);

    this.getProvince();
    this.loadCEList();
    this.loadSEList();
    this.loadEEList();
    this.loadSDOList();
    this.loadSubList();

    this.resetCEFormFields();
    this.resetSEFormFields();
    this.resetEEFormFields();
    this.resetSDOFormFields();
    this.resetSubFormFields();
  },
  methods: {
    getProvince() {
      axios
        .get("get-province")
        .then((response) => {
          this.listOfProvince = response.data;
        })
        .catch((err) => {
          console.log("program-name-selects2", err);
        });
    },
    provinceChanged(id){
      this.getZone(id);
      this.listOfZone = [];
      this.listOfDivision = [];
      this.listOfDistrict = [];
      this.listOfTehsil = [];
    },
    getZone(p_id) {
      axios
        .get("get-zone/" + p_id)
        .then((response) => {
          this.listOfZone = response.data;
        })
        .catch((err) => {
          console.log("zone-name-selects2", err);
        });
    },
    zoneChanged(id) {
      this.listOfDivision = [];
      this.listOfDistrict = [];
      this.listOfTehsil = [];
      this.getDivision(id);
      this.loadCEDropdown(id);
    },
    getDivision(zone_id) { 
      axios
        .get("get-division/" + zone_id)
        .then((response) => {
          this.listOfDivision = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    divisionChanged(id){
      this.getDistrict(id);
      this.loadSEDropdown(id);

      this.listOfDistrict = [];
      this.listOfTehsil = [];


    },
    getDistrict(division_id) {
      axios
        .get("get-district/" + division_id)
        .then((response) => {
          console.log("the response",response);
          this.listOfDistrict = response.data;
        })
        .catch((err) => {
          console.log("district-name-selects2", err);
        });
    },
    districtChanged(id){
      this.getTehsil(id);
      this.loadEEDropdown(id);

      this.listOfTehsil = [];
    },
    getTehsil(id){
        axios
            .get("get-tehsil/" + id)
            .then((response) => {
            this.listOfTehsil = response.data;
            })
            .catch((err) => {
            console.log("tehsil-name-selects2", err);
        });
    },
    tehsilChanged(id){
      this.loadSDODropdown(id);
    },
    performance_tabs_click(performance) {
      this.active_el = performance;

      if(performance){
        mixin.set_table_tab_val(performance);
      }
    },
    resetCEFormFields(){
      this.formFieldsCEModal = {
        province_idFk:"",
        zone_idFk:"",
        name:"",
        designation:"",
      }
    },
    resetSEFormFields(){
      this.formFieldsSEModal = {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        ce_idFk:"",
        name:"",
        designation:"",
      }
    },
    resetEEFormFields(){
      this.formFieldsEEModal = {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        chief_engineer_idFk:"",
        supr_engineer_idFk:"",
        name:"",
        designation:"",
      }
    },
    resetSDOFormFields(){
      this.formFieldsSDOModal = {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        tehsil_idFk:"",
        ce_idFk:"",
        se_idFk:"",
        ee_idFk:"",
        name:"",
        designation:"",
      }
    },
    resetSubFormFields(){
      this.formFieldsSubModal = {
        province_idFk:"",
        zone_idFk:"",
        division_idFk:"",
        district_idFk:"",
        tehsil_idFk:"",
        ce_idFk:"",
        se_idFk:"",
        ee_idFk:"",
        sdo_idFk:"",
        name:"",
        designation:"",
      }
    },

    // Form Appending Methods
    customAppendCEFormData(){

      let formData = new FormData();
        //this.formFieldsCEModal is refering to the data object
        let aFields = Object.keys(this.formFieldsCEModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsCEModal[field] ? this.formFieldsCEModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendSEFormData(){

      let formData = new FormData();
        //this.formFieldsSEModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSEModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSEModal[field] ? this.formFieldsSEModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendEEFormData(){

      let formData = new FormData();
        //this.formFieldsEEModal is refering to the data object
        let aFields = Object.keys(this.formFieldsEEModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsEEModal[field] ? this.formFieldsEEModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendSDOFormData(){

      let formData = new FormData();
        //this.formFieldsSDOModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSDOModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSDOModal[field] ? this.formFieldsSDOModal[field] : ""
        );
        }, this);
        
        return formData;

    },
    customAppendSubFormData(){

      let formData = new FormData();
        //this.formFieldsSubModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSubModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSubModal[field] ? this.formFieldsSubModal[field] : ""
        );
        }, this);
        
        return formData;

    },

    // Methods for CE
    createCERecord(){
      let formData = this.customAppendCEFormData();
        
        axios
            .post("create-ce", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Chief Engineer saved successfully",
              });
                this.loadCEList();
                this.resetCEFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadCEList(){
      axios.get("get-ce-list").then((response) => {
            this.ListOfCE = response.data;
        });
    },
    loadCEDropdown(zone_id){
      axios.get("get-ce-list-by-zone/" + zone_id).then((response) => {
            this.listOfCEngineers = response.data;
        });
    },

    editCE(id){ 
      axios.get("get-ce-details/" + id).then((response) => {
            console.log("the resp",response);
            this.formFieldsCEModal = response.data;
            this.getZone(response.data.province_idFk);
          });

        $("#ceModal").modal("show");
    },

    // Methods for SE
    createSERecord(){
      let formData = this.customAppendSEFormData();
        
        axios
            .post("create-se", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Supritendant Engineer saved successfully",
              });
                this.loadSEList();
                this.resetSEFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadSEList(){
      axios.get("get-se-list").then((response) => {
            this.ListOfSE = response.data;
        });
    },
    loadSEDropdown(division_id){
      axios.get("get-se-list-by-division/"+division_id).then((response) => {
            this.listOfSEngineers = response.data;
        });
    },
    editSE(id){
       axios.get("get-se-details/" + id).then((response) => {
            this.formFieldsSEModal = response.data;
            this.getProvince(response.data.province_idFk);
            this.getZone(response.data.province_idFk);
            this.getDivision(response.data.zone_idFk);
            this.loadCEDropdown(response.data.zone_idFk);
          });

        $("#seModal").modal("show");
    },

    // Methods for EE
    createEERecord(){
      let formData = this.customAppendEEFormData();
        
        axios
            .post("create-ee", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Executive Engineer saved successfully",
              });
                this.loadEEList();
                this.resetEEFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadEEList(){
      axios.get("get-ee-list").then((response) => {
            this.ListOfEE = response.data;
        });
    },
    loadEEDropdown(district_id){
      axios.get("get-ee-list-by-district/"+district_id).then((response) => {
            this.listOfEEngineers = response.data;
        });
    },
    editEE(id){
       axios.get("get-ee-details/" + id).then((response) => {
         console.log("the response EE",response.data);
            this.formFieldsEEModal = response.data;
            this.getProvince(response.data.province_idFk);
            this.getZone(response.data.province_idFk);
            this.getDivision(response.data.zone_idFk);
            this.getDistrict(response.data.division_idFk);
            this.loadCEDropdown(response.data.zone_idFk);
            this.loadSEDropdown(response.data.division_idFk);
          });

        $("#eeModal").modal("show");
    },

    // Methods for SDO
    createSDORecord(){
      let formData = this.customAppendSDOFormData();
        
        axios
            .post("create-sdo", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "SDO Engineer saved successfully",
              });
                this.loadSDOList();
                this.resetSDOFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadSDOList(){
      axios.get("get-sdo-list").then((response) => {
            this.ListOfSDO = response.data;
        });
    },
    loadSDODropdown(tehsil_id){
      axios.get("get-sdo-list-by-tehsil/" + tehsil_id).then((response) => {
            this.listOfSdoEngineers = response.data;
        });
    },
    editSDO(id){
       axios.get("get-sdo-details/" + id).then((response) => {
            this.formFieldsSDOModal = response.data;
            this.getProvince(response.data.province_idFk);
            this.getZone(response.data.province_idFk);
            this.getDivision(response.data.zone_idFk);
            this.getDistrict(response.data.division_idFk);
            this.getTehsil(response.data.district_idFk);
            this.loadCEDropdown(response.data.zone_idFk);
            this.loadSEDropdown(response.data.division_idFk);
            this.loadEEDropdown(response.data.district_idFk);
          });

        $("#sdoModal").modal("show");
    },

    // Methods for Sub
    createSubRecord(){
      let formData = this.customAppendSubFormData();
        
        axios
            .post("create-sub", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Sub Engineer saved successfully",
              });
                this.loadSubList();
                this.resetSubFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadSubList(){
      axios.get("get-sub-list").then((response) => {
            this.listofSub = response.data;
        });
    },
    editSub(id){
       axios.get("get-sub-details/" + id).then((response) => {
            this.formFieldsSubModal = response.data;
            this.getProvince(response.data.province_idFk);
            this.getZone(response.data.province_idFk);
            this.getDivision(response.data.zone_idFk);
            this.getDistrict(response.data.division_idFk);
            this.getTehsil(response.data.district_idFk);
            this.loadCEDropdown(response.data.zone_idFk);
            this.loadSEDropdown(response.data.division_idFk);
            this.loadEEDropdown(response.data.district_idFk);
            this.loadSDODropdown(response.data.tehsil_idFk);
          });

        $("#subModal").modal("show");
    },
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'ce'){
            this.resetCEFormFields();
        }
        else if(this.active_el == 'se'){
          this.resetSEFormFields();
        }
        else if(this.active_el == 'ee'){
          this.resetEEFormFields();
        }
        else if(this.active_el == 'sdo'){
          this.resetSDOFormFields();
        }
        else if(this.active_el == 'sub'){
          this.resetSubFormFields();
        }

        this.listOfZone = [];
        this.listOfDivision = [];
        this.listOfDistrict = [];
        this.listOfTehsil = [];
    },
  },
};
</script>