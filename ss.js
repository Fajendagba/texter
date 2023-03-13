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

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
