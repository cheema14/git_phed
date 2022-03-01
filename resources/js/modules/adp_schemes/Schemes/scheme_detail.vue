<template>
    <div>
		<section class="listing py-4">
			<div class="container">
				<div class="row mb-3">
					<div class="col-md-12">
						<div class="scheme-title">
							<h2>
								<span><img src="images/icons/adp-icon.png" alt="ADP Icon" class="img-fluid me-2" width="40"/></span> 
								<span>ADP Scheme Detail</span>
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mb-3">
						<div class="form-container">
								<div class="form-card">
									<h3 class="form-caption">Scheme Detail</h3>
									<div class="row">
										<!-- <div class="col-md-3 col-sm-4 col-6">
											<h6>Directive Sr#</h6>
											<p>15430</p>
										</div> -->
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Scheme#</h6>
											<p>{{this.formFields.scheme_number}}</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Scheme Name</h6>
											<p>{{this.formFields.scheme_name}}</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6 class="text-theme-blue mb-2">Identified By</h6>
											<p v-if="formFields.identified_by" v-html="formFields.identified_by.title"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6 class="text-theme-blue mb-2">Cleared By</h6>
											<p v-if="formFields.cleared_by" v-html="formFields.cleared_by.title"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Program</h6>
											<p v-if="formFields.program" v-html="formFields.program.program_name"></p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Area Detail </h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Province</h6>
											<p v-if="formFields.province" v-html="formFields.province.province_name"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Zone</h6>
											<p v-if="formFields.zone" v-html="formFields.zone.zone_name"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Division</h6>
											<p v-if="formFields.division" v-html="formFields.division.division_name"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>District</h6>
											<p v-if="formFields.district" v-html="formFields.district.district_name"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Tehsil</h6>
											<p v-if="formFields.tehsil" v-html="formFields.tehsil.tehsil_name"></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>UC</h6>
											<p></p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Village</h6>
											<p></p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Executing Office Detail</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Chief Engineer</h6>
											<p>Lahore</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Sup. Engineer</h6>
											<p>65 UC</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Executing Engineer</h6>
											<p>Shahdra</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>SDO</h6>
											<p>Shahdara</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Sub Engineer</h6>
											<p>Lahore</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>UC</h6>
											<p>65 UC</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Village</h6>
											<p>Shahdara</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Disposal</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Disposal Mode</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Disposal Type</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Ultimate Mode</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Basic Parameters</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Scheme Type</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Technique</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>New/Rehab</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Reference Scheme#</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Area</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Sponsered By</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Executed By</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>O & M By</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Water Detail</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Water Source</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Water Quality</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Source Nature</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>WC Gpcd</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Population</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Block Details</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Block Desc.</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>ADP Year</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Status of Scheme</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Approval Forum</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Approval Status</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Compilation Forum</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Function Status</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Cost of Scheme</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Proposed Cost</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Approved Cost</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>TS Cost</h6>
											<p>Other</p>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Completion Cost</h6>
											<p>Other</p>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Constituency Detail</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>NA Code</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>MNA Name</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>PP Code</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>MPA Name</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
									</div>
								</div>
								<div class="form-card">
									<h3 class="form-caption">Scheme Detail</h3>
									<div class="row">
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Sch. Latittude</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>Sch. Longitude</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3 col-sm-4 col-6">
											<h6>DD Code</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
										<div class="col-md-3">
											<h6>Project Code</h6>
											<input type="text" class="form-control" placeholder="Enter text to search"/>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-theme-green px-5">Edit</button>
								<button type="submit" class="btn btn-outline-secondary px-5">Back</button>
							
						</div>
					</div>

					<schemePerformance/>
					<div class="col-md-12" style="display:none;">
						<div class="phed-tabs-box">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="home" aria-selected="true">PC</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="profile" aria-selected="false">AA</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="contact" aria-selected="false">TS</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="home" aria-selected="true">Contract</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="profile" aria-selected="false">Allocation</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-controls="contact" aria-selected="false">Release PnD</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab7" type="button" role="tab" aria-controls="home" aria-selected="true">Monthly Progress</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab8" type="button" role="tab" aria-controls="profile" aria-selected="false">Visits</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab9" type="button" role="tab" aria-controls="contact" aria-selected="false">Enhancement</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab10" type="button" role="tab" aria-controls="home" aria-selected="true">CBO</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab11" type="button" role="tab" aria-controls="profile" aria-selected="false">Assets</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab12" type="button" role="tab" aria-controls="contact" aria-selected="false">HH Connections</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab13" type="button" role="tab" aria-controls="profile" aria-selected="false">Community Share</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab14" type="button" role="tab" aria-controls="contact" aria-selected="false">Village Served</button>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table class="table mb-2">
													<thead>
														<tr>
															<th>ADP No.</th>
															<th>Year Code</th>
															<th>Month Code</th>
															<th>Financial Progress Upto Month</th>
															<th>Physical Progress</th>
															<th>Physical Progress</th>
															<th>SE Submit</th>
															<th>CE Submit</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1056</td>
															<td>2003</td>
															<td>#4567</td>
															<td>70%</td>
															<td>80%</td>
															<td>1056</td>
															<td>No</td>
															<td>No</td>
														</tr>
													</tbody>
												</table>
												<!-- <h6 class="text-theme-blue mb-2">Remarks</h6>
												<p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quam purus sed tellu consectetur urna arcu inpude. Eu fermentum ut accumsan amet, auctor. Aliquam maecenas tempus, urna, quis magna. Duis augue vitae mauris, purus.</p> -->
												<hr/>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">tab2</div>
								<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">tab3</div>
								<div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="home-tab">tab4</div>
								<div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="profile-tab">tab5</div>
								<div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="contact-tab">tab6</div>
								<div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="home-tab">tab7</div>
								<div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="profile-tab">tab8</div>
								<div class="tab-pane fade" id="tab9" role="tabpanel" aria-labelledby="contact-tab">tab9</div>
								<div class="tab-pane fade" id="tab10" role="tabpanel" aria-labelledby="home-tab">tab10</div>
								<div class="tab-pane fade" id="tab11" role="tabpanel" aria-labelledby="profile-tab">tab11</div>
								<div class="tab-pane fade" id="tab12" role="tabpanel" aria-labelledby="contact-tab">tab12</div>
								<div class="tab-pane fade" id="tab13" role="tabpanel" aria-labelledby="home-tab">tab13</div>
								<div class="tab-pane fade" id="tab14" role="tabpanel" aria-labelledby="profile-tab">tab14</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

    </div>
</template>


<script>

import select2 from "v-select2-component";
import schemePerformance from "./performance/schemePerformance.vue";

export default {
	components: {
		select2,
		schemePerformance,
  },
  data() {
    return {
      formFields: {},
	  pc_values_edit:[],
    };
  },
  mounted() {
    this.loadEditForm();
	// this.loadSchemeDetails();
  },
  methods: {
    loadEditForm(id = this.$route.params.id) {
      axios.get("get-scheme-detail/" + id).then((response) => {
        this.formFields = response.data;
        //console.log(this.formFields.program.program_name);
      });
    },
  },
};
</script>