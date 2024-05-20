<?php
require_once("./db.php");


class Students
{
    private $table = "students";
    private $name;
    private $age;
    private $field;

    function getTable()
    {
        return $this->table;
    }

    function setName($name)
    {
        $this->name = $name;
    }
    function setAge($age)
    {
        $this->age = $age;
    }
    function setField($field)
    {
        $this->field = $field;
    }

    function insertData()
    {
        $sql = "INSERT INTO $this->table(name , age , field) VALUES(:name , :age , :field ) ";
        $stmt = Db::dbPrepare($sql);

        //$stmt->bindParam(":name" , $this->name);
        //$stmt->bindParam(":age" , $this->age);
        //$stmt->bindParam("field" , $this->field);

        return $stmt->execute(['name' =>   $this->name , 'age' =>  $this->age , 'field' => $this->field]);


    }


    function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = Db::dbPrepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }



    function deleteData($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = Db::dbPrepare($sql);
        return $stmt->execute(['id' =>  $id]);
    }



    function getOneUser($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = Db::dbPrepare($sql);
        $stmt->execute(['id' =>  $id]);
        return $stmt->fetch();
    }



    function updateData($id)
    {
        $sql = "UPDATE $this->table SET name=:name , age=:age , field=:field WHERE id=:id";
        $stmt = Db::dbPrepare($sql);

        return $stmt->execute(['name' =>   $this->name , 'age' =>  $this->age , 'field' => $this->field , 'id' => $id]);


    }
}

?>