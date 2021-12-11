//require('vue');

import app from './components/HelloClient.vue';
import { createSSRApp } from 'vue'
import { renderToString } from '@vue/server-renderer';

renderToString(createSSRApp(app)).then(html =>{
  print(`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
  <div id="app">${html}</div>
  <script src="/js/admin/client.js"></script>
</body>
</html>`);
}).catch(e=>{
  print(e);
});
