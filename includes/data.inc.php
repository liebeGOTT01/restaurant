<?php
class Data extends Dbh
{
    protected function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    protected function getCategory()
    {
        $sql = "SELECT * FROM category_table";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $catData[] = $row;
            }
            return $catData;
        }
    }
}