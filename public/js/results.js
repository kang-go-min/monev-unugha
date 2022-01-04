var survey = new Survey.Model(data.json);

var surveyResultNode = document.getElementById("surveyResult");
surveyResultNode.innerHTML = "";

$.get( data.results_url + "/results", function (data) {
    var normalizedData = data
        .Data
        .map(function (item) {
            survey
                .getAllQuestions()
                .forEach(function (q) {
                    if (item.json[q.name] === undefined) {
                        item.json[q.name] = "";
                    }
                });
            return item.json;
        });

    var visPanel = new SurveyAnalytics.VisualizationPanel(surveyResultNode, survey.getAllQuestions(), normalizedData);
    visPanel.showHeader = true;

    $("#loadingIndicator").hide();

    visPanel.render();
});
