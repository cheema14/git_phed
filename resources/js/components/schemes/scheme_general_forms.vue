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
                        <span>{{ editMode ? "Update Scheme Forms" : "Add New Scheme Form" }}</span>
                    </h2>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <button
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
                            <!-- <li class="nav-item" role="presentation">
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
                            </li> -->
                            <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="pills-general-forms-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-general-forms"
                                type="button"
                                role="tab"
                                aria-controls="pills-general-forms"
                                aria-selected="false"
                            >
                                Scheme Forms
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
                            </div>
                        
                            <schemeCrudForms  />
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12 mb-3">
                    <div class="form-container">
                        <button  class="btn btn-theme-green px-5">
                            Save
                        </button>
                        <button
                            class="btn btn-outline-secondary px-5"
                        >
                            Reset
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    </div>
</template>
<script>

import select2 from "v-select2-component";
import schemeCrudForms from "./cruds/scheme_crud_forms.vue";
// import mixin from "../mixins/schemeIdMixin";

export default {
    components: {
        select2,
        schemeCrudForms,
    },
    data(){
        return{
            editMode: false,
        };
    },
    mounted(){

    },
    methods:{

    },
// mixins: [mixin],
};


</script>