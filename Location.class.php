<?php

class Location {
    private $id;
    private $governorate;
    private $wilaya;
    private $attraction;

    public function __construct($id, $governorate, $wilaya, $attraction) {
        $this->id = $id;
        $this->governorate = $governorate;
        $this->wilaya = $wilaya;
        $this->attraction = $attraction;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getGovernorate() {
        return $this->governorate;
    }

    public function getWilaya() {
        return $this->wilaya;
    }

    public function getAttraction() {
        return $this->attraction;
    }
}

?>