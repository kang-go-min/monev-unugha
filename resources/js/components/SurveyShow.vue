<template>
    <div>
        <survey :survey="survey"></survey>
    </div>
</template>

<script>
    import * as SurveyVue from "survey-vue";
    // import "bootstrap/dist/css/bootstrap.css";

    var Survey = SurveyVue.Survey;
    Survey.cssType = "bootstrap";

    Survey.cssNavigationStart = "btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11";
    Survey.cssNavigationNext = "btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-13";
    Survey.cssNavigationPrev = "btn u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-main--hover g-rounded-30 g-px-35 g-py-13";
    Survey.cssNavigationPreview = "btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11";
    Survey.cssNavigationComplete = "btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-13";

    import * as widgets from "surveyjs-widgets";

    // import {init as customWidget} from "./customwidget";

    widgets.icheck(SurveyVue);
    widgets.select2(SurveyVue);
    widgets.inputmask(SurveyVue);
    widgets.jquerybarrating(SurveyVue);
    widgets.jqueryuidatepicker(SurveyVue);
    widgets.nouislider(SurveyVue);
    widgets.select2tagbox(SurveyVue);
    widgets.sortablejs(SurveyVue);
    widgets.ckeditor(SurveyVue);
    widgets.autocomplete(SurveyVue);
    widgets.bootstrapslider(SurveyVue);

    // customWidget(SurveyVue);

    SurveyVue.Serializer.addProperty("question", "tag:number");

    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
        return typeof obj;
    } : function (obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    export default {
        components: {
            Survey
        },
        props: ['surveyData'],
        data() {
            return {
                survey: {},
                submiting: false
            };
        },
        created() {
            this.survey = new SurveyVue.Model(this.surveyData.json)
        },
        mounted() {
            let self = this;

            this.survey.onComplete.add((result) => {
                let url = `/surveys/${this.surveyData.slug}`
                axios.post(url, {json: result.data})
                    .then((response) => {
                        return self.onSuccess(response.data);
                    })
                    .catch((errors) => {
                        console.error(errors.response.data);
                        return self.onFail(errors.response.data);
                    })
            })
        },
        methods: {
            onSuccess: function onSuccess(data) {
                this.submiting = false;

                if (_typeof(data.message) !== (typeof undefined === 'undefined' ? 'undefined' : _typeof(undefined))) {
                    this.$notify({
                        type: 'success',
                        title: 'Success!',
                        text: data.message
                    });
                }

                if (data.redirect) {
                    window.location.replace(data.redirect);
                }
            },
            onFail: function onFail(data) {
                this.submiting = false;
                if (_typeof(data.errors) !== (typeof undefined === 'undefined' ? 'undefined' : _typeof(undefined))) {
                    var bag = this.$validator.errors;
                    bag.clear();
                    Object.keys(data.errors).map(function (key) {
                        var splitted = key.split('.', 2);
                        // we assume that first dot divides column and locale (TODO maybe refactor this and make it more general)
                        if (splitted.length > 1) {
                            bag.add({
                                field: splitted[0] + '_' + splitted[1],
                                msg: data.errors[key][0]
                            });
                        } else {
                            bag.add({
                                field: key,
                                msg: data.errors[key][0]
                            });
                        }
                    });
                    if (_typeof(data.message) === (typeof undefined === 'undefined' ? 'undefined' : _typeof(undefined))) {
                        this.$notify({
                            type: 'error',
                            title: 'Error!',
                            text: 'The form contains invalid fields.'
                        });
                    }
                }
                if (_typeof(data.message) !== (typeof undefined === 'undefined' ? 'undefined' : _typeof(undefined))) {
                    this.$notify({
                        type: 'error',
                        title: 'Error!',
                        text: data.message
                    });
                }
            },
        }
    };
</script>

<style>
    #app {
        font-family: "Avenir", Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }
</style>
