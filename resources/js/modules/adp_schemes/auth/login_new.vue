<template>
<div class="auth-container">
			<div class="container h-100">
				<div class="row justify-content-center align-items-center h-100">
					<div class="col-4">
						<div class="auth-form-container">
							<form method="POST" action="" class="text-left">
								 <div class="row">
									<div class="col-12 text-center">
										<img src="images/gov-logo.png" class="img-fluid mb-3" alt="PHEDERP Logo"/>
										<h2 class="logo-text">PHED<span>ERP</span></h2>
										<p class="login-subtext">Enter your login details to continue further</p>
									</div>
									<div class="col-12">
										<input
                      v-model="form.email"
                      type="text"
                      v-bind:class="
                      !validation.email ? 'form-control border-danger mb-2' : 'form-control mb-2'
                      "
                      placeholder="Enter Email"
                    />
                    <p
                      v-if="!validation.validEmail && validation.email"
                      class="text-danger"
                    >
                      Email address is not valid.
                    </p>
									</div>
									<div class="col-12">
										<input
                                            v-model="form.password"
                                            type="password"
                                            v-bind:class="
                                            !validation.password
                                                ? 'form-control border-danger mb-2'
                                                : 'form-control mb-2'
                                            "
                                            placeholder="Enter Password"
                                        />
									</div>
									<div class="col-12">
										<!-- <p class="placeholder-glow mb-4">
											<span class="placeholder col-12 py-4">Captcha placeholder</span>
										</p> -->
									</div>										
									<div class="d-grid mb-3">										
										<button @click.prevent="loginUser()" type="submit" class="btn btn-theme-blue" value="">Login</button>
									</div>
									<!-- <p class="auth-link text-center">
										<a href="javascript:void(0)">Forgot Password?</a>
									</p> -->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</template>
<script>
export default {
  name: "login_new",
  data() {
    return {
      form:{
        email: "",
        password: "",
      },
      alertMessage: "",
      alertClass:"alert alert-info",
      validation: {
        email: true,
        validEmail: true,
        password: true,
      },
    };
  },
  methods: {
    loginUser() {
        axios.post('/api/login',this.form).then(() => {
          this.$router.push({name:"Dashboard"});
        }).catch((error) => {
          this.errors = errors.response.data.errors;
        })
    },
    authenticateUser() {
        var bodyFormData=new FormData();
        bodyFormData.append('email',this.email);
        bodyFormData.append('password',this.password);

        console.log("bodyForm Data",bodyFormData);
      axios({
        method: "post",
        url: "api/login",
        data: bodyFormData,
        config: { headers: { "Content-Type": "multipart/form-data" } },
      })
      .then((response) => this.parseApiResponse(response))
        .catch(function (response) {
          console.log(response);
        });
    },
    parseApiResponse(response){
        if(response.data.status == false){
            this.alertClass="alert alert-danger";
            this.alertMessage=response.data.data;
        }
        else{
            this.alertClass="alert alert-success";
            this.alertMessage='login successful';

            localStorage.setItem('phed_erp_access_token',response.data.data[0].access_token);
            localStorage.setItem('phed_erp_email',response.data.data[0].email);
            localStorage.setItem('phed_erp_name',response.data.data[0].name);
            localStorage.setItem('phed_erp_is_admin',response.data.data[0].is_admin);

            this.$router.push('/');
            this.$root.$emit('listenLoginStatus');
        }
    }
  },
};
</script>