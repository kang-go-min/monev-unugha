<template>
    <div id="surveyCreatorContainer"></div>
</template>

<script>
    import * as SurveyCreator from "survey-creator";
    import "survey-creator/survey-creator.css";

    import * as SurveyKo from "survey-knockout";
    import * as widgets from "surveyjs-widgets";
    // import {init as customWidget} from "./customwidget";

    widgets.icheck(SurveyKo);
    widgets.select2(SurveyKo);
    widgets.inputmask(SurveyKo);
    widgets.jquerybarrating(SurveyKo);
    widgets.jqueryuidatepicker(SurveyKo);
    widgets.nouislider(SurveyKo);
    widgets.select2tagbox(SurveyKo);
    widgets.sortablejs(SurveyKo);
    widgets.ckeditor(SurveyKo);
    widgets.autocomplete(SurveyKo);
    widgets.bootstrapslider(SurveyKo);
    // customWidget(SurveyKo);

    SurveyKo.Serializer.addProperty("question", "tag:number");

    var CkEditor_ModalEditor = {
        afterRender: function (modalEditor, htmlElement) {
            var editor = window["CKEDITOR"].replace(htmlElement);
            editor.on("change", function () {
                modalEditor.editingValue = editor.getData();
            });
            editor.setData(modalEditor.editingValue);
        },
        destroy: function (modalEditor, htmlElement) {
            var instance = window["CKEDITOR"].instances[htmlElement.id];
            if (instance) {
                instance.removeAllListeners();
                window["CKEDITOR"].remove(instance);
            }
        }
    };
    SurveyCreator.SurveyPropertyModalEditor.registerCustomWidget(
        "html",
        CkEditor_ModalEditor
    );

    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
        return typeof obj;
    } : function (obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    export default {
        name: "survey-creator",
        props: {
            action: {
                type: String,
                required: true
            },
            data: {
                type: Object,
                default: function _default() {
                    return {};
                }
            }
        },
        data() {
            return {
                survey: {},
                submiting: false
            };
        },
        created() {
            if (!_.isEmpty(this.data)) {
                this.survey = this.data;
            }
        },
        mounted() {
            let self = this;
            let options = {showEmbededSurveyTab: true};
            this.surveyCreator = new SurveyCreator.SurveyCreator(
                "surveyCreatorContainer",
                options
            );
            this.surveyCreator.text = JSON.stringify(this.survey.json);

            // console.log(this.surveyCreator.text, this.survey.json, JSON.stringify(this.survey.json), self.action);

            this.surveyCreator.saveSurveyFunc = function () {
                // console.log(JSON.parse(this.text));
                axios.post(self.action, {json: JSON.parse(this.text)})
                    .then((response) => {
                        return self.onSuccess(response.data);
                    })
                    .catch((errors) => {
                        console.error(errors.response);
                        return self.onFail(errors.response.data);
                    })
            };
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .svd_commercial_container {
        visibility: hidden !important;
        dislpay: none !important;
    }
</style>
