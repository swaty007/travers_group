// eslint-disable-next-line no-undef
// global.$ = global.jQuery = $
import 'bootstrap'
// import 'slick-carousel'

import Main from "./modules/main"
import Nav from "./modules/nav"

// Instantiate a new object using our modules/classes
const main = new Main()
const nav = new Nav()

// const ws = new WebSocket('wss://stream.binance.com:9443/ws/bnbbtc@depth')
// ws.onmessage = (message) => {
//  console.log(message)
// }

//copy text
$('.wallet__item--copy').on('click', (e) => {
  let _this = $(e.currentTarget),
    text = _this.siblings('.copy__text').text()

  let temp = $("<input>")
  $("body").append(temp)
  temp.val(text).select()
  document.execCommand("copy")
  temp.remove()

  _this.tooltip('hide').data('bs.tooltip', false)
  _this.tooltip({
    trigger: 'manual',
    placement: 'top',
    title: 'Copied',
  }).tooltip('show')
  setTimeout(() => {
    _this.tooltip('hide')
  }, 600);
})



// Restricts input for the given textbox to the given inputFilter function.
function setInputFilter (textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
    if (!textbox) return
    textbox.addEventListener(event, function () {
      if (inputFilter(this.value)) {
        this.oldValue = this.value
        this.oldSelectionStart = this.selectionStart
        this.oldSelectionEnd = this.selectionEnd
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd)
      } else {
        this.value = ""
      }
    })
  })
}

setInputFilter(document.getElementById("deposit__input"), function(value) {
  return /^\d*\.?\d*$/.test(value) // Allow digits and '.' only, using a RegExp
})
setInputFilter(document.getElementById("withdraw__input"), function(value) {
  return /^\d*\.?\d*$/.test(value) // Allow digits and '.' only, using a RegExp
})