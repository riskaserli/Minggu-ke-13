<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sekolah extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $Sekolah = $this->db->get('sekolah')->result();
        } else {
            $this->db->where('id', $id);
            $Sekolah = $this->db->get('sekolah')->result();
        }
        $this->response($crud_pdo, 200);
    }

    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'alamat'    => $this->post('alamat'),
					'logo'    => $this->post('logo'));
        $insert = $this->db->insert('sekolah', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'           => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'alamat'    => $this->put('alamat'),
					'logo'    => $this->put('logo'));
        $this->db->where('id', $id);
        $update = $this->db->update('sekolah', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	
}
?>