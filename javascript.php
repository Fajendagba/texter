<script src="js/jquery.min.js"></script>
<script src="jss/tinymce/jquery.tinymce.min.js"></script>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- jQuery UI -->
<script src="js/jquery-ui.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- Tinymce minified -->
<script src="jss/tinymce/tinymce.min.js"></script>

<script>
canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 97px Georgia'
context.textBaseline = 'top'
image                = new Image()
image.src            = 'message.png'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.30, '#623c12')
  gradient.addColorStop(0.66, '#bfa297')
  context.fillStyle = gradient
  context.fillText(  "Text", 0, 0)
  context.strokeText("Text", 0, 0)
  context.drawImage(image, 230, 32)
}

//$('#pass').css('background', 'lime')
$('#pass').click(function() { $('#text').hide('slow', 'linear') })

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
</script>