<?php
    class DatabaseQuery {
        private function getAllResults() {
            return simplexml_load_file("database.xml");
        }

        public function getReaders() {
            $db = $this->getAllResults();
            return $db->readers;
        }

        public function getReaderBooks($id) {
            $db = $this->getAllResults();
            $booksIds = [];

            $borrows = $db->borrows;
            foreach($borrows->borrow as $borrow)
            {
                $reader = $borrow["reader"];

                if((strcasecmp($reader, $id)) == 0) {
                    array_push($booksIds, $borrow["book"]);
                }
            }

            $books = $this->getBooks();
            $result = [];
            foreach($books ->book as $book)
            {
                foreach($booksIds as $bookId) {
                    if((strcasecmp($book["id"], $bookId)) == 0) {
                        array_push($result, $book);
                    }
                }
            }

            return $result;
        }

        public function getBooks() {
            $db = $this->getAllResults();
            return $db->books;
        }
    }

?>