// eslint-disable-next-line no-undef
// global.$ = global.jQuery = $
import 'bootstrap'
// import 'slick-carousel'

import Main from "./modules/main"
import Nav from "./modules/nav"
import Map from "./modules/map"

// Instantiate a new object using our modules/classes
const main = new Main()
const nav = new Nav()
const map = new Map()

// const ws = new WebSocket('wss://stream.binance.com:9443/ws/bnbbtc@depth')
// ws.onmessage = (message) => {
//  console.log(message)
// }
