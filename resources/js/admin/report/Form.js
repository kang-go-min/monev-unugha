import AppForm from '../app-components/Form/AppForm';

Vue.component('report-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                description:  '' ,

            },
            mediaCollections: ['report']
        }
    }

});
