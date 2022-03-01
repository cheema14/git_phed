<template>
  <v-row justify="center">
    
    <v-btn
      color="primary"
      dark
      @click.stop="dialog = true"
    >
      Open Dialog
    </v-btn>

    <v-dialog
      v-model="dialog"
      persistent
      max-width="290"
    >
      <v-card>
        <v-card-title class="text-h5">Delete Item?</v-card-title>

        <v-card-text>Let Google help apps determine location.</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            Cancel
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            Confirm
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script>
import vue from "vue";

export default ({
    name:'DialogConfirm',
    // props:['confirmType','confirmVisibility'],
    data(){
        return {
            dialog:false,
        };
    },
    methods:{
        confirmCancel(){
            this.$emit('confirmCancel');
        },
        confirmAccept(){
            this.$emit('confirmAccept');
        }
    }
})
</script>