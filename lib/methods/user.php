<?php
include_once(__DIR__.'/../utils/db.php');
include_once('auth.php');

class UserMethods {
    private $user;
    public $uploadDir = 'uploads';

    function __construct() {
        $this->user = Auth::currentUser();
    }

    private function handleFileUpload($file, $allowed_types, $allowed_size, $repo='') {
        $fsize = filesize($file['tmp_name']);
        $fname = basename($file['name']);
        $ftype = strtolower(pathinfo($fname,PATHINFO_EXTENSION));
        $new_fname = md5($fname."_".time());

        if (!in_array($ftype ,$allowed_types)) {
            throw new Exception('Invalid file type.');
        }

        if ($fsize > $allowed_size) {
            throw new Exception('File size exceeded. Upload a smaller file.');
        }

        $url = $this->uploadDir."/".($repo ? $repo.'/' : '').$new_fname.".".$ftype;
        $saved = move_uploaded_file($file['tmp_name'], $url);

        if ($saved) {
            return $url;
        } else {
            throw new Exception('Error while saving the file.');
        }

    }

    public function handleImageUpload($file, $allowed_size=null, $repo='') {
        $types = array('jpg', 'jpeg', 'png', 'svg');

        $size = $allowed_size ?? 500000;

        return $this->handleFileUpload($file, $types, $size, $repo);
    }
}
?>