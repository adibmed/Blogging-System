<?php

namespace Core\classes;

class View
{
    protected $view_file;
    protected $view_data;

    public function __construct($view_file, $view_data)
    {
        $this->view_file = $view_file;
        $this->view_data = $view_data;
    }

    public function render()
    {
        if (file_exists(VIEWS . $this->view_file . '.phtml')) {
            include VIEWS . $this->view_file . '.phtml';
        } else {
            echo 'View : <b>' . $this->view_file . '</b> not found';
        }
    }
}
