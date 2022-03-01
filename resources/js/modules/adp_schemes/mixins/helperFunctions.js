import Vue from 'vue'
Vue.mixin({
    mounted() {
        this.$root.$emit('checkLoginStatus');
    },
    methods: {
        validateEmail(parameter) {
            const regex = /^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/;
            return regex.test(parameter);
        },
        isNumeric(evt) {
            let value = evt.key;
            if (!value.match(/^[0-9.]+$/)) {
                evt.returnValue = false;
            }
            let prev_value = evt.target._value;
            console.log(prev_value);
            if ((prev_value != "") && (prev_value != null)) {
                if (prev_value.toString().split(".").length > 1 && value == ".") {
                    evt.returnValue = false;
                }
            }
        },
        randomString(length = 10) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }
    }
})