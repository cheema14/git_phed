<template>
  <div v-if="$route.meta.mod_header">
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-box">
              <div class="row">
                <div class="mb-3 col-md-4">
                  <div class="text-center mt-md-5">
                    <img
                      src="images/icons/gov-logo-white.png"
                      class="img-fluid"
                      alt="gov-logo-white"
                      width="50"
                    />
                    <h2 class="logo-text-footer">PHED<span>erp</span></h2>
                  </div>
                </div>
                <div class="mb-6 col-md-6">
                  <div class="text-left">
                    <h6 class="mb-3">Relevant Module</h6>
                    <div class="d-flex justify-content-between">
                      <nav class="nav flex-column footer-links">
                        <a href="javascript:void(0);" class="nav-link">HRMS</a>
                        <a href="javascript:void(0);" class="nav-link">Admin</a>
                        <a href="javascript:void(0);" class="nav-link"
                          >Monitoring</a
                        >
                      </nav>
                      <nav class="nav flex-column footer-links">
                        <a href="javascript:void(0);" class="nav-link">ACR </a>
                        <a href="javascript:void(0);" class="nav-link"
                          >ADP Scheme</a
                        >
                        <a href="javascript:void(0);" class="nav-link"
                          >Finance</a
                        >
                      </nav>
                    </div>
                  </div>
                </div>
                <!-- <div class="mb-3 col-md-4 ms-auto">
                  <div class="text-left">
                    <h6 class="mb-3">Contact</h6>
                    <p>
                      <i class="fa fa-envelope fa-fw"></i>
                      info@irrigationdepartment.com
                    </p>
                    <p><i class="fa fa-phone fa-fw"></i> 0423 9902345</p>
                    <p><i class="fa fa-fax fa-fw"></i> 0423 9902346</p>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-md-12" style="text-align: center;">
            <div class="secondary-footer">
              <p>
                Developed and Designed by <a href="#">PITB</a>. All Right
                Reserved.2021
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
};
</script>