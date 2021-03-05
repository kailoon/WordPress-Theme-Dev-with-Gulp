# WordPress Themes Dev with Gulp

Based on TwentytwentyOne theme but using Gulp instead.

## Scripts

**Start develop** with [gulp-sass](https://www.npmjs.com/package/gulp-sass) and hot reload with [browsersync](https://www.npmjs.com/package/browser-sync). It will watch the changes of `php` and `scss` files.

```
 npm run Start
```

Build
Build `css` and `js` files using [minify](https://www.npmjs.com/package/gulp-clean-css) and [uglify](https://www.npmjs.com/package/gulp-uglify). The `js` will be [concated](https://www.npmjs.com/package/gulp-concat).

```
npm run build
```
