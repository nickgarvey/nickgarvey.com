<?hh // strict

namespace NickGarvey;

class ConfigHandler {

  static Map<string, ConfigHandler> $instances = Map{};

  private array<string, mixed> $ini;

  public static function get(string $path): ConfigHandler {
    $config = idx(self::$instances, $path);
    if (!$config) {
      $config = new ConfigHandler($path);
      self::$instances[$path] = $config;
    }
    return $config;
  }

  private function __construct(private string $path) {
    $this->ini = parse_ini_file($path);
    if ($this->ini === false) {
      throw new \Exception("Failed to parse $path");
    }
  }

  public function getString(string $configKey): ?string {
    $v = idx($this->ini, $configKey);
    invariant(is_string($v), "must be string");
    return $v;
  }
}
