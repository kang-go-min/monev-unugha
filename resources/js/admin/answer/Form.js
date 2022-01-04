import AppForm from '../app-components/Form/AppForm';

Vue.component('answer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                survey_id:  '' ,
                user_id:  '' ,
                ip_address:  '' ,
                json:  this.getLocalizedFormDefaults() ,
                
            }
        }
    }

});