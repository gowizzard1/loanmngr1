<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function breadcrumbs($list) { 
    $bread = "";
    $size = sizeof($list);
    
    $bread .= "<ol class='breadcrumb'>";
    for($i=0; $i<$size; $i++) {
        if ($i == $size-1){
            $bread .= "<li class='active'>".$list[$i]."</li>";
        }else {
            $bread .= "<li><a href='".site_url()."/".$list[$i]."'>".$list[$i]."</a></li>";
        }
    }
    $bread .= "</ol>";

    return $bread; 
}

function navbar_left($controller) {
    $menu = "";
    $item = array('home', 'clients', 'Investments', 'users');
    $size = sizeof($item);
    $menu .= "<ul class='nav navbar-nav menu-group'>";

    for ($i=0; $i < $size; $i++) { 
        if ($item[$i] == $controller){
            $menu .= "<li class='menu-list active'>";
        }else {
            $menu .= "<li class='menu-list'>";
        }

        $menu .= "<a href='".site_url()."/".$item[$i]."'>".$item[$i]."</a></li>";
    }
    $menu .= "</ul>";

    return $menu;
}

function client_information($c_id) {
    $profile = $this->Client_model->get_clients($c_id);
    $fullname = $profile['firstname']." ".$profile['lastname'];

    $this->table->set_heading('Client Information');
    $this->table->add_row(array('ID', $profile['id']));
    $this->table->add_row(array('Last Name', $profile['lastname']));
    $this->table->add_row(array('First Name', $profile['firstname']));
    $this->table->add_row(array('Address', $profile['address']));
    $this->table->add_row(array('Telephone', $profile['telephone']));
    $template = array('table_open' => '<table class="table table-condensed table-striped myTable client-info-tbl">', 'heading_cell_start' => '<th colspan="2">');
    $this->table->set_template($template);
    $table = $this->table->generate();

    return $table;
}