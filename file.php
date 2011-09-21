<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script>
function handleDragStart(e) {
  this.style.opacity = '0.4';  // this / e.target is the source node.
}

var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
});

</script>

<style>
/* Prevent the text contents of draggable elements from being selectable. */
[draggable] {
  -moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
}
.column {
  height: 150px;
  width: 150px;
  float: left;
  border: 2px solid #666666;
  background-color: #ccc;
  margin-right: 5px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 3px #000;
  box-shadow: inset 0 0 3px #000;
  text-align: center;
  cursor: move;
}
.column header {
  color: #fff;
  text-shadow: #000 0 1px;
  box-shadow: 5px;
  padding: 5px;
  background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  background: -webkit-gradient(linear, left top, right top,
                               color-stop(0, rgb(0,0,0)),
                               color-stop(0.50, rgb(79,79,79)),
                               color-stop(1, rgb(21,21,21)));
  border-bottom: 1px solid #ddd;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  border-top-left-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
  border-top-right-radius: 10px;
}
</style>
<title>Conforming XHTML 1.1 Template</title>

</head>

<body>

<div id="columns">
  <div class="column" draggable="true"><header>A</header></div>
  <div class="column" draggable="true"><header>B</header></div>
  <div class="column" draggable="true"><header>C</header></div>
</div>
</body>

</html>