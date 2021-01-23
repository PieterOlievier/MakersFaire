/* eslint-disable object-curly-spacing */
/* eslint-disable babel/object-curly-spacing */
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const postcssPresetEnv = require('postcss-preset-env');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const webpack = require('webpack');

module.exports = (env, { mode }) => {
  console.log(mode);
  return {
    output: {
      filename: 'script.js',
      // publicPath: mode === 'production' ? '' : 'http://localhost:9000/'
    },
    devServer: {
      overlay: true,
      hot: true,
      port: 8900,
      disableHostCheck: true
    },
    module: {
      rules: [
        {
          test: /\.(jpe?g|png|svg|webp|gif)$/,
          use: {
            loader: 'file-loader',
            options: {
              name: 'assets/img/[name].[ext]',
              esModule: false,
            }
          }
        },
        {
          test: /\.(woff|woff2)$/,
          use: {
            loader: 'file-loader',
            options: {
              name: 'assets/fonts/[name].[ext]',
              esModule: false,
            }
          }
        },
        {
          test: /\.css$/,
          use: [
            mode === 'production'
              ? MiniCssExtractPlugin.loader
              : 'style-loader',
            'css-loader',
            'resolve-url-loader',
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: true,
                postcssOptions: {
                  plugins: [
                    require('postcss-import'),
                    postcssPresetEnv({ stage: 0 })
                  ]
                }
              }
            }
          ]
        }
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: 'style.css'
      }),
      new OptimizeCSSAssetsPlugin(),
      new webpack.HotModuleReplacementPlugin()
    ],
    // externals: {
    //   'lottie-web': 'lottie'
    // }
  };
};
