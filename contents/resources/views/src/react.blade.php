<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <!--
      manifest.json provides metadata used when your web app is installed on a
      user's mobile device or desktop. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
    <!--
      Notice the use of %PUBLIC_URL% in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.
      Unlike "/favicon.ico" or "favicon.ico", "%PUBLIC_URL%/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
    <title>React App</title>
</head>
<body>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="activity-chart"></div>
<!--
  This HTML file is a template.
  If you open it directly in the browser, you will see an empty page.
  You can add webfonts, meta tags, or analytics to this file.
  The build step will place the bundled scripts into the <body> tag.
  To begin the development, run `npm start` or `yarn start`.
  To create a production bundle, use `npm run build` or `yarn build`.
-->
<script>const USERS = '[{"id":2,"name":"\u3042\u3093\u3053","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/InyrUwzQXsXDl1hiM89QxA37XaIinxevNyfLf3qi.png"},{"id":3,"name":"aaa","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/TwnAtKdpkkFDbRfHDuDcMRBU0BDDzbCzdbbxMV1z.jpeg"},{"id":5,"name":"ccc","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/NJZPTAShShnLKIVzfvM6v8sWTUCjQv9gh1qK3pL8.jpeg"},{"id":6,"name":"ddd","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":7,"name":"\u30e8\u30b3\u30e4\u30de\u30b1\u30a4","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/NPXH1t15XHrmVXIgmVuVeqy5kfBKKUnbrF0DWj46.jpeg"},{"id":9,"name":"\u30e6\u30fc\u30b6\u30fc","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":10,"name":"\u6a2a\u5c71\u6176","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":11,"name":"\u6a2a\u5c71\u6176","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":12,"name":"\u3042\u3042","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":13,"name":"aa","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":14,"name":"hhh","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":44,"name":"\u5b6b\u609f\u7a7a","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/fyfyijXmLXEu1PCjc2NPRxJDgn31lUxxjDwINf2z.jpg"},{"id":45,"name":"\u30d9\u30b8\u30fc\u30bf","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/9lTjGk0U8kJW4XC5ylkCchP7QrUE2P8h1PmiQvpg.jpg"},{"id":46,"name":"\u30d5\u30ea\u30fc\u30b6","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/WwOIXj4GzAClDYivzS3woS17iUodNsGHCeL41odH.jpg"},{"id":47,"name":"\u30bb\u30eb","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/FoXa4N1CIDfs5JuMhLq3jdeWpyjgXb7d7AyzG2pk.jpg"},{"id":48,"name":"\u30d6\u30a6","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/8tQrBKqMaDiVv9LVEONTfr2lImWsS1k9cd47sDGf.jpg"},{"id":49,"name":"\u30d4\u30c3\u30b3\u30ed","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/xKgd7iZQCFQdCouVVG9LKMO3bFENpDhIM2lcIEix.jpg"},{"id":50,"name":"\u30e4\u30e0\u30c1\u30e3","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/xDmEoZwlddjTvEe1AAgS6hRPtJjBVnz2WAilzX3I.jpg"},{"id":51,"name":"\u30d3\u30fc\u30c7\u30eb","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/ybw0K8yZL2q5Hyc1XsmNNHwM6MYf0PlBt7nKTxX1.jpg"},{"id":52,"name":"\u30d1\u30f3","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/0L7OVRDwSixfs1VtrnNUugZsvG7ipvJ3ZHbHAXM8.jpg"},{"id":53,"name":"\u30e9\u30c7\u30a3\u30c3\u30c4","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/xCzP02DTgqzHuZ8zdlXrtCfnJy2l30xTiZldAqvG.jpg"},{"id":54,"name":"\u5929\u4e0b\u4e00\u6b66\u9053\u4f1a\u306e\u53f8\u4f1a","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/C7noYfvKXZcq5rn2ftyiYdoe8NeOA9xrM1CIQPdM.jpg"},{"id":55,"name":"takuya.handa@mfro.net","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":57,"name":"\u30de\u30fc\u541b","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"},{"id":77,"name":"s","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/I6BxTJdYuAJR6esrWrdwIUBYJtiJtMg5IgCjalS1.jpg"},{"id":78,"name":"tora","icon":"http:\/\/127.0.0.1:10080\/storage\/img\/users_icon\/icon_none.jpg"}]'</script>
<script src="{{ mix('/react/activity-chart/index.js') }}"></script>
</body>
</html>
