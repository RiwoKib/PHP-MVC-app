<?php

/**
 * main model
 */
class Model extends DBConnection
{   
    private $conn;
    protected $table;
	public $errors = array();

	public function __construct($table)
	{   
        $this->conn = new DBConnection();
		$this->table  = $table;

	}

    public function where($column, $value)
    {
    $column = addslashes($column);
    $query = "SELECT * FROM $this->table WHERE $column = ?";
    $data = $this->conn->query($query, [$value]);

    return $data;
    }



	public function findAll($orderby = 'desc')
	{

		$query = "SELECT * FROM $this->table ORDER BY id $orderby";
		$data = $this->conn->query($query);

		return $data;

	}

	public function insert($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $insertValues = array_values($data);

        return $this->conn->query($query, $insertValues);
    }

    public function update($id, $data)
    {
        if (!is_array($data)) {
            // Single-column update
            $column = $data;
            $value = func_get_arg(2);
            $query = "UPDATE $this->table SET $column = ? WHERE id = ?";
            $values = array($value, $id);
        } else {
            // Multi-column update
            $updateValues = array();
            foreach ($data as $column => $value) {
                $updateValues[] = "$column = ?";
            }
            $updateValues = implode(', ', $updateValues);

            $query = "UPDATE $this->table SET $updateValues WHERE id = ?";
            $values = array_merge(array_values($data), array($id));
        }

        return $this->conn->query($query, $values);
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $values = array($id);

        return $this->conn->query($query, $values);
    }
	
}
