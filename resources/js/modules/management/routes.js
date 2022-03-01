import management from "./managementComponent.vue"

export const routes = [
    {
        path: '/management',
        component: management,
        name: 'Management',
        meta: {
            title: 'Management Dashboard | PHED ADP- Schemes',
            mod_header:true
        },
    },
]