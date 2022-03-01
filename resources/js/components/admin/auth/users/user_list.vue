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
                <span>User Listing</span>
              </h2>
            </div>
          </div>
          <div class="col-md-2">
            <div class="d-grid">
              <button
                @click="createUser()"
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
    <div id="UserModal">
      <!-- Button trigger modal-->
      <!-- Modal-->
      <transition
        @enter="startTransitionModal"
        @after-enter="endTransitionModal"
        @before-leave="endTransitionModal"
        @after-leave="startTransitionModal"
      >
        <div class="modal fade" v-if="showModal" ref="modal">
          <div class="modal-dialog" User="document">
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
                  <div>
                    <label>User Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="input_User_name"
                      v-model="UserName"
                    />
                  </div>
                  <div>
                    <label>User Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="input_User_email"
                      v-model="UserEmail"
                    />
                  </div>
                  <div>
                    <label>User Role</label>
                    <select class="form-control" v-bind:value="UserRoleId" id="input_User_role">
                      <option
                        v-for="role in roles"
                        v-bind:value="role.id"
                        v-bind:key="role.id"
                      >
                        {{ role.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div v-else>
                  <label>User Name: {{ UserName }}</label
                  ><br />
                  <label>User Email: {{ UserEmail }}</label>
                  <br />
                  <label>User Role: {{ UserRole }}</label>
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
import name from "../users/name.vue";
import email from "../users/email.vue";
import SerialNo from "../../../common/SerialNoComponent.vue";
import DataTableFooter from "../../../common/DataTableFooter.vue";
import ActionComponent from "../../../GlobalCommonComponents/ActionComponent.vue";
export default {
  name: "UserListComponent",
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
      UserName: "",
      UserEmail: "",
      UserRole: "",
      UserRoleId: "",
      UserId: "",
      formType: "save",
      modalTitle: "Add User",
      url: "",
      filters: {
        page: 1,
        length: 10,
        search: "",
        column: "id",
        dir: "desc",
      },
      records: {},
      roles: {},
      columns: [
        {
          label: "Sr. No",
          component: SerialNo,
          orderable: false,
        },
        {
          label: "User Name",
          component: name,
          orderable: false,
        },
        {
          label: "User Email",
          component: email,
          orderable: false,
        },
        {
          label: "Action",
          name: "scheme",
          orderable: false,
          classes: {},
          event: "click",
          handler: this.actionUserRow,
          component: ActionComponent,
        },
      ],
    };
  },
  mounted() {
    this.get_User_list();
    this.get_roles_list();
  },
  methods: {
    get_roles_list() {
      axios
        .get("api/get-roles", {
          params: this.filters,
          headers: {
            Authorization: `Bearer ${localStorage.getItem(
              "phed_erp_access_token"
            )}`,
          },
        })
        .then(
          function (response) {
            this.roles = response.data;
            //console.log(response.data,'roles list');
          }.bind(this)
        )
        .catch((err) => {
          this.isLoading = false;
        });
    },
    get_User_list() {
      axios
        .get("api/user-list", {
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
    actionUserRow(data, view = false) {
      this.UserName = data.name;
      this.UserEmail = data.email;
      this.UserRoleId = data.role.id;
      this.UserRole = data.role.name;
      this.UserId = data.id;
      this.formType = "update";

      if (view) {
        this.modalTitle = "View User";
        this.editableModal = false;
        this.showModal = !this.showModal;
      } else {
        this.modalTitle = "Edit User";
        this.editableModal = true;
        this.showModal = !this.showModal;
      }
    },
    createUser() {
      this.UserName = "";
      this.UserEmail = "";
      this.UserId = "";
      this.formType = "save";

      this.modalTitle = "Add User";
      this.editableModal = true;
      this.showModal = !this.showModal;
    },
    validateUser() {
      let validation_status = true;
      if (this.UserName == "") {
        validation_status = false;
        document
          .getElementById("input_User_name")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_User_name")
          .classList.remove("border-danger");
      }

      if (this.UserEmail == "") {
        validation_status = false;
        document
          .getElementById("input_User_email")
          .classList.add("border-danger");
      } else {
        document
          .getElementById("input_User_email")
          .classList.remove("border-danger");
      }

      return validation_status;
    },
    saveChanges() {
      if (this.validateUser() == false) {
        return false;
      }
      var bodyFormData = new FormData();
      bodyFormData.append("name", this.UserName);
      bodyFormData.append("email", this.UserEmail);
      bodyFormData.append(
        "role_id",
        document.getElementById("input_User_role").value
      );
      bodyFormData.append("password", this.randomString());
      if(this.editableModal){
        bodyFormData.append("id", this.UserId);
      }

      let request_url = "";
      if (this.formType == "save") {
        request_url = "api/save-user";
      } else {
        request_url = "api/update-user";
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
        title: "User data " + this.formType + " successfully",
      });
      this.showModal = !this.showModal;
      this.get_User_list();
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