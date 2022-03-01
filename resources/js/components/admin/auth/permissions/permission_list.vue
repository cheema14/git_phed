<template>
  <div>
    <section class="listing py-4">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-10">
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
                <span>Permission Listing</span>
              </h2>
            </div>
          </div>
          <div class="col-md-2">
            <div class="d-grid">
              <button
                @click="createPermission()"
                type="button"
                class="btn btn-theme-blue py-3"
              >
                <i class="fa fa-plus-circle me-2"></i>
                Add New
              </button>
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
                        <div class="col-md-5"></div>
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
    </section>
    <div id="permissionModal">
      <!-- Button trigger modal-->
      <!-- Modal-->
      <transition
        @enter="startTransitionModal"
        @after-enter="endTransitionModal"
        @before-leave="endTransitionModal"
        @after-leave="startTransitionModal"
      >
        <div class="modal fade" v-if="showModal" ref="modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  {{ modalTitle }}
                </h5>
                <button
                  class="close btn-xs btn-default rounded"
                  type="button"
                  @click="showModal = !showModal"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div v-if="editableModal">
                  <label>Permission Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="input_permission_name"
                    v-model="permissionName"
                  />

                  <label>Permission Slug</label>
                  <input
                    type="text"
                    class="form-control"
                    id="input_permission_slug"
                    v-model="permissionSlug"
                  />
                </div>
                <div v-else>
                  <label>Permission Name: {{ permissionName }}</label
                  ><br />
                  <label>Permission Slug: {{ permissionSlug }}</label>
                </div>
              </div>
              <div v-if="editableModal" class="modal-footer">
                <button
                  class="btn btn-secondary"
                  @click="showModal = !showModal"
                >
                  Close
                </button>
                <button
                  @click="saveChanges()"
                  class="btn btn-primary"
                  type="button"
                >
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </transition>
      <div class="modal-backdrop fade d-none" ref="backdrop"></div>
    </div>
  </div>
</template>
<script>
import permission_Name from "../permissions/permission_Name.vue";
import SerialNo from "../../../common/SerialNoComponent.vue";
import DataTableFooter from "../../../common/DataTableFooter.vue";
import ActionComponent from "../../../GlobalCommonComponents/ActionComponent.vue";
export default {
  name: "permissionListComponent",
  components: {
    SerialNo,
    DataTableFooter,
  },
  data() {
    return {
      isLoading: false,
      dialog: false,
      showModal: false,
      editableModal: true,
      permissionName: "",
      permissionSlug: "",
      permissionId: "",
      formType: "save",
      modalTitle: "Add Permission",
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
          label: "Permission Name",
          component: permission_Name,
          orderable: false,
        },
        {
          label: "Action",
          name: "scheme",
          orderable: false,
          classes: {},
          event: "click",
          handler: this.actionPermissionRow,
          component: ActionComponent,
        },
      ],
    };
  },
  mounted() {
    this.get_permission_list();
  },
  methods: {
    get_permission_list() {
      axios
        .get("api/permission-list", {
          params: this.filters,
          headers: {
            Authorization: `Bearer ${localStorage.getItem(
              "phed_erp_access_token"
            )}`,
          },
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
    actionPermissionRow(data, view = false) {
      // console.log(data,'jkjjk');
      this.permissionName = data.name;
      this.permissionSlug = data.slug;
      this.permissionId = data.id;
      this.formType = "update";

      if (view) {
        this.modalTitle = "View Permission";
        this.editableModal = false;
        this.showModal = !this.showModal;
      } else {
        this.modalTitle = "Edit Permission";
        this.editableModal = true;
        this.showModal = !this.showModal;
      }
    },
    createPermission() {
      this.permissionName = "";
      this.permissionSlug = "";
      this.permissionId = "";
      this.formType = "save";

      this.modalTitle = "Add Permission";
      this.editableModal = true;
      this.showModal = !this.showModal;
    },
    validatePermission() {
      let validation_status = true;
      if (this.permissionName == "") {
        validation_status = false;
        document
          .getElementById("input_permission_name")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_permission_name")
          .classList.remove("border-danger");
      }

      if (this.permissionSlug == "") {
        validation_status = false;
        document
          .getElementById("input_permission_slug")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_permission_slug")
          .classList
          .remove("border-danger");
      }

      return validation_status;
    },
    saveChanges() {
      if (this.validatePermission() == false) {
        return false;
      }
      var bodyFormData = new FormData();
      bodyFormData.append("name", this.permissionName);
      bodyFormData.append("slug", this.permissionSlug);
      bodyFormData.append("id", this.permissionId);
      let request_url = "";
      if (this.formType == "save") {
        request_url = "api/save-permission";
      } else {
        request_url = "api/update-permission";
      }

      axios({
        method: "post",
        url: request_url,
        data: bodyFormData,
        headers: {
          Authorization: `Bearer ${localStorage.getItem(
            "phed_erp_access_token"
          )}`,
        },
      })
        .then((response) => this.parseApiResponse(response))
        .catch(function (response) {
          console.log(response);
        });
    },
    parseApiResponse(reponse) {
      Toast.fire({
        icon: "success",
        title: "Permission data " + this.formType + " successfully",
      });
      this.showModal = !this.showModal;
      this.get_permission_list();
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
<style scoped>
.close {
  border: 1px solid #c3c1c1;
}
</style>