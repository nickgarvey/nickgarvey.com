<?hh

require __DIR__ . '/../vendor/autoload.php';

header('Content-Type: text/plain');

function bad_job(): void {
  http_response_code(400);
  echo "Invalid request";
  exit(0);
}

$config = \NickGarvey\ConfigHandler::get('../config.ini');
$controller = new \NickGarvey\LightController($config);

$method = $_SERVER['REQUEST_METHOD'];
error_log($method);

switch ($method) {
  case 'POST':
    error_log(json_encode($_POST));
    $params = new Map($_POST);
    $command = idx($params, 'command');
    error_log('cmd: ' . $command);
    if ($command === "on") {
      $controller->on();
    } elseif ($command === "off") {
      $controller->off();
    } elseif ($command === "toggle") {
      $controller->toggle();
    } else {
      bad_job();
    }
    break;
  default:
    bad_job();
}
