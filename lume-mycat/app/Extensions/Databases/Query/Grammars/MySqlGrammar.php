<?php


namespace App\Extensions\Databases\Query\Grammars;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\MySqlGrammar as QueryGrammar;

class MySqlGrammar extends QueryGrammar
{
    /**
     * The components that make up a select clause.
     *
     * @var array
     */
    protected $selectComponents = [
        'master',
        'aggregate',
        'columns',
        'from',
        'joins',
        'wheres',
        'groups',
        'havings',
        'orders',
        'limit',
        'offset',
        'lock',
    ];

    /**
     * 该方法是组织 select 的 sql语句得
     * @param Builder $query
     * @return string
     */
    public function compileSelect(Builder $query)
    {
        return parent::compileSelect($query);
    }



    /**
     * Illuminate\Database\Query\Grammars\Grammar -> compileComponents
     * compileComponents 会遍历 $selectComponents 数组得每个元素， 根据元素名字 获取 Builder 得属性
     * 所以增加 master 这个元素的时候 $query->master 也必须存在
     * 因此 必须对 \Illuminate\Database\Query\Builder 重写增加 master属性
     * @param Builder $query
     * @return string
     */
    public function compileMaster(Builder $query)
    {
        if(empty($query->master)){
            return '';
        }
        return '/*#mycat:db_type=master*/ ';
    }
}
