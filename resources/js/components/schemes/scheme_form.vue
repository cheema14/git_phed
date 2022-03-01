<template>
  <div>
    <section class="listing py-4 sticky-top">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-9">
            <div class="scheme-title">
              <h2>
                <span
                  ><img
                    src="images/icons/adp-icon.png"
                    alt="ADP Icon"
                    class="img-fluid me-2"
                    width="40"
                /></span>
                <span>{{ editMode ? "Update Scheme" : "Add New Scheme" }}</span>
              </h2>
            </div>
          </div>
          <div class="col-md-3 text-end">
            <button
              @click="createRecord"
              class="btn btn-success px-3 me-2 py-3"
            >
              Save
            </button>
            <router-link to="/scheme-list">
              <button class="btn btn-secondary px-3 py-3">
                <i class="fa fa-arrow-left"></i> Go Back
              </button>
            </router-link>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="phed-tabs-box">
              <ul class="nav nav-pills nav-tabs" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="pills-scheme-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-scheme"
                    type="button"
                    role="tab"
                    aria-controls="pills-scheme"
                    aria-selected="true"
                  >
                    Scheme Detail
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="pills-performance-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-performance"
                    type="button"
                    role="tab"
                    aria-controls="pills-performance"
                    aria-selected="false"
                    v-if="this.editMode || this.mix_val"
                  >
                    Performance
                  </button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="pills-scheme"
                  role="tabpanel"
                  aria-labelledby="pills-scheme-tab"
                >
                  <div class="">
                    <h3 class="form-caption">Scheme Detail</h3>
                    <div class="row">
                      <!-- <div class="col-md-3 mb-3">
                          <label>Directive Sr#</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter text here"
                          />
                        </div> -->

                      <div class="col-md-3 mb-3">
                        <label>Scheme Name</label>
                        <input
                          v-model="formFields.scheme_name"
                          type="text"
                          class="form-control"
                          placeholder="Enter Scheme Name"
                        />
                        <div
                          v-if="errors && errors.scheme_name"
                          class="text-danger"
                        >
                          {{ errors.scheme_name[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Directive Sr No</label>
                        <input
                          v-model="formFields.directive_sr_no"
                          type="text"
                          class="form-control"
                          placeholder="Enter Directive Sr No"
                        />
                        <div
                          v-if="errors && errors.directive_sr_no"
                          class="text-danger"
                        >
                          {{ errors.directive_sr_no[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Identified By</label>
                        <select2
                          v-model="formFields.identified_by_id"
                          placeholder="Select Identified By"
                          :options="identifiedBy"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Cleared By</label>

                        <select2
                          v-model="formFields.recommended_by_id"
                          placeholder="Select Cleared By"
                          :options="clearedBy"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Programme</label>
                        <select2
                          v-model="formFields.program_id"
                          placeholder="Select program"
                          :options="listOfProgram"
                        />
                        <div
                          v-if="errors && errors.program_id"
                          class="text-danger"
                        >
                          {{ errors.program_id[0] }}
                        </div>
                      </div>
                    </div>
                    <h3 class="form-caption">Area Detail</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Province</label>

                        <select2
                          v-model="formFields.province_id"
                          placeholder="Select Province"
                          @change="provinceChanged($event)"
                          :options="listOfProvince"
                        />
                        <div
                          v-if="errors && errors.province_id"
                          class="text-danger"
                        >
                          {{ errors.province_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Zone</label>
                        <select2
                          v-model="formFields.zone_id"
                          placeholder="Select Zone"
                          @change="zoneChanged($event)"
                          :options="listOfZone"
                        />
                        <div
                          v-if="errors && errors.zone_id"
                          class="text-danger"
                        >
                          {{ errors.zone_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Division</label>
                        <select2
                          v-model="formFields.division_id"
                          placeholder="Select Division"
                          @change="divisionChanged($event)"
                          :options="listOfDivision"
                        />
                        <div
                          v-if="errors && errors.division_id"
                          class="text-danger"
                        >
                          {{ errors.division_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>District</label>
                        <select2
                          v-model="formFields.district_id"
                          placeholder="Select District"
                          @change="districtChanged($event)"
                          :options="listOfDistrict"
                        />
                        <div
                          v-if="errors && errors.district_id"
                          class="text-danger"
                        >
                          {{ errors.district_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Tehsil</label>
                        <select2
                          v-model="formFields.tehsil_id"
                          placeholder="Select Tehsil"
                          :options="listOfTehsil"
                        />
                        <div
                          v-if="errors && errors.tehsil_id"
                          class="text-danger"
                        >
                          {{ errors.tehsil_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>UC</label>
                        <select2
                          v-model="formFields.uc_id"
                          placeholder="Select Union Council"
                          :options="listOfUCs"
                        />
                        <div v-if="errors && errors.uc_id" class="text-danger">
                          {{ errors.uc_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Village</label>
                        <input
                          v-model="formFields.village_locale"
                          type="text"
                          class="form-control"
                          placeholder="Enter Locale (Village name)"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Executing Office Detail</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Chief Engineer</label>
                        <select2
                          v-model="formFields.chief_engineer_id"
                          placeholder="Select Chief Engineer"
                          :options="cEngineers"
                        />
                        <div
                          v-if="errors && errors.chief_engineer_id"
                          class="text-danger"
                        >
                          {{ errors.chief_engineer_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Supr. Engineer</label>
                        <select2
                          v-model="formFields.supr_engineer_id"
                          placeholder="Select Supervisor Engineer"
                          :options="sprEngineers"
                        />
                        <div
                          v-if="errors && errors.supr_engineer_id"
                          class="text-danger"
                        >
                          {{ errors.supr_engineer_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Executing Engineer</label>
                        <select2
                          v-model="formFields.executing_eengineer_id"
                          placeholder="Select Executive Engineer"
                          :options="exEngineers"
                        />
                        <div
                          v-if="errors && errors.executing_eengineer_id"
                          class="text-danger"
                        >
                          {{ errors.executing_eengineer_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>S.D.O</label>
                        <select2
                          v-model="formFields.sdo_id"
                          placeholder="Select SDO"
                          :options="sdos"
                        />
                        <div v-if="errors && errors.sdo_id" class="text-danger">
                          {{ errors.sdo_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Sub Engineer</label>
                        <select2
                          v-model="formFields.sub_engineer_id"
                          placeholder="Select Sub Engineer"
                          :options="sbEngineers"
                        />
                        <div
                          v-if="errors && errors.sub_engineer_id"
                          class="text-danger"
                        >
                          {{ errors.sub_engineer_id[0] }}
                        </div>
                      </div>
                    </div>
                    <h3 class="form-caption">Disposal</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Disposal Mode</label>
                        <input
                          v-model="formFields.disposal_mode"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Disposal Type</label>
                        <input
                          v-model="formFields.disposal_type"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Ultimate Disposal</label>
                        <input
                          v-model="formFields.ultimate_disposal"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Basic Parameters</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Scheme Type</label>
                        <select2
                          v-model="formFields.type_id"
                          placeholder="Select Scheme Type"
                          :options="schemeTypes"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Technique</label>
                        <select2
                          v-model="formFields.tech_id"
                          placeholder="Select Scheme Type"
                          :options="techniques"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>New/Rehab</label>
                        <select2
                          v-model="formFields.new_rehab_id"
                          placeholder="Select New/Rehab"
                          :options="newRehabs"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Ref Scheme#</label>
                        <input
                          v-model="formFields.ref_scheme_number"
                          type="text"
                          class="form-control"
                          placeholder="Enter Reference Scheme No"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Area</label>
                        <select2
                          v-model="formFields.area_id"
                          placeholder="Select Area"
                          :options="areas"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Sponsered By</label>
                        <select2
                          v-model="formFields.spons_id"
                          placeholder="Select Sponsored By"
                          :options="sponsered_agency"
                        />
                        <div
                          v-if="errors && errors.spons_id"
                          class="text-danger"
                        >
                          {{ errors.spons_id[0] }}
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Executed By</label>
                        <select2
                          v-model="formFields.exe_id"
                          placeholder="Select Executed By"
                          :options="ex_by"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>O & M By</label>
                        <select2
                          v-model="formFields.oandm_id"
                          placeholder="Select O&M By"
                          :options="o_by"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Water Detail</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Water Source</label>

                        <select2
                          v-model="formFields.source_id"
                          placeholder="Select water source"
                          :options="waterSource"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Water Quality</label>

                        <select2
                          v-model="formFields.quality_id"
                          placeholder="Select water source"
                          :options="waterQuality"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Source Nature</label>
                        <select2
                          v-model="formFields.nature_id"
                          placeholder="Select Source Nature"
                          :options="sourceNature"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>WC Gpcd</label>
                        <input
                          v-model="formFields.wc_gpcd"
                          type="number"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Population</label>
                        <input
                          v-model="formFields.population_served"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter population"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Block Details</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Block Desc.</label>
                        <input
                          v-model="formFields.block_desc"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>ADP Year</label>
                        <input
                          v-model="formFields.adp_yr_id"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          disabled
                        />

                      </div>
                    </div>
                    <h3 class="form-caption">Status of Scheme</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Approval Forum</label>
                        <input
                          v-model="formFields.approval_forum"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Approval Status</label>

                        <select2
                          v-model="formFields.approval_status"
                          placeholder="Select Approval Status"
                          :options="approvalStatus"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Completion Forum</label>
                        <input
                          v-model="formFields.completion_forum"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Function Status</label>
                        <select2
                          v-model="formFields.function_status"
                          placeholder="Select Function Status"
                          :options="functionStatus"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Handing Code</label>
                        <select2
                          v-model="formFields.handing_code"
                          placeholder="Select Handing Code"
                          :options="listHandingCode"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Cost of Scheme</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Proposed Cost</label>
                        <input
                          v-model="formFields.proposed_cost"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter Proposed Cost"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Approved Cost</label>
                        <input
                          v-model="formFields.approved_cost"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter Approved Cost"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>TS Cost</label>
                        <input
                          v-model="formFields.ts_cost"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter TS Cost"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Completion Cost</label>
                        <input
                          v-model="formFields.completion_cost"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter Completion Cost"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Rehab. Cost</label>
                        <input
                          v-model="formFields.rehab_cost"
                          type="text"
                          onpaste="return false;"
                          @keypress="(e) => isNumeric(e)"
                          class="form-control"
                          placeholder="Enter Rehab. Cost"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Constituency Detail</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>NA Code</label>

                        <select2
                          v-model="formFields.na_id"
                          placeholder="Select NA"
                          :options="listOfNa"
                          @change="MNAChanged($event)"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>MNA Name</label>
                        <input
                          v-model="this.mna_name"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>PP Code</label>
                        <select2
                          v-model="formFields.pp_id"
                          placeholder="Select PP"
                          :options="listOfPp"
                          @change="MPAChanged($event)"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>MPA Name</label>
                        <input
                          v-model="this.mpa_name"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                    </div>
                    <h3 class="form-caption">Scheme Detail</h3>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label>Sch. Latittude</label>
                        <input
                          v-model="formFields.sch_lat"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Sch. Longitude</label>
                        <input
                          v-model="formFields.sch_long"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>DD Code</label>
                        <input
                          v-model="formFields.dd_code"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Project Code</label>
                        <input
                          v-model="formFields.proj_code"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Object Code</label>
                        <input
                          v-model="formFields.object_code"
                          type="text"
                          class="form-control"
                          placeholder="Enter text here"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="tab-pane fade" id="pills-performance" role="tabpanel" aria-labelledby="pills-performance-tab">
                  <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3 vertical-tabs bg-secondary bg-opacity-10 rounded-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link text-start active" id="v-pills-pc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pc" type="button" role="tab" aria-controls="v-pills-pc" aria-selected="true">PC</button>
                        <button class="nav-link text-start" id="v-pills-aa-tab" data-bs-toggle="pill" data-bs-target="#v-pills-aa" type="button" role="tab" aria-controls="v-pills-aa" aria-selected="false">AA</button>
                        <button class="nav-link text-start" id="v-pills-tc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tc" type="button" role="tab" aria-controls="v-pills-tc" aria-selected="false">TC</button>
                        <button class="nav-link text-start" id="v-pills-contract-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contract" type="button" role="tab" aria-controls="v-pills-contract" aria-selected="false">Contract</button>
                        <button class="nav-link text-start" id="v-pills-allocation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-allocation" type="button" role="tab" aria-controls="v-pills-allocation" aria-selected="false">Allocation</button>
                        <button class="nav-link text-start" id="v-pills-release-pnd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-release-pnd" type="button" role="tab" aria-controls="v-pills-release-pnd" aria-selected="false">Release P & D</button>
                        <button class="nav-link text-start" id="v-pills-release-fd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-release-fd" type="button" role="tab" aria-controls="v-pills-release-fd" aria-selected="false">Release FD</button>
                        <button class="nav-link text-start" id="v-pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#v-pills-monthly" type="button" role="tab" aria-controls="v-pills-monthly" aria-selected="false">Monthly Progress</button>
                        <button class="nav-link text-start" id="v-pills-visits-tab" data-bs-toggle="pill" data-bs-target="#v-pills-visits" type="button" role="tab" aria-controls="v-pills-visits" aria-selected="false">Visits</button>
                        <button class="nav-link text-start" id="v-pills-enhancement-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enhancement" type="button" role="tab" aria-controls="v-pills-enhancement" aria-selected="false">Enhancement</button>
                        <button class="nav-link text-start" id="v-pills-cbo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cbo" type="button" role="tab" aria-controls="v-pills-cbo" aria-selected="false">CBO</button>
                        <button class="nav-link text-start" id="v-pills-hh-tab" data-bs-toggle="pill" data-bs-target="#v-pills-hh" type="button" role="tab" aria-controls="v-pills-hh" aria-selected="false">HH Connections</button>
                        <button class="nav-link text-start" id="v-pills-community-tab" data-bs-toggle="pill" data-bs-target="#v-pills-community" type="button" role="tab" aria-controls="v-pills-community" aria-selected="false">Community Share</button>
                        <button class="nav-link text-start" id="v-pills-village-tab" data-bs-toggle="pill" data-bs-target="#v-pills-village" type="button" role="tab" aria-controls="v-pills-village" aria-selected="false">Village Seed</button>
                    </div>
                    <div class="tab-content p-0 w-100" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-pc" role="tabpanel" aria-labelledby="v-pills-pc-tab">
                          <div class="row">
                            <div class="col-md-12 table-responsive phed-tabs-box">
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
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>11</td>
                                    <td>11</td>
                                    <td>2021-11-03</td>
                                    <td>111</td>
                                    <td>N/A</td>
                                    <td>11</td>
                                    <td>111</td>
                                    <td>111</td>
                                    <td>111</td>
                                    <td>111</td>
                                    <td style="display: inline-block">
                                      <span
                                        ><i
                                          class="fa fa-edit text-warning me-2"
                                          aria-hidden="true"
                                        ></i></span
                                      ><span
                                        ><i
                                          class="fa fa-trash text-danger"
                                          aria-hidden="true"
                                        ></i
                                      ></span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div
                                class="
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                  tab-btn-container
                                "
                              >
                                <button
                                  type="button"
                                  class="btn btn-success"
                                >
                                  <i class="fa fa-plus-circle me-3"></i>
                                  <span>Add More</span>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-aa" role="tabpanel" aria-labelledby="v-pills-aa-tab">AA</div>
                        <div class="tab-pane fade" id="v-pills-tc" role="tabpanel" aria-labelledby="v-pills-tc-tab">TC</div>
                        <div class="tab-pane fade" id="v-pills-contract" role="tabpanel" aria-labelledby="v-pills-contract-tab">contract</div>
                        <div class="tab-pane fade" id="v-pills-allocation" role="tabpanel" aria-labelledby="v-pills-allocation-tab">allocation</div>
                        <div class="tab-pane fade" id="v-pills-release-pnd" role="tabpanel" aria-labelledby="v-pills-release-pnd-tab">release-pnd</div>
                        <div class="tab-pane fade" id="v-pills-release-fd" role="tabpanel" aria-labelledby="v-pills-release-fd-tab">PC</div>
                        <div class="tab-pane fade" id="v-pills-monthly" role="tabpanel" aria-labelledby="v-pills-monthly-tab">monthly</div>
                        <div class="tab-pane fade" id="v-pills-visits" role="tabpanel" aria-labelledby="v-pills-visits-tab">visits</div>
                        <div class="tab-pane fade" id="v-pills-enhancement" role="tabpanel" aria-labelledby="v-pills-enhancement-tab">enhancement</div>
                        <div class="tab-pane fade" id="v-pills-cbo" role="tabpanel" aria-labelledby="v-pills-cbo-tab">CBO</div>
                        <div class="tab-pane fade" id="v-pills-hh" role="tabpanel" aria-labelledby="v-pills-hh-tab">hh</div>
                        <div class="tab-pane fade" id="v-pills-community" role="tabpanel" aria-labelledby="v-pills-community-tab">community</div>
                        <div class="tab-pane fade" id="v-pills-village" role="tabpanel" aria-labelledby="v-pills-village-tab">village</div>
                    </div>
                </div>
                </div> -->
                <schemePerformanceNew v-if="this.editMode || this.mix_val" />
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <div class="form-container">
              <button @click="createRecord" class="btn btn-theme-green px-5">
                Save
              </button>
              <button
                @click="resetFormFields"
                class="btn btn-outline-secondary px-5"
              >
                Reset
              </button>
            </div>
          </div>
          <!-- <template v-if="this.editMode || this.mix_val"> -->

          <!-- <schemePerformance v-if="this.editMode || this.mix_val" /> -->
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import select2 from "v-select2-component";
import schemePerformance from "./performance/schemePerformance.vue";
import schemePerformanceNew from "./performance/schemePerformanceNew.vue";
import mixin from "../mixins/schemeIdMixin";

export default {
  components: {
    schemePerformance,
    select2,
    schemePerformanceNew,
  },
  data() {
    return {
      errors: {},
      listOfProvince: [],
      listOfZone: [],
      listOfDivision: [],
      listOfDistrict: [],
      listOfTehsil: [],
      listOfProgram: [],
      listOfUCs: [],
      listOfVillages: [],
      identifiedBy: [],
      clearedBy: [],
      program: [],
      schemeTypes: [],
      techniques: [],
      newRehabs: [],
      areas: [],
      approvalStatus: [],
      listOfNa: [],
      listOfPp: [],
      functionStatus: [],
      waterSource: [],
      waterQuality: [],
      sourceNature: [],
      cEngineers: [],
      sprEngineers: [],
      sbEngineers: [],
      exEngineers: [],
      sdos: [],
      ex_by: [],
      o_by: [],
      sponsered_agency: [],
      listHandingCode: [],
      isLoading: false,
      editMode: false,
      edit_id: 0,
      sub_scheme_data: {},
      scheme_id_g: "abc",
      province_id_sch: "",
      mix_val: "",
      mna_name: "",
      mpa_name: "",
      mna_id: "",
      mpa_id: "",
      formFields: {
        id: "",
        scheme_number: "",
        directive_sr_no:"",
        scheme_name: "",
        province_id: "",
        zone_id: "",
        division_id: "",
        district_id: "",
        tehsil_id: "",
        program_id: "",
        identified_by_id: "",
        recommended_by_id: "",
        uc_id: "",
        village_locale: "",
        chief_engineer_id: "",
        supr_engineer_id: "",
        executing_eengineer_id: "",
        sdo_id: "",
        sub_engineer_id: "",
        disposal_mode: "",
        disposal_type: "",
        ultimate_disposal: "",
        type_id: "",
        tech_id: "",
        new_rehab_id: "",
        new_rehab_id: "",
        ref_scheme_number: "",
        area_id: "",
        spons_id: "",
        exe_id: "",
        oandm_id: "",
        source_id: "",
        quality_id: "",
        nature_id: "",
        wc_gpcd: "",
        population_served: "",
        block_desc: "",
        adp_yr_id: "",
        approval_forum: "",
        approval_status: "",
        completion_forum: "",
        function_status: "",
        handing_code: "",
        proposed_cost: "",
        approved_cost: "",
        ts_cost: "",
        completion_cost: "",
        rehab_cost: "",
        na_id: "",
        mna_name: "",
        pp_id: "",
        mpa_name: "",
        sch_lat: "",
        sch_long: "",
        dd_code: "",
        proj_code: "",
        object_code: "",
      },
    };
  },
  mounted() {
    if (this.$route.params.id && this.$route.params.id > 0) {
      this.editMode = true;
      this.edit_id = this.$route.params.id;
      this.loadEditForm();
    }
    this.formFields.adp_yr_id = (new Date()).getFullYear();
    this.getProgram();
    this.getProvince();
    this.getschemeTypes();
    this.getTechniques();
    this.getNewRehabs();
    this.getAreas();
    this.getActionBy();
    this.getApprovalStatus();
    this.getFunctionStatus();
    this.getPp();
    this.getNa();
    this.getWaterSource();
    this.getWaterQuality();

    this.getChiefEngineers();
    this.getExeEngineers();
    this.getSuprEngineers();
    this.getSdo();
    this.getSbEngineers();

    this.getExecutedBy();
    this.getOMBy();

    this.getSponseredBy();
    this.getSourecNature();
    this.getHandingCode();
  },
  methods: {
    MNAChanged($event) {
      this.mna_id = $event;
      this.getMNAName();
    },
    MPAChanged($event) {
      this.mpa_id = $event;
      this.getMPAName();
    },
    provinceChanged() {
      this.getZone();
      this.listOfDivision = [];
      this.listOfDistrict = [];
      this.listOfTehsil = [];
    },
    zoneChanged() {
      this.getDivision();
      this.listOfDistrict = [];
      this.listOfTehsil = [];
    },
    divisionChanged() {
      this.getDistrict();
      this.listOfDistrict = [];
      this.listOfTehsil = [];
      this.listOfUCs = [];
      this.listOfVillages = [];
    },
    districtChanged() {
      this.getTehsil();
      this.getUnionCouncils();
      this.getVillages();
    },

    getActionBy() {
      axios
        .get("get-action-by")
        .then((response) => {
          this.identifiedBy = response.data;
          this.clearedBy = response.data;
        })
        .catch((err) => {
          console.log("action-by-selects2", err);
        });
    },
    getProgram() {
      axios
        .get("get-program")
        .then((response) => {
          this.listOfProgram = response.data;
        })
        .catch((err) => {
          console.log("province-name-selects2", err);
        });
    },
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
    getZone() {
      axios
        .get("get-zone/" + this.formFields.province_id)
        .then((response) => {
          this.listOfZone = response.data;
        })
        .catch((err) => {
          console.log("zone-name-selects2", err);
        });
    },
    getDivision() {
      axios
        .get("get-division/" + this.formFields.zone_id)
        .then((response) => {
          this.listOfDivision = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    getDistrict() {
      axios
        .get("get-district/" + this.formFields.division_id)
        .then((response) => {
          this.listOfDistrict = response.data;
        })
        .catch((err) => {
          console.log("district-name-selects2", err);
        });
    },
    getTehsil() {
      axios
        .get("get-tehsil/" + this.formFields.district_id)
        .then((response) => {
          this.listOfTehsil = response.data;
        })
        .catch((err) => {
          console.log("tehsil-name-selects2", err);
        });
    },
    getVillages() {
      axios
        .get("get-villages/" + this.formFields.district_id)
        .then((response) => {
          this.listOfVillages = response.data;
        })
        .catch((err) => {
          console.log("tehsil-name-selects2", err);
        });
    },
    getUnionCouncils() {
      axios
        .get("get-ucs/" + this.formFields.district_id)
        .then((response) => {
          this.listOfUCs = response.data;
        })
        .catch((err) => {
          console.log("UC-name-selects2", err);
        });
    },
    resetFormFields() {
      this.formFields = {
        scheme_number: "",
        scheme_name: "",
        directive_sr_no:"",
        provience_id: "",
        zone_id: "",
        division_id: "",
        district_id: "",
        tehsil_id: "",
        program_id: "",
        identified_by_id: "",
        recommended_by_id: "",
        uc_id: "",
        village_locale: "",
        chief_engineer_id: "",
        supr_engineer_id: "",
        executing_eengineer_id: "",
        sdo_id: "",
        sub_engineer_id: "",
        disposal_mode: "",
        disposal_type: "",
        ultimate_disposal: "",
        type_id: "",
        tech_id: "",
        new_rehab_id: "",
        new_rehab_id: "",
        ref_scheme_number: "",
        area_id: "",
        spons_id: "",
        exe_id: "",
        oandm_id: "",
        source_id: "",
        quality_id: "",
        nature_id: "",
        wc_gpcd: "",
        population_served: "",
        block_desc: "",
        adp_yr_id: "",
        approval_forum: "",
        approval_status: "",
        completion_forum: "",
        function_status: "",
        handing_code: "",
        proposed_cost: "",
        approved_cost: "",
        ts_cost: "",
        completion_cost: "",
        rehab_cost: "",
        na_id: "",
        mna_name: "",
        pp_id: "",
        mpa_name: "",
        sch_lat: "",
        sch_long: "",
        dd_code: "",
        proj_code: "",
        object_code: "",
      };
    },
    customAppendFormData() {
      let formData = new FormData();
      //this.formFields is refering to the data object
      let aFields = Object.keys(this.formFields);
      aFields.forEach(function (field, index) {
        formData.append(
          field,
          this.formFields[field] ? this.formFields[field] : ""
        );
      }, this);
      return formData;
    },

    createRecord() {
      let formData = this.customAppendFormData();
      if (this.editMode) {
        formData.append("id", this.edit_id);
      }
      axios
        .post("schemes-create", formData)
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Scheme data saved successfully",
          });
          if (!this.editMode) {
            this.$router.push("/scheme-form/" + response.data.id);
          }
          mixin.setSchemeId(response.data.id);
          mixin.province_id = this.formFields.province_id;
          mixin.sName = this.formFields.scheme_name;

          this.mix_val = mixin.getSchemeId();
          // console.log("response",mixin.getSchemeId());
        })
        .catch((err) => {
          if (err.response.status === 422) {
            this.errors = err.response.data.errors || {};
          }
        });
    },
    loadEditForm(id = this.edit_id) {
      axios
        .get("get-scheme-detail/" + id)
        .then((response) => {
          this.formFields = response.data;
          this.mna_id = response.data.na_id;
          this.pp_id = response.data.pp_id;

          this.getActionBy();
          this.getProgram();
          this.getProvince();
          this.getZone();
          this.getDivision();
          this.getDistrict();
          this.getTehsil();
          this.getMNAName();
          this.getMPAName();
        })
        .catch(({ response }) => {
          // this.subdomLoading = false;
          // this.subdomAvail = false;
          console.log(response);
        })
        .finally(() => {});
    },
    setSchemeId(id) {
      this.scheme_id_g = id;
    },
    getSchemeId() {
      return this.scheme_id_g;
    },
    getschemeTypes() {
      axios
        .get("get-scheme-types")
        .then((response) => {
          this.schemeTypes = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getTechniques() {
      axios
        .get("get-techniques")
        .then((response) => {
          this.techniques = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getNewRehabs() {
      axios
        .get("get-new-rehabs")
        .then((response) => {
          this.newRehabs = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getAreas() {
      axios
        .get("get-areas")
        .then((response) => {
          this.areas = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
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
    getFunctionStatus() {
      axios
        .get("get-function-status")
        .then((response) => {
          this.functionStatus = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getNa() {
      axios
        .get("get-na")
        .then((response) => {
          this.listOfNa = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getPp() {
      axios
        .get("get-pp")
        .then((response) => {
          this.listOfPp = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getMNAName() {
      axios
        .get("get-na/" + this.mna_id)
        .then((response) => {
          this.mna_name = response.data[0].text;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
      // console.log("Get mna name",this.formFields);
    },
    getMPAName() {
      axios
        .get("get-pp/" + this.formFields.pp_id)
        .then((response) => {
          this.mpa_name = response.data[0].text;
          // console.log("MPA",this.mp_name);
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getWaterSource() {
      axios
        .get("get-water-source")
        .then((response) => {
          this.waterSource = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getWaterQuality() {
      axios
        .get("get-water-quality")
        .then((response) => {
          this.waterQuality = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    //Get Engineers dropdowns

    getChiefEngineers() {
      axios
        .get("get-chief-engineers")
        .then((response) => {
          this.cEngineers = response.data;
          // console.log("c engineers",this.cEngineers);
        })
        .catch((err) => {
          // console.log("identified-by-selects2", err);
        });
    },
    getSuprEngineers() {
      axios
        .get("get-supr-engineers")
        .then((response) => {
          this.sprEngineers = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getExeEngineers() {
      axios
        .get("get-ex-engineers")
        .then((response) => {
          this.exEngineers = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getSdo() {
      axios
        .get("get-sdos")
        .then((response) => {
          this.sdos = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getSbEngineers() {
      axios
        .get("get-sb-engineers")
        .then((response) => {
          this.sbEngineers = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getExecutedBy() {
      axios
        .get("get-executed-by")
        .then((response) => {
          this.ex_by = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getOMBy() {
      axios
        .get("get-om-by")
        .then((response) => {
          this.o_by = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getSponseredBy() {
      axios
        .get("get-sponsered-by")
        .then((response) => {
          this.sponsered_agency = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getSourecNature(){
      axios
        .get("get-source-nature")
        .then((response) => {
          this.sourceNature = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
    getHandingCode(){
      axios
        .get("get-handing-code")
        .then((response) => {
          this.listHandingCode = response.data;
        })
        .catch((err) => {
          console.log("identified-by-selects2", err);
        });
    },
   
  },
  mixins: [mixin],
};
</script>