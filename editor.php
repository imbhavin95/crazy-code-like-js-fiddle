<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
  </style>
</head>
<body>
<div class="container">
<pre id="html_editor">
function foo(items) {
    var i;
    for (i = 0; i &lt; items.length; i++) {
        alert("Ace Rocks " + items[i]);
        }
    }
</pre>
<pre id="js_editor">
function foo(items) {
    var i;
    for (i = 0; i &lt; items.length; i++) {
        alert("Ace Rocks " + items[i]);
        }
    }
</pre>
<pre id="css_editor">
function foo(items) {
    var i;
    for (i = 0; i &lt; items.length; i++) {
        alert("Ace Rocks " + items[i]);
        }
    }
</pre>
    </div>
<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var html_editor = ace.edit("html_editor");
    html_editor.setTheme("ace/theme/xcode");
    html_editor.session.setMode("ace/mode/css");
	html_editor.getElementById('editor').style.fontSize='16px';
	html_editor.findNext();
	html_editor.findPrevious();
    var code = html_editor.getValue();
</script>
</body>
</html>