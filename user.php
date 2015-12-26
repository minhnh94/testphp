<?php

include_once('database.php');

class user extends database {

    public $id = NULL;
    public $tk = NULL;
    public $mk = NULL;
    public $email = NULL;
    public $name = NULL;
    public $trangthai = NULL;
    public $qtc = NULL;
    public $ngaydangky = NULL;

    public function __construct() {
        $this->connect();
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNgaydangky() {
        return $this->ngaydangky;
    }

    public function setNgaydangky($ngaydangky) {
        $this->ngaydangky = $ngaydangky;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTrangthai() {
        return $this->trangthai;
    }

    public function setTrangthai($trangthai) {
        $this->trangthai = $trangthai;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // tai khoan
    public function set_tk($tk) {
        $this->tk = $tk;
    }

    public function get_tk() {
        $tk = $this->tk;
        return $tk;
    }

    // mat khau
    public function set_mk($mk) {
        $this->mk = $mk;
    }

    public function get_mk() {
        $mk = $this->mk;
        return $mk;
    }

    // quyen truy cap
    public function set_qtc($qtc) {
        $this->qtc = $qtc;
    }

    public function get_qtc() {
        $qtc = $this->qtc;
        return $qtc;
    }

 

    

    public function add_user() {
        $sql = "SELECT * FROM nguoidung WHERE tenDangNhap = '$this->tk'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return 'user exist';
        } else {
            $sql = "INSERT INTO nguoidung(tenDangNhap,matKhau,hoTen,email,maQuyen,ngayDangKy,trangThai) VALUES ('$this->tk','$this->mk','$this->name','$this->email','$this->qtc','$this->ngaydangky','$this->trangthai')";
            $this->query($sql);
        }
    }

    public function edit_user() {
        $sql = "SELECT * FROM nguoidung WHERE tenDangNhap = '$this->tk' AND maNguoiDung != '$this->id'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return 'user exist';
        } else {
            $sql = "UPDATE nguoidung SET tenDangNhap = '$this->tk',matKhau = '$this->mk',hoTen = '$this->name',email = '$this->email',maQuyen='$this->qtc',
                ngayDangKy = '$this->ngaydangky', trangThai = '$this->trangthai' WHERE maNguoiDung = $this->id";

            $this->query($sql);
        }
    }

    public function del_user($id) {
        $sql = "DELETE FROM nguoidung WHERE maNguoiDung = $id";
        $this->query($sql);
    }
    
    
}

?>