<?hh

class :light-buttons extends :x:element {
  protected function render(): :div {
    return <div>
      <light-button command="on" />
      <light-button command="off" />
    </div>;
  } 
}
