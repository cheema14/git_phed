export default {
    data() {
        return {
          scheme_id_g:"",
          scheme_name: "",
          province_id:"",
          sName:"",
          backendURL:"",
          active_table_tab_value:"",
        };
      }, 
    
    
    hello(){
        return "100";
    },
    setSchemeId(id){
        this.scheme_id_g = id;
        return this.scheme_id_g;
    },
    getSchemeId(){
        return this.scheme_id_g;
    },
    setSchemeName(name){
        this.scheme_name = name;
    },
    getSchemeName(){
        return this.scheme_name;
    },
    getBackendURL(){

        const host = window.location.hostname;
        let Backend = '';
        // console.log("the host",host);
        if (host == 'local.phederp.punjab.gov.pk') {
            Backend = 'http://local.phederp.punjab.gov.pk';
            // title = 'PHED - ADP Schemes';
          
        }
        else if (host == 'mishudphed.punjab.gov.pk') {
            Backend = 'https://mishudphed.punjab.gov.pk';
            // title = 'PHED';https://mishudphed.punjab.gov.pk/#/scheme-forms
        }

        this.backendURL = Backend;
        return this.backendURL;
    },
    set_table_tab_val(val){
        this.active_table_tab_value = val;
        console.log("the set value",val);
    },
    get_table_tab_val(){
        return this.active_table_tab_value;
    }

}