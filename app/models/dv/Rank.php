<?php
class Rank extends Entry implements ModelInterface {

    static $table_name = "dv_rank";

    public function __construct(int $id) {
        parent::__construct($id);
    }


}