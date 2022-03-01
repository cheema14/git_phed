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
                <span>Role Listing</span>
              </h2>
            </div>
          </div>
          <div class="col-md-2">
            <div class="d-grid">
              <button
                @click="createRole()"
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
    <div id="RoleModal">
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
                <div v-if="modalType == 'edit' || modalType == 'create'">
                  <label>Role Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="input_Role_name"
                    v-model="RoleName"
                  />

                  <label>Role Slug</label>
                  <input
                    type="text"
                    class="form-control"
                    id="input_Role_slug"
                    v-model="RoleSlug"
                  />
                </div>
                <div v-if="modalType == 'permission'">
                  <div class="row">
                    <div
                      class="col-lg-6"
                      v-for="permission in permissions"
                      v-bind:key="permission.id"
                    >
                      <input
                        type="checkbox"
                        class="me-1 messageCheckbox"
                        name="role_permissions"
                        v-bind:checked="rolePermissionsExisting.includes(permission.id)?true:false"
                        v-bind:value="permission.id"
                      />{{ permission.name }}
                    </div>
                  </div>
                </div>
                <div v-if="modalType == 'view'">
                  <label>Role Name: {{ RoleName }}</label
                  ><br />
                  <label>Role Slug: {{ RoleSlug }}</label>
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
                  @click="
                    modalType == 'permission'
                      ? savePermissions()
                      : saveChanges()
                  "
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
import name from "../roles/name.vue";
import SerialNo from "../../../common/SerialNoComponent.vue";
import DataTableFooter from "../../../common/DataTableFooter.vue";
import role_action from "../roles/role_action.vue";
export default {
  name: "RoleListComponent",
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
      RoleName: "",
      RoleSlug: "",
      RoleId: "",
      formType: "save",
      modalType: "view",
      permissions: {},
      rolePermissionsExisting:[],
      modalTitle: "Add Role",
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
          label: "Role Name",
          component: name,
          orderable: false,
        },
        {
          label: "Action",
          name: "scheme",
          orderable: false,
          classes: {},
          event: "click",
          handler: this.actionRoleRow,
          component: role_action,
        },
      ],
    };
  },
  mounted() {
    this.get_Role_list();
    this.get_permissions_list();
  },
  methods: {
    get_permissions_list() {
      axios
        .get("api/get-permissions", {
          params: this.filters,
          headers: {
            Authorization: `Bearer ${localStorage.getItem(
              "phed_erp_access_token"
            )}`,
          },
        })
        .then(
          function (response) {
            this.permissions = response.data;
            //console.log(response.data,'roles list');
          }.bind(this)
        )
        .catch((err) => {
          this.isLoading = false;
        });
    },
    get_Role_list() {
      axios
        .get("api/role-list", {
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
    actionRoleRow(data, view = false, permission = false) {
      // console.log(data,'jkjjk');
      this.RoleName = data.name;
      this.RoleSlug = data.slug;
      this.RoleId = data.id;
      this.rolePermissionsExisting=data.permissions;
      console.log(data.permissions);
      this.formType = "update";

      if (view && !permission) {
        this.modalTitle = "View Role";
        this.editableModal = false;
        this.modalType = "view";
        this.showModal = !this.showModal;
      } else if (permission) {
        this.modalTitle = "Role Permissions";
        this.modalType = "permission";
        
        this.showModal = !this.showModal;
      } else {
        this.modalTitle = "Edit Role";
        this.editableModal = true;
        this.modalType = "edit";
        this.showModal = !this.showModal;
      }
    },
    createRole() {
      this.RoleName = "";
      this.RoleSlug = "";
      this.RoleId = "";
      this.formType = "save";

      this.modalTitle = "Add Role";
      this.editableModal = true;
      this.modalType = "create";
      this.showModal = !this.showModal;
    },
    validateRole() {
      let validation_status = true;
      if (this.RoleName == "") {
        validation_status = false;
        document
          .getElementById("input_Role_name")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_Role_name")
          .classList.remove("border-danger");
      }

      if (this.RoleSlug == "") {
        validation_status = false;
        document
          .getElementById("input_Role_slug")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_Role_slug")
          .classList.remove("border-danger");
      }

      return validation_status;
    },
    savePermissions() {
      let permissions_raw = document.getElementsByName("role_permissions");
      let permissions_arr = new Array();
      for (var checkbox of permissions_raw) {
        if (checkbox.checked) {
          permissions_arr.push(checkbox.value);
        }
      }

      var bodyFormData = new FormData();
      bodyFormData.append("permissions", permissions_arr);
      bodyFormData.append("role_id", this.RoleId);

      let request_url = "api/save-role-permissions";
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
    saveChanges() {
      if (this.validateRole() == false) {
        return false;
      }
      var bodyFormData = new FormData();
      bodyFormData.append("name", this.RoleName);
      bodyFormData.append("slug", this.RoleSlug);
      bodyFormData.append("id", this.RoleId);
      let request_url = "";
      if (this.formType == "save") {
        request_url = "api/save-role";
      } else {
        request_url = "api/update-role";
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
        title: "Role data " + this.formType + "d successfully",
      });
      this.showModal = !this.showModal;
      this.get_Role_list();
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