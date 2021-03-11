const path = require("path")
import webpack from "webpack"
const { GenerateSW } = require('workbox-webpack-plugin')
import settings from "./settings"

module.exports = {
  entry: {
    App: settings.themeLocation + "js/scripts.js",
  },
  output: {
    path: path.resolve(__dirname, settings.themeLocation + "js"),
    filename: "scripts-bundled.js",
  },
  optimization: {
    moduleIds: 'size',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      // {
      //   enforce: 'pre',
      //   test: /\.js$/,
      //   exclude: /node_modules/,
      //   loader: 'eslint-webpack-plugin',
      //   options: {
      //     // eslint options (if necessary)
      //     fix: true,
      //   },
      // },
    ],
  },
  plugins: [
    // Other webpack plugins...
    // new GenerateSW({
    // })
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
    }),
  ],
  mode: "production",
  // mode: "production",
}
