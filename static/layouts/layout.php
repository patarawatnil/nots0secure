<?php 

class Layout {

    private $title;

    function __construct($title) {
        $this->title = $title;
      }

    public function get_header()
    {
        include_once('header.php');
    }

    public function get_footer()
    {
        include_once('footer.php');
    }

    public function get_title()
    {
        return $this->title;
    }
}

?>