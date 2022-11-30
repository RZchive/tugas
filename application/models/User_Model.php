<?php
class User_Model extends CI_Model
{
    public $tabel = "user";
    public $id = "user.id";

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get()
    {
        return $this->db->query("Select * from user order by id desc")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

}