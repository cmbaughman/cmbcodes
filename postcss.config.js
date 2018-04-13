const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const cssnext = require('postcss-cssnext');

module.exports = {
  plugins: [
    autoprefixer,
    cssnano,
    cssnext
  ]
};
