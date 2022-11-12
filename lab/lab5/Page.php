<?php
    class Page implements JsonSerializable{

        private $page;
        private $title;
        private $year;
        private $copyright;

        private function addHeader() {
            $this->header = "header";
        }

        public function addContent($content) {
            $this->content = $content;
        }

        private function addFooter() {
            $this->footer = "footer";
        }

        public function get() {
            return $this->header.$this->content.$this->footer;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function __get($attr) {
            return $this->$attr;
        }

        public function __call($method, $args) {
            $this->$method();
        }

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);
    
            return $vars;
        }
    }
?>