<template>
  <div>

    <div class="tab-content p-0">
      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="province-tab"
            data-bs-toggle="tab"
            data-bs-target="#province"
            type="button"
            role="tab"
            ref="province_tab"
            aria-controls="province"
            aria-selected="true"
            @click="performance_tabs_click('province')"
          >
            Province
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="zone-tab"
            data-bs-toggle="tab"
            data-bs-target="#zone"
            type="button"
            role="tab"
            aria-controls="zone"
            aria-selected="false"
            @click="performance_tabs_click('zone')"
          >
            Zone
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="division-tab"
            data-bs-toggle="tab"
            data-bs-target="#division"
            type="button"
            role="tab"
            aria-controls="division"
            aria-selected="false"
            @click="performance_tabs_click('division')"
          >
            Division
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="district-tab"
            data-bs-toggle="tab"
            data-bs-target="#district"
            type="button"
            role="tab"
            aria-controls="district"
            aria-selected="true"
            @click="performance_tabs_click('district')"
          >
            District
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="tehsil-tab"
            data-bs-toggle="tab"
            data-bs-target="#tehsil"
            type="button"
            role="tab"
            aria-controls="tehsil"
            aria-selected="false"
            @click="performance_tabs_click('tehsil')"
          >
            Tehsil
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="union-tab"
            data-bs-toggle="tab"
            data-bs-target="#union"
            type="button"
            role="tab"
            aria-controls="union"
            aria-selected="false"
            @click="performance_tabs_click('union')"
          >
            Union Council
          </button>
        </li>
        
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="province"
          role="tabpanel"
          aria-labelledby="province-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                 <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>P.Code</th>
                      <th>Province Name</th>
                      <th>Province Description</th>
                      <th>Department Name</th>
                      <th>No of Districts</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="listOfProvince">
                      <tr v-for="(item, index) in listOfProvince" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.id ? item.id : 'N/A' }}</td>
                        <td>{{ item.text ? item.text : 'N/A' }}</td>
                        <td>{{ item.province_desc ? item.province_desc : 'N/A' }}</td>
                        <td>{{ item.dept_name ? item.dept_name : 'N/A' }}</td>
                        <td>{{ item.no_of_districts ? item.no_of_districts: 'N/A' }}</td>
                        <td style="display: inline-block;">
                          <span  @click="editProvince(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span>
                        </td>
                      </tr>  
                    </template>
                  </tbody>
                </table>
                
                    <!-- <data-table
                      :data="records"
                      :filters="filters"
                      :columns="columns"
                      order-by="id"
                      order-dir="desc"
                      class="sticky-table-header"
                      @input="updateProvinceList($event, tableData)"
                      :translate="{ placeholderSearch: 'Search Province' }"
                    >
                      <div
                        slot="pagination"
                        slot-scope="{ links = {}, meta = {} }"
                      >
                        <data-table-footer
                          :links="links"
                          :meta="meta"
                          @eventname="changeURL"
                        ></data-table-footer>
                      </div>

                      <div slot="filters" slot-scope="{ tableData, perPage }">
                        <div class="row mb-2 d-flex align-items-center">
                          <div class="col-md-4">
                            <div class="dataTables_length" id="style-1_length">
                              <label>
                                Results:
                                <select
                                  class="form-control"
                                  v-model="tableData.length"
                                  v-on:change="updateLength($event, tableData)"
                                >
                                  <option :key="page" v-for="page in perPage">
                                    {{ page }}
                                  </option>
                                </select>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3 ml-auto">
                            <input
                              name="name"
                              class="form-control"
                              placeholder="Search Province"
                              v-model="filters.search"
                            />
                          </div>
                        </div>
                      </div>
                    </data-table> -->
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="zone"
          role="tabpanel"
          aria-labelledby="zone-tab"
        >
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                 <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Province Name</th>
                      <th>Zone Code</th>
                      <th>Zone Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="listOfZoneListing">
                      <tr v-for="(item, index) in listOfZoneListing" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.province.province_name ? item.province.province_name : 'N/A' }}</td>
                        <td>{{ item.id ? item.id : 'N/A' }}</td>
                        <td>{{ item.zone_name ? item.zone_name : 'N/A' }}</td>
                        <td style="display: inline-block;"><span  @click="editZone(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                      </tr>  
                    </template>
                  </tbody>
                </table> 
                    <!-- <data-table
                      :data="recordsZone"
                      :filters="filters"
                      :columns="columnsZone"
                      order-by="zone_name"
                      order-dir="desc"
                      class="sticky-table-header"
                      :translate="{ placeholderSearch: 'Search Zone' }"
                    >
                      <div
                        slot="pagination"
                        slot-scope="{ linksZone = {}, meta = {} }"
                      >
                        <data-table-footer
                          :links="linksZone"
                          :meta="meta"
                          @eventname="changeURL"
                        ></data-table-footer>
                      </div>

                      <div slot="filters" slot-scope="{ tableData, perPage }">
                        <div class="row mb-2 d-flex align-items-center">
                          <div class="col-md-4">
                            <div class="dataTables_length" id="style-1_length">
                              <label>
                                Results:
                                <select
                                  class="form-control"
                                  v-model="tableData.length"
                                  v-on:change="updateLength($event, tableData)"
                                >
                                  <option :key="page" v-for="page in perPage">
                                    {{ page }}
                                  </option>
                                </select>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3 ml-auto">
                            <input
                              name="name"
                              class="form-control"
                              placeholder="Search Zone"
                              v-model="filters.search"
                            />
                          </div>
                        </div>
                      </div>
                    </data-table> -->
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="division"
          role="tabpanel"
          aria-labelledby="division-tab"
        >
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                     <table class="table mb-2">
                    <thead>
                        <tr>
                        <th>Sr No</th>
                        <th>Province Name</th>
                        <th>Zone Name</th>
                        <th>Division Code</th>
                        <th>Division Name</th>
                        <th>Division Description</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if="divisionListing">
                        <tr v-for="(item, index) in divisionListing" :key="index">
                            <td>{{ ++index }}</td>
                            <td>{{ item.province.province_name ? item.province.province_name : 'N/A' }}</td>
                            <td>{{ item.zone.zone_name ? item.zone.zone_name : 'N/A' }}</td>
                            <td>{{ item.id ? item.id : 'N/A' }}</td>
                            <td>{{ item.division_name ? item.division_name : 'N/A' }}</td>
                            <td>{{ item.division_description ? item.division_description : 'N/A' }}</td>
                            <td style="display: inline-block;"><span  @click="editDivision(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                        </tr>  
                        </template>
                    </tbody>
                    </table> 
                    <!-- <data-table
                      :data="recordsDivision"
                      :filters="filters"
                      :columns="columnsDivision"
                      order-by="division_name"
                      order-dir="desc"
                      class="sticky-table-header"
                      :translate="{ placeholderSearch: 'Search Division' }"
                    >
                      <div
                        slot="pagination"
                        slot-scope="{ linksZone = {}, meta = {} }"
                      >
                        <data-table-footer
                          :links="linksZone"
                          :meta="meta"
                          @eventname="changeURL"
                        ></data-table-footer>
                      </div>

                      <div slot="filters" slot-scope="{ tableData, perPage }">
                        <div class="row mb-2 d-flex align-items-center">
                          <div class="col-md-4">
                            <div class="dataTables_length" id="style-1_length">
                              <label>
                                Results:
                                <select
                                  class="form-control"
                                  v-model="tableData.length"
                                  v-on:change="updateLength($event, tableData)"
                                >
                                  <option :key="page" v-for="page in perPage">
                                    {{ page }}
                                  </option>
                                </select>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3 ml-auto">
                            <input
                              name="name"
                              class="form-control"
                              placeholder="Search Division"
                              v-model="filters.search"
                            />
                          </div>
                        </div>
                      </div>
                    </data-table> -->
                </div>
                </div>
            </div>
        </div>
        <div
          class="tab-pane fade"
          id="district"
          role="tabpanel"
          aria-labelledby="district-tab"
        >
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                     <table class="table mb-2">
                      <thead>
                          <tr>
                          <th>Sr No</th>
                          <th>Province Name</th>
                          <th>Zone Name</th>
                          <th>Division Name</th>
                          <th>District Name</th>
                          <th>Population in 1998</th>
                          <th>Population in 2008</th>
                          <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <template v-if="districtListing">
                          <tr v-for="(item, index) in districtListing" :key="index">
                              <td>{{ ++index }}</td>
                              <td>{{ item.province.province_name ? item.province.province_name : 'N/A' }}</td>
                              <td>{{ item.zone.zone_name ? item.zone.zone_name : 'N/A' }}</td>
                              <td>{{ item.division.division_name ? item.division.division_name : 'N/A' }}</td>
                              <td>{{ item.district_name ? item.district_name : 'N/A' }}</td>
                              <td>{{ item.population_nighty_eight ? item.population_nighty_eight : 'N/A' }}</td>
                              <td>{{ item.population_zero_eight ? item.population_zero_eight : 'N/A' }}</td>
                              <td style="display: inline-block;"><span  @click="editDistrict(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
                          </tr>  
                          </template>
                      </tbody>
                    </table> 
                    <!-- <data-table
                      :data="recordsDistrict"
                      :filters="filters"
                      :columns="columnsDistrict"
                      :url="urlDistrict"
                      order-by="district_name"
                      order-dir="desc"
                      class="sticky-table-header"
                      :translate="{ placeholderSearch: 'Search District' }"
                    >
                      <div
                        slot="pagination"
                        slot-scope="{ linksZone = {}, meta = {} }"
                      >
                      <nav class="row">
                        <div class="col-md-6 text-left">
                            <span>
                                Showing {{meta.from}} to {{meta.to}} of {{ meta.total }} Entries
                            </span>
                        </div>
                        <div class="col-md-6 text-right">
                            <button
                                :disabled="!linksZone.prev"
                                class="btn btn-primary"
                                @click="urlDistrict = linksZone.prev">
                                Prev
                            </button>
                            <button
                                :disabled="!linksZone.next"
                                class="btn btn-primary ml-2"
                                @click="urlDistrict = linksZone.next">
                                Next
                            </button>
                        </div>      
                      </nav>
                      </div>

                      <div slot="filters" slot-scope="{ tableData, perPage }">
                        <div class="row mb-2 d-flex align-items-center">
                          <div class="col-md-4">
                            <div class="dataTables_length" id="style-1_length">
                              <label>
                                Results:
                                <select
                                  class="form-control"
                                  v-model="tableData.length"
                                  v-on:change="updateLength($event, tableData)"
                                >
                                  <option :key="page" v-for="page in perPage">
                                    {{ page }}
                                  </option>
                                </select>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3 ml-auto">
                            <input
                              name="name"
                              class="form-control"
                              placeholder="Search District"
                              v-model="filters.search"
                            />
                          </div>
                        </div>
                      </div>
                    </data-table> -->
                </div>
                </div>
            </div>
        </div>
        <div
          class="tab-pane fade"
          id="tehsil"
          role="tabpanel"
          aria-labelledby="tehsil-tab"
        >
          
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                    <table class="table mb-2">
                    <thead>
                        <tr>
                        <th>Sr No</th>
                        <th>Province Name</th>
                        <th>Zone Name</th>
                        <th>Division Name</th>
                        <th>District Name</th>
                        <th>Tehsil Name</th>
                        <th>Population in 1998</th>
                        <th>Population in 2008</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if="listOfTehsil">
                        <tr v-for="(item, index) in listOfTehsil" :key="index">
                            <td>{{ ++index }}</td>
                            <td>{{ item.province.province_name ? item.province.province_name : 'N/A' }}</td>
                            <td>{{ item.zone.zone_name ? item.zone.zone_name : 'N/A' }}</td>
                            <td>{{ item.division.division_name ? item.division.division_name : 'N/A' }}</td>
                            <td>{{ item.district.district_name ? item.district.district_name : 'N/A' }}</td>
                            <td>{{ item.tehsil_name ? item.tehsil_name : 'N/A' }}</td>
                            <td>{{ item.population_nighty_eight ? item.population_nighty_eight : 'N/A' }}</td>
                            <td>{{ item.annual_growth ? item.annual_growth : 'N/A' }}</td>
                            <td style="display: inline-block;"><span  @click="editTehsil(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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
          id="union"
          role="tabpanel"
          aria-labelledby="union-tab"
        >
        <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Province Name</th>
                      <th>Zone Name</th>
                      <th>Division Name</th>
                      <th>District Name</th>
                      <th>Tehsil Name</th>
                      <th>UC Code</th>
                      <th>UC No</th>
                      <th>UC Name</th>
                      <th>Population (1998)</th>
                      <th>Population (2008)</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="listOfUnion">
                      <tr v-for="(item, index) in listOfUnion" :key="index">
                        <td>{{ ++index }}</td>
                        <td>{{ item.province.province_name ? item.province.province_name : 'N/A' }}</td>
                        <td>{{ item.zone.zone_name ? item.zone.zone_name : 'N/A' }}</td>
                        <td>{{ item.division.division_name ? item.division.division_name : 'N/A' }}</td>
                        <td>{{ item.district.district_name ? item.district.district_name : 'N/A' }}</td>
                        <td>{{ item.tehsil.tehsil_name ? item.tehsil.tehsil_name : 'N/A' }}</td>
                        <td>{{ item.id ? item.id : 'N/A' }}</td>
                        <td>{{ item.uc_no ? item.uc_no : 'N/A' }}</td>
                        <td>{{ item.uc_name ? item.uc_name : 'N/A' }}</td>
                        <td>{{ item.population_nighty_eight ? item.population_nighty_eight : 'N/A' }}</td>
                        <td>{{ item.population_zero_eight ? item.population_zero_eight : 'N/A' }}</td>
                        <td style="display: inline-block;"><span  @click="editUnion(item.id)"><i class="fa fa-edit text-warning me-2" aria-hidden="true"></i></span></td>
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



    <!-- Modal for Adding Province -->

    <div
      class="modal fade"
      id="provinceModal"
      tabindex="-1"
      aria-labelledby="provinceModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="provinceModalLabel">Add Province Detail</h5>
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
                            <label>Province Code</label>
                            <input
                            v-model="formFieldsModal.province_code"
                              type="number"
                              class="form-control"
                              placeholder="Enter Province Code"
                            />
                          </div> -->
                          
                          <div class="col-md-4 mb-3">
                            <label>Province Name</label>
                            <input
                            v-model="formFieldsModal.province_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter Province Name"
                            />
                            
                            <div
                                v-if="errors && errors.province_name"
                                class="text-danger"
                                >
                                {{ errors.province_name[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>Province Description</label>
                            <input
                            v-model="formFieldsModal.province_desc"
                              type="text"
                              class="form-control"
                              placeholder="Enter Province Description"
                            />

                            <div
                                v-if="errors && errors.province_desc"
                                class="text-danger"
                                >
                                {{ errors.province_desc[0] }}
                            </div>

                          </div> 

                          <div class="col-md-4 mb-3">
                            <label>Department Name</label>
                            <input
                            v-model="formFieldsModal.dept_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter Department Name"
                            />

                            <div
                                v-if="errors && errors.dept_name"
                                class="text-danger"
                                >
                                {{ errors.dept_name[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>No of Districts</label>
                            <input
                            v-model="formFieldsModal.no_of_districts"
                              type="number"
                              class="form-control"
                              placeholder="Enter No of Districts"
                            />

                            <div
                                v-if="errors && errors.no_of_districts"
                                class="text-danger"
                                >
                                {{ errors.no_of_districts[0] }}
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
            <button type="button" @click="createProvinceRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Adding Province -->

    <!-- Modal for adding Zone -->

    <div
      class="modal fade"
      id="zoneModal"
      tabindex="-1"
      aria-labelledby="zoneModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="zoneModalLabel">Add Zone Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetZoneFormFields"
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
                          
                          <div class="col-md-6 mb-3">
                            <label>Province</label>
                            <select2
                            v-model="formFieldsZoneModal.province_id"
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
                          
                          <div class="col-md-4 mb-3">
                            <label>Zone Name</label>
                            <input
                            v-model="formFieldsZoneModal.zone_name"
                              type="text"
                              class="form-control"
                              placeholder="Enter Zone Name"
                            />
                            <div
                            v-if="errors && errors.zone_name"
                            class="text-danger"
                            >
                            {{ errors.zone_name[0] }}
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
            <button type="button" @click="createZoneRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding Zone -->

    <!-- Modal for adding Division -->

    <div
      class="modal fade"
      id="divisionModal"
      tabindex="-1"
      aria-labelledby="divisionModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="divisionModalLabel">Add Division Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetDivisionFormFields"
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
                          
                            <div class="col-md-3 mb-3">
                                <label>Province</label>
                                <select2
                                v-model="formFieldsDivisionModal.province_id"
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
                                v-model="formFieldsDivisionModal.zone_id"
                                placeholder="Select Zone"
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
                                <label>Division Name</label>
                                <input
                                v-model="formFieldsDivisionModal.division_name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Division Name"
                                />
                                <div
                                v-if="errors && errors.division_name"
                                class="text-danger"
                                >
                                {{ errors.division_name[0] }}
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Description</label>
                                <input
                                v-model="formFieldsDivisionModal.division_description"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Division Description"
                                />
                                <div
                                v-if="errors && errors.division_description"
                                class="text-danger"
                                >
                                {{ errors.division_description[0] }}
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
            <button type="button" @click="createDivisionRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding Division -->

    <!-- Modal for adding District -->

    <div
        class="modal fade"
        id="districtModal"
        tabindex="-1"
        aria-labelledby="districtModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" style="max-width: 1200px !important;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="districtModalLabel">Add District Detail</h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetDistrictFormFields"
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
                            
                                <div class="col-md-3 mb-3">
                                    <label>Province</label>
                                    <select2
                                    v-model="formFieldsDistrictModal.province_id"
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
                                    v-model="formFieldsDistrictModal.zone_id"
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
                                    v-model="formFieldsDistrictModal.division_id"
                                    placeholder="Select Division"
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
                                    <label>District Name</label>
                                    <input
                                    v-model="formFieldsDistrictModal.district_name"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter District Name"
                                    />
                                    <div
                                    v-if="errors && errors.district_name"
                                    class="text-danger"
                                    >
                                    {{ errors.district_name[0] }}
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Population in 1998</label>
                                    <input
                                    v-model="formFieldsDistrictModal.population_nighty_eight"
                                        type="number"
                                        class="form-control"
                                        placeholder="Enter Population in 1998"
                                    />
                                    <div
                                    v-if="errors && errors.population_nighty_eight"
                                    class="text-danger"
                                    >
                                    {{ errors.population_nighty_eight[0] }}
                                    </div>
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <label>Population in 2008</label>
                                    <input
                                    v-model="formFieldsDistrictModal.population_zero_eight"
                                        type="number"
                                        class="form-control"
                                        placeholder="Enter Population in 2008"
                                    />
                                    <div
                                    v-if="errors && errors.population_zero_eight"
                                    class="text-danger"
                                    >
                                    {{ errors.population_zero_eight[0] }}
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
                <button type="button" @click="createDistrictRecord" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>  

    <!-- Modal for adding District -->

    <!-- Modal for adding Tehsil -->

    <div
        class="modal fade"
        id="tehsilModal"
        tabindex="-1"
        aria-labelledby="tehsilModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" style="max-width: 1200px !important;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tehsilModalLabel">Add Tehsil Detail</h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                @click="resetTehsilFormFields"
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
                            
                                <div class="col-md-3 mb-3">
                                    <label>Province</label>
                                    <select2
                                    v-model="formFieldsTehsilModal.province_id"
                                    placeholder="Select Province"
                                    @change="provinceChangedTehsil($event)"
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
                                    v-model="formFieldsTehsilModal.zone_id"
                                    placeholder="Select Zone"
                                    @change="zoneChangedForTehsil($event)"
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
                                    v-model="formFieldsTehsilModal.division_id"
                                    placeholder="Select Division"
                                    @change="divisionChangedForTehsil($event)"
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
                                    v-model="formFieldsTehsilModal.district_id"
                                    placeholder="Select District"
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
                                    <label>Tehsil Name</label>
                                    <input
                                    v-model="formFieldsTehsilModal.tehsil_name"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Tehsil Name"
                                    />
                                    <div
                                    v-if="errors && errors.tehsil_name"
                                    class="text-danger"
                                    >
                                    {{ errors.tehsil_name[0] }}
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Population in 1998</label>
                                    <input
                                    v-model="formFieldsTehsilModal.population_nighty_eight"
                                        type="number"
                                        class="form-control"
                                        placeholder="Enter Population in 1998"
                                    />
                                    <div
                                    v-if="errors && errors.population_nighty_eight"
                                    class="text-danger"
                                    >
                                    {{ errors.population_nighty_eight[0] }}
                                    </div>
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <label>Annual Growth</label>
                                    <input
                                    v-model="formFieldsTehsilModal.annual_growth"
                                        type="number"
                                        class="form-control"
                                        placeholder="Enter Annual Growth"
                                    />
                                    <div
                                    v-if="errors && errors.annual_growth"
                                    class="text-danger"
                                    >
                                    {{ errors.annual_growth[0] }}
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
                <button type="button" @click="createTehsilRecord" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div> 

    <!-- Modal for adding Tehsil -->

    <!-- Modal for adding Union Council -->

    <div
      class="modal fade"
      id="unionModal"
      tabindex="-1"
      aria-labelledby="unionModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" style="max-width: 1200px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="unionModalLabel">Add Union Detail</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="resetUnionFormFields"
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

                            <div class="col-md-3 mb-3">
                                <label>Province</label>
                                <select2
                                v-model="formFieldsUnionModal.province_id"
                                placeholder="Select Province"
                                @change="provinceChangedUnion($event)"
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
                                v-model="formFieldsUnionModal.zone_id"
                                placeholder="Select Zone"
                                @change="zoneChangedForUnion($event)"
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
                                v-model="formFieldsUnionModal.division_id"
                                placeholder="Select Division"
                                @change="divisionChangedForUnion($event)"
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
                                v-model="formFieldsUnionModal.district_id"
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
                                v-model="formFieldsUnionModal.tehsil_id"
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
                          
                            <div class="col-md-4 mb-3">
                                <label>UC Name</label>
                                <input
                                v-model="formFieldsUnionModal.uc_name"
                                type="text"
                                class="form-control"
                                placeholder="Enter UC Name"
                                />
                                
                                <div
                                    v-if="errors && errors.uc_name"
                                    class="text-danger"
                                    >
                                    {{ errors.uc_name[0] }}
                                </div>

                            </div>

                          <div class="col-md-4 mb-3">
                            <label>UC No</label>
                            <input
                            v-model="formFieldsUnionModal.uc_no"
                              type="text"
                              class="form-control"
                              placeholder="Enter UC No"
                            />

                            <div
                                v-if="errors && errors.uc_no"
                                class="text-danger"
                                >
                                {{ errors.uc_no[0] }}
                            </div>

                          </div> 

                          <div class="col-md-4 mb-3">
                            <label>Population (1998)</label>
                            <input
                            v-model="formFieldsUnionModal.population_nighty_eight"
                              type="text"
                              class="form-control"
                              placeholder="Enter Population in 1998"
                            />

                            <div
                                v-if="errors && errors.population_nighty_eight"
                                class="text-danger"
                                >
                                {{ errors.population_nighty_eight[0] }}
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <label>Population (2008)</label>
                            <input
                            v-model="formFieldsUnionModal.population_zero_eight"
                              type="number"
                              class="form-control"
                              placeholder="Enter Population in 2008"
                            />

                            <div
                                v-if="errors && errors.population_zero_eight"
                                class="text-danger"
                                >
                                {{ errors.population_zero_eight[0] }}
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
            <button type="button" @click="createUnionRecord" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding Union Council -->
  </div>





</template>

<script>
import select2 from "v-select2-component";
import ActionComponent from "./../../GlobalCommonComponents/ActionComponent.vue";
import SerialNo from "./../../common/SerialNoComponent.vue";
import DataTableFooter from "./../../common/DataTableFooter.vue";
import mixin from "./../../mixins/schemeIdMixin";
// import SerialNo from "./../common/SerialNoComponent.vue";
// import DataTableFooter from "./../common/DataTableFooter.vue";
import ActionLocation from "./../../GlobalCommonComponents/ActionLocationComponent.vue";

export default {
  components: {
    select2,
    ActionComponent,
    SerialNo,
    DataTableFooter,
    ActionLocation
    //  SchemeForm
  },
  created() {
    this.$root.$refs.location = this;
  },
  data() {
    return {
        errors: {},
        editMode: false,
        active_el:"",
        listOfProvince:[],
        listOfZone:[],
        listOfZoneListing:[],
        listOfZoneForDistrict:[],
        listOfDivisionsForDistrict:[],
        listOfDivision:[],
        listOfDistrict:[],
        listOfTehsil:[],
        divisionListing:[],
        districtListing:[],
        tehsilListing:[],
        listOfUnion:[],
        listOfZoneForTehsil:[],
        listOfDivisionForTehsil:[],
        listOfDistrictForTehsil:[],
        BACKEND_URL:"",
        formFieldsModal: {
        // province_code: "",
        province_name: "",
        province_desc: "",
        dept_name: "",
        no_of_districts: "",
        },
        formFieldsZoneModal: {
        province_id: "",
        zone_name: "",
        
        },
        formFieldsDivisionModal:{
            province_id:"",
            zone_id:"",
            division_name:"",
            division_description:"",
        },
        formFieldsDistrictModal:{
            province_id:"",
            zone_id:"",
            division_id:"",
            district_name:"",
            population_nighty_eight:"",
            population_zero_eight:"",
        },
        formFieldsTehsilModal:{
            province_id:"",
            zone_id:"",
            division_id:"",
            district_id:"",
            tehsil_name:"",
            population_nighty_eight:"",
            annual_growth:"",
        },
        formFieldsUnionModal:{
            province_id:"",
            zone_id:"",
            division_id:"",
            district_id:"",
            tehsil_id:"",
            uc_name:"",
            uc_no:"",
            population_nighty_eight:"",
            population_zero_eight:""
        },
        // Data table stuff
        isLoading: false,
        filters: {
          page: 1,
          length: 10,
          search: "",
          column: "id",
          dir: "desc",
        },
        records: {},
        recordsZone: {},
        recordsDivision: {},
        recordsDistrict: {},
        recordsTehsil: {},
        recordsUnion: {},
        urlDistrict:mixin.getBackendURL()+"/get-districts-list",
        columns: [
          {
            label: "Sr. No",
            component: SerialNo,
            orderable: false,
          },
          {
            label: "P.Code",
            name: "id",
            orderable: false,
          },
          {
            label: "Province Name",
            name: "province_name",
            orderable: false,
          },
          {
            label: "Province Description",
            name: "province_desc",
            orderable: false,
          },
          {
            label: "Department Name",
            name: "dept_name",
            orderable: false,
          },
          {
            label: "No of Districts",
            name: "no_of_districts",
            orderable: false,
          },
          {
            label: "Action",
            name: 'id',
            orderable: false,
            classes: { 
                'btn': true,
                'btn-info': true,
                'btn-sm': true,
            },
            event: "click",
            handler: this.displayRow,
            component: ActionLocation,
          },
        ],
        columnsZone: [
          {
            label: "Sr. No",
            component: SerialNo,
            orderable: false,
          },
          {
            label: "Zone Code",
            //name: "id",
            orderable: false,
          },
          {
            label: "Province Name",
            name: "province.province_name",
            orderable: false,
          },
          {
            label: "Zone Name",
            name: "zone_name",
            orderable: false,
          },
          {
            label: "Action",
            name: "scheme",
            orderable: false,
            classes: {},
            event: "click",
          },
        ],
        columnsDivision:[
          {
            label: "Sr. No",
            component: SerialNo,
            orderable: false,
          },
          {
            label: "Province Name",
            name: "province.province_name",
            orderable: false,
          },
          {
            label: "Zone Name",
            name: "zone.zone_name",
            orderable: false,
          },
          {
            label: "Division Code",
            //name: "id",
            orderable: false,
          },
          {
            label: "Division Name",
            name: "division_name",
            orderable: false,
          },
          {
            label: "Division Description",
            name: "division_description",
            orderable: false,
          },
        ],
        columnsDistrict:[
          {
            label: "Sr. No",
            component: SerialNo,
            orderable: false,
          },
          {
            label: "Province Name",
            name: "province.province_name",
            orderable: false,
          },
          {
            label: "Zone Name",
            name: "zone.zone_name",
            orderable: false,
          },
          {
            label: "Division Name",
            name: "division.division_name",
            orderable: false,
          },
          {
            label: "District Name",
            name: "district_name",
            orderable: false,
          },
          {
            label: "Population (1998)",
            name: "population_nighty_eight",
            orderable: false,
          },
          {
            label: "Population (2008)",
            name: "population_zero_eight",
            orderable: false,
          },
        ],
        columnsTehsil:[

        ],
        columnsUnion:[

        ],
        ProvinceHeaders: [
          {
            text: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            value: 'name',
          },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' },
        ],
        ProvinceItems: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%',
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1%',
          },
          {
            name: 'Eclair',
            calories: 262,
            fat: 16.0,
            carbs: 23,
            protein: 6.0,
            iron: '7%',
          },
          {
            name: 'Cupcake',
            calories: 305,
            fat: 3.7,
            carbs: 67,
            protein: 4.3,
            iron: '8%',
          },
          {
            name: 'Gingerbread',
            calories: 356,
            fat: 16.0,
            carbs: 49,
            protein: 3.9,
            iron: '16%',
          },
          {
            name: 'Jelly bean',
            calories: 375,
            fat: 0.0,
            carbs: 94,
            protein: 0.0,
            iron: '0%',
          },
          {
            name: 'Lollipop',
            calories: 392,
            fat: 0.2,
            carbs: 98,
            protein: 0,
            iron: '2%',
          },
          {
            name: 'Honeycomb',
            calories: 408,
            fat: 3.2,
            carbs: 87,
            protein: 6.5,
            iron: '45%',
          },
          {
            name: 'Donut',
            calories: 452,
            fat: 25.0,
            carbs: 51,
            protein: 4.9,
            iron: '22%',
          },
          {
            name: 'KitKat',
            calories: 518,
            fat: 26.0,
            carbs: 65,
            protein: 7,
            iron: '6%',
          },
        ],
        
    };
  },
  mounted() {
      this.active_el = "";
      this.active_el = this.$refs.province_tab.getAttribute('data-bs-target');
      this.active_el = this.active_el.replace("#","");

      // console.log("mounted location codes",this.active_el);
      mixin.set_table_tab_val(this.active_el);

      
      this.getProvince();
      this.getZonesList();
    //   this.getDivision();
    //   this.getDistrict()
      this.loadZoneList();
      this.loadDivisionList();
      this.loadDistrictList();
      this.loadTehsilList();
      this.loadUnionList();

      // this.downloadProvinceData();
  },
  methods: {
    // All methods for listings 
    // Search methods, update methods etc

    // Province List methods goes here
    displayRow(data) {
      this.editProvince(data.id);
    },
    updateProvinceList(row,tableData){
      console.log("the row",row);
      console.log("the tableData",tableData);
    },
    updateProvinceList(row, tableData) {
      if (row) {
          tableData.search = row.name;
      } else {
          tableData.search = '';
      }
    },
    searchUsersByName(term = '') {
      console.log("the term",term);
      // axios.get(this.url + term)
      //     .then(response => {
      //         this.selectOptions = response.data;
      //     });
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


      // axios
      //   .get("get-provinces-list", {
      //     params: this.filters,
      //   })
      //   .then(
      //     function (response) {
      //       //console.log("the response data",response.data.data);
      //       this.records = response.data;
      //       this.listOfProvince = response.data;
      //       console.log("this records",this.records);
      //     }.bind(this)
      //   )
      //   .catch((err) => {
      //     this.isLoading = false;
      //     console.log("program-name-selects2", err);
      //   });
    },
    getZonesList(){
      axios
        // .get("get-province", {
        .get("get-zones-list", {
          params: this.filters,
        })
        // .then(
        //   function (response) {
        //     //console.log("the response data",response.data.data);
        //     console.log("zone records",response.data);
        //     this.recordsZone = response.data;
        //     this.listOfProvince = response.data;
        //   }.bind(this)
        // )
        .then((response) => {
          this.listOfZone = response.data;
        })
        .catch((err) => {
          this.isLoading = false;
          console.log("program-name-selects2", err);
        });
    },
    provinceChanged() {
      this.getZone();
      this.listOfZone = [];
      this.listOfDivision = [];
      this.listOfDistrict = [];
      this.listOfTehsil = [];
      this.listOfDivisionsForDistrict = [];

      this.formFieldsDivisionModal.zone_id = '';
      this.formFieldsDistrictModal.zone_id = '';

    },
    provinceChangedTehsil() {
      this.getZoneForTehsil();
      this.listOfZone = [];
      this.listOfDivision = [];
      this.listOfDistrict = [];

    },
    provinceChangedUnion() {
      this.getZoneForUnion();
      this.listOfZone = [];
      this.listOfDivision = [];
      this.listOfDistrict = [];
      this.listOfTehsil = [];

    },
    getZone() {
        let id = 0;
        if(this.formFieldsDivisionModal.province_id){
            id = this.formFieldsDivisionModal.province_id;
            axios
                .get("get-zone/" + parseInt(id))
                .then((response) => {
                this.listOfZone = response.data;
                })
                .catch((err) => {
                console.log("zone-name-selects2", err);
            });
        }
        else{
            id = this.formFieldsDistrictModal.province_id
            // console.log("changed province",id);
        axios
            .get("get-zone/" + parseInt(id) )
            .then((response) => {
            this.listOfZone = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
            });
        }
    
    },
    getZoneSelfDetails(id){
        axios
            .get("get-self-zone/" + id)
            .then((response) => {
            this.listOfZone = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
        });
    },
    getDivisionSelfDetails(id){
        axios
            .get("get-self-division/" + id)
            .then((response) => {
            this.listOfDivision = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
        });
    },
    getDistrictSelfDetails(id){
        axios
            .get("get-self-district/" + id)
            .then((response) => {
            this.listOfDistrict = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
        });
    },
    getTehsilSelfDetails(id){
        axios
            .get("get-self-tehsil/" + id)
            .then((response) => {
            this.listOfTehsil = response.data;
            })
            .catch((err) => {
            console.log("tehsil-name-selects2", err);
        });
    },
    getZoneForTehsil() {
        
        axios
            .get("get-zone/" + this.formFieldsTehsilModal.province_id)
            .then((response) => {
            this.listOfZone = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
            });
        
    },
    getZoneForUnion() {
        
        axios
            .get("get-zone/" + this.formFieldsUnionModal.province_id)
            .then((response) => {
            this.listOfZone = response.data;
            })
            .catch((err) => {
            console.log("zone-name-selects2", err);
            });
        
    },
    zoneChanged() {
      this.getDivision();
    },
    zoneChangedForTehsil() {
      this.getDivisionForTehsil();
    //   this.getDistrictForTehsil();
      this.listOfDivision = [];
      this.listOfDistrict = [];
    },
    zoneChangedForUnion() {
      this.getDivisionForUnion();
    //   this.getDistrictForTehsil();
      this.listOfDivision = [];
      this.listOfDistrict = [];
    },
    getDivision() { 
      axios
        .get("get-division/" + this.formFieldsDistrictModal.zone_id)
        .then((response) => {
          this.listOfDivisionsForDistrict = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    getDistrict() {
      axios
        .get("get-district/" + this.formFieldsTehsilModal.division_id)
        .then((response) => {
          this.districtListing = response.data;
        })
        .catch((err) => {
          console.log("district-name-selects2", err);
        });
    },
    getDivisionForTehsil() {
      axios
        .get("get-division/" + this.formFieldsTehsilModal.zone_id)
        .then((response) => {
          this.listOfDivision = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    getDivisionForUnion() {
      axios
        .get("get-division/" + this.formFieldsUnionModal.zone_id)
        .then((response) => {
          this.listOfDivision = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    divisionChangedForTehsil(){
        this.getDistrictForTehsil();
    },
    divisionChangedForUnion(){
        this.getDistrictForUnion();
    },
    getDistrictForTehsil(){
        console.log("div id in district for tehsil",this.formFieldsTehsilModal.division_id);
        axios
        .get("get-district/" + this.formFieldsTehsilModal.division_id)
        .then((response) => {
          this.listOfDistrict = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    getDistrictForUnion(){
        axios
        .get("get-district/" + this.formFieldsUnionModal.division_id)
        .then((response) => {
          this.listOfDistrict = response.data;
        })
        .catch((err) => {
          console.log("division-name-selects2", err);
        });
    },
    districtChanged() {
      this.getTehsil();
    },
    getTehsil() {
      axios
        .get("get-tehsil/" + this.formFieldsUnionModal.district_id)
        .then((response) => {
          this.listOfTehsil = response.data;
        })
        .catch((err) => {
          console.log("tehsil-name-selects2", err);
        });
    },
    performance_tabs_click(performance) {
      this.active_el = performance;
      if(performance){
        mixin.set_table_tab_val(performance);
      }
    },

    // Reset Form fields - Province, Zone, Division, District, Tehsil and UC
    resetFormFields() {
          this.formFieldsModal = {
            // province_code: "",
            province_name: "",
            province_desc: "",
            dept_name: "",
            no_of_districts: "",
          };
    },
    resetZoneFormFields() {
          this.formFieldsZoneModal = {
            // province_code: "",
            province_id: "",
            zone_name: "",
          };
    },
    resetDivisionFormFields(){
        this.formFieldsDivisionModal = {
            province_id:"",
            zone_id:"",
            division_name:"",
            division_description:"",
        }
    },
    resetDistrictFormFields(){
        this.formFieldsDistrictModal = {
            province_id:"",
            zone_id:"",
            division_id:"",
            district_name:"",
            population_nighty_eight:"",
            population_zero_eight:"",
        }
    },
    resetTehsilFormFields(){
        this.formFieldsTehsilModal = {
            province_id:"",
            zone_id:"",
            division_id:"",
            district_id:"",
            tehsil_name:"",
            population_nighty_eight:"",
            annual_growth:"",
        }
    },
    resetUnionFormFields(){
        this.formFieldsUnionModal = {
            province_id:"",
            zone_id:"",
            division_id:"",
            district_id:"",
            tehsil_id:"",
            uc_name:"",
            uc_no:"",
            population_nighty_eight:"",
            population_zero_eight:"",
        }
    },

    // Hide Modals by their IDs - Generic method
    hideModal(){
        $("#"+this.active_el+"Modal").modal("hide");
        console.log("hide modal:",this.active_el);
        if(this.active_el == 'province'){
            this.resetFormFields();
        }
        else if(this.active_el == 'zone'){
            this.resetZoneFormFields();
        }
        else if(this.active_el == 'division'){
            this.resetDivisionFormFields();
        }
        else if(this.active_el == 'district'){
            this.resetDistrictFormFields();
        }
        else if(this.active_el == 'tehsil'){
            this.resetTehsilFormFields();
        }
        this.active_el = "";
    },
    // Methods for modal Province
    customAppendProvinceFormData() {
          let formData = new FormData();
          //this.formFieldsModal is refering to the data object
          let aFields = Object.keys(this.formFieldsModal);
          
          aFields.forEach(function (field, index) {
            
            formData.append(
              field,
              this.formFieldsModal[field] ? this.formFieldsModal[field] : ""
            );
          }, this);
          
          return formData;
    },
    createProvinceRecord(){
        
        let formData = this.customAppendProvinceFormData();
        
        axios
            .post("create-province", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Province saved successfully",
              });
                this.loadProvinceList();
                this.resetFormFields();
                this.hideModal();
                this.getProvince();
                this.errors = {};
            //   if (!(this.editMode)) {
            //     this.$router.push("/scheme-form/" + response.data.id);
            //   }
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });

            
    },
    editProvince(id){
          axios.get("get-province-details/" + id).then((response) => {
            console.log("province details response",response);
            console.log("province details response data",response.data);
            this.formFieldsModal = response.data;
          });

          $("#provinceModal").modal("show");
    },
    loadProvinceList(){
          axios.get("get-province").then((response) => {
            this.listOfProvince = response.data;
          });
    },

    // Methods for modal Zone
    customAppendZoneFormData() {
          let formData = new FormData();
          //this.formFieldsZoneModal is refering to the data object
          let aFields = Object.keys(this.formFieldsZoneModal);
          
          aFields.forEach(function (field, index) {
            
            formData.append(
              field,
              this.formFieldsZoneModal[field] ? this.formFieldsZoneModal[field] : ""
            );
          }, this);
          
          return formData;
    },
    createZoneRecord(){
        
        let formData = this.customAppendZoneFormData();
        
        axios
            .post("create-zone", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Zone saved successfully",
              });
                this.loadZoneList();
                this.resetZoneFormFields();
                this.hideModal();
                this.errors = {};
            //   if (!(this.editMode)) {
            //     this.$router.push("/scheme-form/" + response.data.id);
            //   }
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });

            
    },
    loadZoneList(){
          axios.get("get-zone-list").then((response) => {
            this.listOfZoneListing = response.data;
          });
    },
    editZone(id){
          axios.get("get-zone-details/" + id).then((response) => {
            this.formFieldsZoneModal = response.data;
          });

          $("#zoneModal").modal("show");
    },

    // Methods for Division
    customAppendDivisionFormData(){
        let formData = new FormData();
        //this.formFieldsDivisionModal is refering to the data object
        let aFields = Object.keys(this.formFieldsDivisionModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsDivisionModal[field] ? this.formFieldsDivisionModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    createDivisionRecord(){
        let formData = this.customAppendDivisionFormData();
        
        axios
            .post("create-division", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Division saved successfully",
              });
                this.loadDivisionList();
                this.resetDivisionFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadDivisionList(){
      // axios
      //   .get("get-divisions-list", {
      //     params: this.filters,
      //   })
      //   .then(
      //     function (response) {
      //       this.recordsDivision = response.data;
      //     }.bind(this)
      //   )
      //   .catch((err) => {
      //     this.isLoading = false;
      //     console.log("program-name-selects2", err);
      //   });
        axios.get("get-division-list").then((response) => {
            this.divisionListing = response.data;
        });
    },
    editDivision(id){
        axios.get("get-division-details/" + id).then((response) => {
            this.formFieldsDivisionModal = response.data;
            this.getZoneSelfDetails(response.data.zone_id);
          });
        $("#divisionModal").modal("show");
    },

    // Methods for District
    customAppendDistrictFormData(){
        let formData = new FormData();
        //this.formFieldsDistrictModal is refering to the data object
        let aFields = Object.keys(this.formFieldsDistrictModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsDistrictModal[field] ? this.formFieldsDistrictModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    createDistrictRecord(){
        let formData = this.customAppendDistrictFormData();
        
        axios
            .post("create-district", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "District saved successfully",
              });
                this.loadDistrictList();
                this.resetDistrictFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadDistrictList(){
      axios
        .get("get-districts-list", {
          params: this.filters,
        })
        .then(
          function (response) {
            this.recordsDistrict = response.data;
            this.districtListing = response.data;
          }.bind(this)
        )
        .catch((err) => {
          this.isLoading = false;
          console.log("program-name-selects2", err);
        });
    },
    editDistrict(id){
        axios.get("get-district-details/" + id).then((response) => {
            this.formFieldsDistrictModal = response.data;
            console.log("district edit",response.data);
            this.getZoneSelfDetails(response.data.zone_id);
            this.getDivisionSelfDetails(response.data.division_id);
          });

        $("#districtModal").modal("show");
    },

    // Methods for Tehsil
    customAppendTehsilFormData(){
        let formData = new FormData();
        //this.formFieldsTehsilModal is refering to the data object
        let aFields = Object.keys(this.formFieldsTehsilModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsTehsilModal[field] ? this.formFieldsTehsilModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    createTehsilRecord(){
        let formData = this.customAppendTehsilFormData();
        
        axios
            .post("create-tehsil", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Tehsil saved successfully",
              });
                this.loadTehsilList();
                this.resetTehsilFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadTehsilList(){
        axios.get("get-tehsil-list").then((response) => {
            this.listOfTehsil = response.data;
        });
    },
    editTehsil(id){
        axios.get("get-tehsil-details/" + id).then((response) => {
            this.formFieldsTehsilModal = response.data;
            this.getZoneSelfDetails(response.data.zone_id);
            this.getDivisionSelfDetails(response.data.division_id);
            this.getDistrictSelfDetails(response.data.district_id);
          });

        $("#tehsilModal").modal("show");
    },

    // Methods for Union Council
    customAppendUnionFormData(){
        let formData = new FormData();
        //this.formFieldsUnionModal is refering to the data object
        let aFields = Object.keys(this.formFieldsUnionModal);
        
        aFields.forEach(function (field, index) {
        
        formData.append(
            field,
            this.formFieldsUnionModal[field] ? this.formFieldsUnionModal[field] : ""
        );
        }, this);
        
        return formData;
    },
    createUnionRecord(){
        let formData = this.customAppendUnionFormData();
        
        axios
            .post("create-union", formData)
            .then((response) => {
              
              Toast.fire({
                icon: "success",
                title: "Union saved successfully",
              });
                this.loadUnionList();
                this.resetUnionFormFields();
                this.hideModal();
                this.errors = {};
            })
            .catch((err) => {
              if (err.response.status === 422) {
                this.errors = err.response.data.errors || {};
              }
            });
    },
    loadUnionList(){
        axios.get("get-union-list").then((response) => {
            this.listOfUnion = response.data;
        });
    },
    editUnion(id){
        axios.get("get-union-details/" + id).then((response) => {
            this.formFieldsUnionModal = response.data;
            this.getZoneSelfDetails(response.data.zone_id);
            this.getDivisionSelfDetails(response.data.division_id);
            this.getDistrictSelfDetails(response.data.district_id);
            this.getTehsilSelfDetails(response.data.tehsil_id);
          });

        $("#unionModal").modal("show");
    },

    downloadProvinceData(){
      
      this.BACKEND_URL = mixin.getBackendURL();
      window.open(this.BACKEND_URL+'/download-province-data','_blank');
      
    },

    // Data Table Stuff
    changeURL(url) {
      this.url = url;
    },
    updateUrl() {
      this.changeURL(this.$helpers.queryParamPageReset(this.url));
      this.page = 1;
      // this.get_scheme_list();
    },
    updateLength(page, tableData) {
      
      console.log("tableData",tableData.length);
      console.log("this filters",this.filters.length);
      this.filters.length = tableData.length;
      //this.updateUrl();
    },
    }, // end methods:{}
    
};
</script>