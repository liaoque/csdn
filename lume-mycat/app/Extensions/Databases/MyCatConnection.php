<?php


namespace App\Extensions\Databases;


use App\Extensions\Databases\Query\Grammars\MySqlGrammar;
use Illuminate\Database\Schema\MySqlBuilder;

class MyCatConnection extends \Illuminate\Database\MySqlConnection
{
    /**
     * Get the default query grammar instance.
     *
     * @return \App\Extensions\Databases\Query\Grammars\MySqlGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new MySqlGrammar());
    }


}
