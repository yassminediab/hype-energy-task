<?php

class QueryBuilder {

    /**
     * @var DB
     */
    private $db;

    /**
     * QueryBuilder constructor.
     * @param DB $db
     */
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * @param $table
     * @param array $values
     * @return false|PDOStatement
     */
    public function insert(string $table, $values = [])
    {
        $params = $this->Paramsasinsert($values);
        $stmt = "INSERT INTO {$table} {$params}";
        $result=  $this->db->query($stmt);

        return $result;
    }

    /**
     * @param $x
     * @param $key
     * @param $y
     * @return string
     */
    public function getKey($x,$key,$y): string
    {
        $string='';

        if ($x > 0) {
            $string .= ",";
        }
        if ($y==0) {
            $string .= $key;
        }
        else if($y==1) {
            $string.="\"{$key}\"";
        }

        return $string;
    }

    /**
     * @param array $array
     * @return string
     */
    private function Paramsasinsert(array $array)
    {
        $string = '';
        $x= 0;
        $a=0;

        if(is_array($array))
        {
            $string.="(";

            foreach($array as $key => $value)
            {
                $string.=$this->getKey($x, $key, 0);
                $x++;
            }

            $string.=") VALUES (";

            foreach($array as $key => $value)
            {
                $string.=$this->getKey($a, $value, 1);

                $a++;
            }

            $string.=")";
        }

        return $string;
    }

    /**
     * @param $table
     * @param array $values
     * @param array $select
     * @return false|PDOStatement
     */
    public function select($table, $values = [], $select=[])
    {
        $selection=  $this->resolveSelection($select);
        $params = $this->resolveParams($values);
        $stmt = "SELECT {$selection} FROM {$table} $params";

        return $this->db->query($stmt);
    }

    /**
     * @param $table
     * @param array $values
     * @param array $select
     * @return array
     */
    public function selectAll($table, $values = [], $select=[]): array
    {
        $query = $this->select($table, $values, $select);

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * @param $table
     * @param array $values
     * @param array $select
     * @return mixed
     */
    public function selectOne($table, $values = [], $select=[])
    {
        $query = $this->select($table, $values, $select);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $values
     * @return string
     */
    public function resolveSelection($values): string
    {
        $selection='';

        if(empty($values)) {
            $selection  .= ' * ';
        }
        else {
            $x=0;

            foreach($values as $value)
            {
                if($x>0) {
                    $selection.=',';
                }
                $selection .= " $value ";
                $x++;
            }
        }

        return $selection;
    }

    /**
     * @param $array
     * @return string
     */
    private function resolveParams($array): string
    {
        $string='';
        $x= 0;

        if(is_array($array)&& !empty($array)) {
            $string.= "WHERE";

            foreach($array as $key => $value)
            {
                if($x > 0) {
                    $string .= " AND ";
                }

                $string .= " {$key} = \"{$value}\" ";
                $x++;
            }
        }

        return $string;
    }
}
