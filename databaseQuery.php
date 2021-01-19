<?php 
    class DatabaseQuery {
        private function getAllResults() {
            return simplexml_load_file("database.xml");
        }

        public function getReaders() {
            $db = $this->getAllResults();
            return $db->readers;
        }

        public function getBooks() {
            $db = $this->getAllResults();
            return $db->books;
        }
    }

?>