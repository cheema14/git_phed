<template>
<button :class="classes" @click="click(data)" title="Update">
        <span>
            <i class="fa fa-edit text-warning me-2" aria-hidden="true"></i>
        </span>
        &nbsp;
    </button>
    
</template>

<script>
export default {
    props: {
        data: {},
        name: {},
        click: {
            type: Function,
            default: () => {
                // console.log("clicked data",this.data);
            }
        },
        classes: {
            type: Object,
            default: () => ({ 
                'btn': true,
                'btn-info': true,
                'btn-sm': true,
            }),
        },
    }
}

</script>