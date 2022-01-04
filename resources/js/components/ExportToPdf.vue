<template>
    <div class="container">
        <div class="jumbotron">
            <h2>Export survey to a PDF document</h2>
            <p>
                The SurveyJS PDF Export library allows you to render SurveyJS Library surveys to PDF in
                a browser which can be later emailed or printed.
            </p>
            <p>Click the button below to get a PDF document.</p>
        </div>
        <div>
            <button v-on:click="savePDF">Save PDF</button>
        </div>
    </div>
</template>

<script>
    import * as SurveyVue from "survey-vue";
    import * as SurveyPDF from "survey-pdf";

    var Survey = SurveyVue.Survey;
    Survey.cssType = "bootstrap";

    import * as widgets from "surveyjs-widgets";

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

    SurveyVue.Serializer.addProperty("question", "tag:number");

    export default {
        components: {
            Survey
        },
        data() {
            return {
                survey: {},
                savePDF: {}
            };
        },
        created() {
            this.survey = new SurveyVue.Model(this.surveyData.json)

            this.savePDF = function () {
                var surveyPDF = new SurveyPDF.SurveyPDF(this.survey);
                surveyPDF.data = model.data;
                surveyPDF.save();
            };
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
