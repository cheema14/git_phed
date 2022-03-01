import modulesComponent from "./components/GlobalCommonComponents/ModulesComponent.vue";
// import schemeListComponent from "./components/schemes/scheme_list.vue"
// import schemeDetailComponent from "./components/schemes/scheme_detail.vue"
// import SchemeFormComponent from "./components/schemes/scheme_form.vue"
import login from "./components/auth/login.vue"
import permissionListComponent from './components/admin/auth/permissions/permission_list.vue';
import RoleListComponent from './components/admin/auth/roles/role_list.vue';
import UserListComponent from './components/admin/auth/users/user_list.vue';
// import schemeForms from "./components/schemes/scheme_general_forms.vue"
import login_new from "./components/auth/login_new.vue"
import management from "./modules/management/managementComponent.vue";
import schemeListComponent from "./modules/adp_schemes/Schemes/scheme_list.vue";
import schemeDetailComponent from "./modules/adp_schemes/Schemes/scheme_detail.vue";
import SchemeFormComponent from "./modules/adp_schemes/Schemes/scheme_form.vue";
import schemeForms from "./modules/adp_schemes/Schemes/scheme_general_forms.vue";

export const routes = [
    {
        path: '*',
        component: modulesComponent,
        name: 'dashboard',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/',
        component: modulesComponent,
        name: '',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/scheme-list',
        component: schemeListComponent,
        name: 'scheme-list',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/login',
        component: login,
        // component: login_new,
        name: 'login',
        // name: 'login_new',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:false
        },
    },
    {
        path: '/scheme-form/:id?',
        component: SchemeFormComponent,
        name: 'scheme-form',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/permission-list',
        component: permissionListComponent,
        name: 'permission-list',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes'
        },
    },
    {
        path: '/role-list',
        component: RoleListComponent,
        name: 'role-list',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes'
        },
    },
    {
        path: '/user-list',
        component: UserListComponent,
        name: 'user-list',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes'
        },
    },
    // {
    //     path: '/scheme-form/:id?',
    //     component: SchemeFormComponent,
    //     name: 'scheme-form',
    //     meta: {
    //         title: 'Dashboard | PHED ADP- Schemes'
    //     },
    // },
    {
        path: '/scheme-detail/:id',
        component: schemeDetailComponent,
        name: 'schemeDetail',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/scheme-forms/',
        component: schemeForms,
        name: 'schemeForms',
        meta: {
            title: 'Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
    {
        path: '/managemet',
        component: management,
        name: 'management',
        meta: {
            title: 'Management Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    }

];
