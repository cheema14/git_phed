<template>
  <div>
    <section class="listing py-4">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="scheme-title">
              <h2>
                <span>
                  <a>
                    <img
                      src="images/icons/adp-icon.png"
                      alt="ADP Icon"
                      class="img-fluid me-2"
                      width="40" /></a
                ></span>
                <span>ADP Scheme Listing</span>
              </h2>
            </div>
          </div>
          <div class="col-md-3">
            <div class="d-grid">
              <router-link to="/scheme-form" class="btn btn-theme-blue py-3">
               
                  <i class="fa fa-plus-circle me-2"></i>
                  Add New
              </router-link>
            </div>
          </div>

        </div>
<div class="row mb-3">
  <div class="col-md-2">
            <div class="d-grid">
              <router-link to="/scheme-forms" class="btn btn-theme-blue py-3">
               
                  <i class="fa fa-plus-circle me-2"></i>
                  Basedata
              </router-link>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3" v-show="false">
            <div class="card phed-card">
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter text to search"
                      />
                    </div>
                    <div class="col-md-3 mb-3">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter text to search"
                      />
                    </div>
                    <div class="col-md-3 mb-3">
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter text to search"
                      />
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter text to search"
                      />
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div class="col-md-3 mb-md-0">
                      <div class="d-grid">
                        <button type="button" class="btn btn-theme-blue">
                          <i class="fa fa-filter me-2"></i>
                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card phed-card">
              <div class="card-body">
                <div class="table-responsive">
                  <div
                    class="
                      dataTables_wrapper dataTables_wrapper_custom
                      container-fluid
                      dt-bootstrap4
                      no-footer
                    "
                  >
                    <data-table
                      :data="records"
                      :filters="filters"
                      :columns="columns"
                      order-by="id"
                      order-dir="desc"
                      class="sticky-table-header"
                      :translate="{ placeholderSearch: 'Search' }"
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
                              placeholder="Search"
                              v-model="filters.search"
                              v-on:input="updateUrl"
                            />
                          </div>
                        </div>
                      </div>
                    </data-table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Scheme_Name from "./Scheme_Name.vue";
import Scheme_Number from "./Scheme_Number.vue";
import ActionComponent from "./../GlobalCommonComponents/ActionComponent.vue";
import SerialNo from "./../common/SerialNoComponent.vue";
import DataTableFooter from "./../common/DataTableFooter.vue";

export default {
  components: {
    SerialNo,
    DataTableFooter,
  },
  data() {
    return {
      isLoading: false,
      url: "",
      filters: {
        page: 1,
        length: 10,
        search: "",
        column: "id",
        dir: "desc",
      },
      records: {},
      columns: [
        {
          label: "Sr. No",
          component: SerialNo,
          orderable: false,
        },
        {
          label: "Scheme Number",
          component: Scheme_Number,
          orderable: false,
        },
        {
          label: "Scheme Name",
          component: Scheme_Name,
          orderable: false,
        },
        // {
        //   label: "Scheme Type",
        //   orderable: false,
        // },
        // {
        //   label: "District",
        //   orderable: false,
        // },
        // {
        //   label: "Tehsil",
        //   orderable: false,
        // },
        // {
        //   label: "UC",
        //   orderable: false,
        // },
        {
          label: "Action",
          name: "scheme",
          orderable: false,
          classes: {},
          event: "click",
          handler: this.actionSchemeRow,
          component: ActionComponent,
        },
      ],
    };
  },
  mounted() {
    this.get_scheme_list();
  },
  methods: {
    get_scheme_list() {
      axios
        .get("schemes-list", {
          params: this.filters,
        })
        .then(
          function (response) {
            this.records = response.data;
          }.bind(this)
        )
        .catch((err) => {
          this.isLoading = false;
        });
    },
    actionSchemeRow(data, view = false) {
      console.log(data);
      if (view) this.$router.push("/scheme-detail/" + data.id);
      else this.$router.push("/scheme-form/" + data.id);
      // if (type == "delete") {
      //   this.deleteAccused(data["id"], data);
      // } else if (type == "update") {
      //   this.editAccusedModalWindow(data);
      // } else if (type == "remove") {
      //   this.removeAccused(data["id"]);
      // } else if (type == "restore") {
      //   this.restoreAccused(data["id"]);
      // }
    },
    changeURL(url) {
      this.url = url;
    },
    updateUrl() {
      this.changeURL(this.$helpers.queryParamPageReset(this.url));
      this.page = 1;
      this.get_scheme_list();
    },
    updateLength(page, tableData) {
      this.filters.length = tableData.length;
      this.updateUrl();
    },
  },
};
</script>
