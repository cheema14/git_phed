export default {
    data() {
        return {
          scheme_id_g:"",
          scheme_name: "",
          province_id:"",
          sName:"",
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
    }
}