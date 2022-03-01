import modulesComponent from "./GlobalCommonComponents/ModulesComponent.vue"
import schemeListComponent from "./schemes/scheme_list.vue"
import schemeDetailComponent from "./schemes/scheme_detail.vue"
import SchemeFormComponent from "./schemes/scheme_form.vue"
import login from "./auth/login.vue"
import permissionListComponent from './admin/auth/permissions/permission_list.vue';
import RoleListComponent from './admin/auth/roles/role_list.vue';
import UserListComponent from './admin/auth/users/user_list.vue';
import schemeForms from "./schemes/scheme_general_forms.vue"
import login_new from "./auth/login_new.vue"

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
    }

];