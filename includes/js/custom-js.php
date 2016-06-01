<script type="text/javascript">
var html_editor = ace.edit("html_editor");
html_editor.setTheme("ace/theme/dreamweaver");
html_editor.session.setMode("ace/mode/html");
html_editor.findNext();
html_editor.findPrevious();
var html_code = html_editor.getValue();
html_editor.setOptions({
    enableBasicAutocompletion: true
});
var html_get = $('#html_get').val();
/*if(html_get != "undefined"){
    var reg= /<link\b[^>]*?>/gi
    html_get = html_get.replace(reg, '');
    var reg2= /<script\b[^>]*?>/gi
    html_get = html_get.replace(reg2, '');
    var reg3= /<\/script\b[^>]*?>/gi
    html_get = html_get.replace(reg3, '');
    html_editor.setValue(html_get);
}*/
    
var css_editor = ace.edit("css_editor");
css_editor.setTheme("ace/theme/dreamweaver");
css_editor.session.setMode("ace/mode/css");
css_editor.findNext();
css_editor.findPrevious();
css_editor.setOption("minLines", 1000)
var css_code = css_editor.getValue();
css_editor.setOptions({
    enableBasicAutocompletion: true
});
var css_get = $('#css_get').val();

var js_editor = ace.edit("js_editor");
js_editor.setTheme("ace/theme/xcode");
js_editor.session.setMode("ace/mode/javascript");
js_editor.findNext();
js_editor.findPrevious();
js_editor.setOption("minLines", 1000)
var js_code = js_editor.getValue();
js_editor.setOptions({
    enableBasicAutocompletion: true
});
var js_get = $('#js_get').val();
if(html_get != "undefined"){
    html_editor.setValue(html_get);
}
if(css_get != "undefined"){
    css_editor.setValue(css_get);
}
if(js_get != "undefined"){
    js_editor.setValue(js_get);
}

$(document).bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    return false;
  }
});

function Get_Result(){
    $('#loader').css('display','block');
    var key = $('#code_key').val();
    var html_code = html_editor.getValue();
    var css_code = css_editor.getValue();
    var js_code = js_editor.getValue();
    var data = 'html_code='+ html_code +'&css_code='+ css_code +'&js_code='+ js_code +'&key='+ key +'&action=add_update_code';
    $.ajax({
        type: "POST",
        url: "<?php echo SITE_URL; ?>/includes/ajax/process.php",
        data: data,
        cache: false,
        success: function(response) {
            $("#result").html('<iframe class="result_frame" src="<?php echo SITE_URL; ?>/includes/code-pages/main/'+ key +'.php"></iframe>');
            $('#loader').css('display','none');
        }
    });
}
</script>