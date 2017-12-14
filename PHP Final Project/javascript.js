

canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold 63.5px Tandysoft'
context.textBaseline = 'top'
image                = new Image()
image.src            = 'alienButton.png'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.00, '#faa')
  gradient.addColorStop(0.66, '#f00')
  context.fillStyle = gradient
  context.fillText(  "Alien  Abductions", 0, 0)
  context.strokeText("Alien  Abductions", 0, 0)
  context.drawImage(image, 180, 18)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
