<?hh

namespace NickGarvey;

class LightController {
  public function __construct(
    private ConfigHandler $config,
  ) {}

  public function on(): bool {
    return $this->doCurl('on');
  }

  public function off(): bool {
    return $this->doCurl('off');
  }

  private function doCurl(string $command): bool {
    $url = $this->config->getString('light_url');
    $token = $this->config->getString('light_key');
    $curl = new \Curl\Curl();

    $curl->setHeader('Authorization', "Bearer $token");
    $curl->put($url . "/switch/$command");
    if ($curl->error) {
      error_log($curl->error_code . ": " . $curl->response);
      return false;
    }
    return true;
  }
}
