<?hh

require __DIR__ . '/../vendor/autoload.php';

echo (
  <html>
    <head>
      <title>Light Toggle</title>
      <script src="js/light_controls.js"></script>
    </head>
    <body>
      <div>
        <light-buttons />
      </div>
    </body>
  </html>
);
