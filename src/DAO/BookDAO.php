<?php

namespace OCMyBooks\DAO;

use Doctrine\DBAL\Connection;
use OCMyBooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * Returns a list of all books sorted in descending order.
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);


        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }
    /**
     * Returns a book corresponding to the ID
     * @param integer $id
     * @return \OCMyBooks\Domain\Book
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);

    }

    /**
     * @param array $row
     * @return \OCMyBooks\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        $book->setAuthid($row['auth_id']);
        return $book;
    }

}
