<template>
    <div>

		<section class="module">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="module-header mb-3">
							<h2>Select Required Module</h2>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<router-link to="/scheme-list" class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/adp-icon.png" class="img-fluid" alt="ADP Scheme Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>ADP Schemes</h4>
										<p>PHED Project</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</router-link>
					</div>
					<div class="col-md-4 col-lg-4">
						<a class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/hrms-icon.png" class="img-fluid" alt="HRMS Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>HRMS</h4>
										<p>PHED Project</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<!-- <div class="col-md-4 col-lg-4">
						<a href="admin.html" class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/admin-icon.png" class="img-fluid" alt="admin Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>ADP Schemes</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique purus.</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-4">
						<a href="monitoring.html" class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/monitoring-icon.png" class="img-fluid" alt="monitoring Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>ADP Schemes</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique purus.</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-4">
						<a href="acr.html" class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/acr-icon.png" class="img-fluid" alt="Acr Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>ADP Schemes</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique purus.</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-4">
						<a href="finance.html" class="text-decoration-none card-link">
							<div class="module-card">
								<div class="d-flex">
									<div class="flex-shrink-0">
										<div class="img-container">
											<img src="images/icons/finance-icon.png" class="img-fluid" alt="finance Icon" width="55"/>
										</div>
									</div>
									<div class="flex-grow-1 ms-3">
										<h4>ADP Schemes</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique purus.</p>
										<button type="button" class="btn btn-card">View 
											<i class="fa fa-long-arrow-alt-right"></i>
										</button>
									</div>
								</div>
							</div>
						</a>
					</div> -->
				</div>
			</div>
		</section>


    </div>
</template>


<script>
export default {
  mounted() {
    this.get_modules_list(this.filters);
  },
  methods: {
    get_modules_list(params) {
      axios
        .get("modules-list", {
          params: params,
        })
        .then((response) => {})
        .catch((err) => {
          this.isLoading = false;
        });
    },
  },
};
</script>