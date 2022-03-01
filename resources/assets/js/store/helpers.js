export default { 
    queryParamPageReset(string) {
        return string.replace(/\page=.*/, 'page=1')
    },
    hello_helper(){
        return true;
    },
    setSchemeId(id){
        return id;
      }
};