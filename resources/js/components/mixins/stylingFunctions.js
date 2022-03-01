import Vue from 'vue'
Vue.mixin({
    mounted() {
        document.getElementsByClassName('header')[0].style.display = "block";
    },
    methods: {
        hideHeader() {
            document.getElementsByClassName('header')[0].style.display = "none";
        },
        startTransitionModal() {
            this.$refs.backdrop.classList.toggle("d-block");
            this.$refs.modal.classList.toggle("d-block");
        },
        endTransitionModal() {
            this.$refs.backdrop.classList.toggle("show");
            this.$refs.modal.classList.toggle("show");
        },
    }
})