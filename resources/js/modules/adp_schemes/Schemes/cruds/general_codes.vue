<template>
  <div>
    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="unit-tab"
            data-bs-toggle="tab"
            data-bs-target="#unit"
            type="button"
            role="tab"
            ref="general"
            aria-controls="unit"
            aria-selected="true"
            @click="performance_tabs_click('unit')"
          >
            Unit Detail
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="sagency-tab"
            data-bs-toggle="tab"
            data-bs-target="#sagency"
            type="button"
            role="tab"
            aria-controls="sagency"
            aria-selected="false"
            @click="performance_tabs_click('sagency')"
          >
            Sponsering Agency
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="eagency-tab"
            data-bs-toggle="tab"
            data-bs-target="#eagency"
            type="button"
            role="tab"
            aria-controls="eagency"
            aria-selected="false"
            @click="performance_tabs_click('eagency')"
          >
            Executing Agency
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="wquality-tab"
            data-bs-toggle="tab"
            data-bs-target="#wquality"
            type="button"
            role="tab"
            aria-controls="wquality"
            aria-selected="true"
            @click="performance_tabs_click('wquality')"
          >
            Water Quality
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="technical-tab"
            data-bs-toggle="tab"
            data-bs-target="#technical"
            type="button"
            role="tab"
            aria-controls="technical"
            aria-selected="false"
            @click="performance_tabs_click('technical')"
          >
            Technical Type
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="snature-tab"
            data-bs-toggle="tab"
            data-bs-target="#snature"
            type="button"
            role="tab"
            aria-controls="snature"
            aria-selected="false"
            @click="performance_tabs_click('snature')"
          >
            Scheme Nature
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="om-tab"
            data-bs-toggle="tab"
            data-bs-target="#om"
            type="button"
            role="tab"
            aria-controls="om"
            aria-selected="false"
            @click="performance_tabs_click('om')"
          >
            O & M 
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="wsource-tab"
            data-bs-toggle="tab"
            data-bs-target="#wsource"
            type="button"
            role="tab"
            aria-controls="wsource"
            aria-selected="false"
            @click="performance_tabs_click('wsource')"
          >
            Water Source
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="area-tab"
            data-bs-toggle="tab"
            data-bs-target="#area"
            type="button"
            role="tab"
            aria-controls="area"
            aria-selected="false"
            @click="performance_tabs_click('area')"
          >
            Area
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="stype-tab"
            data-bs-toggle="tab"
            data-bs-target="#stype"
            type="button"
            role="tab"
            aria-controls="stype"
            aria-selected="false"
            @click="performance_tabs_click('stype')"
          >
            Scheme Type
          </button>
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="unit"
          role="tabpanel"
          aria-labelledby="unit-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Short Description</th>
                      <th>Unit Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfUnits">
                        <tr v-for="(item, index) in ListOfUnits" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.short_desc ? item.short_desc : 'N/A' }}</td>
                          <td>{{ item.unit_desc ? item.unit_desc : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editUnit(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="sagency"
          role="tabpanel"
          aria-labelledby="sagency-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Short Description</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSAgency">
                        <tr v-for="(item, index) in ListOfSAgency" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.short_description ? item.short_description : 'N/A' }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editSAgency(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="eagency"
          role="tabpanel"
          aria-labelledby="eagency-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Short Description</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfEAgency">
                        <tr v-for="(item, index) in ListOfEAgency" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.short_description ? item.short_description : 'N/A' }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editEAgency(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="wquality"
          role="tabpanel"
          aria-labelledby="wquality-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfWQuality">
                        <tr v-for="(item, index) in ListOfWQuality" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.water_quality_title ? item.water_quality_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editWQuality(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="technical"
          role="tabpanel"
          aria-labelledby="technical-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Technique Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfTechnical">
                        <tr v-for="(item, index) in ListOfTechnical" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.technique_title ? item.technique_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editTechnical(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="snature"
          role="tabpanel"
          aria-labelledby="snature-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSchemeNature">
                        <tr v-for="(item, index) in ListOfSchemeNature" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editSNature(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="om"
          role="tabpanel"
          aria-labelledby="om-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfOM">
                        <tr v-for="(item, index) in ListOfOM" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.description ? item.description : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editOM(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="wsource"
          role="tabpanel"
          aria-labelledby="wsource-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfWaterSource">
                        <tr v-for="(item, index) in ListOfWaterSource" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.water_source_title ? item.water_source_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editWSource(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="area"
          role="tabpanel"
          aria-labelledby="area-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfArea">
                        <tr v-for="(item, index) in ListOfArea" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.area_title ? item.area_title : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editArea(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="stype"
          role="tabpanel"
          aria-labelledby="stype-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Title Type</th>
                      <th>Short Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="ListOfSchemeType">
                        <tr v-for="(item, index) in ListOfSchemeType" :key="index">
                          <td>{{ ++index }}</td>
                          <td>{{ item.type_title ? item.type_title : 'N/A' }}</td>
                          <td>{{ item.short_desc ? item.short_desc : 'N/A' }}</td>
                          <td style="display: inline-block;"><span @click="editSType(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>
                      </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Tabs content -->
    </div>

    <!-- Modal for adding Units -->
      <div
        class="modal fade"
        id="unitModal"
        tabindex="-1"
        aria-labelledby="unitModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="unitModalLabel">Add Unit</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetUnitsFormFields"
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
                              <label>Unit Description</label>
                              <input
                              v-model="formFieldsUnitsModal.unit_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Unit Description"
                              />

                              <div
                                  v-if="errors && errors.unit_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.unit_desc[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Short Description</label>
                              <input
                              v-model="formFieldsUnitsModal.short_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Short Description"
                              />

                              <div
                                  v-if="errors && errors.short_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.short_desc[0] }}
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
              <button type="button" @click="createUnitRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Units -->
    
    <!-- Modal for adding SAgency -->
       <div
        class="modal fade"
        id="sagencyModal"
        tabindex="-1"
        aria-labelledby="sagencyModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sagencyModalLabel">Add Sponsoring Agency</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSAgencyFormFields"
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
                              <label>Description</label>
                              <input
                              v-model="formFieldsSAgencyModal.description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Description"
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Short Description</label>
                              <input
                              v-model="formFieldsSAgencyModal.short_description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Short Description"
                              />

                              <div
                                  v-if="errors && errors.short_description"
                                  class="text-danger"
                                  >
                                  {{ errors.short_description[0] }}
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
              <button type="button" @click="createSAgencyRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div> 
    <!-- Modal for adding SAgency -->

    <!-- Modal for adding EAgency -->
      <div
        class="modal fade"
        id="eagencyModal"
        tabindex="-1"
        aria-labelledby="eagencyModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eagencyModalLabel">Add Executed Agency</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetEAgencyFormFields"
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
                              <label>Description</label>
                              <input
                              v-model="formFieldsEAgencyModal.description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Description"
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Short Description</label>
                              <input
                              v-model="formFieldsEAgencyModal.short_description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Short Description"
                              />

                              <div
                                  v-if="errors && errors.short_description"
                                  class="text-danger"
                                  >
                                  {{ errors.short_description[0] }}
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
              <button type="button" @click="createEAgencyRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding EAgency -->

    <!-- Modal for adding WQuality -->
      <div
        class="modal fade"
        id="wqualityModal"
        tabindex="-1"
        aria-labelledby="wqualityModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="wqualityModalLabel">Add Water Quality</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetWaterQualityFormFields"
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
                              <label>Water Quality Title</label>
                              <input
                              v-model="formFieldsWQualityModal.water_quality_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter Water Quality Title"
                              />

                              <div
                                  v-if="errors && errors.water_quality_title"
                                  class="text-danger"
                                  >
                                  {{ errors.water_quality_title[0] }}
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
              <button type="button" @click="createWQualityRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding WQuality -->

    <!-- Modal for adding Technical -->
      <div
        class="modal fade"
        id="technicalModal"
        tabindex="-1"
        aria-labelledby="technicalModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="technicalModalLabel">Add Technical Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetTechnicalFormFields"
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
                              <label>Technique Title</label>
                              <input
                              v-model="formFieldsTechnicalModal.technique_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter Technique Title"
                              />

                              <div
                                  v-if="errors && errors.technique_title"
                                  class="text-danger"
                                  >
                                  {{ errors.technique_title[0] }}
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
              <button type="button" @click="createTechnicalRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Technical -->

    <!-- Modal for adding SchemeNature -->
      <div
        class="modal fade"
        id="snatureModal"
        tabindex="-1"
        aria-labelledby="snatureModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="snatureModalLabel">Add Scheme Nature</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSchemeNatureFormFields"
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
                              <label>Description</label>
                              <input
                              v-model="formFieldsSchemeNatureModal.description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Description"
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
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
              <button type="button" @click="createSNatureRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding SchemeNature -->

    <!-- Modal for adding OM -->
      <div
        class="modal fade"
        id="omModal"
        tabindex="-1"
        aria-labelledby="omModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="omModalLabel">Add O & M details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetOMFormFields"
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
                              <label>Description</label>
                              <input
                              v-model="formFieldsOMModal.description"
                                type="text"
                                class="form-control"
                                placeholder="Enter Description"
                              />

                              <div
                                  v-if="errors && errors.description"
                                  class="text-danger"
                                  >
                                  {{ errors.description[0] }}
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
              <button type="button" @click="createOMRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding OM -->

    <!-- Modal for adding Water Source -->
      <div
        class="modal fade"
        id="wsourceModal"
        tabindex="-1"
        aria-labelledby="wsourceModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="wsourceModalLabel">Add Water Source</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetWaterSourceFormFields"
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
                              <label>Water Source Title</label>
                              <input
                              v-model="formFieldsWaterSourceModal.water_source_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter Water Source Title"
                              />

                              <div
                                  v-if="errors && errors.water_source_title"
                                  class="text-danger"
                                  >
                                  {{ errors.water_source_title[0] }}
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
              <button type="button" @click="createWSourceRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Water Source -->

    <!-- Modal for adding Area -->
      <div
        class="modal fade"
        id="areaModal"
        tabindex="-1"
        aria-labelledby="areaModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="areaModalLabel">Add Area Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetAreaFormFields"
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
                              <label>Area Title</label>
                              <input
                              v-model="formFieldsAreaModal.area_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter Area Title"
                              />

                              <div
                                  v-if="errors && errors.area_title"
                                  class="text-danger"
                                  >
                                  {{ errors.area_title[0] }}
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
              <button type="button" @click="createAreaRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Area -->

    <!-- Modal for adding Scheme Type -->
      <div
        class="modal fade"
        id="stypeModal"
        tabindex="-1"
        aria-labelledby="stypeModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="max-width: 1200px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="stypeModalLabel">Add Scheme Type</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetSchemeTypeFormFields"
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
                              <label>Title Type</label>
                              <input
                              v-model="formFieldsSchemeTypeModal.type_title"
                                type="text"
                                class="form-control"
                                placeholder="Enter Title Type"
                              />

                              <div
                                  v-if="errors && errors.type_title"
                                  class="text-danger"
                                  >
                                  {{ errors.type_title[0] }}
                              </div>

                            </div>

                            <div class="col-md-4 mb-3">
                              <label>Short Description</label>
                              <input
                              v-model="formFieldsSchemeTypeModal.short_desc"
                                type="text"
                                class="form-control"
                                placeholder="Enter Short Description"
                              />

                              <div
                                  v-if="errors && errors.short_desc"
                                  class="text-danger"
                                  >
                                  {{ errors.short_desc[0] }}
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
              <button type="button" @click="createSTypeRecord" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal for adding Scheme Type -->
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
    this.$root.$refs.general_codes = this;
  },
  data() {
    return {
      errors: {},
      editMode: false,
      active_el:"",
      ListOfUnits:[],
      ListOfSAgency:[],
      ListOfEAgency:[],
      ListOfWQuality:[],
      ListOfTechnical:[],
      ListOfSchemeNature:[],
      ListOfOM:[],
      ListOfWaterSource:[],
      ListOfArea:[],
      ListOfSchemeType:[],
      formFieldsUnitsModal: {
        short_desc:"",
        unit_desc:"",
      },
      formFieldsSAgencyModal: {
        short_description:"",
        description:"",
      },
      formFieldsEAgencyModal: {
        short_description:"",
        description:"",
      },
      formFieldsWQualityModal: {
        water_quality_title:"",
      },
      formFieldsTechnicalModal: {
        technique_title:"",
      },
      formFieldsSchemeNatureModal: {
        description:"",
      },
      formFieldsOMModal: {
        description:"",
      },
      formFieldsWaterSourceModal: {
        water_source_title:"",
      },
      formFieldsAreaModal: {
        area_title:"",
      },
      formFieldsSchemeTypeModal: {
        short_desc:"",
        type_title:"",
      },
    };
  },
  mounted() {
    this.active_el = this.$refs.general.getAttribute('data-bs-target');
    this.active_el = this.active_el.replace("#","");


    mixin.set_table_tab_val(this.active_el);
    // this.getMainHead();
    // this.getDetailHead();
    this.loadUnitsList();
    this.loadSAgencyList();
    this.loadEAgencyList();
    this.loadWQualityList();
    this.loadTechnicalList();
    this.loadSchemeNatureList();
    this.loadOMList();
    this.loadWaterSourceList();
    this.loadAreaList();
    this.loadSchemeTypeList();
  },
  methods: {
    performance_tabs_click(performance) {
      this.active_el = performance;

      if(performance){
        mixin.set_table_tab_val(performance);
      }
    },
    
    // Reset Form Fields Methods
    resetUnitsFormFields(){
      this.formFieldsUnitsModal = {
        short_desc:"",
        unit_desc:"",
      }
    },
    resetSAgencyFormFields(){
      this.formFieldsSAgencyModal = {
        short_description:"",
        description:"",
      }
    },
    resetEAgencyFormFields(){
      this.formFieldsEAgencyModal = {
        short_description:"",
        description:"",
      }
    },
    resetWaterQualityFormFields(){
      this.formFieldsWQualityModal = {
        water_quality_title:"",
      }
    },
    resetTechnicalFormFields(){
      this.formFieldsTechnicalModal = {
        technique_title:"",
      }
    },
    resetSchemeNatureFormFields(){
      this.formFieldsSchemeNatureModal = {
        description:"",
      }
    },
    resetOMFormFields(){
      this.formFieldsOMModal = {
        description:"",
      }
    },
    resetWaterSourceFormFields(){
      this.formFieldsWaterSourceModal = {
        water_source_title:"",
      }
    },
    resetAreaFormFields(){
      this.formFieldsAreaModal = {
        area_title:"",
      }
    },
    resetSchemeTypeFormFields(){
      this.formFieldsSchemeTypeModal = {
        short_desc:"",
        type_title:"",
      }
    },

    // custom form append methods
    customUnitsFormData(){
      let formData = new FormData();
        //this.formFieldsUnitsModal is refering to the data object
        let aFields = Object.keys(this.formFieldsUnitsModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsUnitsModal[field] ? this.formFieldsUnitsModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customSAgencyFormData(){
      let formData = new FormData();
        //this.formFieldsSAgencyModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSAgencyModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSAgencyModal[field] ? this.formFieldsSAgencyModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customEAgencyFormData(){
      let formData = new FormData();
        //this.formFieldsEAgencyModal is refering to the data object
        let aFields = Object.keys(this.formFieldsEAgencyModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsEAgencyModal[field] ? this.formFieldsEAgencyModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customWaterQualityFormData(){
      let formData = new FormData();
        //this.formFieldsWQualityModal is refering to the data object
        let aFields = Object.keys(this.formFieldsWQualityModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsWQualityModal[field] ? this.formFieldsWQualityModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customTechnicalFormData(){
      let formData = new FormData();
        //this.formFieldsTechnicalModal is refering to the data object
        let aFields = Object.keys(this.formFieldsTechnicalModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsTechnicalModal[field] ? this.formFieldsTechnicalModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customSchemeNatureFormData(){
      let formData = new FormData();
        //this.formFieldsSchemeNatureModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSchemeNatureModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSchemeNatureModal[field] ? this.formFieldsSchemeNatureModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customOMFormData(){
      let formData = new FormData();
        //this.formFieldsOMModal is refering to the data object
        let aFields = Object.keys(this.formFieldsOMModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsOMModal[field] ? this.formFieldsOMModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customWaterSourceFormData(){
      let formData = new FormData();
        //this.formFieldsWaterSourceModal is refering to the data object
        let aFields = Object.keys(this.formFieldsWaterSourceModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsWaterSourceModal[field] ? this.formFieldsWaterSourceModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customAreaFormData(){
      let formData = new FormData();
        //this.formFieldsAreaModal is refering to the data object
        let aFields = Object.keys(this.formFieldsAreaModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsAreaModal[field] ? this.formFieldsAreaModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    customSchemeTypeFormData(){
      let formData = new FormData();
        //this.formFieldsSchemeTypeModal is refering to the data object
        let aFields = Object.keys(this.formFieldsSchemeTypeModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsSchemeTypeModal[field] ? this.formFieldsSchemeTypeModal[field] : ""
        );
        }, this);
        
        return formData;
    },

    // Units Methods
    createUnitRecord(){
      let formData = this.customUnitsFormData();
        
        axios
          .post("create-unit", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Unit Detail saved successfully",
            });
              this.loadUnitsList();
              this.resetUnitsFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadUnitsList(){
      axios.get("get-unit").then((response) => {
            this.ListOfUnits = response.data;
        });
    },
    editUnit(id){
      axios.get("get-unit-details/" + id).then((response) => {
            this.formFieldsUnitsModal = response.data;
          });

        $("#unitModal").modal("show");
    },

    // SAgency Methods
    createSAgencyRecord(){
      let formData = this.customSAgencyFormData();
        
        axios
          .post("create-sagency", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Sponsoring Agency saved successfully",
            });
              this.loadSAgencyList();
              this.resetSAgencyFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadSAgencyList(){
      axios.get("get-sagency").then((response) => {
            this.ListOfSAgency = response.data;
        });
    },
    editSAgency(id){
      axios.get("get-sagency-details/" + id).then((response) => {
            this.formFieldsSAgencyModal = response.data;
          });

        $("#sagencyModal").modal("show");
    },

    // EAgency Methods
    createEAgencyRecord(){
      let formData = this.customEAgencyFormData();
        
        axios
          .post("create-eagency", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Executed Agency saved successfully",
            });
              this.loadEAgencyList();
              this.resetEAgencyFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadEAgencyList(){
      axios.get("get-eagency").then((response) => {
            this.ListOfEAgency = response.data;
        });
    },
    editEAgency(id){
      axios.get("get-eagency-details/" + id).then((response) => {
            this.formFieldsEAgencyModal = response.data;
          });

        $("#eagencyModal").modal("show");
    },

    // Water Quality Methods
    createWQualityRecord(){
      let formData = this.customWaterQualityFormData();
        
        axios
          .post("create-wquality", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Water Quality saved successfully",
            });
              this.loadWQualityList();
              this.resetWaterQualityFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadWQualityList(){
      axios.get("get-wquality").then((response) => {
            this.ListOfWQuality = response.data;
        });
    },
    editWQuality(id){
      axios.get("get-wquality-details/" + id).then((response) => {
            this.formFieldsWQualityModal = response.data;
          });

        $("#wqualityModal").modal("show");
    },

    // Technical Methods
    createTechnicalRecord(){
      let formData = this.customTechnicalFormData();
        
        axios
          .post("create-technical", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Technical Details saved successfully",
            });
              this.loadTechnical();
              this.resetTechnicalFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadTechnicalList(){
      axios.get("get-technical").then((response) => {
            this.ListOfTechnical = response.data;
        });
    },
    editTechnical(id){
      axios.get("get-technical-details/" + id).then((response) => {
            this.formFieldsTechnicalModal = response.data;
          });

        $("#technicalModal").modal("show");
    },

    // Scheme Nature Methods
    createSNatureRecord(){
      let formData = this.customSchemeNatureFormData();
        
        axios
          .post("create-snature", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Scheme Nature saved successfully",
            });
              this.loadSchemeNatureList();
              this.resetSchemeNatureFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadSchemeNatureList(){
      axios.get("get-snature").then((response) => {
            this.ListOfSchemeNature = response.data;
        });
    },
    editSNature(id){
      axios.get("get-snature-details/" + id).then((response) => {
            this.formFieldsSchemeNatureModal = response.data;
          });

        $("#snatureModal").modal("show");
    },

    // OM Methods
    createOMRecord(){
      let formData = this.customOMFormData();
        
        axios
          .post("create-om", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "O & M Details saved successfully",
            });
              this.loadOMList();
              this.resetOMFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadOMList(){
      axios.get("get-om").then((response) => {
            this.ListOfOM = response.data;
        });
    },
    editOM(id){
      axios.get("get-om-details/" + id).then((response) => {
            this.formFieldsOMModal = response.data;
          });

        $("#omModal").modal("show");
    },

    // Water Source Methods
    createWSourceRecord(){
      let formData = this.customWaterSourceFormData();
        
        axios
          .post("create-wsource", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Water Source saved successfully",
            });
              this.loadWaterSourceList();
              this.resetWaterSourceFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadWaterSourceList(){
      axios.get("get-wsource").then((response) => {
            this.ListOfWaterSource = response.data;
        });
    },
    editWSource(id){
      axios.get("get-wsource-details/" + id).then((response) => {
            this.formFieldsWaterSourceModal = response.data;
          });

        $("#wsourceModal").modal("show");
    },

    // Area Methods
    createAreaRecord(){
      let formData = this.customAreaFormData();
        
        axios
          .post("create-area", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Area Details saved successfully",
            });
              this.loadAreaList();
              this.resetAreaFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadAreaList(){
      axios.get("get-area").then((response) => {
            this.ListOfArea = response.data;
        });
    },
    editArea(id){
      axios.get("get-area-details/" + id).then((response) => {
            this.formFieldsAreaModal = response.data;
          });

        $("#areaModal").modal("show");
    },

    // Scheme Type Methods
    createSTypeRecord(){
      let formData = this.customSchemeTypeFormData();
        
        axios
          .post("create-stype", formData)
          .then((response) => {
            
            Toast.fire({
              icon: "success",
              title: "Scheme Type saved successfully",
            });
              this.loadSchemeTypeList();
              this.resetSchemeTypeFormFields();
              this.hideModal();
              this.errors = {};
          })
          .catch((err) => {
            if (err.response.status === 422) {
              this.errors = err.response.data.errors || {};
            }
          });
    },
    loadSchemeTypeList(){
      axios.get("get-stype").then((response) => {
            this.ListOfSchemeType = response.data;
        });
    },
    editSType(id){
      axios.get("get-stype-details/" + id).then((response) => {
            this.formFieldsSchemeTypeModal = response.data;
          });

        $("#stypeModal").modal("show");
    },
    hideModal(){

        $("#"+this.active_el+"Modal").modal("hide");

        if(this.active_el == 'unit'){
            this.resetUnitsFormFields();
        }
        else if(this.active_el == 'sagency'){
          this.resetSAgencyFormFields();
        }
        else if(this.active_el == 'eagency'){
          this.resetEAgencyFormFields();
        }
        else if(this.active_el == 'wquality'){
          this.resetWaterQualityFormFields();
        }
        else if(this.active_el == 'technical'){
          this.resetTechnicalFormFields();
        }
        else if(this.active_el == 'snature'){
          this.resetSchemeNatureFormFields();
        }
        else if(this.active_el == 'om'){
          this.resetOMFormFields();
        }
        else if(this.active_el == 'wsource'){
          this.resetWaterSourceFormFields();
        }
        else if(this.active_el == 'area'){
          this.resetAreaFormFields();
        }
        else if(this.active_el == 'stype'){
          this.resetSchemeTypeFormFields();
        }
        
    },
  },
};
</script>