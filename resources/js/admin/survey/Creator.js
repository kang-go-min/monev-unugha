import SurveyCreator from "../../components/SurveyCreator";
// import "bootstrap/dist/css/bootstrap.css";

Vue.component('survey-creator', {
    mixins: [SurveyCreator],
    data: function () {
        return {
            survey: {
                title: '',
                user_id: '',
                description: '',
                start_date: '',
                end_date: '',
                json: ''
            }
        };
    }
    /*mounted: function () {
        //this.getSurvey(this.$route.params.id);
    },*/
    /*methods: {
        getSurvey(id) {
            axios.get('/surveys/' + id)
                .then((response) => {
                    this.survey = response.data.data;
                    this.surveyName = response.data.data.name;
                })
                .catch((error) => {
                    console.log(error.response)
                })
        },
        onCancelEdit() {
            this.nameField = false;
            this.surveyName = this.survey.name;
        },
        postEdit() {
            axios.post('/surveys/' + this.survey.id, {name: this.surveyName})
                .then((response) => {
                    this.nameField = false;
                    this.$root.snackbarMsg = response.data.message;
                    this.$root.snackbar = true;
                })
                .catch((error) => {
                    console.error(error.response);
                })
        }
    }*/
});
