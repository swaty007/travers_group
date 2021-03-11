class Nav {
  constructor () {
    this.events()
  }
  events () {
    this.init()
  }
  init () {
    $('#navbar__burger').on('click', (e) => {
      e.preventDefault()
      $(e.currentTarget).toggleClass('collapsed')
      $('#dashboard__items').toggleClass('show')
    })
  }
}

export default Nav