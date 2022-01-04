import AppForm from '../app-components/Form/AppForm';

Vue.component('survey-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                user_id:  '' ,
                description:  '' ,
                start_date:  '' ,
                end_date:  '' ,
            },
            mediaCollections: ['survey']
        }
    }

});
