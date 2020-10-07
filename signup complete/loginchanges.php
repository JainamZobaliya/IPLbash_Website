<p>Click the button to change the value of the text field.</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
  var name = window.prompt("Enter your name: ");
  document.getElementById("myText").value = name;
}
</script>