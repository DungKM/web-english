<?php
class Database
{
    protected $ketnoi;
    private $host = HOST_DB;
    private $user = USER_DB;
    private $pass = PASS_DB;
    private $dbname = DBNAME_DB;
    function connect()
    {
        try {

            if (!$this->ketnoi) {
                $this->ketnoi = mysqli_connect(
                    $this->host,
                    $this->user,
                    $this->pass,
                    $this->dbname
                );
                mysqli_query($this->ketnoi, "set names 'utf8'");
            }
        } catch (Exception $err) {
            die($err->getMessage());
        }
    }
    function backup()
    {
        $filename = $this->dbname . date("Y-m-d-H-i-s") . '.sql';
        $result = exec('mysqldump --opt -h ' . $this->host . ' -u ' . $this->user . ' -p ' . $this->pass . '  --single-transaction >/var/backups/' . $filename, $output);
        return $output;
    }
    function dis_connect()
    {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }
    function site($data)
    {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `hethong` WHERE ID = '1' ")->fetch_array();
        return $row[$data];
    }
    function query($sql)
    {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    function cong($table, $data, $value, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$value' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $value, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` - '$value' WHERE $where ");
        return $row;
    }
    function insert($table, $data)
    {
        //kết nối cơ sở dữ liệu
        $this->connect();
        //tạo mới 2 biến
        $field_list = '';
        $value_list = '';
        //sử dụng foreach lặp qua mảng data nhận vào từ form
        foreach ($data as $key => $value) {
            //tạo cấu trúc câu lệnh
            $field_list .= ",$key";
            $value_list .= ",'" . mysqli_real_escape_string($this->ketnoi, $value) . "'"; //mysqli_real_escape_string: tránh các lỗ hổng bảo mật
        }
        //tạo thành câu SQL hoàn chỉnh
        $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($value_list, ',') . ')'; //trim: loại bỏ dấu phảy cuối dùng
        //lệnh Insert được thực thi -> kết quả được lưu vào db
        return mysqli_query($this->ketnoi, $sql);
    }
    function updateSQL($sql)
    {
        $this->connect();
        return mysqli_query($this->ketnoi, $sql);
    }

    function update($table, $data, $where)
    {
        //kết nối cdsl
        $this->connect();
        $sql = '';
        //sử dụng foreach lặp qua mảng data nhận vào từ form
        foreach ($data as $key => $value) {
            //tạo cấu trúc câu lệnh
            $sql .= "$key = '" . mysqli_real_escape_string($this->ketnoi, $value) . "',";
        }
        //tạo thành câu SQL hoàn chỉnh
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
        //lệnh Update được thực thi -> kết quả được lưu vào db
        return mysqli_query($this->ketnoi, $sql);
    }
    function update_value($table, $data, $where, $value1)
    {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '" . mysqli_real_escape_string($this->ketnoi, $value) . "',";
        }
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where . ' LIMIT ' . $value1;
        return mysqli_query($this->ketnoi, $sql);
    }
    function remove($table, $where)
    {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    function get_list($sql)
    {
        //kết nối tới csdl 
        $this->connect();
        //thực hiện câu truy vấn SQL
        $result = mysqli_query($this->ketnoi, $sql);
        //kiểm tra $result kết quả truy vấn
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) { //trích xuất một hàng kết quả từ tập kết quả của câu truy vấn
            $return[] = $row;
        }
        //giải phóng bộ nhớ
        mysqli_free_result($result);
        return $return;
    }
    function get_row($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $row;
    }
    function num_rows($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        return $row;
    }
}
