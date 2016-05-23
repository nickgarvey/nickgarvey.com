<?hh

class :light-button extends :x:element {
  attribute :button;
  attribute enum {"on", "off"} command @required;

  use XHPHelpers;

  private function text(): string {
    return ucfirst($this->:command);
  }

  protected function render(): :button {
    $button = <button type="button">{$this->text()}</button>;
    $button->setAttribute(
      'onclick',
      "flipLight('{$this->:command}');",
    );
    return $button;
  } 
}
