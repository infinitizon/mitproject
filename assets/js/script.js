var myTextArea = document.getElementById("myEditor");
var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
    lineNumbers: true,
    matchBrackets: true,
    mode: "javascript",
    indentUnit: 4,
    indentWithTabs: true
});

function update() {
    
}
$(function(){
    $('#language').on('change', function() {
        myCodeMirror.setOption("mode", this.value );
    });
});