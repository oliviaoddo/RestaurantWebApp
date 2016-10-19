  $(function() {
    $("input[type=\"radio\"]").click(function(){
        [...]
        //localStorage:
        localStorage.setItem("option", value);
    });
    //localStorage:
    var itemValue = localStorage.getItem("option");
    if (itemValue !== null) {
        $("input[value=\""+itemValue+"\"]").click();
    }
});